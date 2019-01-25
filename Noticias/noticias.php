<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Noticias</title>
        <link href="noticiasStyle.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../JavaScript/showNhideNews.js" type="text/javascript"></script>
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="vendor/css/2-col-portfolio.css" rel="stylesheet">
    </head>
    <body>
        <!--NavBar-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('../NavBar/navBarAdmin.php');
                }else{
                    header("location: ../Acceder/error.php");
                }
            }else{
                header("location: ../Acceder/error.php");
            }
        ?>
        <!--/NavBar-->
        <br>
        
        <!-- Container -->
        <div style="text-align: center">
            <?php
                // Establecemos conexión con la base de datos
                include('../connectDB.php');
                $db = connectDb();
                
                //--Consulta para sacar las noticias de 5 en 5--//
                    // En caso de que no haya .php?page=x en la URL, se inicializa a 0
                    if(!isset($_GET['page'])){
                        $page=0;

                        // Definimos la consulta de búsqueda
                        $query = mysqli_query($db,"SELECT * FROM noticias ORDER BY fecha DESC LIMIT 0,5"); 
                    }else{
                        $page=$_GET['page'];
                        $limit=5*$page;
                        $query = mysqli_query($db,"SELECT * FROM noticias ORDER BY fecha DESC LIMIT $limit,5");
                    }
                //--Consulta para sacar las noticias de 5 en 5--//               
                
                
                //--Bucle de impresión de noticias
                echo "<div class='container'>";
                    echo "<div class='row'>";
                        // En el caso en el que encuentre noticias, imprime una tabla con los resultados
                        if (!$row = mysqli_fetch_array($query)){
                            echo "¡No se ha encontrado ningún registro!"; 
                        }else{
                            //--Primera noticia--//
                                echo "<div class='col-lg-12 portfolio-item'>";
                                    echo "<div class='card h-100'>";
                                        echo "<a href='#'><img class='card-img-top' src='../Noticias/$row[imagen]' alt=''></a>";
                                        echo "<div class='card-body'>";
                                            echo "<h4 class='card-title'>";
                                                echo "<a href='#'>$row[titular]</a>";
                                            echo "</h4>";
                                        echo "</div>";
                                        echo "<a class='btn btn-secondary text-white' id='showNhide0'>Mostrar</a>";
                                        echo "<div class='card col-12 outer-div' style='border-style: none; display:none' id='texto0'>";
                                            echo "<br><div class='inner-div'><p>$row[contenido]</p></div>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            //--Primera noticia--//


                            //--Resto de noticias--//

                                // Número de noticias que quedan en el array
                                $number= mysqli_num_rows($query);

                                for($i=1;$i<$number;$i++){
                                    $row = mysqli_fetch_array($query);
                                    echo "<div class='col-lg-6 portfolio-item'>";
                                        echo "<div class='card h-100'>";
                                            echo "<a href='#'><img class='card-img-top' src='../Noticias/$row[imagen]' alt=''></a>";
                                            echo "<div class='card-body'>";
                                                echo "<h4 class='card-title'>";
                                                    echo "<a href='#'>$row[titular]</a>";
                                                echo "</h4>";
                                            echo "</div>";
                                            echo "<a class='btn btn-secondary text-white' id='showNhide$i'>Mostrar</a>";
                                            echo "<div class='card col-12 outer-div' style='border-style: none; display:none' id='texto$i'>";
                                                echo "<br><div class='inner-div'><p>$row[contenido]</p></div>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                }       
                            //--Resto de noticias--//   
                        }
                    echo "</div>";
                echo "</div>";
                //--Bucle de impresión de noticias--//
                
                //--Botones de paginación--//
                    // Definimos la acción de siguiente y anterior
                    $nextPage=$page+1;
                    $prevPage=$page-1;

                    // Hacemos el recuento de las noticias
                    $countQuery="select count(*) cuenta from noticias";
                    $resultCount=mysqli_query($db,$countQuery);
                    $total=mysqli_fetch_array($resultCount, MYSQLI_ASSOC);
                    $numberPags=$total['cuenta']/5;
                    $moreThan=$total['cuenta']%5;
                    
                    echo "<nav aria-label='Page navigation'>";
                        echo "<ul class='pagination justify-content-center'>";
                            echo "<li class='page-item'>";
                                // Botón de inicio
                                echo "<a class='page-link' href='noticias.php?page=0' aria-label='Previous'>";
                                    echo "<span aria-hidden='true'>Inicio</span>";
                                echo "</a>";
                            echo "</li>";
                            // Botones entre página inicial y página final
                            for($i=1;$i<$numberPags-1;$i++){
                                echo "<li class='page-item'>";
                                    echo "<a class='page-link' href='noticias.php?page=$i'>".($i+1)."</a>";
                                echo "</li>";
                                
                            }
                            // Botón de última página
                            echo "<li class='page-item'>";
                                echo "<a class='page-link' href='noticias.php?page=".(intval($numberPags))."'>Final</a>";
                            echo "</li>";
                        echo "</ul>";
                    echo "</nav>";
                //--Botones de paginación--//

                // Cerramos conexión
                mysqli_close($db);
            ?>


            </div>
            <!-- /.container -->
            
            
        </div>
    </body>
</html>
