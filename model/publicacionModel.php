<?php

class publicacion_Model{

    //Constructor del metodo y llamada a conexion
    function __construct(){
        require_once(MODEL_PATH . 'conexion.php');
        $this->db = Conexion::conectar();
    }

    //LISTAR PUBLICACIONES
    public function list_Publicacion($datos){
        if ($datos != null) {
            $query = $this->db->prepare("SELECT * FROM publicacion WHERE idPublicacion = :idPublicacion;");
            $query->bindParam(':idPublicacion', $datos["idPublicacion"], PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
            $query = null;
        } else {
            $query = $this->db->prepare("SELECT * FROM publicacion p INNER JOIN usuario u WHERE p.idUsuario = u.idUsuario ORDER BY fechaPublicacion DESC;");
            $query->execute();
            return $query->fetchALL();
            $query = null;
        }
    }

    //INSERTAR PUBLICACIONES
    public function insert_Publicacion($datos){
        if ($datos != null) {
            $query = $this->db->prepare("INSERT INTO publicacion(archivoPublicacion, tituloPublicacion, descripcionPublicacion, fechaPublicacion, estadoPublicacion, idUsuario, idCategoria) VALUES (:archivoPublicacion, :tituloPublicacion, :descripcionPublicacion, :fechaPublicacion, :estadoPublicacion, :idUsuario, :idCategoria);");
            $query->bindParam(':archivoPublicacion', $datos["archivoPublicacion"], PDO::PARAM_STR);
            $query->bindParam(':tituloPublicacion', $datos["tituloPublicacion"], PDO::PARAM_STR);
            $query->bindParam(':descripcionPublicacion', $datos["descripcionPublicacion"], PDO::PARAM_STR);
            $query->bindParam(':fechaPublicacion', $datos["fechaPublicacion"], PDO::PARAM_STR);
            $query->bindParam(':estadoPublicacion', $datos["estadoPublicacion"], PDO::PARAM_STR);
            $query->bindParam(':idUsuario', $datos["idUsuario"], PDO::PARAM_STR);
            $query->bindParam(':idCategoria', $datos["idCategoria"], PDO::PARAM_STR);
            return $query->execute() ? "Correcto" : "Incorrecto ";
            $query -> null;            
        }
    }

    //ELIMINAR PUBLICACIONES
    public function delete_Publicacion($datos){
        if ($datos != null) {
            $query = $this->db->prepare("DELETE * FROM categoria WHERE idCategoria = :idCategoria");
            $query->bindParam(':idCategoria', $datos["idCategoria"], PDO::PARAM_STR);

            return $query->execute() ? "Correcto" : "Incorrecto";
            $query -> null;
        }
    }

    //MODIFICAR PUBLICACIONES
    public function update_Publicacion($datos){
        
    }
}
