<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="errorStyle.css" />
</head>
<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>Oops!</h1>
                <!--NavBar-->
                <?php
                    if(!isset($_SESSION['user'])){
                echo "<h2>401 - Tienes que loguearte primero</h2>";
            echo "</div>";
            echo "<a href='acceder.php'>Login</a>";
                    }else{
                echo "<h2>401 - No tienes permiso para acceder</h2>";
            echo "</div>";
            echo "<a href='../index.php'>Volver al inicio</a>";
            }
        ?>
        </div>
    </div>
</body>
</html>