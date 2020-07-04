<?php
include_once(CONTROLLER_PATH . 'publicacionController.php');
include_once(CONTROLLER_PATH . 'categoriaController.php');
$publicacion = new publicacion_Controller();
$categoria = new categoria_Controller();
?>

<div>
    <h1>Publicaciones</h1>
    <form class="col s12" action="" enctype="multipart/form-data" method="POST">
        <div class="container">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="nombreP" name="tituloPublicacion" type="text" class="validate" required="">
                <label for="nombreP">TITULO PUBLICACION</label>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>ARCHIVO</span>
                    <input name="archivoPublicacion" type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <textarea id="textarea2" name="descripcionPublicacion" class="materialize-textarea" data-length="200"></textarea>
                <label for="textarea2">DESCRIPCION PUBLICACION</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <select name="idCategoria" required="">
                    <option value="" disabled selected></option>
                    <?php 
                    foreach ($categoria->list_Categoria(null) as $row) {
                        echo "<option value=".$row['idCategoria'].">".$row['nombreCategoria']."</option>";
                    }
                    ?>
                </select>
                <label>CATEGORIA</label>
            </div>
            <input type="hidden" name="idUsuario" value="<?php echo $idUser;  ?>">
            <input type="hidden" name="nickUsuario" value="<?php echo $username ?>">
            <button class="btn waves-effect waves-light right" type="submit" name="categoria">CREAR
                <i class="material-icons right">send</i>
                <?php
                $publicacion->insert_Publicacion();
                ?>
            </button>
        </div>
    </form>
</div>