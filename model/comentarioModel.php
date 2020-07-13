<?php

class comentario_Model{

    //Constructor del metodo y llamada a conexion
    function __construct(){
        require_once(MODEL_PATH . 'conexion.php');
        $this->db = Conexion::conectar();
    }

    //LISTAR CATEGORIAS
    public function list_Comentario($datos){
        if ($datos != null) {
            $query = $this->db->prepare("SELECT * FROM comentario c INNER JOIN usuario u WHERE c.idPublicacion = :idPublicacion AND c.idUsuario = u.idUsuario ORDER BY fechaComentario DESC");
            $query->bindParam(':idPublicacion', $datos, PDO::PARAM_STR);
            $query->execute();
            return $query->fetchAll();
            $query = null;
        }
    }

    //INSERTAR CATEGORIAS
    public function insert_Comentario($datos){
        if ($datos != null) {
                $query = $this->db->prepare("INSERT INTO comentario(contenidoComentario, fechaComentario, idUsuario, idPublicacion) VALUES (:contenidoComentario, :fechaComentario, :idUsuario, :idPublicacion);");
                $query->bindParam(':contenidoComentario', $datos["contenidoComentario"], PDO::PARAM_STR);
                $query->bindParam(':fechaComentario', $datos["fechaComentario"], PDO::PARAM_STR);
                $query->bindParam(':idUsuario', $datos["idUsuario"], PDO::PARAM_STR);
                $query->bindParam(':idPublicacion', $datos["idPublicacion"], PDO::PARAM_STR);

                return $query->execute() ? "Correcto" : "Incorrecto ";
                $query -> null;
        }
    }

    //ELIMINAR CATEGORIA
    public function delete_Categoria($datos){
        if ($datos != null) {
            $query = $this->db->prepare("DELETE * FROM categoria WHERE idCategoria = :idCategoria");
            $query->bindParam(':idCategoria', $datos["idCategoria"], PDO::PARAM_STR);

            return $query->execute() ? "Correcto" : "Incorrecto";
            $query -> null;
        }
    }

    //MODIFICAR CATEGORIA
    public function update_Categoria($datos){
        
    }
}
