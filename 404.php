<?php 
    require_once 'config/parametros.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página no existe</title>

    <link rel="stylesheet" href="<?=base_url?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12-sm-12 md-6">
                <div class="cuadro-imagen">
                    <img src="<?=base_url?>/assets/img/404Error.jpg" alt="">
                </div>
            </div>
            <div class="btn-error-inicio mt-5">
                <a class="btn btn-info error-boton" href="<?=base_url?>">Regresar al Inicio</a>
            </div>

        </div>
    </div>
</body>
</html>