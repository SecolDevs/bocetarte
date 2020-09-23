<?php
if (isset($_GET['id'])) {
    $datos = array("idPublicacion" => $_GET['id']);

    $row = $publicacion->list_Publicacion($datos);
} else {
    echo "<script>location.href = '/bocetarte/'</script>";
}
?>

<div class="row card-panel">
    <div class="col xl8">
        <div class="">
            <?php
            echo "<img class='materialboxed' src='assets/images/user/" . $row['archivoPublicacion'] . "' style='width: 100%;'>";
            ?>
        </div>
    </div>
    <div class="card-panel col xl4 fullscreen">
        <h3><?php echo $row['tituloPublicacion']; ?><small> By <?php echo '<a href="?url=profile&nickname=' . $row['nickUsuario'] . '" >' . $row['nickUsuario'] . '</a>'; ?></small></h3>
        <hr>
        <p>Publicado: <?php echo $row['fechaPublicacion']; ?> | Categoria: <?php echo $row['nombreCategoria']; ?></p>
        <h4><?php echo $row['descripcionPublicacion']; ?></h4>
        <hr>
        <form method="POST" enctype="multipart/form-data">
            <?php
            $num = $like->list_Like($row['idPublicacion']);
            ?>
            <button class="waves-effect waves-light btn-large" name="like" type="submit"><i class="material-icons left">favorite_border</i><?php echo $num['0']; ?></button>
            <?php if (isset($_SESSION['nickname'])) { ?>
                <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id_Usuario']; ?>">
                <input type="hidden" name="idPublicacion" value="<?php echo $row['idPublicacion']; ?>">
            <?php
                $like->insert_Like();
            } else {
            } ?>
        </form>
        <div>
            <h5>COMENTARIOS</h5>
            <div style="height: auto; overflow-y: scroll;">
                <?php
                foreach ($comentario->list_Comentario($row['idPublicacion']) as $com) {
                    echo '<div>
                <i class="material-icons left">face</i>
                <h6>' . $com['nickUsuario'] . ' <small>' . $com['fechaComentario'] . '</small></h6>
                <p>' . $com['contenidoComentario'] . '</p>
            </div>
            <hr>';
                } ?>
            </div>
        </div>
        <div id="comentar">
            <h5>DEJA TU COMENTARIO:</h5>
            <?php if (isset($_SESSION['nickname'])) { ?>
                <form class="col s12" method="POST">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">chat_bubble_outline</i>
                        <textarea id="textarea2" name="contenidoComentario" class="materialize-textarea" data-length="200"></textarea>
                        <label for="textarea2">COMENTARIO</label>
                    </div>
                    <input type="hidden" value="<?php echo $_SESSION['id_Usuario']; ?>" name="idUsuario">
                    <input type="hidden" value="<?php echo $row['idPublicacion']; ?>" name="idPublicacion">
                    <button class="btn waves-effect waves-light right" type="submit" name="comentario">CREAR
                        <i class="material-icons right">send</i>
                        <?php
                        $comentario->insert_Comentario();
                        ?>
                    </button>
                </form>
            <?php } else { ?>
                <a class="btn btn-large" href="/bocetarte/?url=login">ACCEDER</a>
            <?php } ?>
        </div>
    </div>
</div>