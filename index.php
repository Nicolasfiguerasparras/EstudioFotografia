<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="JavaScript/jquery-3.2.1.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <title>Estudio Fotografía</title>
        <link href="indexStyle.css" rel="stylesheet" type="text/css"/>
        <link href="NavBar/navBarStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--Modal advertencia-->
        <?php
            if(!isset($_COOKIE['acceso'])){
                echo "<div class='modal' tabindex='-1' role='dialog' id='modalInicio' data-keyboard='false' data-backdrop='static'>";
                    echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                        echo "<div class='modal-content'>";
                            echo "<div class='modal-header'>";
                                echo "<h2 class='modal-title'>Aceptación de cookies</h2>";
                            echo "</div>";
                            echo "<div class='modal-body'>";
                            echo "<p>
                                Utilizamos cookies propias y de terceros para mejorar nuestros servicios y mostrarle publicidad 
                                relacionada con sus preferencias mediante el análisis de sus hábitos de navegación. 
                                Si continua navegando, consideramos que acepta su uso.</p>";
                            echo "</div>";
                            echo "<div class='modal-footer footerModal'>";
                                 echo "<a href='https://www.boe.es/buscar/act.php?id=BOE-A-1999-23750'>";
                                    echo "<button ntype='button' class='btn btn-secondary btn-danger'>No estoy de acuerdo, sácame de aquí</button>";
                                echo "</a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                setcookie("acceso", date('j-m-Y,H:i:s'), null, "/");
            }else{
                setcookie("acceso", date('j-m-Y,H:i:s'), null, "/");
            }
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="modalInicio" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Aceptación de cookies</h2>
                    </div>
                    <div class="modal-body">
                        <p>Utilizamos cookies propias y de terceros para mejorar nuestros servicios y mostrarle publicidad relacionada con sus preferencias mediante el análisis de sus hábitos de navegación. Si continua navegando, consideramos que acepta su uso.</p>
                    </div>
                    <div class="modal-footer footerModal">
                        <button type="button" class="btn btn-primary btn-success" data-dismiss="modal">Estoy de acuerdo, seguir navegando</button>	
                        <a href="https://www.boe.es/buscar/act.php?id=BOE-A-1999-23750">
                            <button type="button" class="btn btn-secondary btn-danger">No estoy de acuerdo, sácame de aquí</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--/Modal advertencia-->
        
        <!--NavBarIndex-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Estudio de Fotografía</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navBar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Noticias/noticias.php">Noticias<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Clientes/clientes.php">Clientes<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Trabajos/trabajos.php">Trabajos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Citas/citas.php">Citas<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Contacto/contacto.php">Contacto<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Acceder/acceder.php">Acceder<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--/NavBar-->
        
        <!--Caroussel con imagenes de trabajos-->
            <!--Sacamos titulares de noticias-->
            <?php
                // Establecemos conexión con la base de datos
                include('connectDB.php');
                $db = connectDb();
                
                // Creamos la consulta para obtener titular y descripción de las noticias
                $titulares = mysqli_query($db, "SELECT * FROM noticias");
            ?>
        <div class="container-fluid">
            <div class = "row">
                <div class= "col-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel "data-slide-to="0" class="active"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="Noticias/img/3.jpg" style="height:90vh">
                                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(102,102,0, 0.8);" >
                                    <h5>
                                        <?php 
                                            $query = mysqli_query($db,"SELECT * FROM noticias WHERE id=3");
                                            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                                            echo $row["titular"];
                                        ?>
                                    </h5>
                                    <p>
                                        <?php 
                                            echo $row["contenido"];
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="Noticias/img/4.jpg" style="height:90vh">
                                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(102,102,0, 0.8);" >
                                    <h5>
                                        <?php 
                                            $query = mysqli_query($db,"SELECT * FROM noticias WHERE id=4");
                                            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                                            echo $row["titular"];
                                        ?>
                                    </h5>
                                    <p>
                                        <?php 
                                            echo $row["contenido"];
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="Noticias/img/5.jpg" style="height:90vh">
                                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(102,102,0, 0.8);" >
                                    <h5>
                                        <?php 
                                            $query = mysqli_query($db,"SELECT * FROM noticias WHERE id=5");
                                            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                                            echo $row["titular"];
                                        ?>
                                    </h5>
                                    <p>
                                        <?php 
                                            echo $row["contenido"];
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!--/Caroussel-->
        
        <!--Sección de presentación-->
        <div class="presentacion" style="background-color: #13293D">
            <p style="color: #e8f1f2">
                Hola! Me llamo Nicolás Figueras Parras y soy alumno de la Escuela Arte Granada.<br>
                Estoy estudiando fotografía. En esta página web mostraré y pondré a la venta mis proyectos.<br>
                Sean todos bienvenidos.<br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <br>
        <!--/Sección de presentación-->
        
        <!--Sección con las tres últimas noticias publicadas-->
        <?php
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
            echo "<div class = 'card-deck col-12'>";
                // Utilizamos un bucle for para recorrer las variables de cada noticia
                for($i=0; $i<$rows; $i++){
                    $noticias=mysqli_fetch_array($resultNews);
                    echo "<div class='card text-white bg-dark mb-3 col-4' id=accordion>";
                        echo "<img class='card-img-top' src='Noticias/$noticias[imagen]'>";
                        echo "<div class='card-header' id='headingOne'>";
                            echo "<h5 class='card-title'>$noticias[titular]</h5>";
                            echo "<button class='btn btn-link' data-toggle='collapse' data-target='#Collapse$i' aria-expanded='false' aria-controls='collapseOne'>";
                                echo "Ver más";
                            echo "</button>";
                        echo "</div>";
                    echo "</div>";
                    // Como id del Collapse ponemos el valor de $i para crear DIVs únicos
                    echo "<div id='Collapse$i' class='collapse' aria-labelledby='headingOne' data-parent='#accordion'>";
                        echo "<div class='card-body col-3'>";
                            echo "<p class='card-text'>$noticias[contenido]</p>";
                        echo "</div>";
                    echo "</div>";
                }
            echo "</div>";
            mysqli_close($db);
        ?> 
        <!--/Sección con las últimas tres noticias publicadas-->
        
        <!--Footer-->  
        <footer id="foot">
            <ul>
                <a href="#">Aviso legal</a>
                <a href="#">Privacidad</a>
                <a href="Contacto/contacto.php">Contactar</a>
            </ul>
        </footer>
        <!--/Footer de libre contenido--> 
        
        <!--Script modal-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
        <?php
            if(!isset($_COOKIE['acceso'])){
                echo "
                    <script>
                        $(window).on('load',function(){
                        $('#modalInicio').modal('show');
                        });
                    </script>
                ";
                setcookie("acceso", date('j-m-Y,H:i:s'), null, "/");
                // Buscar la manera de que se cree la cookie solo si hace click en el botón aceptar
            }
        ?>
        <!--/Script modal-->
    </body>
</html>
