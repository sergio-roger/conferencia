<?php

class Usuario
{
    private $id;
    private $cedula;
    private $nombre;
    private $apellido;
    private $correo;
    private $tipo;
    private $sexo;
    private $clave;
    private $creado;
    private $actualizado;

    // Getters
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

    public function getCorreo(){
        return $this->correo;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function getClave(){
        return $this->clave;
    }

    public function getCreado(){
        return $this->creado;
    }

    public function getActualizado(){
        return $this->actualizado;
    }

    // Setters
    public function setId($id){
        $this->id = $id;
    }

    public function setCedula($cedula){
        $this->cedula = $cedula;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function setClave($clave){
        $this->clave = $clave;
    }

    public function setActualizado($actualizado){
        $this->actualizado = $actualizado;
    }
}
