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
        <link href="../NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
        <link href="tableStyle.css" rel="stylesheet" type="text/css"/>
        <script src="../JavaScript/jquery-3.2.1.min.js" type="text/javascript"></script>
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
                
                // En caso de que no haya %page=% en la URL, se inicializa la página a 0
                if(!isset($_GET['page'])){
                    $page=0;
                    
                    // Definimos la consulta de búsqueda
                    $query = mysqli_query($db,"SELECT * FROM noticias ORDER BY fecha DESC LIMIT 0,5"); 
                }else{
                    $page=$_GET['page'];
                    $limit=5*$page;
                    $query = mysqli_query($db,"SELECT * FROM noticias ORDER BY fecha DESC LIMIT $limit,5");
                }
                
                
                // En el caso en el que encuentre noticias, imprime una tabla con los resultados
                if ($row = mysqli_fetch_array($query)){ 
                    echo "<table style='width:90vw'>"; 

                    // Mostramos las cabeceras de la tabla
                    echo "<tr>"; 
                        echo "<td style='width:150px;'>Titular</td>";
                        echo "<td style='width:200px;'>Contenido</td>";
                        echo "<td style='width:300px;'>Imagen</td>";
                        echo "<td style='width:100px;'>Fecha de activación</td>";
                    echo "</tr>"; 
                    
                    // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                    do{ 
                        echo "<tr>"; 
                            echo "<td>".$row["titular"]."</td>"; 
                            echo "<td>".$row["contenido"]."</td>"; 
                            echo "<td><img src='".$row["imagen"]."' style='width:250px; height:240px;' /></td>"; 
                            $fecha = strtotime($row["fecha"]);
                            $dia = date('d', $fecha);
                            $mes = date('m', $fecha);
                            $anio = date('Y', $fecha);
                            echo "<td>".$dia."-".$mes."-".$anio."</td>"; 
                        echo "</tr>"; 
                    }while($row = mysqli_fetch_array($query));  
                    
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
                        echo "<a href='noticias.php?page=$nextPage'>Siguiente</a>";
                    }else{
                        echo "<a href='noticias.php?page=$prevPage'>Anterior</a>";
                        echo "<a href='noticias.php?page=$nextPage'>Siguiente</a>";
                    }  
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
