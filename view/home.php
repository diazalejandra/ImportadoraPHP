<?php
include_once '../controller/Usuario.php';
include_once '../model/UsuarioModel.php';

if (isset($_POST['btn_login'])) {
    $usuario = new UsuarioModel();
    $usuario->setLogin_usuario($_POST['txt_usuario']);
    $usuario->setPass_usuario($_POST['password']);

    if (Usuario::login($usuario)) {
        session_start();
        $_SESSION['userlogin'] = $usuario->getLogin_usuario();
        //echo "<script>location.href='./view/home.php';</script>";
    } else {
        echo "<script type=\"text/javascript\"> alert(\"Usuario o contraseña incorrecta\");</script>";
        echo "<script>location.href='../index.php';</script>";
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
        
        <?php
        include_once 'partial/footer.php';
        ?>
    </body>
</html>