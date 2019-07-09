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
    private $capacidad;
    private $disponibles;

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

    public function getCapacidad(){
        return $this->capacidad;
    }

    public function getDisponibles(){
        return $this->disponibles;
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

    public function setCapacidad($capacidad){
        $this->capacidad = $capacidad;
    }

    public function getConferencia($id){
        
        $resultado = false;
        $sql="SELECT conf_id as id, conf_tema as tema, conf_descripcion as descripcion,
        conf_area as area, pon_id, lab_id, hor_id
        FROM `conferencias` 
        WHERE `conferencias`.`conf_id` = {$id}";
        
        $conferencia = $this->db->query($sql);

        if($conferencia && $conferencia->num_rows == 1){
            $conf = $conferencia->fetch_object();  //Objeto que devuelve la base de datos

            $resultado = $conf;
        }
        
        // var_dump($resultado);
        return $resultado;
    }

    public function getConferencias(){
       
        $sql="SELECT conf_id as id, conf_tema as tema, conf_area as area,
        (SELECT Concat(pon_nombre,' ',pon_apellido) from  `ponentes` WHERE  `conferencias`.`pon_id`=`ponentes`.`pon_id`) as ponentes,
        (SELECT lab_nombre from `laboratorios` where `conferencias`.`lab_id` = `laboratorios`.`lab_id`)as lugar,
        (SELECT hor_inicio from `horarios` WHERE `conferencias`.`hor_id` = `horarios`.`hor_id`) as hora
        FROM `conferencias` LIMIT 6";
         
        $conferencias = $this->db->query($sql);

        return $conferencias;
    }

    public function setDisponibles($disponibles){
        $this->disponibles = $disponibles;
    }

    public function ObtenerTodos(){
        $sql="SELECT 
        conf_id as id,
        conf_tema as tema,
        conf_descripcion as descripcion,
        conf_area as area,
        conf_cupos as cupos,
        (SELECT Concat(pon_nombre,' ',pon_apellido) from  `ponentes` WHERE  `conferencias`.`pon_id`=`ponentes`.`pon_id`) as ponentes,
        (SELECT lab_nombre from `laboratorios` where `conferencias`.`lab_id` = `laboratorios`.`lab_id`)as lugar,
        (SELECT hor_inicio from `horarios` WHERE `conferencias`.`hor_id` = `horarios`.`hor_id`) as hora,
        (SELECT (lab_capacidad - conf_cupos)from `laboratorios` where `conferencias`.`lab_id` = `laboratorios`.`lab_id`) as disponible
        FROM `conferencias`";
         
        $conferencias = $this->db->query($sql);

        return $conferencias;
    }
}