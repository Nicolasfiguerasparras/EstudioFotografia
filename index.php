<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="Description" content="Estudio fotográfico ubicado en granada especializado en temas abstractos. Se realizan trabajos en un rango internacional. Ideal para artistas, modelos, etc.">
        <script type="text/javascript" src="JavaScript/jquery-3.2.1.min.js"></script>
        <meta name=”robots” content="Index, Follow">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <!--Script modal-->
        <script defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script defer="defer" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script defer="defer" src="vendor/modal.js" type="text/javascript"></script>
        
        <!-- Bootstrap core JavaScript -->
        <script defer="defer" src="vendor/jquery/jquery.min.js"></script>
        <script defer="defer" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script defer="defer" src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for this template -->
        <script defer="defer" src="js/grayscale.min.js"></script>
        <title>Estudio Fotografía</title>
        <link href="indexStyle.css" rel="stylesheet" type="text/css"/>

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="vendor/css/grayscale.min.css" rel="stylesheet">
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
                                // En caso de aceptar las cookies, se redirige a un archivo php que crea la cookie y éste vuelve a redirigir al index con la cookie ya creada
                                echo "<a href='cookieAccess.php' aria-label='Accept-cookies' class='btn btn-primary btn-success'>Estoy de acuerdo, seguir navegando</a>";
                                echo "<br>";
                                echo "<a href='https://www.boe.es/buscar/act.php?id=BOE-A-1999-23750' aria-label='Not-accept-cookies'>";
                                    echo "<button type='button' class='btn btn-secondary btn-danger'>No estoy de acuerdo, sácame de aquí</button>";
                                echo "</a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        ?>
        <!--/Modal advertencia-->
        
        <!--NavBarIndex-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('NavBar/Index/navBarAdmin.php');
                }else{
                    include('NavBar/Index/navBarClient.php');
                }
            }else{
                include('NavBar/Index/navBarClearUser.php');
            }
        ?>
        <!--/NavBar-->
        
        <!--Caroussel con imagenes de trabajos-->
        <section id="caroussel">
            <!--Sacamos titulares de noticias-->
            <?php
                // Establecemos conexión con la base de datos
                include('connectDB.php');
                $db = connectDb();
                
                // Creamos la consulta para obtener titular y descripción de las noticias
                $countQuery="select count(*) cuenta from trabajos";
                $resultCount=mysqli_query($db,$countQuery);
                $total=mysqli_fetch_array($resultCount, MYSQLI_ASSOC);
                $numberWorks=$total['cuenta'];
                $numAleatorio=rand(1,$numberWorks);
                while(($numAleatorio+3)>$numberWorks){
                    $numAleatorio=rand(1,$numberWorks);
                }
            ?>
            <!--/Sacamos titulares de noticias-->
            
            <div class="container-fluid">
                <div class = "row">
                    <div class= "col-12 d-none d-md-block">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel "data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <?php echo "<img class='d-block w-100' src='Trabajos/img/".$numAleatorio.".webp' style='height:90vh' alt='Imagen aleatoria de un trabajo'>"; ?>
                                    <div class="carousel-caption d-none d-lg-block" style="background-color: rgba(179, 179, 179, 0.2);" >
                                        <h5>
                                            <!--Sacamos el titulo del trabajo-->
                                            <?php 
                                                $query = mysqli_query($db,"SELECT * FROM trabajos WHERE id=$numAleatorio");
                                                $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                                                echo $row["titulo"];
                                                $numAleatorio++;
                                            ?>
                                            <!--/Sacamos el titulo del trabajo-->
                                        </h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <?php echo "<img class='d-block w-100' src='Trabajos/img/".$numAleatorio.".webp' style='height:90vh' alt='Imagen aleatoria de un trabajo'>"; ?>
                                    <div class="carousel-caption d-none d-lg-block" style="background-color: rgba(179, 179, 179, 0.2);" >
                                        <h5>
                                            <!--Sacamos el titulo del trabajo-->
                                            <?php 
                                                $query = mysqli_query($db,"SELECT * FROM trabajos WHERE id=$numAleatorio");
                                                $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                                                echo $row["titulo"];
                                                $numAleatorio++;
                                            ?>
                                            <!--/Sacamos el titulo del trabajo-->
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <?php echo "<img class='d-block w-100' src='Trabajos/img/".$numAleatorio.".webp' style='height:90vh' alt='Imagen aleatoria de un trabajo'>"; ?>
                                    <div class="carousel-caption d-none d-lg-block" style="background-color: rgba(179, 179, 179, 0.2);" >
                                        <h5>
                                           <!--Sacamos el titulo del trabajo-->
                                            <?php 
                                                $query = mysqli_query($db,"SELECT * FROM trabajos WHERE id=$numAleatorio");
                                                $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                                                echo $row["titulo"];
                                            ?>
                                            <!--/Sacamos el titulo del trabajo-->
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" aria-label="prev-Caroussel" href="#carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" aria-label="next-Caroussel" href="#carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/Caroussel-->
      
        
        <!--Sección con las tres últimas noticias publicadas-->
        <?php
            // Sacamos la fecha actual
            $actualDate = date("Y/m/d");

            // Creamos la consulta para obtener las últimas noticias
            $query = "SELECT * FROM noticias WHERE fecha >= $actualDate ORDER BY fecha DESC";
            $resultNews = mysqli_query($db, $query);

            // En caso de que encuentre noticias, vuelca los resultados
            if(!$resultNews == 0){
                $rows=mysqli_num_rows($resultNews);
                
                // En caso de que haya más de 3 noticias insertadas, establece el número de filas a 3
                if($rows>3){
                    $rows=3;
                }
            }else{
                // En caso de no encontrar noticias, imprime un mensaje de error
                echo "No se ha encontrado ninguna noticia";
            }
        ?>   

        <section id="projects" class="projects-section bg-light">
            <div class="container">

                <!-- Primera noticia main -->
                <?php 
                    // Volcamos los resultados en $noticias
                    $noticias=mysqli_fetch_array($resultNews);
                ?>
                <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                    <div class="col-xl-8 col-lg-7">
                        <?php echo "<img class='img-fluid mb-3 mb-lg-0' src='noticias/$noticias[imagen]' alt='Una imagen de una noticia'>"; ?>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <?php echo "<h4>$noticias[titular]</h4>"; ?>
                            <?php echo "<p class='text-black-50 mb-0'>$noticias[contenido]</p>"; ?>
                        </div>
                    </div>
                </div>

                <!-- Segunda noticia -->
                <?php 
                    // Volcamos los resultados en $noticias
                    $noticias=mysqli_fetch_array($resultNews);
                ?>
                <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                    <div class="col-lg-6">
                        <?php echo "<img class='img-fluid' src='noticias/$noticias[imagen]' alt='Una imagen de una noticia'>"; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                    <div class="project-text w-100 my-auto text-center text-lg-left">
                                        <?php echo "<h4 class='text-white'>$noticias[titular]</h4>"; ?>
                                        <?php "<p class='mb-0 text-white-50'>$noticias[contenido]</p>"; ?>
                                        <hr class="d-none d-lg-block mb-0 ml-0">
                                    </div>
                              </div>
                        </div>
                    </div>
                </div>

                <!-- Tercera noticia -->
                <?php 
                    // Volcamos los resultados en $noticias
                    $noticias=mysqli_fetch_array($resultNews);
                ?>
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-6">
                        <?php echo "<img class='img-fluid' src='noticias/$noticias[imagen]' alt='Una imagen de una noticia'>"; ?>
                    </div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <?php echo "<h4 class='text-white'>$noticias[titular]</h4>"; ?>
                                    <?php "<p class='mb-0 text-white-50'>$noticias[contenido]</p>"; ?>
                                    <hr class="d-none d-lg-block mb-0 mr-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php mysqli_close($db); ?>
            </div>
        </section>
        <!--/Sección con las últimas tres noticias publicadas-->
        
        <!-- Signup Section -->
        <section id="signup" class="signup-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5"><label for="inputEmail">¡Suscríbete para mantenerte al día de las novedades!</label></h2>
                        <form class="form-inline d-flex">
                            <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Escribe tu correo electrónico...">
                            <button type="submit" class="btn btn-primary mx-auto">Suscribirme</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <section class="contact-section bg-black">
            <div class="container">

                <div class="row">

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-file-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Estudio fotográfico</h4>
                                <hr class="my-4">
                                <div class="small text-black-50">
                                    <p>
                                        Una aplicación web con diseñoo aplicado para presentar como trabajo.
                                    </p>
                                    <p>
                                        Nº de registro: 123515416851
                                    </p>
                                    <p
                                        >CIF: 1165152518
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-link text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Enlaces de utilidad</h4>
                                <hr class="my-4">
                                <div class="small text-black-50">
                                    <p>
                                        <a class="dark-grey-text" aria-label="contacto" href="Contacto/contacto.php">Contacto</a>
                                    </p>
                                    <p>
                                        <a class="dark-grey-text" aria-label="legalAdvertise" href="avisoLegal.php">Aviso legal</a>
                                    </p>
                                    <p>
                                        <a class="dark-grey-text" aria-label="help" href="sitemap.xml">Ayuda</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-sign-in-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Login</h4>
                                <hr class="my-4">
                                <div class="small text-black-50">
                                    <p>
                                        <a class="dark-grey-text" aria-label="Access" href="Acceder/acceder.php">Acceder</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Dirección</h4>
                                <hr class="my-4">
                                <div class="small text-black-50">Granada, Granada 18012, ES</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4">
                                <div class="small text-black-50">
                                    <a aria-label="email" href="#">nicolas@escuela.com</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Teléfono</h4>
                                <hr class="my-4">
                                <div class="small text-black-50">622514535</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="social d-flex justify-content-center">
                    <a aria-label="Twitter" href="#" class="mx-2">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a aria-label="Facebook"  href="#" class="mx-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a aria-label="Github"  href="#" class="mx-2">
                        <i class="fab fa-github"></i>
                    </a>
                </div>

            </div>
        </section>

        
        <footer class="bg-black small text-center text-white-50">
          <div class="container">
            Copyright &copy; Nicolás Figueras Parras 2019
          </div>
        </footer>
        <!-- Footer -->

        
        <!--Return to Top-->
        <a aria-label="Javascript"  href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
        <!--/Return to Top-->
        
        
    </body>
</html>
