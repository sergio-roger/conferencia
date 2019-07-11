<?php

require_once 'config/db.php';

class Ponente{

    private $id;        private $cedula;  private $nombre;
    private $apellido;  private $titulo;  private $sexo; 
    private $telefono;  private $db;

    public function __construct()
    {
        $this->db = DataBase::Conectar();
    }
    //Gettes 
    public function getId(){
        return $this->id;
    }

    public function getCedula(){
        return $this->cedula;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    //Setters
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getPonente($id){
        $sql = "SELECT `pon_id` as id, `pon_cedula`, `pon_nombre`, `pon_apellido`, `pon_titulo`, `pon_sexo`, `pon_telefono` 
        FROM `ponentes` WHERE pon_id = '{$id}'";

        $ponente = $this->db->query($sql);
        $respuesta = false;

        if($ponente && $ponente->num_rows == 1){
            $objeto = $ponente->fetch_object();  //Objeto que devuelve la base de datos
            $respuesta = $objeto;
        }
        return $respuesta;
    }
}