<?php

class Utilidad{

    public static function  eliminarSeccion($nombre){
        
        if(isset($_SESSION[$nombre])){

            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);
        }
        return $nombre;
    }

    public static function eilminarPost($nombre){

        if(isset($_POST[$nombre])){
            $_POST[$nombre] = null;
            unset($_POST[$nombre]);
        }
    }
}