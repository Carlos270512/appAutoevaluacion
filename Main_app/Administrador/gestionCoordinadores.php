<?php
session_start();
if (!isset($_SESSION['usu'])) { header('Location:../../'); exit; }
if ($_SESSION['usu']['tipo'] !== 'Administrador') {
  if ($_SESSION['usu']['tipo'] === 'Coordinador') header('Location:../Coordinador/');
  else if ($_SESSION['usu']['tipo'] === 'Docente') header('Location:../Docente/');
  exit;
}

$mensaje = '';
$error = '';

try {
  $conexion = new PDO('mysql:host=localhost;dbname=desaroll_appautoevaluacionbd;charset=utf8mb4', 'desaroll_appUsuario', '=v=J7WL@V8zT', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
} catch (PDOException $e) {
  die('Error de conexión: ' . htmlspecialchars($e->getMessage()));
}

// Eliminar
if (isset($_GET['delete'])) {
  $id = (int) $_GET['delete'];
  $stmt = $conexion->prepare('DELETE FROM coordinadores WHERE id = :id');
  $stmt->execute([':id' => $id]);
  $mensaje = 'Registro eliminado correctamente.';
  header('Location: gestionCoordinadores.php?ok=' . urlencode($mensaje));
  exit;
}

// Crear / Actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action    = $_POST['action'] ?? 'create';
  $id        = isset($_POST['id']) ? (int) $_POST['id'] : 0;
  $id_login  = isset($_POST['id_login']) ? (int) $_POST['id_login'] : 0;
  $id_carrera= isset($_POST['id_carrera']) ? (int) $_POST['id_carrera'] : 0;

  if (!$id_login || !$id_carrera) {
    $error = '<h4><b>X Error, seleccione docente y carrera</b></h4>';
  } else {
    // Validar existencia de claves foráneas
    $existeDoc = $conexion->prepare('SELECT id FROM login WHERE id = :id AND tipo IN ("Docente","Coordinador")');
    $existeDoc->execute([':id' => $id_login]);
    $existeCar = $conexion->prepare('SELECT id FROM carreras WHERE id = :id');
    $existeCar->execute([':id' => $id_carrera]);

    if (!$existeDoc->fetch() || !$existeCar->fetch()) {
      $error = '<h4><b>X Docente o carrera no válidos</b></h4>';
    }
  }

  if ($error === '') {
    if ($action === 'update' && $id > 0) {
      $upd = $conexion->prepare('UPDATE coordinadores SET id_login = :id_login, id_carrera = :id_carrera WHERE id = :id');
      $upd->execute([':id_login'=>$id_login, ':id_carrera'=>$id_carrera, ':id'=>$id]);
      $mensaje = '<h4 style="color: green;"><b>✓ Coordinador actualizado</b></h4>';
    } else {
      // Si ya existe coordinador para esa carrera, reasignar (cambio de id_login)
      $ya = $conexion->prepare('SELECT id FROM coordinadores WHERE id_carrera = :id_carrera LIMIT 1');
      $ya->execute([':id_carrera'=>$id_carrera]);
      $row = $ya->fetch();
      if ($row) {
        $upd = $conexion->prepare('UPDATE coordinadores SET id_login = :id_login WHERE id = :id');
        $upd->execute([':id_login'=>$id_login, ':id'=>$row['id']]);
        $mensaje = '<h4 style="color: green;"><b>✓ Coordinador reasignado a la carrera</b></h4>';
      } else {
        $ins = $conexion->prepare('INSERT INTO coordinadores (id_login, id_carrera) VALUES (:id_login, :id_carrera)');
        $ins->execute([':id_login'=>$id_login, ':id_carrera'=>$id_carrera]);
        $mensaje = '<h4 style="color: green;"><b>✓ Coordinador registrado</b></h4>';
      }
    }
  }
}

