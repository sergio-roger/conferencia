<?php

require_once 'config/db.php';

class Conferencia{

    private $id; 
    private $tema; 
    private $area;
    private $ponentes;
    private $lugar;
    private $hora;
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

    public function getArea(){
        return $this->area;
    }

    public function getPonentes(){
        return $this->ponentes;
    }

    public function getLugar(){
        return $this->lugar;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setTema($tema){
        $this->tema = $tema;
    }

    public function setArea($area){
        $this->area = $area;
    }

    public function setPonente($ponente){
        $this->ponentes = $ponente;
    }

    public function setLugar($lugar){
        $this->lugar;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }

    public function getConferencias(){
       
        $sql="SELECT conf_id as id, conf_tema as tema, conf_area as area,
        (SELECT Concat(pon_nombre,' ',pon_apellido) from  `ponentes` WHERE  `conferencias`.`pon_id`=`ponentes`.`pon_id`) as ponentes,
        (SELECT lab_nombre from `laboratorios` where `conferencias`.`lab_id` = `laboratorios`.`lab_id`)as lugar,
        (SELECT hor_inicio from `horarios` WHERE `conferencias`.`hor_id` = `horarios`.`hor_id`) as hora
        FROM `conferencias`";
         
        $conferencias = $this->db->query($sql);

        return $conferencias;
    }

}