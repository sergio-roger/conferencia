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

    public function guardar_UsuarioAsistencia($id_usuario, $id_asistencia, $id_ponente, $id_horario, $id_laboratorio){

        $sql = "INSERT INTO `detalle_asistencia` (`usu_id`, `asi_id`, `hor_id`, `pon_id`,`lab_id`) 
        VALUES ('{$id_usuario}', '{$id_asistencia}', '{$id_horario}', '{$id_ponente}', '{$id_laboratorio}');";

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
       (select conf_id from `asistencias` WHERE `asistencias`.asi_id = `detalle_asistencia`.`asi_id`) as id_conf,
       `detalle_asistencia`.`asi_id` as id_asis,
       (select conf_tema from `conferencias` 
       where `conferencias`.`conf_id` = (select conf_id from `asistencias` WHERE `asistencias`.asi_id = `detalle_asistencia`.`asi_id`)) as tema,
       (SELECT lab_nombre from laboratorios WHERE laboratorios.lab_id = detalle_asistencia.lab_id) as lugar,
       (select Concat(pon_nombre,' ',pon_apellido ) from `ponentes` WHERE `ponentes`.`pon_id` = `detalle_asistencia`.`pon_id`) as ponente,
       (SELECT hor_inicio from `horarios` where `horarios`.`hor_id` = `detalle_asistencia`.`hor_id`) as inicio,
       (select asi_estado from `asistencias` WHERE `asistencias`.asi_id = `detalle_asistencia`.`asi_id`) as estado,
       (select asi_prioridad from `asistencias` WHERE `asistencias`.asi_id = `detalle_asistencia`.`asi_id`) as prioridad
       from `detalle_asistencia`
       where usu_id = '{$id_usuario}'";

       $detalle = $this->db->query($sql);

       return $detalle;
    }

    public function getCoferencia($id_asistencia){
        $sql= "select asistencias.conf_id as id_conf from asistencias 
        where asistencias.asi_id = '{$id_asistencia}'";

        $resultado = $this->db->query($sql);
        $respuesta = false;

        if($resultado && $resultado->num_rows == 1){
            $usuario = $resultado->fetch_object();  //Objeto que devuelve la base de datos
            $respuesta = $usuario;
        }
        return $respuesta;
    }

    public function eliminarDetalleAsistencia($id_usuario, $id_asistencia){

        $sql = "DELETE FROM `detalle_asistencia` 
        WHERE `detalle_asistencia`.`usu_id` = '{$id_usuario}' and `detalle_asistencia`.`asi_id`= '{$id_asistencia}'";

        $respuesta = $this->db->query($sql);
        return $respuesta;
    }

    public function eliminarAsistencia($id_asistencia){
        $sql = "DELETE FROM `asistencias` 
        WHERE `asistencias`.`asi_id`= '{$id_asistencia}'";

        $respuesta = $this->db->query($sql);
        return $respuesta;
    }

    public function eliminarCupo($id_conferencia){
        $sql = "UPDATE conferencias
        SET conf_cupos = conf_cupos - 1
        WHERE conf_id = '{$id_conferencia}'";

        $respuesta = $this->db->query($sql);

        return $respuesta;
    }
}