// Cargar datos para selects y tabla
$docentes = $conexion->query('SELECT id, nombre FROM login WHERE tipo IN ("Docente","Coordinador") ORDER BY nombre')->fetchAll();
$carreras = $conexion->query('SELECT id, codigo, nombre FROM carreras ORDER BY nombre')->fetchAll();
$lista = $conexion->query('
  SELECT c.id, l.nombre AS docente, ca.nombre AS carrera, ca.codigo
  FROM coordinadores c
  JOIN login l ON l.id = c.id_login
  JOIN carreras ca ON ca.id = c.id_carrera
  ORDER BY ca.nombre
')->fetchAll();

// Si viene en modo edición
$edit = null;
if (isset($_GET['edit'])) {
  $id = (int) $_GET['edit'];
  $stmt = $conexion->prepare('SELECT * FROM coordinadores WHERE id = :id');
  $stmt->execute([':id'=>$id]);
  $edit = $stmt->fetch();
}

// Mensaje por redirect de delete
if (isset($_GET['ok'])) {
  $mensaje = '<h4 style="color: green;"><b>✓ ' . htmlspecialchars($_GET['ok']) . '</b></h4>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="shortcut icon" href="../../image/logo_inicio.ico" />
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="bod.css?v=1" />
  <title>Gestión de Coordinadores</title>

  <style>
    /* Ajustes simples para mantener el estilo */
    .container-page { max-width: 1080px; margin: 100px auto 40px; padding: 0 16px; }
    .card { background: #fff; border-radius: 12px; padding: 18px; box-shadow: 0 6px 18px rgba(0,0,0,.06); }
    .card h2 { margin: 0 0 10px; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    label { font-weight: 600; font-size: 0.9rem; }
    select, button { width: 100%; padding: 10px 12px; border-radius: 8px; border: 1px solid #e5e7eb; }
    .actions { display: flex; gap: 10px; }
    .btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 14px; border-radius: 8px; border: 0; cursor: pointer; }
    .btn-primary { background: #111827; color: #fff; }
    .btn-secondary { background: #e5e7eb; color: #111827; }
    .btn-danger { background: #ef4444; color: #fff; }
    table { width: 100%; border-collapse: collapse; margin-top: 16px; }
    th, td { padding: 10px 8px; border-bottom: 1px solid #f1f5f9; text-align: left; }
    th { font-size: .9rem; color: #111827; }
    .msg { margin: 10px 0; }
  </style>
</head>
<body>
  <header class="header">
    <nav class="nav container">
      <div class="nav__actions" style="margin-left: 2em;">
        <div class="dropdown" id="dropdown">
          <div class="dropdown__profile">
            <div class="dropdown__names">
              <h3><?php echo htmlspecialchars($_SESSION['usu']['nombre']); ?></h3>
              <span><?php echo htmlspecialchars($_SESSION['usu']['tipo']); ?></span>
            </div>
            <div class="dropdown__image">
              <img src="../../image/logo_inicio.ico" alt="" />
            </div>
          </div>
          <div class="dropdown__list">
            <a href="coordinadores/cambiarclave.php" class="dropdown__link">
              <i class="ph ph-user-circle"></i><span>Perfil de Usuario</span>
            </a>
            <a href="cerrar.php" class="dropdown__link">
              <i class="ph ph-sign-out"></i><span>Cerrar Sesión</span>
            </a>
          </div>
        </div>
      </div>

      <div class="nav__menu" id="nav-menu" style="position: absolute; margin-left: 23em;">
        <ul class="nav__list">
          <li><i class="icon ph-bold ph-house-simple"></i><a href="administrador.php" class="nav__link">Inicio</a></li>
          <li>
            <div class="dropdown" id="dropdown">
              <div class="dropdown__profile"><div class="dropdown__names"><i class="ph ph-identification-badge"></i><a class="nav__link">Registrar</a></div></div>
              <div class="dropdown__list" style="margin-left: -2em;">
                <a href="register.php" class="dropdown__link"><i class="ph ph-user-circle-plus"></i><span>Usuario</span></a>
                <a href="register3.php" class="dropdown__link"><i class="ph ph-bank"></i><span>Carrera</span></a>
                <a href="gestionCoordinadores.php" class="dropdown__link"><i class="ph ph-bank"></i><span>Gestion Coordinadores</span></a>
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown" id="dropdown">
              <div class="dropdown__profile"><div class="dropdown__names"><i class="icon ph-bold ph-pencil-simple-line"></i><a class="nav__link">Editar</a></div></div>
              <div class="dropdown__list" style="margin-left: -4em;">
                <a href="coordinadores/index.php" class="dropdown__link"><i class="ph ph-suitcase-simple"></i><span>Coordinadores</span></a>
                <a href="docentes/index.php" class="dropdown__link"><i class="ph ph-graduation-cap"></i><span>Docentes</span></a>
                <a href="carreras/index.php" class="dropdown__link"><i class="ph ph-bank"></i><span>Carreras</span></a>
              </div>
            </div>
          </li>
          <li>
            <div class="dropdown" id="dropdown">
              <div class="dropdown__profile"><div class="dropdown__names"><i class="icon ph-bold ph-table"></i><a class="nav__link">Instrumentos</a></div></div>
              <div class="dropdown__list" style="margin-left: -2em;">
                <a href="coevaluacion_presencial/index2.php" class="dropdown__link"><i class="ph ph-desktop"></i><span>Formulario</span></a>
              </div>
            </div>
          </li>
          <li><i class="icon ph-bold ph-file"></i><a href="reporte_presencial/convertidor.php" class="nav__link">Reporte General</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main class="container-page">
    <div class="card">
      <h2><i class="ph ph-users-three"></i> Gestión de Coordinadores</h2>
      <p style="margin:0 0 12px;">Asigna o cambia el coordinador (docente) por carrera.</p>

      <div class="msg">
        <?php
          if ($error)   echo $error;
          if ($mensaje) echo $mensaje;
        ?>
      </div>

      <form method="post" class="form" autocomplete="off">
        <input type="hidden" name="action" value="<?php echo $edit ? 'update' : 'create'; ?>">
        <?php if ($edit): ?>
          <input type="hidden" name="id" value="<?php echo (int)$edit['id']; ?>">
        <?php endif; ?>

        <div class="form-grid">
          <div>
            <label for="id_carrera">Carrera</label>
            <select id="id_carrera" name="id_carrera" required>
              <option value="">-- Seleccione --</option>
              <?php foreach ($carreras as $c): ?>
                <option value="<?php echo (int)$c['id']; ?>"
                  <?php echo $edit && (int)$edit['id_carrera']===(int)$c['id'] ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($c['nombre'] . ' (' . $c['codigo'] . ')'); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <label for="id_login">Docente (Coordinador)</label>
            <select id="id_login" name="id_login" required>
              <option value="">-- Seleccione --</option>
              <?php foreach ($docentes as $d): ?>
                <option value="<?php echo (int)$d['id']; ?>"
                  <?php echo $edit && (int)$edit['id_login']===(int)$d['id'] ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($d['nombre']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="actions" style="margin-top:12px;">
          <button type="submit" class="btn btn-primary">
            <i class="ph ph-floppy-disk"></i> <?php echo $edit ? 'Actualizar' : 'Guardar'; ?>
          </button>
          <?php if ($edit): ?>
            <a class="btn btn-secondary" href="gestionCoordinadores.php"><i class="ph ph-arrow-counter-clockwise"></i> Cancelar</a>
          <?php endif; ?>
        </div>
      </form>

      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Carrera</th>
            <th>Coordinador (Docente)</th>
            <th style="width:180px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!$lista): ?>
            <tr><td colspan="4">Sin registros.</td></tr>
          <?php else: foreach ($lista as $i => $r): ?>
            <tr>
              <td><?php echo (int)$r['id']; ?></td>
              <td><?php echo htmlspecialchars($r['carrera']); ?></td>
              <td><?php echo htmlspecialchars($r['docente']); ?></td>
              <td class="actions">
                <a class="btn btn-secondary" href="?edit=<?php echo (int)$r['id']; ?>">
                  <i class="ph ph-pencil-simple"></i> Editar
                </a>
                <a class="btn btn-danger" href="?delete=<?php echo (int)$r['id']; ?>"
                   onclick="return confirm('¿Eliminar este registro?');">
                  <i class="ph ph-trash"></i> Eliminar
                </a>
              </td>
            </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </main>

  <script src="assets/js/main.js"></script>
</body>
</html>