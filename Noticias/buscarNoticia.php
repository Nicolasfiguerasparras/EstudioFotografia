<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE HTML>  
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="noticiasStyle.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <link href="tableStyle.css" rel="stylesheet" type="text/css"/>
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
        
        <?php
            // Establecemos conexión con la base de datos
            include('../connectDB.php');
            $db = connectDb();
            
            // Definimos la función buscarNoticia para mayor comodidad
            function buscarNoticia($p_db){
                $submitName=$_POST['findText'];
                $submitDate=$_POST['findDate'];
                // Definimos la consulta de búsqueda dependiendo del parámetro introducido por el usuario
                if(!$submitName){
                    $query="select * from noticias where fecha like '%$submitDate%' order by $_POST[option]";
                }elseif(!$submitDate){
                    $query="select * from noticias where titular like '%$submitName%' order by $_POST[option]";
                }
                $consulta = mysqli_query($p_db, $query) or die(mysqli_error());
                
                // En el caso en el que encuentre noticias, imprime una tabla con los resultados
                if($row = mysqli_fetch_array($consulta)){ 
                    // Establecemos un bucle DO WHILE que imprime resultados mientras siga habiéndolos
                    echo "<div class='container'>";
                        do{  
                            echo "<div class='row'>";
                                echo "<div class='col-md-7'>";
                                    echo "<img class='img-fluid rounded mb-3 mb-md-0' src='".$row["imagen"]."' alt=''>";
                                echo "</div>";
                                echo "<div class='col-md-5'>";
                                    echo "<h3>".$row["titular"]."</h3>";
                                    echo "<p>".$row["contenido"]."</p>";
                                    $fecha = strtotime($row["fecha"]);
                                    $dia = date('d', $fecha);
                                    $mes = date('m', $fecha);
                                    $anio = date('Y', $fecha);
                                    echo "<p class='small'>".$dia."-".$mes."-".$anio."</p>";
                                echo "</div>";
                            echo "</div>";
                            echo "<hr>";
                        }while($row = mysqli_fetch_array($consulta)); 
                    echo "</div>";
                    mysqli_close($p_db);
                }
                
                // En caso de no encontrar ningún resultado, mostramos un mensaje informativo
                else{ 
                    echo "¡No se ha encontrado ningún registro!"; 
                }
            }
        ?>
         
        <!--Formulario-->
        <form method="post" action="buscarNoticia.php">
            <div class="form-row">
                <div class="form-group col-10 offset-1 col-md-5">
                  <label for="findText">Texto a buscar</label>
                  <input type="text" class="form-control" id="findText" name="findText" placeholder="Introduzca el texto a buscar">
                </div>
                <div class="form-group col-10 offset-1 offset-md-0 col-md-5">
                  <label for="findDate">Fecha a buscar</label>
                  <input type="date" class="form-control" id="findDate" name="findDate">
                </div>
            </div>
            <div class="form-row">
                <div class="form-check offset-1">
                    <input class="form-check-input" type="radio" name="option" value="titular" id="titular" checked>
                    <label class="form-check-label" for="titular">
                        Titulo
                    </label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-check offset-1">
                    <input class="form-check-input" type="radio" name="option" value="fecha" id="fecha">
                    <label class="form-check-label" for="fecha">
                        Fecha de activación
                    </label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group offset-1">
                    <input type="submit" class="btn btn-primary" name="submit" value="Buscar">
                </div>
            </div>
        </form>
        <!--/Formulario-->
        
        
        <?php
            // Comprobar que se ha introducido el parámetro de ordenación
            if(isset($_POST['option'])){
                //Comprobar que se ha enviado el formulario
                if(isset($_POST['submit'])){
                    if($_POST['findText']!=null && $_POST['findDate']!=null){
                        echo "No puedes buscar por dos parámetros al mismo tiempo.";
                    }else{
                        buscarNoticia($db);
                    }
                }
            }
        ?>
    </body>
</html>