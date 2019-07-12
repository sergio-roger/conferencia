<?php

require_once 'config/db.php';

class Asistencia
{
   private $id;        private $id_conferencia;        private $confirmacion; 
   private $prioridad; private $estado; 
   private $db;

    public function __construct()
    {
        $this->db  = DataBase::Conectar();
    }

    // Crear getters
    public function getId(){
        return $this->id;
    }

    public function getIdConferencia(){
        return $this->id_conferencia;
    }

    public function getConfirmacion(){
        return $this->confirmacion;
    }

    public function getPrioridad(){
        return $this->prioridad;
    }

    public function getEstado(){
        return $this->estado;
    }

    // Crear settes
    public function setIdConferencia($id_conferencia){
        $this->id_conferencia = $id_conferencia;
    }

    public function setConfirmacion($confirmacion){
        $this->confirmacion = $confirmacion;
    }

    public function setPrioridad($prioridad){
        $this->prioridad = $prioridad;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    // Crear método guardar
    public function guardar($conferencia, $prioridad, $estado){

        $fecha = Utilidad::fechaActual();
        $confirmacion = 0;

        if($estado == 'confirmado'){
            $confirmacion = 1;
        }

        $sql = "INSERT INTO `asistencias` (`asi_id`, `conf_id`, `asi_confirmacion`, `asi_prioridad`, `asi_estado`, `created_at`, `updated_at`) 
        VALUES (NULL, '{$conferencia->id}', '{$confirmacion}', '{$prioridad}', '{$estado}', '{$fecha}', '{$fecha}');";

        $guardar = $this->db->query($sql);
        $result = false; 

        if($guardar){
            $result = true;
        }
        return $result;
    }

    public function ultimoRegistro(){

        $sql="select asi_id as id, conf_id as id_conf, asi_confirmacion as confirmacion,
        asi_prioridad as prioridad, asi_estado as estado, created_at as creado, updated_at as actualizado
        from `asistencias`
        order by asi_id desc
        limit 1";

        $asistencia = $this->db->query($sql);
        $resultado = false;

        if($asistencia && $asistencia->num_rows == 1){
            $asis = $asistencia->fetch_object();  //Objeto que devuelve la base de datos
            $resultado = $asis;
        }    
        // var_dump($resultado);
        return $resultado;
    }

    public function guardar_UsuarioAsistencia($id_usuario, $id_asistencia, $id_ponente, $id_horario){

        $sql = "INSERT INTO `detalle_asistencia` (`usu_id`, `asi_id`, `hor_id`, `pon_id`) 
        VALUES ('{$id_usuario}', '{$id_asistencia}', '{$id_horario}', '{$id_ponente}');";

        $guardar = $this->db->query($sql);
        $result = false; 

        if($guardar){
            $result = true;
        }
        return $result;
    }

    public function getDetalleConferencia($id_usuario){
       $sql="select 
	   (select conf_id from `asistencias` WHERE `asistencias`.asi_id = `detalle_asistencia`.`asi_id`) as id,
       (select conf_tema from `conferencias` 
       where `conferencias`.`conf_id` = (select conf_id from `asistencias` WHERE `asistencias`.asi_id = `detalle_asistencia`.`asi_id`)) as tema,
       (select Concat(pon_nombre,' ',pon_apellido ) from `ponentes` WHERE `ponentes`.`pon_id` = `detalle_asistencia`.`pon_id`) as ponente,
       (SELECT hor_inicio from `horarios` where `horarios`.`hor_id` = `detalle_asistencia`.`hor_id`) as inicio,
       (select asi_estado from `asistencias` WHERE `asistencias`.asi_id = `detalle_asistencia`.`asi_id`) as estado,
       (select asi_prioridad from `asistencias` WHERE `asistencias`.asi_id = `detalle_asistencia`.`asi_id`) as prioridad
       from `detalle_asistencia`
       where usu_id = '{$id_usuario}'";

       $detalle = $this->db->query($sql);

       return $detalle;

    }
}