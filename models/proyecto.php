<?php

require_once 'config/db.php';

class Proyecto {

    private $id; 
    private $tema; 
    private $grupo;     
    private $descripcion; 
    private $db;

    public function __construct()
    {
        $this->db = DataBase::Conectar();
    }

    public function getId(){
        return $this->id;
    }

    public function getTema(){
        return $this->tema;
    }

    public function getGrupo(){
        return $this->grupo;
    }

    private function getDescripcion(){
        return $this->descripcion;
    }

    public function setTema($tema){
        $this->tema = $tema;
    }

    public function setGrupo($grupo){
        $this->grupo = $grupo;
    }

    private function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getProyectos(){
       
        $sql="SELECT 
        pro_id as id,
        pro_tema as tema,
        pro_descripcion as descripcion,
        (SELECT grup_nombre from `grupos` where`grupos`.`grup_id` = `proyectos`.`grup_id` ) as grupo
        FROM `proyectos` limit 4";
         
        $conferencias = $this->db->query($sql);

        return $conferencias;
    }

}