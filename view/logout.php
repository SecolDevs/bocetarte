<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/bocetarte/path.php');
include_once(CONTROLLER_PATH . 'UsuarioController.php');
$user = new usuario_Controller();
$user->logout_User();
?>
