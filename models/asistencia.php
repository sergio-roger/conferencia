<?php

require_once 'config/db.php';

class Asistencia
{
   private $id; 
   private $id_conferencia;
   private $confirmacion; 
   private $prioridad; 
   private $estado; 

    public function __construct()
    {
        $this->db  = DataBase::Conectar();
    }

    // Crear getters

    // Crear settes

    // Crear metodo guardar
}