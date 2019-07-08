<?php
session_start();

require_once 'autoload.php';
require_once 'config/parametros.php';

require_once 'views/layouts/principal_header.php';

function MostrarError(){
    $error = new ErrorController();
    $error->index();
}

if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}
elseif(!isset($_GET['controller'])){
    $nombre_controlador = 'ConferenciaController';
    // echo $nombre_controlador;
}
else{
    // echo 'La pagina no existe';
	exit();
}

if(class_exists($nombre_controlador)){	
    $controlador = new $nombre_controlador();
   
   if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
       $action = $_GET['action'];
       $controlador->$action();
   }
   elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
       $default = 'getConferencias';
       $_POST['conferencias'] = $controlador->$default();
       // Accion del controlador por default
   }
   else{
       MostrarError();	
   }
}else{
   MostrarError();
}
require_once 'views/layouts/principal_conferencia.php';
require_once 'views/layouts/principal_proyecto.php';
require_once 'views/layouts/formulario.php';
require_once 'views/layouts/principal_footer.php';