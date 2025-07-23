<?php
	$database="desaroll_appautoevaluacionbd";
	$user='desaroll_appUsuario';
	$password='=v=J7WL@V8zT';


try {
	
	$con=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}


?>