<?php
require_once(MODEL_PATH . 'usuarioModel.php');

class usuario_Controller{
    
    function __construct(){
        $this->usuario_Mod = new usuario_Model();
    }

    //CREACION DE CUENTAS
    public function insert_User(){
        if (isset($_POST['signup'])) {

            if (isset($_POST['des'])) {
                $des = "YES";
            }else{
                $des = "NO";
            }

            $datos = array("nickUsuario" => strtoupper($_POST['nickname']),
            "password" => $_POST['password'],
            "emailUsuario" => $_POST['email'],
            "telefonoUsuario" => $_POST['telefono'],
            "visiUsuario" => $des
        );

        if ($_POST['password'] == $_POST['confirmpassword']) {
            $respuesta = $this->usuario_Mod->insert_User($datos);
            if($respuesta == "Correcto"){
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Usuario Creado Correctamente!'
                }).then(function() {
                    location.href = '/bocetarte/?url=login';
                });
            </script>";
            }else{
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrecto',
                    text: 'Nickname o Email ya existen, verifique e intente nuevamente!'
                }).then(function() {
                    location.href = '/bocetarte/?url=login';
                });
            </script>";
            }
        }else{
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrecto',
                    text: 'Las Contraseñas no Coinciden!'
                }).then(function() {
                    location.href = '/bocetarte/?url=login';
                });
            </script>";
        }
            
        }
    }

    //LOGEO DE USUARIOS
    public function login_User(){
        if (isset($_POST['login'])) {
            $datos = array("nickUsuario" => strtoupper($_POST['nickname']),
            "password" => $_POST['password']
        );
        echo "<h1>NICKNAME:".$_POST['nickname']."</h1>";
        $respuesta = $this->usuario_Mod->login_User($datos);
        echo "<script>alert('NICKNAME:".$respuesta."');</script>";
        if ($respuesta == "Correcto") {            
            header("location: index");
        }else {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Incorrecto',
                    text: 'Nickname o Contraseña no coinciden, Verifique e intente nuevamente!'
                }).then(function() {
                    location.href = '/bocetarte/?url=login';
                });
            </script>";
        }
        }
    }

    //LOGOUT DE USUARIOS
    public function logout_User(){
        session_destroy();
        header("location: index");
    }

    //MODIFICACION DE CUENTAS
    public function update_User(){

    }
    
}
