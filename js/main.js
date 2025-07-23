
jQuery(document).on('submit','#formLg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'Main_app/login.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                  $('.botonlg').val('Validando....');
                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if (!respuesta.error) {
                  if (respuesta.tipo=='Administrador') {
                    location='Main_app/Administrador/administrador.php';
                  }else if (respuesta.tipo=='Coordinador') {
                    location='Main_app/Coordinador/coordinador.php';
                  }else if (respuesta.tipo=='Docente') {
                    location='Main_app/Docente/docente.php';
                  }
                }else {
                  $('.error').slideDown('slow');
                  setTimeout(function(){
                  $('.error').slideUp('slow');
                },3000);
                $('.botonlg').val('Iniciar Sesion');
                }
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });

