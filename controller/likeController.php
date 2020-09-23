<?php
require_once(MODEL_PATH . "likeModel.php");
class likeController {
    function __construct() {
        $this->like_Mod = new likeModel();
    }

    //INSERTAR LIKES
    public function insert_Like() {
        if (isset($_POST['like'])) {
            date_default_timezone_set("America/Bogota");
            $fecha = date("Y-m-d") . ' ' . date("H:i:s");

            $datos = array(
                "fechaLike" => $fecha,
                "idUsuario" => $_POST['idUsuario'],
                "idPublicacion" => $_POST['idPublicacion']
            );
            $respuesta = $this->like_Mod->insert_Like($datos);
            if ($respuesta == "Correcto") {
                echo "<script>location.href = '';</script>";
            } else {
                echo "ERROR";
            }
        }
    }

    public function list_Like($id_Publicacion) {
        $datos = array(
            "idPublicacion" => $id_Publicacion
        );
        return $num = $this->like_Mod->list_Like($datos);
    }
}
