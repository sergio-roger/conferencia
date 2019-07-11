<?php 

require_once 'models/conferencia.php';
require_once 'models/asistencia.php';

class ConferenciaController{

    //para las vistas de reservas
    public function index(){
        require_once 'views/reserva/entrada.php';
    }

    public function reserva(){
        
        $conferencia = new Conferencia();
        $conferencias = $conferencia->ObtenerTodos();

        require_once 'views/reservas/reserva.php';
    }

    public function verReserva(){

        $detalles = $this->getDetalle();

        require_once 'views/reservas/ver_reserva.php';
    }

    public function getConferencias(){
        
        $conferencia = new Conferencia();
        $conferencias = $conferencia->getConferencias();

        return $conferencias;
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