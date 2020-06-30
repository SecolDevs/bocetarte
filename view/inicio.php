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
        <h3 style="color: white;">LO MEJOR DE BOCETARTE <a class="waves-effect waves-light btn-large" href="">Ver Mas</a></h3>
    </div>
    <div class="row">
        <?php
        for ($i = 0; $i < 9; $i++) {
            echo '<div class="col l4">
            <div class="card" data-aos="fade-up">
            <div class="card-image">
                <img src="https://loremflickr.com/1280/720" loading="lazy">
                <span class="card-title">Card Title</span>
                <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons right">send</i></a>
            </div>
            <div class="card-content">
                <p>By. Puthanos</p>
            </div>
        </div>
        </div>';
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