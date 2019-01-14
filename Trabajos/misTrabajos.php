<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mis trabajos</title>
    </head>
    <body>
        <!--NavBar-->
        <?php
            // Buscar como eliminar la cookie "sesion" para eliminar la segunda comprobación
            if(isset($_COOKIE['sesion']) && isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    header('../index.php');
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                header('../Acceder/error.php');
            }
        ?>
        <!--/NavBar-->
        
    </body>
</html>
