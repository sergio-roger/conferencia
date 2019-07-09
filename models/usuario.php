<?php

require_once 'config/db.php';

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
    private $db;
    
   
    public function __construct($creado)
    {
        $this->creado = $creado;
        $this->db  = DataBase::Conectar();
    }

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
    public function setCedula($cedula){
        $this->cedula = $this->db->real_escape_string($cedula);
    }

    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setApellido($apellido){
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    public function setCorreo($correo){
        $this->correo = $this->db->real_escape_string($correo);
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function setClave($clave){
        $this->clave = password_hash($this->db->real_escape_string($clave),PASSWORD_BCRYPT,['cost'=>4]);
    }

    public function setActualizado($actualizado){
        $this->actualizado = $actualizado;
    }

    public function guardar(){

        $sql = "INSERT INTO `usuarios` (`usu_id`, `usu_cedula`, `usu_nombre`, `usu_apellido`, `usu_correo`, `usu_tipo`, `usu_sexo`, `usu_clave`, `created_at`, `updated_at`) VALUES ";
        $sql = $sql."(NULL, '{$this->cedula}', '{$this->nombre}', '{$this->apellido}', '{$this->correo}', '{$this->tipo}', '{$this->sexo}', '{$this->clave}', '{$this->creado}', '{$this->creado}');";

        $guardar = $this->db->query($sql);
        $result = false; 

        if($guardar){
            $result = true;
        }
        return $result;
    }

    public function login($email, $clave){
        // Comprobar si existe el usuario
        // $resultado;
        $respuesta = false; 
        $sql = "SELECT * FROM `usuarios` WHERE usu_correo='{$email}'";
        $login = $this->db->query($sql);

        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();  //Objeto que devuelve la base de datos

            $resultado = password_verify($clave, $usuario->usu_clave);
            
            if($resultado){
                $respuesta = $usuario;
            }
        }
        return $respuesta;
    }

    public function getUsuario($correo){
        $respuesta = false; 
        $sql = "SELECT * FROM `usuarios` WHERE usu_correo='{$correo}'";
        $login = $this->db->query($sql);

        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();  //Objeto que devuelve la base de datos
            $respuesta = $usuario;
        }
        return $respuesta;
    }
}
