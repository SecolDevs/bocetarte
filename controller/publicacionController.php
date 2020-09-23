<?php
require_once(MODEL_PATH . 'publicacionModel.php');

class publicacion_Controller {

    function __construct() {
        $this->publicacion_Mod = new publicacion_Model();
    }

    //CREACION DE CATEGORIAS
    public function insert_Publicacion() {
        if (isset($_POST['categoria'])) {
            //Fecha Actual
            date_default_timezone_set("America/Bogota");
            $fechaPublicacion = date("Y-m-d") . ' ' . date("H:i:s");
            //DATOS DE IMG
            $ruta = ASSETS_PATH . "images/user/" . $_POST['nickUsuario'] . "/" . $_FILES["archivoPublicacion"]["name"];
            $archivoPublicacion = $_POST['nickUsuario'] . "/" . $_FILES["archivoPublicacion"]["name"];
            //Array Datos
            $datos = array(
                "archivoPublicacion" => $archivoPublicacion,
                "tituloPublicacion" => strtoupper($_POST['tituloPublicacion']),
                "descripcionPublicacion" => ucfirst($_POST['descripcionPublicacion']),
                "estadoPublicacion" => "Activo",
                "fechaPublicacion" => $fechaPublicacion,
                "idUsuario" => $_POST['idUsuario'],
                "idCategoria" => $_POST['idCategoria']
            );
            $respuesta = $this->publicacion_Mod->insert_Publicacion($datos);
            if ($respuesta == "Correcto") {
                move_uploaded_file($_FILES["archivoPublicacion"]['tmp_name'], $ruta);
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Publicacion Creada Correctamente!'
                }).then(function() {
                    location.href = '/bocetarte/';
                });
            </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrecto',
                    text: 'No se ha creado la publicacion, verifique e intente nuevamente!'
                }).then(function() {
                    location.href = '/bocetarte/';
                });
            </script>";
            }
        }
    }

    //MODIFICACION DE CATEGORIAS
    public function update_Publicacion() {
        if (isset($_POST['updateCategoria'])) {
            $datos = array(
                "idCategoria" => $_POST['idCategoria'],
                "nombreCategoria" => $_POST['nombreCategoria'],
                "tipoCategoria" => $_POST['tipoCategoria']
            );
            $respuesta = $this->publicacion_Mod->update_Publicacion($datos);
            if ($respuesta == "Correcto") {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Categoria Modificada Correctamente!'
                }).then(function() {
                    location.href = '/bocetarte/';
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrecto',
                    text: 'No se ha modificado la categoria, verifique e intente nuevamente!'
                }).then(function() {
                    location.href = '/bocetarte/';
                });
                </script>";
            }
        }
    }

    //ELIMINAR CATEGORIAS
    public function delete_Publicacion() {
        if (isset($_POST['deleteCategoria'])) {
            $datos = array("idCategoria" => $_POST['idCategoria']);
            $respuesta = $this->publicacion_Mod->delete_Publicacion($datos);
            if ($respuesta == "Correcto") {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Categoria Eliminada Correctamente!'
                }).then(function() {
                    location.href = '/bocetarte/';
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrecto',
                    text: 'No se ha eliminado la categoria, verifique e intente nuevamente!'
                }).then(function() {
                    location.href = '/bocetarte/';
                });
                </script>";
            }
        }
    }

    //LISTAR PUBLICACIONES
    public function list_Publicacion($datos) {
        $respuesta = $this->publicacion_Mod->list_Publicacion($datos);
        return $respuesta;
    }

    public function list_PublicacionRand($datos) {
        $respuesta = $this->publicacion_Mod->list_PublicacionRand($datos);
        return $respuesta;
    }
}
