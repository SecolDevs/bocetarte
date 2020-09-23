<div class="slider" data-aos="fade-in">
    <ul class="slides">
        <?php
        foreach ($publicacion->list_PublicacionRand(null) as $row) {
            echo "<li>
            <img class='imgSlider' src='assets/images/user/" . $row['archivoPublicacion'] . "' loading='lazy'>
            <div class='caption left-align fondoN'>
                <h3>" . $row['tituloPublicacion'] . "</h3><hr/>
                <h5 class='light grey-text text-lighten-3'>By. " . $row['nickUsuario'] . "</h5>
                <a class='waves-effect waves-light btn' href=?url=publicacion&id=" . $row['idPublicacion'] . ">VER</a>
            </div>
        </li>";
        }
        ?>
    </ul>
</div>

<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>Buscar:</h4>
        <input type="text">
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Buscar-></a>
    </div>
</div>

<div class="red darken-3">
    <div class="container center"><br>
        <h3 style="color: white;"><img src="/bocetarte/assets/images/page/LogoFin.png" loading="lazy" style="width: 50px;" alt="Logo Bocetarte">BOCETARTE: LO MAS RECIENTE <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Buscar</a></h3>
    </div>
    <div class="row" data-aos="fade-in">
        <?php
        $delay = 0;
        foreach ($publicacion->list_Publicacion(null) as $row) {
            echo "<div class='col l4'>
            <a href='?url=publicacion&id=" . $row['idPublicacion'] . "'>
                <div class='card large' data-aos='fade-in' data-aos-delay='" . $delay . "'>
                <div class='card-image'>
                    <img src='assets/images/user/" . $row['archivoPublicacion'] . "' loading='lazy'>
                </div>
                <div class='card-content'>
                    <a class='btn-floating halfway-fab waves-effect waves-light' href='?url=publicacion&id=" . $row['idPublicacion'] . "'><i class='material-icons right'>send</i></a>
                    <span class='card-title'>" . $row['tituloPublicacion'] . "</span>
                    <p>By. " . $row['nickUsuario'] . "</p>
                </div>
                </div>
            </a>
        </div>";
            $delay += 100;
            if ($delay >= 600) {
                $delay = 0;
            }
        }
        ?>
    </div>
</div>