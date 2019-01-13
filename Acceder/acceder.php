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
        <?php 
            include('../NavBar/navbar.php'); 
            if(isset($_POST['submit'])){
                if($_POST['inputUser']!=null){
                    if($_POST['inputPassword']!=null){
                        $query= mysqli_query($db, "SELECT * FROM clientes");
                        $rows = mysqli_fetch_array($query);
                    }
                }
            }
        ?>
        <br><br>
        <form method="post" action="acceder.php">
            <div class="form-row">
                <div class="form-group col-5 offset-1">
                    <label for="inputUser">Usuario</label>
                    <input type="text" class="form-control" id="inputUser" placeholder="Introduce tu nombre de usuario">
                </div>
                <div class="form-group col-5">
                    <label for="inputPassword">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Introduce tu contraseña">
                </div>
            </div>
            <div class="form-group offset-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="openSession">
                    <label class="form-check-label" for="openSession">Mantener la sesión abierta</label>
                </div>
            </div>
            <div class="offset-1">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </body>
</html>
