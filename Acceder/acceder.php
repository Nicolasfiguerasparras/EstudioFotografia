<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Acceder</title>
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../JavaScript/app.js" type="text/javascript"></script>
    </head>
    <body>          
        <!--NavBar-->
        <?php include('../NavBar/navbar.php'); ?>
        <br><br>
        <form method="post" action="acceder.php>
            <div class="form-group row">
                <label for="inputUser" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputUser" placeholder="Introduce tu nombre de usuario">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Introduce tu contraseña">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">
                    Mantener la sesión abierta
                </div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="openSession">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
        <?php

        ?>
    </body>
</html>
