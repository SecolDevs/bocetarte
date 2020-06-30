<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/bocetarte/path.php');
session_start();

?>

<div class="navbar-fixed" data-aos="fade-down">
    <?php
    if (isset($_SESSION['nickname'])) {
        $username = $_SESSION['nickname'];
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
                <a href="/bocetarte/" class="brand-logo">BOCETARTE</a>
                <a href="#" data-target="mobile-aside" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/bocetarte/">INICIO</a></li>
                    <li><a href="?url=categorias">CATEGORIAS</a></li>
                    <?php
                    if (isset($_SESSION['nickname'])) {
                        $username = $_SESSION['nickname'];
                        echo '<li><a class="dropdown-trigger" href="#!" data-target="dropdownUser"><i class="material-icons left">account_circle</i>' . $username . '<i class="material-icons right">arrow_drop_down</i></a></li>';
                    } else {
                        echo '<li><a href="?url=login">ACCEDER</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
</div>

<?php echo isset($_SESSION['nickname']) ? '<div class="fixed-action-btn">
  <a class="btn-floating btn-large red" href="?url=newPublicacion">
    <i class="large material-icons">add</i>
  </a>
</div>' : ""; ?>

<ul class="sidenav" id="mobile-aside">
    <li><a href="#inicio">INICIO</a></li>
    <li><a href="#categorias">CATEGORIAS</a></li>
    <li><a href="#menu">MENU CULERO</a></li>
    <li><a href="#login">LOGIN</a></li>
</ul>