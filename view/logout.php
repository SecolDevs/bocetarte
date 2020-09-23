<?php
include_once(CONTROLLER_PATH . 'usuarioController.php');
$user = new usuario_Controller();
$user->logout_User();
?>
