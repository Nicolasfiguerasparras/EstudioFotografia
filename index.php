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
        <!--/Modal-->
        
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
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="Noticias/noticias.php">Noticias<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="Clientes/clientes.php">Clientes<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="Trabajos/trabajos.php">Trabajos<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="Citas/citas.php">Citas<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Contacto/contacto.php">Contacto<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Acceder/acceder.php">Acceder<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="form-group">
                        <input type="user" class="form-control" id="usuario" aria-describedby="userHelp" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </nav>
        <!--/NavBar-->
        
        <!--Caroussel con imagenes de trabajos-->
        <div class="container-fluid">
            <div class = "row">
                <div class= "col-12">
                    <div id="miPrimerCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#miPrimerCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#miPrimerCarousel" data-slide-to="1"></li>
                            <li data-target="#miPrimerCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="Trabajos/img/1.jpg" style="height:90vh">
                                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(102,102,0, 0.8);" >
                                    <h5>Imagen de un faro</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="Trabajos/img/2.jpg" style="height:90vh">
                                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(102,102,0, 0.8);" >
                                    <h5>Imagen de un faro</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="Trabajos/img/3.jpg" style="height:90vh">
                                <div class="carousel-caption d-none d-md-block" style="background-color: rgba(102,102,0, 0.8);" >
                                    <h5>Imagen de un faro</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#miPrimerCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#miPrimerCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr><br>
        <!--/Caroussel-->
        
        
        <p>Hola! Me llamo Nicolás Figueras Parras y soy alumno de la Escuela Arte Granada.</p><br>
        
        <p>Estoy estudiando fotografía. En esta página web mostraré y pondré a la venta mis proyectos.</p><br>
        
        <p>Sean todos bienvenidos.</p>
        <hr><br>
        
        
        <!--Sección con las tres últimas noticias publicadas-->
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
  
            // Utilizamos un bucle for para recorrer las variables de cada noticia
            for($i=0; $i<$rows; $i++){
                // Inicializamos un form para crear el botón ver más
                echo "<form method='post' action='Noticias/moreAbout.php'>";
                    $noticias=mysqli_fetch_array($resultNews);
                    echo "<div class = 'col-4 offset-4'>";
                        echo "<div class='card'>";
                            echo "<img src='Noticias/$noticias[imagen]' alt='new$i'";
                            echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>$noticias[titular]</h5>";
                                echo "<input type='hidden' name='id$i' value='$noticias[id]'>";
                                echo "<input type='submit' name='send$i' value='Ver más'>";
                                echo "</form>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
            }
            mysqli_close($db);
        ?>
        <!--/Sección con las últimas tres noticias publicadas-->
        
        <!--Footer de libre contenido-->  
        <footer id="foot">
            <ul>
                <a href="#">Aviso legal</a></li>
                <a href="#">Privacidad</a></li>
                <a href="Contacto/contacto.html">Contactar</a></li>
            </ul>
        </footer>
        
        <!--Script modal-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	<script>
            $(window).on('load',function(){
                $('#modalInicio').modal('show');
            });
	</script>
        <!--/Script modal-->
    </body>
</html>
