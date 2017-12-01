<?php
include_once '../controller/Perfil.php';
include_once '../controller/Usuario.php';
include_once '../model/UsuarioModel.php';
$lista = Perfil::listar();

if (isset($_POST['btn_registro'])) {
    $usuario = new UsuarioModel();
    $usuario->setLogin_usuario($_POST['login_usuario']);
    $usuario->setPass_usuario($_POST['pass_usuario']);
    $usuario->setNombre_usuario($_POST['nombre_usuario']);
    $usuario->setApellido_usuario($_POST['apellido_usuario']);
    $usuario->setCorreo_usuario($_POST['correo_usuario']);
    $usuario->setEdad_usuario($_POST['edad_usuario']);
    $usuario->setCodigo_perfil($_POST['cmb_perfil']);
    $usuario->setFechaNacimiento_usuario($_POST['fechaNacimiento_usuario']);

    if (Usuario::crear($usuario)) {
        echo "<script type=\"text/javascript\"> alert(\"Usuario creado\");</script>";
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "<script type=\"text/javascript\"> alert(\"Error al crear usuario\");</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Importadora LTT</title>
    </head>
    <body>
        <?php
        include_once 'partial/header.php';
        ?>
        <form class="form-horizontal" action="" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend>Agregar Usuario</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="login_usuario">Login</label>  
                    <div class="col-md-4">
                        <input id="login_usuario" name="login_usuario" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="pass_usuario">Password</label>
                    <div class="col-md-4">
                        <input id="pass_usuario" name="pass_usuario" type="password" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nombre_usuario">Nombre</label>  
                    <div class="col-md-4">
                        <input id="nombre_usuario" name="nombre_usuario" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="apellido_usuario">Apellido</label>  
                    <div class="col-md-4">
                        <input id="apellido_usuario" name="apellido_usuario" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="correo_usuario">Email</label>  
                    <div class="col-md-4">
                        <input id="correo_usuario" name="correo_usuario" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="edad_usuario">Edad</label>  
                    <div class="col-md-4">
                        <input id="edad_usuario" name="edad_usuario" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cmb_perfil">Perfil</label>
                    <div class="col-md-4">
                        <select id="cmb_perfil" name="cmb_perfil" required>
                            <option value="">Selecionar Perfil</option>
                            <?php foreach ($lista as $value) { ?>
                                <option value="<?php echo $value->getId_perfil(); ?>"><?php echo $value->getDescripcion_perfil(); ?></option>
                            <?php } ?>
                        </select>  
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="fechaNacimiento_usuario">Fecha de Nacimiento</label>  
                    <div class="col-md-4">
                        <input id="fechaNacimiento_usuario" name="fechaNacimiento_usuario" type="text" placeholder=" " class="form-control input-md" required="">
                        <span class="help-block"> </span>  
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btn_registro"></label>
                    <div class="col-md-4">
                        <button type="submit" id="btn_registro" name="btn_registro" class="btn btn-primary">Agregar</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </body>
</html>