<?php
include_once(CONTROLLER_PATH . 'UsuarioController.php');
$user = new usuario_Controller;
$user->logout_User();
?>
