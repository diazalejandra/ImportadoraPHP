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
    </head>
    <body>
        <div class="custom_body">
            <div class="container">
                <div class="row">
                    <div class="login_box">
                        <section class="main-box">
                            <form name="frm_login" action="./view/home.php" method="POST">
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="txt_usuario" type="text" class="form-control input_layout" name="txt_usuario" placeholder="Usuario" minlength="1" required="">
                                </div>
                                <div class="input-box">
                                    <span class="input-group-addon i_icon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="password" type="password" class="form-control input_layout" name="password" placeholder="Contraseña" minlength="1" required="">
                                </div>
                                <button type="submit" name="btn_login" class="btn btn-default btn_style">INGRESAR</button>                            
                            </form>
                            <div class="register">¿No tiene una cuenta? <a href="./view/registro.php">Regístrese</a></div>
                        </section>    
                    </div>
                </div>
            </div>
        </div>  
    </body>
</html>
