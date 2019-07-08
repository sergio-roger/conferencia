<?php
session_start();

require_once 'autoload.php';
require_once 'config/parametros.php';

require_once 'views/layouts/principal_header.php';
require_once 'views/layouts/principal_conferencia.php';
require_once 'views/layouts/principal_proyecto.php';
require_once 'views/layouts/formulario.php';
require_once 'views/layouts/principal_footer.php';


function MostrarError(){
    $error = new ErrorController();
    $error->index();
}

if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}
elseif(!isset($_GET['controller'])){
    $nombre_controlador = 'UsuarioController';
    // echo $nombre_controlador;
}
else{
    // echo 'La pagina no existe';
	exit();
}
