<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Buscar trabajo</title>
        <link href="../Noticias/tableStyle.css" rel="stylesheet" type="text/css"/>
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
        
        <?php
            
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Definimos la función buscarTrabajo para mayor comodidad
            function buscarTrabajo($p_textField,$p_db){
                
                // Definimos la consulta de búsqueda dependiendo del parámetro introducido por el usuario (ID o titular)
                if($p_textField!=""){
                    $works = mysqli_query($p_db,"SELECT * from trabajos t, clientes c 
                                                 where(t.titulo like '%$p_textField%' 
                                                 or
                                                 t.precio like '%$p_textField%'
                                                 or
                                                 c.nombre like '%$p_textField%')  
                                                 and
                                                 t.id_cliente=c.id order by $_POST[option]");
                }
                echo "<div class='container'>";
                    // En el caso en el que encuentre trabajos, imprime una tabla con los resultados
                    if($row = mysqli_fetch_array($works)){                        
                            // Establecemos un bucle DO WHILE que imprime resultados en la tabla mientras siga habiéndolos
                            do{
                                $queryClient = mysqli_query($p_db,"select nombre from clientes where id=$row[id_cliente]");
                                $client = mysqli_fetch_array($queryClient);
                                echo "<div class='row'>";
                                    echo "<div class='col-md-7'>";
                                        echo "<img class='img-fluid rounded mb-3 mb-md-0' src='".$row["imagen"]."' alt=''>";
                                    echo "</div>";
                                    echo "<div class='col-md-5'>";
                                        echo "<h3>".$row["titulo"]."</h3>";
                                        echo "<a class='btn btn-primary' href='verMas.php?id=$row[id]'>Ver más</a>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<hr>";
                            }while($row = mysqli_fetch_array($works));

                    // En caso de no encontrar ningún resultado, mostramos un mensaje informativo
                    }else{ 
                        echo "¡No se ha encontrado ningún registro!"; 
                    }
                echo "</div>";  
            }
        ?>
        
        <!--Formulario que recoge el texto a buscar-->
        <div class="container">
            <form method="post" action="buscarTrabajo.php">
                <div class="form-row">
                    <div class="form-group col-10 offset-1">
                      <label for="textField">Texto a buscar</label>
                      <input type="text" class="form-control" id="textField" name="textField" placeholder="Introduzca el texto a buscar">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-check offset-1">
                        <input class="form-check-input" type="radio" name="option" value="nombre" id="nombre" checked>
                        <label class="form-check-label" for="nombre">
                            Nombre
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-check offset-1">
                        <input class="form-check-input" type="radio" name="option" value="apellidos" id="apellidos">
                        <label class="form-check-label" for="apellidos">
                            Precio
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group offset-1">
                        <input type="submit" class="btn btn-primary" name="submit" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
        <br>
        
        <?php
            // Comprobar que se ha introducido el parámetro de ordenación
            if(isset($_POST['option'])){
                //Comprobar que se ha enviado el formulario
                if(isset($_POST['submit'])){
                    $textoBusqueda=$_POST['textField'];
                    buscarTrabajo($textoBusqueda,$db);
                }
            }   
        ?>
    </body>
</html>
