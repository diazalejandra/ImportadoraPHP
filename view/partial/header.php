<?php
if (isset($_SESSION['userlogin'])){
$usuario = $_SESSION['userlogin'];}
else{
    $usuario = "Usuario";
}

//else{
//    header("Location: ../index.php");
//die();
//}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://bootswatch.com/3/yeti/bootstrap.min.css">
<link href="css/main.css" rel="stylesheet" type="text/css">

<script>
    $(document).ready(function () {
        $("#cerrar_sesion").click(function (evento) {
            <?php unset($_SESSION["usuario"]);
                  //session_destroy();
            ?>
            $(location).attr('href', '../index.php')
        });
    });
</script>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Importadora LTT</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="./agregarOC.php">Ingresar OC</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenedores <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="./agregarUsuario.php">Usuarios</a></li>
                        <li><a href="./agregarPerfil.php">Perfiles</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="./producto.php">Productos</a></li>
                        <li><a href="./tipoProducto.php">Tipos de Productos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultas <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Top Productos</a></li>
                        <li><a href="#">Top OC por fecha</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido <?php echo $usuario ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#" id="cerrar_sesion">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>