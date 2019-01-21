<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contacto</title>
    </head>
    <body>
        <!--NavBar-->
        <?php
            if(isset($_SESSION['user'])){
                if($_SESSION['user']=='admin'){
                    include('../NavBar/navBarAdmin.php');
                }else{
                    include('../NavBar/navBarClient.php');
                }
            }else{
                include('../NavBar/navBarClearUser.php');
            }
        ?>
        <!--/NavBar-->
        
        <br><br>
        <form>
            <h2 style="text-align: center">
                ¡Contacta con nosotros y te contestaremos lo antes posible!
            </h2>
            <div class="form-row">
                <div class="form-group col-5 offset-1">
                    <label for="inputName">Nombre</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Arturo Pérez Fernandez">
                </div>
                <div class="form-group col-5">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="you@example.com">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-5 offset-1">
                    <label for="inputAddress">Dirección</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group col-5">
                    <label for="inputAddress2">Dirección 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, estudio, etc">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-3 offset-1">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-5">
                    <label for="inputContinent">Continente</label>
                    <select id="inputContinent" class="form-control">
                        <option selected>Escoge continente...</option>
                        <option>Norte América</option>
                        <option>Sur América</option>
                        <option>África</option>
                        <option>Ásia</option>
                        <option>Europa</option>
                        <option>Oceanía</option>
                        <option>Antártida</option>
                    </select>
                </div>
                <div class="form-group col-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>
            <div class="form-group offset-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="suscripcion">
                    <label class="form-check-label" for="suscripcion">
                        Suscribirme al boletín de noticias
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary offset-1">Enviar</button>
        </form>
        <?php

        ?>
    </body>
</html>
