<?php
include_once(CONTROLLER_PATH . 'categoriaController.php');
$categoria = new categoria_Controller();
?>

<div>
    <h1>CATEGORIAS</h1>
    <form class="col s12" action="" method="POST">
        <div class="container">
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" name="nombreCategoria" type="text" class="validate" required="">
                <label for="icon_prefix">NOMBRE CATEGORIA</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <select name="tipoCategoria" required="">
                    <option value="" disabled selected></option>
                    <option value="img">IMAGEN</option>
                    <option value="video">VIDEO</option>
                    <option value="audio">AUDIO</option>
                </select>
                <label>CATEGORIA</label>
            </div>
            <button class="btn waves-effect waves-light right" type="submit" name="categoria">CREAR
                <i class="material-icons right">send</i>
                <?php
                $categoria->insert_Categoria();
                ?>
            </button>
        </div>
    </form>
</div>