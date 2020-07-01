<?php
include_once(CONTROLLER_PATH . 'usuarioController.php');
$user = new usuario_Controller();
?>

<div class="card-panel red lighten-2" data-aos="fade-in">
    <div class="container">
        <div class="card-panel white">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s6"><a class="active" href="#login">Iniciar Sesion</a></li>
                        <li class="tab col s6"><a href="#signup">Crear Cuenta</a></li>
                    </ul>
                </div>
                <div id="login" class="col s12">
                    <form class="col s12" action="" method="POST">
                        <div class="container">
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="icon_prefix" name="nickname" type="text" class="validate" required="">
                                <label for="icon_prefix">NICKNAME</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input id="icon_lock" type="password" name="password" class="validate" required="">
                                <label for="icon_lock">CONTRASEÑA</label>
                            </div>
                            <button class="btn waves-effect waves-light right" type="submit" name="login">Acceder
                                <i class="material-icons right">send</i>
                                <?php
                                $user->login_User();
                                ?>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div id="signup" class="col s12">
                    <form class="col s12" action="" method="POST">
                        <div class="container">
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input name="nickname" id="icon_account_circle" type="text" class="validate" required="">
                                <label for="icon_account_circle">NICKNAME</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input name="password" id="icon_locko" type="password" class="validate" required="">
                                <label for="icon_locko">CONTRASEÑA</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">lock_outline</i>
                                <input name="confirmpassword" id="icon_lock_outline" type="password" class="validate" required="">
                                <label for="icon_lock_outline">CONFIRMAR CONTRASEÑA</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input name="email" id="icon_email" type="email" class="validate" required="">
                                <label for="icon_email">EMAIL</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">phone</i>
                                <input name="telefono" id="icon_phone" type="number" class="validate" required="">
                                <label for="icon_phone">TELEFONO</label>
                            </div>
                            <div class="switch">
                                <label for="switchtel">QUIERO QUE MI TELEFONO SEA VISIBLE</label><br>
                                <label id="switchtel">
                                    Off
                                    <input name="des" type="checkbox" value="YES">
                                    <span class="lever"></span>
                                    On
                                </label>
                            </div><br>
                            <button class="btn waves-effect waves-light right" type="submit" name="signup">Crear Cuenta
                                <i class="material-icons right">send</i>
                                <?php
                                $user->insert_User();
                                ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>