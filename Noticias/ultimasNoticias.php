<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            // Establecemos conexión con la base de datos
            include('connectDB.php');
            $db = connectDb();
        
            $actualDate = date("Y/m/d");
            
            // Creamos la consulta para obtener las últimas noticias
            $query = "SELECT * FROM noticias WHERE fecha >= $actualDate";
            $resultNews = mysqli_query($db, $query);
            
            // En caso de que encuentre noticias, vuelca los resultados
            if(!$resultNews == 0){
                $rows=mysqli_num_rows($resultNews);
                // En caso de que haya más de 3 noticias insertadas, establece el número de filas a 3
                if($rows>3){
                    $rows=3;
                }
            }else{
                echo "No se ha encontrado ninguna noticia";
            }
            
            echo "<div class='absolute'";
                // Inicializamos un form para crear el botón ver más
                echo "<form method='post' action='ultimasNoticias.php'>";

                    // Utilizamos un bucle for para recorrer las variables de cada noticia
                    for($i=0; $i<$rows; $i++){
                        // Hay que ordenarlas previamente ------------------------------------------------
                        $noticias=mysqli_fetch_array($resultNews);
                        echo "<div>";
                           echo "<img src='/Noticias/$noticias[imagen]' alt='new$i'";
                           echo "$noticias[titular]";
                           echo "<input type='hidden' name='$i' value='$noticias[id]'";
                           echo "<input type='submit' name='send$i' value='Ver más'";
                        echo "</div>";
                    }
                echo "</form>";
            echo "</div>";
            mysqli_close($db);
        ?>
    </body>
</html>