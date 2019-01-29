<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a aria-label="Index" class="navbar-brand" href="index.php">
                <img src="../logo.webp" alt="" height="40vh"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../Noticias/noticias.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Noticias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Noticias/insertarNoticia.php">Nueva</a>
                            <a class="dropdown-item" href="../Noticias/borrarNoticia.php">Borrar</a>
                            <a class="dropdown-item" href="../Noticias/buscarNoticia.php">Buscar</a>
                            <a class="dropdown-item" href="../Noticias/noticias.php">Ver todas las noticias</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../Clientes/clientes.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Clientes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Clientes/nuevoCliente.php">Nuevo</a>
                            <a class="dropdown-item" href="../Clientes/buscarCliente.php">Buscar</a>
                            <a class="dropdown-item" href="../Clientes/clientes.php">Ver todos los clientes</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../Trabajos/trabajos.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Trabajos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Trabajos/nuevoTrabajo.php">Nuevo</a>
                            <a class="dropdown-item" href="../Trabajos/borrarTrabajo.php">Borrar</a>
                            <a class="dropdown-item" href="../Trabajos/buscarTrabajo.php">Buscar</a>
                            <a class="dropdown-item" href="../Trabajos/trabajos.php">Ver todos los trabajos</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../Citas/citas.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Citas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Citas/nuevaCita.php">Nueva</a>
                            <a class="dropdown-item" href="../Citas/borrarCita.php">Borrar</a>
                            <a class="dropdown-item" href="../Citas/buscarCita.php">Buscar</a>
                            <a class="dropdown-item" href="../Citas/citas.php">Ver todas las citas</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../Contacto/contacto.php">Contacto<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../Acceder/cerrarSesion.php">Cerrar sesión de administrador<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </body>
</html>
