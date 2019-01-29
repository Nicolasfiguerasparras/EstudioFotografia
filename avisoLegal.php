<!--Sacamos sesión-->
<?php
    session_start();
?>
<!--/Sacamos sesión-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aviso legal</title>
    </head>
    <body>
        <!--NavBar-->
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
        <br>
        
        <div class = "filaAviso row">
            <div class="accordion col-10 offset-1">
                <div class="margenLegal card">
                    <a data-toggle="collapse" data-target="#collap1" style="cursor:pointer">
                        <h4 class="h4AvisoLegal card-header">DATOS GENERALES</h4>
                    </a>
                    <div id="collap1" class="collapse">
                        <div class="cuadroLegal card-body">
                            <p class="card-text">
                                De acuerdo con el artículo 10 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico ponemos a su disposición los siguientes datos:
                                EFotograf está domiciliada en la calle de la Paz, nº 57 - Granada, España, con CIF Z-25663470. Inscrita en el Registro Mercantil de Granada, Vol. 3, Folio 3, Hoja 2, Inscripción 2.
                                En la web pictogram.com hay una serie de contenidos de carácter informativo sobre fotos.
                                Su principal objetivo es facilitar a los clientes y al público en general, la información relativa a la empresa, a los productos y servicios que se ofrecen.
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            EFotograf.LTD
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "filaAviso row">
            <div class="accordion col-10 offset-1">
                <div class="margenLegal card">
                    <a data-toggle="collapse" data-target="#collap2" style="cursor:pointer">
                        <h4 class="h4AvisoLegal card-header">POLÍTICA DE PRIVACIDAD</h4>
                    </a>
                    <div id="collap2" class="collapse">
                        <div class="cuadroLegal card-body">
                            <p class="card-text">
                                En cumplimiento de lo dispuesto en la Ley Orgánica 15/1999, de 13 de Diciembre, de Protección de Datos de Carácter Personal (LOPD) se informa al usuario que todos los datos que nos proporcione serán incorporados a un fichero, creado y mantenido bajo la responsabilidad de EFotograf
                                Siempre se va a respetar la confidencialidad de sus datos personales que sólo serán utilizados con la finalidad de gestionar los servicios ofrecidos, atender a las solicitudes que nos plantee, realizar tareas administrativas, así como remitir información técnica, comercial o publicitaria por vía ordinaria o electrónica.
                                Para ejercer sus derechos de oposición, rectificación o cancelación deberá dirigirse a la sede de la empresa calle de la Paz, nº 57 - Granada, España, escribirnos al siguiente correo pictogram_contacto@gmail.com o llámanos al 958677425.
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            EFotograf.LTD
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "filaAviso row">
            <div class="accordion col-10 offset-1">
                <div class="margenLegal card">
                    <a data-toggle="collapse" data-target="#collap3" style="cursor:pointer">
                        <h4 class="h4AvisoLegal card-header">CONDICIONES DE USO</h4>
                    </a>
                    <div id="collap3" class="collapse">
                        <div class="cuadroLegal card-body">
                            <p class="card-text">
                                Las condiciones de acceso y uso del presente sitio web se rigen por la legalidad vigente y por el principio de buena fe comprometiéndose el usuario a realizar un buen uso de la web. No se permiten conductas que vayan contra la ley, los derechos o intereses de terceros.
                                Ser usuario de la web de pictogram.com implica que reconoce haber leído y aceptado las presentes condiciones y lo que las extienda la normativa legal aplicable en esta materia. Si por el motivo que fuere no está de acuerdo con estas condiciones no continúe usando esta web.
                                Cualquier tipo de notificación y/o reclamación solamente será válida por notificación escrita y/o correo certificado.
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            EFotograf.LTD
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "filaAviso row">
            <div class="accordion col-10 offset-1">
                <div class="margenLegal card">
                    <a data-toggle="collapse" data-target="#collap4" style="cursor:pointer">
                        <h4 class="h4AvisoLegal card-header">RESPONSABILIDADES</h4>
                    </a>
                    <div id="collap4" class="collapse">
                        <div class="cuadroLegal card-body">
                            <p class="card-text">
                                EFotograf no se hace responsable de la información y contenidos almacenados en foros, redes sociales o cualesquier otro medio que permita a terceros publicar contenidos de forma independiente en la página web del prestador.
                                Sin embargo, teniendo en cuenta los art. 11 y 16 de la LSSI-CE, EFotograf se compromete a la retirada o en su caso bloqueo de aquellos contenidos que pudieran afectar o contravenir la legislación nacional o internacional, derechos de terceros o la moral y el orden público.
                                Tampoco la empresa se responsabilizará de los daños y perjuicios que se produzcan por fallos o malas configuraciones del software instalado en el ordenador del internauta. Se excluye toda responsabilidad por alguna incidencia técnica o fallo que se produzca cuando el usuario se conecte a internet. Igualmente no se garantiza la inexistencia de interrupciones o errores en el acceso al sitio web.
                                Así mismo, EFotograf se reserva el derecho a actualizar, modificar o eliminar la información contenida en su página web, así como la configuración o presentación del mismo, en cualquier momento sin asumir alguna responsabilidad por ello.
                                Le comunicamos que cualquier precio que pueda ver en nuestra web será solamente orientativo. Si el usuario desea saber con exactitud el precio o si el producto en el momento actual cuenta con alguna oferta de la cual se puede beneficiar ha de acudir a alguna de las tiendas físicas con las que cuenta EFotograf.
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            EFotograf.LTD
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "filaAviso row">
            <div class="accordion col-10 offset-1">
                <div class="margenLegal card">
                    <a data-toggle="collapse" data-target="#collap5" style="cursor:pointer">
                        <h4 class="h4AvisoLegal card-header">PROPIEDAD INTELECTUAL E INDUSTRIAL</h4>
                    </a>
                    <div id="collap5" class="collapse">
                        <div class="cuadroLegal card-body">
                            <p class="card-text">
                                EFotograf es titular de todos los derechos sobre el software de la publicación digital así como de los derechos de propiedad industrial e intelectual referidos a los contenidos que se incluyan, a excepción de los derechos sobre productos y servicios de carácter público que no son propiedad de esta empresa.
                                Ningún material publicado en esta web podrá ser reproducido, copiado o publicado sin el consentimiento por escrito de EFotograf
                                Toda la información que se reciba en la web, como comentarios, sugerencias o ideas, se considerará cedida a EFotograf de manera gratuita. No debe enviarse información que NO pueda ser tratada de este modo.
                                Todos los productos y servicios de estas páginas que NO son propiedad de EFotograf son marcas registradas de sus respectivos propietarios y son reconocidas como tales por nuestra empresa. Solamente aparecen en la web de EFotograf a efectos de promoción y de recopilación de información. Estos propietarios pueden solicitar la modificación o eliminación de la información que les pertenece.
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            EFotograf.LTD
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "filaAviso row">
            <div class="accordion col-10 offset-1">
                <div class="margenLegal card">
                    <a data-toggle="collapse" data-target="#collap6" style="cursor:pointer">
                        <h4 class="h4AvisoLegal card-header">LEY APLICABLE Y JURISDICCIÓN</h4>
                    </a>
                    <div id="collap6" class="collapse">
                        <div class="cuadroLegal card-body">
                            <p class="card-text">
                                Las presentes condiciones generales se rigen por la legislación española. Para cualquier litigio que pudiera surgir relacionado con el sitio web o la actividad que en él se desarrolla serán competentes Juzgados de Granada, renunciando expresamente el usuario a cualquier otro fuero que pudiera corresponderle.
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            EFotograf.LTD
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "filaAviso row">
            <div class="accordion col-10 offset-1">
                <div class="margenLegal card">
                    <a data-toggle="collapse" data-target="#collap7" style="cursor:pointer">
                        <h4 class="h4AvisoLegal card-header">POLÍTICA DE COOKIES</h4>
                    </a>
                    <div id="collap7" class="collapse">
                        <div class="cuadroLegalLast card-body">
                            <p class="card-text">
                                EFotograf por su propia cuenta o la de un tercero contratado para prestación de servicios de medición, pueden utilizar cookies cuando el usuario navega por el sitio web. Las cookies son ficheros enviados al navegador por medio de un servicio web con la finalidad de registrar las actividades del usuario durante su tiempo de navegación.
                                Las cookies utilizadas se asocian únicamente con un usuario anónimo y su ordenador, y no proporcionan por sí mismas los datos personales del usuario.
                                Mediante el uso de las cookies resulta posible que el servidor donde se encuentra la web reconozca el navegador web utilizado por el usuario con la finalidad de que la navegación sea más sencilla. Se utilizan también para medir la audiencia y parámetros del tráfico, controlar el proceso y número de entradas.
                                El usuario tiene la posibilidad de configurar su navegador para ser avisado de la recepción de cookies y para impedir su instalación en su equipo. Por favor consulte las instrucciones y manuales de su navegador para ampliar esta información.
                                Para utilizar el sitio web no es necesario que el usuario permita la instalación de las cookies enviadas al sitio web, o el tercero que actúe en su nombre, sin perjuicio de que sea necesario que el usuario inicie una sesión tal en cada uno de los servicios cuya prestación requiera el previo registro.
                                En todo caso las cookies tienen un carácter temporal con la única finalidad de hacer más eficaz su transmisión ulterior. En ningún caso se utilizará cookies para recoger información de carácter personal.
                            </p>
                        </div>
                        <div class="finLegal card-footer text-muted">
                            EFotograf
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
