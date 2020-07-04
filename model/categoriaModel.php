<?php

class categoria_Model{

    //Constructor del metodo y llamada a conexion
    function __construct(){
        require_once(MODEL_PATH . 'conexion.php');
        $this->db = Conexion::conectar();
    }

    //LISTAR CATEGORIAS
    public function list_Categoria($datos){
        if ($datos != null) {
            $query = $this->db->prepare("SELECT * FROM categoria WHERE nombreCategoria = :nombreCategoria");
            $query->bindParam(':nombreCategoria', $datos["nombreCategoria"], PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
            $query = null;
        } else {
            $query = $this->db->prepare("SELECT * FROM categoria;");
            $query->execute();
            return $query->fetchAll();
            $query = null;
        }
    }

    //INSERTAR CATEGORIAS
    public function insert_Categoria($datos){
        if ($datos != null) {

            $verificacion = $this->list_Categoria($datos);

            if ($verificacion['nombreCategoria'] == $datos['nombreCategoria']){
                echo "<script>alert('Incorrecto');</script>";
                return "Incorrecto";
            } else {
                $query = $this->db->prepare("INSERT INTO categoria(nombreCategoria, tipoCategoria) VALUES (:nombreCategoria, :tipoCategoria);");
                $query->bindParam(':nombreCategoria', $datos["nombreCategoria"], PDO::PARAM_STR);
                $query->bindParam(':tipoCategoria', $datos["tipoCategoria"], PDO::PARAM_STR);

                return $query->execute() ? "Correcto" : "Incorrecto ";
                $query -> null;
            }
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
