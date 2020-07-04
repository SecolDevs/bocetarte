<?php

include_once(CONTROLLER_PATH . "publicacionController.php");
$publicacion = new publicacion_Controller;

include_once(CONTROLLER_PATH. "comentarioController.php");
$comentario = new comentario_Controller;

?>

<div class="navbar-fixed">
    <?php
    if (isset($_SESSION['nickname'])) {
        $username = $_SESSION['nickname'];
        $idUser = $_SESSION['id_Usuario'];
        echo '<ul id="dropdownUser" class="dropdown-content">
                        <li><a href="#!">MI CUENTA</a></li>
                        <li class="divider"></li>
                        <li><a href="?url=logout">Cerrar Sesion</a></li>
                      </ul>';
    } else {
    }
    ?>
    <nav>
        <div class="nav-wrapper red darken-4">
            <div class="container">
                <a href="index.php" class="brand-logo animsition-link">BOCETARTE</a>
                <a href="#" data-target="mobile-aside" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php" class="animsition-link">INICIO</a></li>
                    <li><a href="?url=categorias" class="animsition-link">CATEGORIAS</a></li>
                    <?php
                    if (isset($_SESSION['nickname'])) {
                        $username = $_SESSION['nickname'];
                        echo '<li><a class="dropdown-trigger" href="#!" data-target="dropdownUser"><i class="material-icons left">account_circle</i>' . $username . '<i class="material-icons right">arrow_drop_down</i></a></li>';
                    } else {
                        echo '<li><a href="?url=login" class="animsition-link">ACCEDER</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>

<?php if (!isset($_GET['url'])) {
    echo isset($_SESSION['nickname']) ? '<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="?url=newPublicacion">
      <i class="large material-icons">add</i>
    </a>
  </div>' : "";
}  ?>

<ul class="sidenav" id="mobile-aside">
    <li><a href="#inicio">INICIO</a></li>
    <li><a href="#categorias">CATEGORIAS</a></li>
    <li><a href="#menu">MENU CULERO</a></li>
    <li><a href="#login">LOGIN</a></li>
</ul>