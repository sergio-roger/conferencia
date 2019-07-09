<?php 

require_once 'models/conferencia.php';

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
        require_once 'views/reservas/ver_reserva.php';
    }

    public function getConferencias(){
        
        $conferencia = new Conferencia();
        $conferencias = $conferencia->getConferencias();

        return $conferencias;
    }
     
}