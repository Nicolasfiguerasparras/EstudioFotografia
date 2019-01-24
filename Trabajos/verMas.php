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

        <!-- Custom styles for this template -->
        <link href="css/portfolio-item.css" rel="stylesheet">
    </head>
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
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Query section //
                $id=$_GET['id'];
                $work="select * from trabajos where id=$id";
                $consulta=mysqli_query($db, $work);
                if($array=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                    $clientQuery=mysqli_query($db, "select * from clientes where id=(select id_cliente from trabajos where id=$id)");
                    $client=mysqli_fetch_array($clientQuery, MYSQLI_ASSOC);
                }
            // ./query section //
        ?>
        
        <!-- Page Content -->
        <div class="container">

            <!-- Portfolio Item Heading -->
            <h1 class="my-4">Información ampliada</h1>

            <!-- Portfolio Item Row -->
            <div class="row">

                <div class="col-md-8">
                    <?php echo "<img class='img-fluid' src='".$array["imagen"]."' alt=''>"; ?>
                </div>

                <div class="col-md-4">
                    <h3 class="my-3"><?php echo $array["titulo"]; ?></h3>
                    <p><?php $array["descripcion"] ?><p>
                    <h3 class="my-3">Detalles del trabajo</h3>
                    <ul style="list-style-type: none;">
                        <li>
                            <?php echo "Precio: ".$array["precio"]."€"; ?>
                        </li>
                        
                        <?php 
                            if($array["id_cliente"]==0){ 
                                if($usuario==1){
                                    echo "<li style='color:green'><a href='verMas.php?id=$array[id]'>Disponible</a></li>";
                                }else{
                                    echo "<li style='color:green'>Disponible</li>";
                                }
                            }else{
                                echo "<li>Vendido a $client[nombre] $client[apellidos]</li>";
                            }
                        ?>
                    </ul>
                </div>

            </div><br>
            <!-- /.row -->
            
            <a href="trabajos.php"><h2 style="text-align:center">Ver todos los trabajos disponibles</h2></a>

        </div>
        <!-- /.container -->
    </body>
</html>
