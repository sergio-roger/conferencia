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
        $asistidas = $this->getDetalle();

        $dataConferencia = $this->ToArrayConferencia($conferencias);
        $dataDetalle = $this->ToArrayDetalle($asistidas);

        $lista =  $this->listaDepurada($dataConferencia, $dataDetalle);

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

    public function ToArrayConferencia($arrayConferencias){

        $dataConferencia = array();

        while($r = $arrayConferencias->fetch_object()){
            $dataConferencia[] = $r;
        }
        return $dataConferencia;
    }

    public function ToArrayDetalle($arrayDetalles){

        $dataDetalle = array();

        while($item = $arrayDetalles->fetch_object()){
            $dataDetalle[] = $item;
        }
        return $dataDetalle;
    }

    public function listaDepurada($arrayConferencias, $arrayDetalles){

        $lista = array();

        for($i = 0; $i < count($arrayConferencias); $i++){
            for($j = 0; $j < count($arrayDetalles); $j++){
                    if($arrayConferencias[$i]->id == $arrayDetalles[$j]->id){
                        $arrayConferencias[$i]->id = 0;
                    }
            }
        }
        
        for($i = 0; $i < count($arrayConferencias); $i++){
            if($arrayConferencias[$i]->id != 0){
                $lista[] = $arrayConferencias[$i];
            }
        }
        return $lista;
    }
}