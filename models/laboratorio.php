<?php

require_once 'config/db.php';

class Laboratorio{

    private $id;    private $nombre;   private $capacidad; 
    private $cupo;  private $porcentajeDesborde;
    private $db; 

    public function __construct()
    {
        $this->db = DataBase::Conectar();
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getCapacidad(){
        return $this->capacidad;
    }

    public function getCupo(){
        return $this->cupo;
    }

    public function getPorcentajeDesborde(){
        return $this->porcentajeDesborde;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setCapacidad($capacidad){
        $this->capacidad = $capacidad;
    }

    public function setCupo($cupo){
        $this->cupo = $cupo;
    }

    public function setPorcentajeDesborde($porcentajeDesborde){
        $this->porcentajeDesborde = $porcentajeDesborde;
    }

    public function getlaboratorio($id){

        $respuesta = false; 
        $sql = "SELECT 
        lab_id as id, lab_nombre as nombre, lab_capacidad as capacidad,
        lab_porcenjajte_desborde as desborde
        FROM `laboratorios`
        WHERE `laboratorios`.`lab_id` = {$id}";

        $lab = $this->db->query($sql);

        if($lab && $lab->num_rows == 1){
            $respuesta = $lab->fetch_object();  //Objeto que devuelve la base de datos
        }
        return $respuesta;
    }
    
    // public function getlaboratorioPorConferencia($id_conferencia){
    //     $sql = "SELECT
    //     (SELECT lab_nombre as lugar FROM `laboratorios` WHERE laboratorios.lab_id = conferencias.lab_id) as lugar
    //     from conferencias
    //     WHERE conferencias.conf_id  = '{$id_conferencia}'";

    //     $sala = $this->db->query($sql);
    //     $respuesta = false;
        
    //     if($sala && $sala->num_rows == 1){
    //         $respuesta = $sala->fetch_object();  //Objeto que devuelve la base de datos
    //     }
    //     return $respuesta;
    // }

}