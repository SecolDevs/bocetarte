<?php

include_once(CONTROLLER_PATH . "publicacionController.php");
$publicacion = new publicacion_Controller;

include_once(CONTROLLER_PATH . "comentarioController.php");
$comentario = new comentario_Controller;

include_once(CONTROLLER_PATH . "likeController.php");
$like = new likeController;

$loged = isset($_SESSION['nickname']) ? true : false;
$userData = $loged ? [$_SESSION['nickname'], $_SESSION['id_Usuario']] : null;

?>

<div class="navbar-fixed">
    <?php
    if ($loged) {
        echo '<ul id="dropdownUser" class="dropdown-content">
                        <li><a href="#!">MI CUENTA</a></li>
                        <li class="divider"></li>
                        <li><a href="?url=logout">LOGOUT</a></li>
                      </ul>';
    }
    ?>
    <nav>
        <div class="nav-wrapper red darken-4">
            <div class="container">
                <a href="/bocetarte/" class="brand-logo animsition-link">BOCETARTE&trade;</a>
                <a href="#" data-target="mobile-aside" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/bocetarte/" class="animsition-link">INICIO</a></li>
                    <li><a href="?url=categorias" class="animsition-link">CATEGORIAS</a></li>
                    <?php
                    if ($loged) {
                        echo '<li><a class="dropdown-trigger" href="#!" data-target="dropdownUser"><i class="material-icons left">account_circle</i>' . $userData[0] . '<i class="material-icons right">arrow_drop_down</i></a></li>';
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
    echo $loged ? '<div class="fixed-action-btn">
    <a class="btn-floating btn-large yellow darken-3 pulse tooltipped" data-position="left" data-tooltip="Nueva Publicacion!" href="?url=newPublicacion">
      <i class="large material-icons">add</i>
    </a>
  </div>' : null;
}  ?>

<ul class="sidenav" id="mobile-aside">
    <br>
    <li class="center-align"><img class="sombreado" loading="lazy" src="/bocetarte/assets/images/page/LogoFin.png" style="width: 60%;" alt="Logo Bocetarte">
        <h3>BOCETARTE&trade;</h3>
    </li>
    <hr>
    <li><a href="/bocetarte/">INICIO</a></li>
    <li><a href="?url=categorias">CATEGORIAS</a></li>
    <?php
    if ($loged) {
        echo '<li>
        <a class="animsition-link"><i class="material-icons left">account_circle</i>' . $userData[0] . ' - <small>MI CUENTA</small></a></li>
        <li><a href="?url=logout" class="animsition-link">LOGOUT</a></li>';
    } else {
        echo '<li><a href="?url=login" class="animsition-link">ACCEDER</a></li>';
    }
    ?>
</ul>