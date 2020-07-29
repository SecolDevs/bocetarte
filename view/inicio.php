<div class="slider" data-aos="fade-in">
    <ul class="slides">
        <?php for ($i = 0; $i < 5; $i++) {
            echo '<li>
            <img src="https://loremflickr.com/1280/720" loading="lazy">
            <div class="caption left-align">
                <h3>TITULO DISEÑO!</h3>
                <h5 class="light grey-text text-lighten-3">AUTOR.</h5>
                <a class="waves-effect waves-light btn" href="#">VER</a>
            </div>
        </li>';
        } ?>
    </ul>
</div>

<div class="red darken-3">
    <div class="container center"><br>
        <h3 style="color: white;">LO MEJOR DE MI POLLA <a class="waves-effect waves-light btn-large" href="">Ver Mas</a></h3>
    </div>
    <div class="row" data-aos="fade-in">
        <?php
        $delay = 0;
        foreach ($publicacion->list_Publicacion(null) as $row) {
            echo "<div class='col l4'>
            <div class='card large' data-aos='flip-up' data-aos-delay='".$delay."'>
            <div class='card-image'>
                <img src='assets/images/user/" . $row['archivoPublicacion'] . "' loading='lazy'>
            </div>
            <div class='card-content'>
                <a class='btn-floating halfway-fab waves-effect waves-light red' href='?url=publicacion&id=".$row['idPublicacion']."'><i class='material-icons right'>send</i></a>
                <span class='card-title'>" . $row['tituloPublicacion'] . "</span>
                <p>By. " . $row['nickUsuario'] . "</p>
            </div>
        </div>
        </div>";
        $delay += 100;
        if ($delay>=600) {
            $delay = 0;
        }
        }
        ?>
    </div>
</div>

<div class="card-panel">
    <div class="container center">
        <h3>LO MEJOR DE DEVIANTART</h3>
    </div>
</div>

<div class="card-panel">
    <div class="container center">
        <h3>LO MEJOR DE BEHANCE</h3>
    </div>
</div>