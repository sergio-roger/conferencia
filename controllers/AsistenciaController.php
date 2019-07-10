<?php

require_once 'models/laboratorio.php';
require_once 'models/conferencia.php';
require_once 'models/asistencia.php';
require_once 'config/parametros.php';

class AsistenciaController{

    public function index(){
        echo 'Controlador asistencia, Acción index';
    }

    public function getConferencia($url){

         $id_conf = explode ("=", $url);
        
        $objeto = new Conferencia();
        $conf = $objeto->getConferencia($id_conf[1]);
        
        return $conf;
    }

    public function guardar(){
        $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; 

        //De aqui se obtiene el id de conferencia y lab
        $conferencia = $this->getConferencia($url);   
        $objetLaboratorio = new Laboratorio();
        $asistencia = new Asistencia();
        $objconf = new Conferencia();
        
        $laboratorio = $objetLaboratorio->getlaboratorio($conferencia->lab_id);
        $estado = '';
        $usuario = '';

        if(isset($_SESSION['indetificado']))
            $usuario =  $_SESSION['indetificado'];
        else if(isset($_SESSION['usuario']))
            $usuario = $_SESSION['usuario'];

        $aux = (int)$laboratorio->capacidad * (int)$laboratorio->desborde;
        $desborde = ((int)($aux/100));
        $desborde = $desborde + (int)$laboratorio->capacidad;

        if($conferencia->cupos < $laboratorio->capacidad){
            //Estado mandar confirmado
            $estado = 'confirmado';
            $_SESSION['alerta'] = 'alert-success';

            $objconf->actualizarCupos($conferencia->id);
            $asistencia->guardar($conferencia, 0, $estado); 
            $ultimoAsistencia = $asistencia->ultimoRegistro();
            $asistencia->guardar_UsuarioAsistencia($usuario->usu_id,$ultimoAsistencia->id);           
        }
        elseif($conferencia->cupos >= $laboratorio->capacidad || $conferencia->cupos < $desborde){
            //Operar con el desborde y mandar pendiente
            $prioridad = $conferencia->cupos - $laboratorio->capacidad + 1;

            $estado = 'pendiente';
            $_SESSION['alerta'] = 'alert-warning';
            $_SESSION['prioridad'] = $prioridad;

            $objconf->actualizarCupos($conferencia->id);
            $asistencia->guardar($conferencia,$prioridad,$estado);
            $ultimoAsistencia = $asistencia->ultimoRegistro();
            $asistencia->guardar_UsuarioAsistencia($usuario->usu_id,$ultimoAsistencia->id);           
        }
        else{
            $_SESSION['alerta'] = 'alert-danger';
        }

        header("Location:".base_url.'/conferencia/reserva');
        // die();
    }
}