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
        <div class="container">
            <!-- Portfolio Item Heading -->
            <h1 class="my-4">Mis trabajos</h1>
        </div>
            
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Sacamos el id del cliente que está conectado
            $id_user = $_SESSION['id_user'];
            
            // Definimos la consulta de búsqueda
            $works = mysqli_query($db,"SELECT * FROM trabajos where id_cliente='$id_user'"); 

            // En el caso en el que encuentre noticias, imprime una tabla con los resultados
            if($array = mysqli_fetch_array($works)){ 
                    // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                    do{
                        $queryClient = mysqli_query($db,"select * from clientes where id=$array[id_cliente]");
                        $client = mysqli_fetch_array($queryClient);
        ?>
        
        <!-- Page Content -->
        <div class="container">

            <!-- Portfolio Item Row -->
            <div class="row">

                <div class="col-md-8">
                    <?php echo "<img class='img-fluid' src='".$array["imagen"]."' alt=''>"; ?>
                </div>

                <div class="col-md-4">
                    <h3 class="my-3"><?php echo $array["titulo"]; ?></h3>
                    <p><?php $array["descripcion"] ?><p>
                    <h3 class="my-3">Detalles del trabajo</h3>
                    <ul>
                        <li>
                            <?php echo $array["precio"]; ?>
                        </li>
                        <li>
                        <?php 
                            if($array["id_cliente"]==0){ 
                                echo "Disponible";
                            }else{
                                echo "Vendido a $client[nombre] $client[apellidos]";
                            }
                        ?>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /.row -->

        </div><br>
        <!-- /.container -->
        
        <?php
            }while($array = mysqli_fetch_array($works)); 

                // En caso de no encontrar ningún resultado, mostramos un mensaje informativo
            }else{ 
                echo "<h1 style='text-align:center'>¡No has comprado aún ningún trabajo!</h1>"; 
            }
        ?>
        
        <a href="trabajos.php"><h2 style="text-align:center">Ver todos los trabajos disponibles</h2></a>
    </body>
</html>
