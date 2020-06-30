<?php
//LLAMADA A ARCHIVO PATHS
require_once($_SERVER['DOCUMENT_ROOT'] . '/bocetarte/path.php');

class usuario_Model
{

    //Constructor del metodo y llamada a conexion
    function __construct()
    {
        require_once(MODEL_PATH . 'conexion.php');
        $this->db = Conexion::conectar();
    }

    //LISTAR USUARIOS
    public function list_User($datos)
    {
        if ($datos != null) {
            $query = $this->db->prepare("SELECT * FROM usuario WHERE nickUsuario = :nickUsuario");
            $query->bindParam(':nickUsuario', $datos["nickUsuario"], PDO::PARAM_STR);
            $query->execute();
            return $query->fetch();
            $query = null;
        } else {
        }
    }

    //INSERTAR USUARIOS
    public function insert_User($datos)
    {
        if ($datos != null) {

            $verificacion = $this->list_User($datos);

            if ($verificacion['nickUsuario'] == $datos['nickUsuario'] || $verificacion['emailUsuario'] == $datos['emailUsuario']) {
                return "Incorrecto";
            } else {

                $query = $this->db->prepare("INSERT INTO usuario(nickUsuario, password, emailUsuario, telefonoUsuario, visiUsuario, tipoUsuario, estadoUsuario) VALUES (:nickUsuario, :password, :emailUsuario, :telefonoUsuario, :visiUsuario, 'User', 'Activo');");
                $query->bindParam(':nickUsuario', $datos["nickUsuario"], PDO::PARAM_STR);
                $query->bindParam(':password', $datos["password"], PDO::PARAM_STR);
                $query->bindParam(':emailUsuario', $datos["emailUsuario"], PDO::PARAM_STR);
                $query->bindParam(':telefonoUsuario', $datos["telefonoUsuario"], PDO::PARAM_STR);
                $query->bindParam(':visiUsuario', $datos["visiUsuario"], PDO::PARAM_STR);

                return $query->execute() ? "Correcto" : "Incorrecto ";
            }
        }
    }

    //INSERTAR ADMINISTRADORES
    public function insert_Admin($datos)
    {
    }

    //LOGIN USER
    public function login_User($datos)
    {
        if ($datos != null) {
            $verificacion = $this->list_User($datos);
            if ($verificacion['nickUsuario'] == $datos['nickUsuario'] && $verificacion['password'] == $datos['password']) {
                session_start();
                $_SESSION['nickname'] = $verificacion['nickUsuario'];
                $_SESSION['id_Usuario'] = $verificacion['idUsuario'];
                return "Correcto";
            } else {
                return "Incorrecto";
            }
        }
    }

    //ELIMINAR USUARIOS
    public function delete_User($datos)
    {
    }

    //MODIFICAR USUARIOS
    public function update_User($datos)
    {
    }
}
