<?php

require_once 'models/asistencia.php';

class HomeController{

    public function index(){
        //Renderizando vista
        $asistidas = $this->getDetalle();

        require_once 'views/reservas/entrada.php';
    }

    public function getDetalle(){

        $detalle = new Asistencia();
        $idUsuario = false; 
        $listaDetalles = false;
        
        
        if(isset($_SESSION['indetificado'])){
            // $idUsuario = $_SESSION['identificado']->usu_id;   
            $listaDetalles = $detalle->getDetalleConferencia($_SESSION['indetificado']->usu_id);
        }
        elseif(isset($_SESSION['usuario'])){
            $idUsuario = $_SESSION['usuario']->usu_id;
            $listaDetalles = $detalle->getDetalleConferencia($_SESSION['usuario']->usu_id);
        }    

        return $listaDetalles;
    }
}