<?php

require_once 'models/proyecto.php';

class ProyectoController{

    public function index(){
        echo 'Controlador Proyecto, Acción index';
    }

    public function getProyectos(){
        $proyecto = new Proyecto();

        return $proyecto->getProyectos();
    }
}