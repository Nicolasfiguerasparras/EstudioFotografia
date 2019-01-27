<!--Sacamos sesión-->
<?php
session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trabajos</title>
        
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <style>
        body{
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
        }
        
        html{
            font-family: sans-serif;
        }
        
    </style>
    <body>
        <!--NavBar-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('../NavBar/navBarAdmin.php');
                    $usuario=1;
                }else{
                    include('../NavBar/navBarClient.php');
                    $usuario=0;
                }
            }else{
                include('../NavBar/navBarClearUser.php');
                $usuario=0;
            }
        ?>
        <!--/NavBar-->
        
        <!--PHP Querys-->
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
        
            // Definimos la consulta de búsqueda
            $works = mysqli_query($db,"SELECT * FROM trabajos");
        ?>
        <!--/PHP Querys-->
        
        <!-- Page Content -->
        <div class="container">
            
            <!-- Page Heading -->
            <h1 class="my-4">Listado
                <small>de trabajos</small>
            </h1>
            <?php
                if($row = mysqli_fetch_array($works)){ 
                    do{
                        $queryClient = mysqli_query($db,"select nombre from clientes where id=$row[id_cliente]");
                        $client = mysqli_fetch_array($queryClient);
                        echo "<div class='row'>";
                            echo "<div class='col-md-7'>";
                                echo "<a href='verMas.php?id=$row[id]'>";
                                    echo "<img class='img-fluid rounded mb-3 mb-md-0' src='".$row["imagen"]."' alt=''>";
                                echo "</a>";
                            echo "</div>";
                            echo "<div class='col-md-5'>";
                                echo "<h3>".$row["titulo"]."</h3>";
                                echo "<a class='btn btn-primary' href='verMas.php?id=$row[id]'>Ver más</a>";
                            echo "</div>";
                        echo "</div>";
                        echo "<hr>";
                    }while($row = mysqli_fetch_array($works));
                }else{
                    echo "<h2 style='text-align:center;>Aún no existe ningún trabajo</h3>";
                }
            ?>
        </div>
        <!-- /.container -->
    </body>
</html>
