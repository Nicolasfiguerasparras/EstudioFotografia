# EstudioFotografia
INDEX:
    - Mostrar advertencia de uso de cookies hasta que se acepten
    - Cambiar imágenes para que no se pixelen
    Footer:
        - Añadir enlaces a distintas páginas de la web
        - Añadir titular de la web
        - Añadir numero de inscripción del registro del negocio
        - Añadir CIF
        - Añadir enlace a la página que contiene los datos de información general del sitio web (crear dicha página)
CITAS:
    - Poner calendario de mes anterior y mes próximo para que se tenga perspectiva de las citas
    - Detectar el mes para sacar todas las citas en ese mes y crear un link por cada elemento de día en el que haya una cita
    - Añadir tooltip con información referente a la cita
DB:
    - Crear usuario admin(usr:admin;passwd:admin;id:0)
NAVBAR:
    - Crear y añadir logo en lugar de "Estudio de Fotografía"
ACCESO:
    - Controlar submit del formulario y crear cookies
GENERAL:
    - Añadir al menos una fuente cargada mediante la inclusión de un link de cabecera
    - Añadir una flecha de subida que esté siempre presente en la esquina inferior derecha
    - Acceso USUARIO:
        -INDEX:
            - NavBar:
                - Inicio
                - Trabajos
                - Acceder
                - Contacto
            - Imagen aleartoria de los trabajos
            - 3 últimas noticias
            - Footer
        - LOGIN:
            - Field para usr&pass
            - OptCase para mantener sesión abierta
    - Acceso CLIENTE (post login):
        - INDEX:
            - NavBar:
                - Inicio
                - Mis trabajos
                - Mis datos personales
                - Mis citas
                - Contacto
                - Cerrar sesión de <nombre_cliente>
        - Mis trabajos:
            - Trabajos comprados a lo largo del tiempo
        -Mis datos personales:
            - Datos que la empresa tiene de él
            - Podrá modificar:
                - Contraseña
                - Dirección
                - Teléfonos
        - Mis citas:
            - Citas que ha tenido o tendrá (solo consulta, no modificación)
        - Trabajos disponibles:
            - Listado de trabajos disponibles:
                - Resumen de trabajo (img, titulo y precio)
                - Botón ver más para acceder a toda la información del trabajo (idea: colapse)
    - Acceso ADMINISTRADOR:
        - CREAR, MODIFICAR, BORRAR O CONSULTAR (CLIENTES, TRABAJOS, NOTICIAS O CITAS)
        - INDEX:
            - NavBar:
                - Cambiar "acceder" por "Cerrar sesión de administrador"
09/01/2019 ->
    INDEX:
        + Cambio los links del NavBar del Index
        + Añado cookie para detectar primer acceso a la página web
        + Cambio colores del index
        + Añado titular y contenid o correspondientes a las imágenes en el carousel
10/01/2019 ->
    INDEX:
        + Cambiar el ver más por un collapse en el mismo index
    ACCESO:
        + Crear página de acceso
11/01/2019 ->
    ACCESO:
        + Formateo de la página
    INDEX:
        + Cambio de colores
        + Solución problema collapse