<?php
//require_once(MODEL_PATH . 'comentarioModel.php');

class comentario_Controller{
    
    function __construct(){
        //$this->categoria_Mod = new categoria_Model();
    }

    //CREACION DE CATEGORIAS
    public function insert_Categoria(){
        if (isset($_POST['categoria'])) {

            $datos = array("nombreCategoria" => strtoupper($_POST['nombreCategoria']),
            "tipoCategoria" => $_POST['tipoCategoria']
            );
            $respuesta = $this->categoria_Mod->insert_Categoria($datos);
            if($respuesta == "Correcto"){
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Categoria Creada Correctamente!'
                }).then(function() {
                    location.href = '/bocetarte/';
                });
            </script>";
            }else{
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrecto',
                    text: 'No se ha creado la categoria, verifique e intente nuevamente!'
                }).then(function() {
                    location.href = '/bocetarte/';
                });
            </script>";
            }
        }
    }

    //MODIFICACION DE CATEGORIAS
    public function update_Categoria(){
        if (isset($_POST['updateCategoria'])) {
            $datos = array("idCategoria" => $_POST['idCategoria'],
            "nombreCategoria" => $_POST['nombreCategoria'],
            "tipoCategoria" => $_POST['tipoCategoria']
            );
            $respuesta = $this->categoria_Mod->update_Categoria($datos);
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
            }else {
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
    public function delete_Categoria(){
        if (isset($_POST['deleteCategoria'])) {
            $datos = array("idCategoria" => $_POST['idCategoria']);
            $respuesta = $this->categoria_Mod->delete_Categoria($datos);
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
            }else {
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

    //LISTAR CATEGORIAS
    public function list_Categoria($datos){
        $respuesta = $this->categoria_Mod->list_Categoria($datos);
        return $respuesta;
    }
    
}
