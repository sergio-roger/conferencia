<?php
session_start();

require_once 'autoload.php';
require_once 'config/parametros.php';
require_once 'helper/utilidad.php';

require_once 'views/layouts/header.php';

function MostrarError(){
    $error = new ErrorController();
    $error->index();
}

if(!isset($_SESSION['login'])){
    header("Location:".base_url);    
}else{

    if(!isset($_POST['proyectos'])){
        $proyecto = new ProyectoController();
        $_POST['proyectos'] = $proyecto->getProyectos();
    }

    if(!isset($_POST['usuario']) && isset($_SESSION['correo'])){
        $usuario = new UsuarioController();
        $_SESSION['usuario'] = $usuario->getUsuario($_SESSION['correo']);
    }
}

if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}
elseif(!isset($_GET['controller'])){
    // echo $nombre_controlador;
    $nombre_controlador = Controller_default;
    
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
        $default = action_default;
        $controlador->index();
        // Accion del controlador por default
    }
    else{
        MostrarError();	
	}
}else{
    MostrarError();
}

require_once 'views/layouts/proyecto.php';
require_once 'views/layouts/footer.php';

