<?php
include_once './controller/Perfil.php';
include_once './controller/Usuario.php';
include_once './model/UsuarioModel.php';
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://bootswatch.com/3/yeti/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="view/css/login.css" rel="stylesheet" type="text/css">
        <script src="view/js/agregar.js" ></script>
    </head>
    <body>
        <div class="custom_body">
            <div class="container">
                <div class="row">
                    <div class="login_box">
                        <section class="main-box">
                            <form name="frm_registro" action="" method="POST">
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login_usuario" type="text" class="form-control input_layout" name="login_usuario" placeholder="Username" minlength="1" maxlength="40" required="">
                                </div>
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="pass_usuario" type="password" class="form-control input_layout" name="pass_usuario" placeholder="Contraseña" minlength="1" maxlength="40" required="">
                                </div>
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="nombre_usuario" type="text" class="form-control input_layout" name="nombre_usuario" placeholder="Nombre" minlength="1" maxlength="40" required="">
                                </div>
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="apellido_usuario" type="text" class="form-control input_layout" name="apellido_usuario" placeholder="Apellido" minlength="1" maxlength="40" required="">
                                </div>
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="correo_usuario" type="email" class="form-control input_layout" name="correo_usuario" placeholder="E-mail" minlength="1" maxlength="40" required="">
                                </div>
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="edad_usuario" type="number" class="form-control input_layout" name="edad_usuario" placeholder="Edad" minlength="1" required="">
                                </div>
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-user"></i></span>
                                    <select id="cmb_perfil" name="cmb_perfil" required>
                                        <option value="">Selecionar Perfil</option>
                                        <?php foreach ($lista as $value) { ?>
                                            <option value="<?php echo $value->getId_perfil(); ?>"><?php echo $value->getDescripcion_perfil(); ?></option>
                                        <?php } ?>
                                    </select>  
                                </div>
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="fechaNacimiento_usuario" type="date" class="form-control input_layout" name="fechaNacimiento_usuario" required="">
                                </div>
                                <button type="submit" name="btn_registro" class="btn btn-default btn_style">REGISTRAR</button>
                            </form>                       
                        </section>    
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>

