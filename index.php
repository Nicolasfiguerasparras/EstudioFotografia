<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="JavaScript/jquery-3.2.1.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <title>Estudio Fotografía</title>
        <link href="indexStyle.css" rel="stylesheet" type="text/css"/>
        <script src="JavaScript/showNhide.js" type="text/javascript"></script>
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
                                echo "<a href='cookieAccess.php' class='btn btn-primary btn-success'>Estoy de acuerdo, seguir navegando</a>";
                                echo "<br>";
                                echo "<a href='https://www.boe.es/buscar/act.php?id=BOE-A-1999-23750'>";
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
            // Buscar como eliminar la cookie "sesion" para eliminar la segunda comprobación
            if(isset($_COOKIE['sesion']) && isset($_SESSION['user'])){
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
            <!--Sacamos titulares de noticias-->
            <?php
                // Establecemos conexión con la base de datos
                include('connectDB.php');
                $db = connectDb();
                
                // Creamos la consulta para obtener titular y descripción de las noticias
                $titulares = mysqli_query($db, "SELECT * FROM noticias");
            ?>
            <!--/Sacamos titulares de noticias-->
            
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
        <br><br>
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
                echo "No se ha encontrado ninguna noticia";
            }
            
            // Utilizamos un bucle for para recorrer las variables de cada noticia
            for($i=0; $i<$rows; $i++){
                echo "<div class='row'>";
                    $noticias=mysqli_fetch_array($resultNews);
                    echo "<div class='card col-4 offset-1 text-white bg-dark mb-3'>";
                        echo "<br><img class='card-img-top' src='Noticias/$noticias[imagen]'>";
                        echo "<div class='card-header' id='headingOne'>";
                            echo "<h5 class='card-title'>$noticias[titular]</h5>";
                            echo "<a class='btn btn-info' id='showNhide$i'>Mostrar</a>";
                        echo "</div>";
                    echo "</div>";
                    
                    // Como id del Collapse ponemos el valor de $i para crear DIVs únicos
                    echo "<div class='card col-5 text-white bg-dark mb-3 outer-div' style='display:none' id='texto$i'>";
                        echo "<div class='inner-div'><p>$noticias[contenido]</p></div>";
                    echo "</div>";
                echo "</div>";
                echo "<br><br>";
            }
            mysqli_close($db);
        ?> 
        <!--/Sección con las últimas tres noticias publicadas-->

        
        <!--Return to Top-->
        <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
        <!--/Return to Top-->
        
        <!--Footer-->  
        <footer class="page-footer font-small blue-grey lighten-5">

           <div style="background-color: #21d192;">
                <div class="container">

                    <!-- Grid row-->
                    <div class="row py-4 d-flex align-items-center">

                        <!-- Grid column -->
                        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                            <h6 class="mb-0">¡Estate al día de nuestras redes sociales!</h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-6 col-lg-7 text-center text-md-right">

                            <!-- Facebook -->
                            <a class="fb-ic" href="facebook.com">
                                <i class="fa fa-facebook-f white-text mr-4"></i>
                            </a>
                            
                            <!-- Twitter -->
                            <a class="tw-ic" href="twitter.com">
                                <i class="fa fa-twitter white-text mr-4"> </i>
                            </a>
                            
                            <!-- Google +-->
                            <a class="gplus-ic" href="google.com">
                                <i class="fa fa-google-plus-g white-text mr-4"> </i>
                            </a>
                            
                            <!--Linkedin -->
                            <a class="li-ic" href="linkedin.com">
                                <i class="fa fa-linkedin-in white-text mr-4"> </i>
                            </a>
                            
                            <!--Instagram-->
                            <a class="ins-ic" href="instagram.com">
                                <i class="fa fa-instagram white-text"> </i>
                            </a>

                        </div> 
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row-->

                </div>
            </div>

            <!-- Footer Links -->
            <div class="container text-center text-md-left mt-5">

                <!-- Grid row -->
                <div class="row mt-3 dark-grey-text">

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-4 col-xl-3 mb-4">

                        <!-- Content -->
                        <h6 class="text-uppercase font-weight-bold">Estudio Fotográfico</h6>
                        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>Una aplicación web con diseño aplicado para presentar como trabajo.</p>
                        <p>Nº de registro: 123515416851</p>
                        <p>CIF: 1165152518</p>

                    </div>
                    <!-- Grid column -->


                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mb-4">

                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Links de utilidad</h6>
                        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <a class="dark-grey-text" href="#!">Acceder</a>
                        </p>
                        <p>
                            <a class="dark-grey-text" href="#!">Contacto</a>
                        </p>
                        <p>
                            <a class="dark-grey-text" href="#!">Aviso legal</a>
                        </p>
                        <p>
                            <a class="dark-grey-text" href="#!">Ayuda</a>
                        </p>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Contacto</h6>
                        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <i class="fas fa-home mr-3"></i>Granada, Granada 18012, ES</p>
                        <p>
                            <i class="fas fa-envelope mr-3"></i>nicolas@escuela.com</p>
                        <p>
                            <i class="fas fa-phone mr-3"></i>622514535</p>
                        <p>
                            <i class="fas fa-print mr-3"></i>958451254</p>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center text-black-50 py-3">© 2018 Copyright:
                <a class="dark-grey-text" href="http://nicolasfiguerasparras.com">Nicolás Figueras Parras</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!--/Footer de libre contenido--> 
        
        
        
        <!--Script modal-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
        <?php
            echo "
                <script>
                    $(window).on('load',function(){
                        $('#modalInicio').modal('show');
                    });
                </script>
            ";
        ?>
        <!--/Script modal-->
        
        <!--Scroll to top-->
        <script>
            $(window).scroll(function() {
                if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                    $('#return-to-top').fadeIn(200);    // Fade in the arrow
                } else {
                    $('#return-to-top').fadeOut(200);   // Else fade out the arrow
                }
            });
            $('#return-to-top').click(function() {      // When arrow is clicked
                $('body,html').animate({
                    scrollTop : 0                       // Scroll to top of body
                }, 500);
            });
        </script>
    </body>
</html>
