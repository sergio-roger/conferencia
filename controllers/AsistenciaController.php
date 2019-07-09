<?php

require_once 'models/laboratorio.php';
require_once 'models/conferencia.php';

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

        //De aqui se obtien el id de conferencia y lab
        $conferencia = $this->getConferencia($url);   
        
        //Extraer objeto laboratorio 
        $objetLaboratorio = new Laboratorio();
        $laboratorio = $objetLaboratorio->getlaboratorio($conferencia->lab_id);

        echo 'Lab: '.$laboratorio->nombre.'<br>';


    }
}