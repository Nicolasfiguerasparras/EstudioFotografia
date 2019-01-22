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
        <br><br>
        
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
                    
                
                //--Botones de paginación--//
                    // Definimos la acción de siguiente y anterior
                    $nextPage=$page+1;
                    $prevPage=$page-1;

                    // Hacemos el recuento de las noticias
                    $countQuery="select count(*) cuenta from noticias";
                    $resultCount=mysqli_query($db,$countQuery);
                    $total=mysqli_fetch_array($resultCount, MYSQLI_ASSOC);

                    // Si el número total de noticias es mayor que múltiplos de 5, solo lo dejamos volver
                    if($total['cuenta']<($nextPage*5)){
                        echo "<a href='noticias.php?page=$prevPage'>Anterior</a>";
                    }elseif($total['cuenta']==($nextPage*5)){
                        echo "";
                    }elseif($prevPage<0){
                        echo "<a type='button'class='btn btn-outline-primary' href='noticias.php?page=$nextPage'>Siguiente</a>";
                    }else{
                        echo "<a href='noticias.php?page=$prevPage'>Anterior</a>";
                        echo "<a href='noticias.php?page=$nextPage'>Siguiente</a>";
                    }
                //--Botones de paginación--//
                
                    
                    
                // En el caso en el que encuentre noticias, imprime una tabla con los resultados
                if ($row = mysqli_fetch_array($query)){ 
                    //--Primera noticia--//
                    echo "<div class='container'>";
                        echo "<div class='row'>";
                            echo "<div class='card col-12 col-lg-4 text-white bg-dark mb-3'>";
                                echo "<br><img class='card-img-top' src='../Noticias/$row[imagen]'>";
                                echo "<div class='card-header d-none d-md-block' id='headingOne'>";
                                    echo "<h5 class='card-title'>$row[titular]</h5>"; 
                                echo "</div>";
                                echo "<a class='btn btn-dark' id='showNhide0'>Mostrar</a>";
                            echo "</div>";

                            // Como id del Collapse ponemos el valor de $i para crear DIVs únicos
                            echo "<div class='card col-12 col-lg-8 text-white bg-dark mb-3 outer-div' style='display:none' id='texto0'>";
                                echo "<div class='inner-div'><p>$row[contenido]</p></div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    //--Primera noticia--//
                    
                    
                    //--Resto de noticias--//

                        // Número de noticias que quedan en el array
                        $number= mysqli_num_rows($query);
                        echo "<div class='container' style='display: flex; flex-wrap: wrap;'>";
                            echo "<div class='row'>";
                                // Creo dos bucles for ya que voy a mostrar dos noticias por fila
                                for($i=1;$i<$number-2;$i++){
                                    $row = mysqli_fetch_array($query);
                                    echo "<div class='card col-12 col-lg-3 text-white bg-dark mb-3'>";
                                        echo "<br><img class='card-img-top' src='../Noticias/$row[imagen]'>";
                                        echo "<div class='card-header d-none d-md-block' id='headingOne'>";
                                            echo "<h5 class='card-title'>$row[titular]</h5>"; 
                                        echo "</div>";
                                        if($i==1){
                                            echo "<a class='btn btn-dark' id='showNhide$i'>Ocultar</a>";
                                        }else{
                                            echo "<a class='btn btn-dark' id='showNhide$i'>Mostrar</a>";
                                        }
                                    echo "</div>";

                                    // Como id del Collapse ponemos el valor de $i para crear DIVs únicos
                                    if($i==1){
                                        echo "<div class='card col-lg-6 text-white bg-dark mb-3 outer-div' id='texto$i'>";
                                            echo "<div class='inner-div'><p>$row[contenido]</p></div>";
                                    }else{
                                        echo "<div class='card col-lg-6 text-white bg-dark mb-3 outer-div' style='display:none' id='texto$i'>";
                                            echo "<div class='inner-div'><p>$row[contenido]</p></div>";
                                    }
                                    echo "</div>";
                                }
                            echo "</div>";
                            echo "<div class='row'>";
                                for($i=3;$i<$number;$i++){
                                    $row = mysqli_fetch_array($query);
                                    echo "<div class='card col-12 col-lg-3 text-white bg-dark mb-3'>";
                                        echo "<br><img class='card-img-top' src='../Noticias/$row[imagen]'>";
                                        echo "<div class='card-header d-none d-md-block' id='headingOne'>";
                                            echo "<h5 class='card-title'>$row[titular]</h5>"; 
                                        echo "</div>";
                                        if($i==3){
                                            echo "<a class='btn btn-dark' id='showNhide$i'>Ocultar</a>";
                                        }else{
                                            echo "<a class='btn btn-dark' id='showNhide$i'>Mostrar</a>";
                                        }
                                    echo "</div>";

                                    // Como id del Collapse ponemos el valor de $i para crear DIVs únicos
                                    if($i==3){
                                        echo "<div class='card col-lg-6 text-white bg-dark mb-3 outer-div' id='texto$i'>";
                                            echo "<div class='inner-div'><p>$row[contenido]</p></div>";
                                    }else{
                                        echo "<div class='card col-lg-6 text-white bg-dark mb-3 outer-div' style='display:none' id='texto$i'>";
                                            echo "<div class='inner-div'><p>$row[contenido]</p></div>";
                                    }
                                    echo "</div>";
                                }
                            echo "</div>";
                        echo "</div>";
                    //--Resto de noticias--//   
                }

                // En caso de no encontrar ningún resultado, mostramos un mensaje informativo
                else{ 
                    echo "¡No se ha encontrado ningún registro!"; 
                }
                mysqli_close($db);
            ?>
        </div>
    </body>
</html>
