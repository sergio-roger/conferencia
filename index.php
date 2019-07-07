<?php
require_once 'autoload.php';
require_once 'config/parametros.php';

require_once 'views/layouts/principal_header.php';
require_once 'views/layouts/principal_conferencia.php';
require_once 'views/layouts/principal_proyecto.php';
require_once 'views/layouts/formulario.php';
require_once 'views/layouts/footer.php';

function MostrarError(){
    $error = new ErrorController();
    $error->index();
}

if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}
elseif(!isset($_GET['controller'])){
    $nombre_controlador = Controller_default;
    // echo 'Controlador default';
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
        // $default = action_default;
        // $controlador->index();
        // Accion del controlador por default
    }
    else{
        MostrarError();	
	}
}else{
    MostrarError();
}