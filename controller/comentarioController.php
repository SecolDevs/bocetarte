<?php
require_once(MODEL_PATH . 'comentarioModel.php');

class comentario_Controller{
    
    function __construct(){
        $this->comentario_Mod = new comentario_Model();
    }

    //CREACION DE CATEGORIAS
    public function insert_Comentario(){
        if (isset($_POST['comentario'])) {
            date_default_timezone_set("America/Bogota");
            $fecha = date("Y-m-d") . ' ' . date("H:i:s");
            
            $datos = array("contenidoComentario" => ucfirst($_POST['contenidoComentario']),
            "fechaComentario" => $fecha,
            "idUsuario" => $_POST['idUsuario'],
            "idPublicacion" => $_POST['idPublicacion']
            );
            $respuesta = $this->comentario_Mod->insert_Comentario($datos);
            if($respuesta == "Correcto"){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Comentario Insertado Correctamente!'
                      }).then(function(){ 
                        location.href = '/bocetarte/';
                        }
                     );
                    </script>";
            }else{
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrecto',
                    text: 'No se ha creado el comentario, verifique e intente nuevamente!'
                }).then(function() {
                    location.href = '/bocetarte/';
                });
            </script>";
            }
        }
    }

    //ELIMINAR COMENTARIOS
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
    public function list_Comentario($datos){
        $respuesta = $this->comentario_Mod->list_Comentario($datos);
        return $respuesta;
    }
    
}
