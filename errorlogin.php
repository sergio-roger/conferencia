<?php 
    require_once 'config/parametros.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error Datos</title>

    <link rel="stylesheet" href="<?=base_url?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css?v=1.1">

</head>
<body class="">
    <div class="container error-body">
        <div class="row d-flex formulario-error">
            <div class="col-12 col-sm-12 col-md-12 text-center mt-md-3">
              <div class="principal">
                <h1> III Ciclo de conferencias <span>MDLC</span> <sup>2</sup></h1>
              </div>  

              <div class="secundario error-secundario">
                <h3 class="error-texto-aniversario">XXI Aniversario Universidad Penìnsula de Santa Elena</h3>
              </div>
          
            </div>
            
            <div class="col-12 col-sm-6 col-md-12 mt-md-5">
                <div class="alert alert-danger" role="alert">
                    Datos incorrectos <a href="#" class="alert-link">vuelta a intentarlo</a>:(
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-12 mt-1 p-md-3">
                <form action="<?=base_url?>usuario/login" method="POST">
                    <label for="inicio-correo">Correo</label>
                    <input type="email" name="inicio-correo" placeholder="usuario@gmail.com"
                    required maxlength="100" class="form-control">

                    <label for="inicio-clave">Contraseña</label>
                    <input type="password" name="inicio-clave" id="" placeholder="****"
                    required maxlength="20" class="form-control">

                    <input type="submit" value="Ingresar" 
                    class="btn btn-primary form-control ingresar">
                </form>
            </div>
        </div>

    </div>
    
    <footer class="text-center d-flex justify-content-md-center align-items-md-center flex-column
    flex-row" style="padding-top: 20px;">
        <p class="footer-p1">Todo los derechos &copy; reservados</p>
        <p class="footer-p2">Desarrollado por <a href="https://www.facebook.com/sergioroger2704" target="_blank">Sergio Roger</a></p>   
    </footer>

</body>
</html>