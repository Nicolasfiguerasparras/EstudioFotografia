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
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    header('location:../index.php');
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                header('location:../Acceder/error.php');
            }
        ?>
        <!--/NavBar-->
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Sacamos el id del cliente que está conectado
            $id_user = $_SESSION['id_user'];
            
            // Definimos la consulta de búsqueda
            $works = mysqli_query($db,"SELECT * FROM trabajos where id_cliente='$id_user'"); 

            // En el caso en el que encuentre noticias, imprime una tabla con los resultados
            if($row = mysqli_fetch_array($works)){ 
                echo "<table border='1px' align='center' style='width:500px; height: 500px'>"; 

                    // Mostramos las cabeceras de la tabla
                    echo "<tr>"; 
                        echo "<td>Título</td>";
                        echo "<td>Precio</td>";
                        echo "<td>Imagen</td>";
                    echo "</tr>"; 

                    // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                    do{
                        $queryClient = mysqli_query($db,"select nombre from clientes where id=$row[id_cliente]");
                        $client = mysqli_fetch_array($queryClient);
                        echo "<tr>";
                            $mod_id=$row['id'];
                            echo "<td>".$row["titulo"]."</td>"; 
                            echo "<td>".$row['precio']."</td>";
                            echo "<td><img src='".$row["imagen"]."' height='150' width='150' /></td>";
                        echo "</tr>"; 
                    }while($row = mysqli_fetch_array($works)); 
                echo "</table>";

                // En caso de no encontrar ningún resultado, mostramos un mensaje informativo
            }else{ 
                echo "<h1 style='text-align:center'>¡No has comprado aún ningún trabajo!</h1>"; 
            }
        ?>
        
        <a href="trabajos.php"><h2 style="text-align:center">Ver todos los trabajos disponibles</h2></a>
    </body>
</html>
