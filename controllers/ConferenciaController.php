<?php 

class ConferenciaController{

    //para las vistas de reservas
    public function index(){
        require_once 'views/reserva/entrada.php';
    }

    public function reserva(){
        require_once 'views/reservas/reserva.php';
    }

    public function verReserva(){
        require_once 'views/reservas/ver_reserva.php';
    }
}