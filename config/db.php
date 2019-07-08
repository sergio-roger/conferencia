<?php

class DataBase{

    public static function Conectar(){
        $db = new mysqli('localhost','root','','conferencia');
        $db->query("SET NAMES  utf8");
        return $db;
    }
}