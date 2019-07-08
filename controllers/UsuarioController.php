<?php
use Symfony\Component\Console\Helper\Helper;

require_once 'models/usuario.php';

class UsuarioController{

    public function index(){
        // echo '<h1>Controlador Usuario, Acción index</h1>';
    }

    public function registro(){

    }

    public function guardar(){
        //Si se registro iniciar seccion y luego redirecionar a la home.php

        if(isset($_POST)){
            // var_dump($_POST);
            $hoy = date("Y-m-d H:i:s");   
                    
            $cedula = isset($_POST['cedula']) ? $_POST['cedula']: false; 
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']: false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido']: false;
            $sexo = isset($_POST['sexo']) ? $_POST['sexo']: false;
            $correo = isset($_POST['email']) ? $_POST['email']: false;
            $clave = isset($_POST['clave']) ? $_POST['clave']: false;
            
            $usuario = new Usuario($hoy);
            
            if($cedula && $nombre && $apellido && $correo && $clave){
                $usuario->setCedula($cedula);
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setSexo($sexo);
                $usuario->setCorreo($correo);
                $usuario->setClave($clave);

                $registro = $usuario->guardar();

                if($registro){//Registro completo
                    $_SESSION['registro'] = "completo";
                    $_SESSION['nombres'] = $usuario->getNombre().'  '.$usuario->getApellido();
                    header("Location:".base_url.'home.php');
                }
                else{ //Registro fallido
                    $_SESSION['registro'] = "fallido";
                    header("Location:".base_url.'index.php');

                }
            }else{
                $_SESSION['registro'] = "fallido";
                header("Location:".base_url.'index.php');
                // echo 'Datos incompletos';

            }
        }
        else{ //Registro fallido
            $_SESSION['registro'] = "fallido";
            // header("Location:".base_url.'index.php');
            echo 'Registro fallido';
        }
    }

    public function login(){

        if(isset($_POST)){
            // Redireccionar al usuario
            //Consulta a la base de datos 
            $hoy = date("Y-m-d H:i:s");
            $usuario = new Usuario($hoy);
                        
            $email = $_POST['inicio-correo'];
            $clave = $_POST['inicio-clave'];

            $identificado = $usuario->login($email,$clave);
            // var_dump($identificado);
            echo $identificado->usu_id.'<br>';
            
            if($identificado->usu_id > 0){
                $_SESSION['indetificado'] = $identificado;
                $_SESSION['login'] = 'dentro';
                header("Location:".base_url.'home.php');
            }
            else{
                $_SESSION['error_login'] = 'fallido';

                // Redireccionar a una pagina de datos y que vuevla a ingresar 
            }
        }
    }

    public function salir(){

        if(isset($_SESSION['indetificado'])){
            Utilidad::eliminarSeccion('indetificado');
            Utilidad::eliminarSeccion('login');
            header("Location:".base_url);
        }
    }
}