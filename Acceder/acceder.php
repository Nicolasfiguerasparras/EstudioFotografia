<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!--Form PHP code-->
<?php 
    // Establecemos conexión con la base de datos
    include('../connectDB.php');
    $db = connectDb();

    if(isset($_POST['submit'])){
        $user=$_POST['inputUser'];
        $password=$_POST['inputPassword'];
        $query= mysqli_query($db, "SELECT * FROM clientes where nick='$user' and contraseña='$password'");

        if($session = mysqli_fetch_array($query)){
            $_SESSION['login_ok'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['id_user']= $session['id'];

            // Codifico la sesión para guardarla en una cookie
            $dataSesion = session_encode();

            if(isset($_POST['openSession'])){
                setcookie("sesion", $dataSesion, time(), "/");
            }
            header("location: ../index.php");
        }else{
            header("location: accederError.php");
        }
    }
?>
<!--/Form PHP code-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Acceder</title>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        <!--NavBar-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    header('location: ../index.php');
                }else{
                    header('location: ../index.php');
                }
            }else{
                include('../NavBar/navBarClearUser.php');
            }
        ?>
        <!--/NavBar-->
        <br><br>
        
        <!--Form-->
        <form method="post" action="acceder.php">
            <div class="form-row">
                <div class="form-group col-5 offset-1">
                    <label for="inputUser">Usuario</label>
                    <input type="text" class="form-control" id="inputUser" name='inputUser' placeholder="Introduce tu nombre de usuario" required autofocus>
                </div>
                <div class="form-group col-5">
                    <label for="inputPassword">Contraseña</label>
                    <input type="password" class="form-control" id="inputPassword" name='inputPassword' placeholder="Introduce tu contraseña" required>
                </div>
            </div>
            <div class="form-group offset-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="openSession" name='openSession' value='1'>
                    <label class="form-check-label" for="openSession">Mantener la sesión abierta</label>
                </div>
            </div>
            <div class="offset-1">
                <input type="submit" class="btn btn-primary" name='submit'>
            </div>
        </form>
        <!--/Form-->
        
        <?php
            // Cerramos la conexión a la base de datos
            mysqli_close($db);
        ?>
    </body>
</html>
