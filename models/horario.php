<?php

require_once 'config/db.php';

class Horario{

    private $id;        private $inicio;     private $fin;
    private $duracion;  private $db;

    public function __construct(){
        $this->db = DataBase::Conectar();
    }

    //Gettes
    public function getId(){
        return $this->id;
    }

    public function getInicio(){
        return $this->inicio;
    }

    public function getFin(){
        return $this->fin;
    }

    public function getDuracion(){
        return $this->duracion;
    }

    public function setInicio($inicio){
        $this->inicio = $inicio;
    }

    public function setFin($fin){
        $this->fin = $fin;
    }

    public function setDuracion($duracion){
        $this->duracion = $duracion;
    }

    public function getHorario($id){
        $sql ="SELECT `hor_id` as id, `hor_inicio`, `hor_fin`, `hor_duracion` 
        FROM `horarios` WHERE hor_id = '{$id}'";

        $horario = $this->db->query($sql);
        $respuesta = false;

        if($horario && $horario->num_rows == 1){
            $objeto = $horario->fetch_object();  //Objeto que devuelve la base de datos
            $respuesta = $objeto;
        }
        return $respuesta;
    }
}