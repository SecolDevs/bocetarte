<?php

class Conexion{

    //Metodo de Conexion por PDO
    public static function conectar(){
        try {
            $conect = "mysql:host = localhost; dbname=bocetarte; charset=utf8";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,

            ];
            $conn = new PDO($conect, "root", "", $options);
            return $conn;
        } catch (PDOException $e) {
            print_r('Error: ' . $e->getMessage());
        }
    }
}

?>