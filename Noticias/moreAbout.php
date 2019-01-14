<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ver más</title>
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--NavBar-->
        <?php
            // Buscar como eliminar la cookie "sesion" para eliminar la segunda comprobación
            if(isset($_COOKIE['sesion']) && isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('../NavBar/navBarAdmin.php');
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                include('../NavBar/navBarClearUser.php');
            }
        ?>
        <!--/NavBar-->
        <br><br>
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Con un bucle for compruebo cual de los 3 submits ha pulsado
            for($i=0;$i<=2;$i++){
                // Compruebo que se haya hecho submit en la posición del for
                if(isset($_POST['send'.$i])){ 
                    // Saco el ID y realizo la consulta
                    $id=$_POST['id'.$i];
                    $query="SELECT * FROM noticias WHERE id=$id";
                    $resultQuery=mysqli_query($db,$query);
                    
                    // Creo un array donde vuelco los resultados 
                    $data=mysqli_fetch_array($resultQuery,MYSQLI_ASSOC);
                    
                    //Imprimo las variables que necesito (titular, contenido e imagen)
                    echo "<h1>$data[titular]</h1>";
                    echo "<br><br>";
                    
                    echo "<p>$data[contenido]</p>";
                    echo "<br><br>";
                    
                    echo "<img src='$data[imagen]' />";
                    echo "<br><br>";
                }
            }
            
            // Cierro la conexión
            mysqli_close($db);
        ?>
    </body>
</html>
