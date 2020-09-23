<?php

class likeModel {
    function __construct() {
        require_once(MODEL_PATH . "conexion.php");
        $this->db = Conexion::conectar();
    }

    //INSERT LIKE
    public function insert_Like($datos) {
        if ($datos != null) {
            $query = $this->db->prepare("INSERT INTO likes(fechaLike, idUsuario, idPublicacion) VALUES (:fechaLike, :idUsuario, :idPublicacion);");
            $query->bindParam(':fechaLike', $datos["fechaLike"], PDO::PARAM_STR);
            $query->bindParam(':idUsuario', $datos["idUsuario"], PDO::PARAM_STR);
            $query->bindParam(':idPublicacion', $datos["idPublicacion"], PDO::PARAM_STR);

            return $query->execute() ? "Correcto" : "Incorrecto ";
            $query->null;
        }
    }

    //LISTAR LIKES
    public function list_Like($datos) {
        if ($datos != null) {
            $query = $this->db->prepare("SELECT COUNT(*) FROM likes WHERE idPublicacion = :idPublicacion");
            $query->bindParam(':idPublicacion', $datos["idPublicacion"], PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
            $query = null;
        }
    }
}
