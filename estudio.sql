-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2018 a las 01:46:37
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estudio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(5) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `lugar` varchar(35) NOT NULL,
  `id_cliente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `motivo`, `lugar`, `id_cliente`) VALUES
(5, '2018-12-13', '11:26', 'Entrevista de trabajo', 'Calle Camarón', 2),
(6, '2018-12-15', '16:34', 'Intercambio de fotografías', 'Plaza Einstein', 7),
(7, '2018-12-12', '15:54', 'Presentación proyecto', 'Escuela Arte Granada', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono1` varchar(9) NOT NULL,
  `telefono2` varchar(9) DEFAULT NULL,
  `nick` varchar(15) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `direccion`, `telefono1`, `telefono2`, `nick`, `contraseña`) VALUES
(0, 'Disponible', '', '', '', '', '', ''),
(1, 'Juan Manuel', 'Cristobal Soria', 'Calle Manuél Fdez. 3, n12', '945168465', '', 'Jmamuel', 'jmanuel45196'),
(2, 'Alberto ', 'Garcia Montor', 'Calle Alhóndiga 5, n8', '648974568', '958468795', 'Al65', 'Alhue80'),
(3, 'Francisco ', 'Roca Gutierrez', 'Calle Francisco Ayala 9, n17', '649785432', '', 'fr578', 'cels9075'),
(4, 'Fernando ', 'Garzon Contreras', 'Calle Sancho Panza 90, n 4', '648795465', '977458126', 'ferGarCon', '.garCon7846.'),
(5, 'Alfredo', 'Sanchez Jimenez', 'Calle imventada 5, n3', '649874568', '', 'frodoGaspar', 'pedro247'),
(6, 'Estefania', 'Moreno Carrillo', 'Calle Iris 5, n 34º', '722468975', '945876898', 'sfdk23', 'sjoleyo'),
(7, 'Sandra ', 'Caballer Puig', 'Calle Catalana 5, n75', '754468975', '', 'Sr_ita4', 'shlue896'),
(8, 'Asuncion', 'Molina Villamar', 'Calle Reyes Católicos 5, n 6', '645123897', '745846897', 'Asuiter007', 'bond'),
(9, 'Tania', 'Calvo Marañon', 'Calle Javier de Miguel 5, n 4', '741000369', '900468798', 'tania27', 'hayluzenEstaCanción'),
(10, 'Rocio', 'Alvarez Mesana', 'Calle Patricia 5, n 87', '741258887', '', 'rololo', 'asthuer74?'),
(11, 'Juan', 'Valjuan Rodriguez', 'Calle Soria 5, n 66', '945687954', '844597865', 'iron_man', 'backjack');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titular` varchar(35) NOT NULL,
  `contenido` varchar(2000) NOT NULL,
  `imagen` varchar(80) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titular`, `contenido`, `imagen`, `fecha`) VALUES
(3, 'Sonríe España', '	\r\n\r\nLos muñecos regionales sonríen con cierta actitud desafiante cara a la navidad en la Plaza Mayor. Pero, ¿por qué los chulapos madrileños se carcajean a gusto con el clavel en la frente o la solapa, mientras el resto se limita a posar con gesto de circunstancias? ¿Por qué los anfitriones parecen mucho más contentos y joviales que las demás provincias representadas? En esta imagen sin perspectiva clara reina el barullo. Impone su ley el guirigay disfrazado con trajes típicos y poses autóctonas en la antesala de un certamen de coros y danzas. Resulta antigua, pero aún podemos extraer de ella ciertas lecciones prácticas. Ninguna identidad sobresale por encima de otra. Salvo por la talla de los chulapos, nadie se siente más que nadie. Al menos, en el escaparate. Algunos buscan su refugio entre el arco de los abanicos. Los lunares se entrecruzan con los encajes, las ondas de fallera con los moños, las enaguas y las fajas con monteras y delantales, en una extraña cohesión no exenta de caos, proclive a la fiesta por encima del diálogo. Pura metáfora de ese guiñol kitsch que se empeña a veces en ser España.', 'img/3.jpg', '2018-12-05'),
(4, 'En busca de la luz perfecta', 'La mochila se me clava en los hombros y me hace sentir cada uno de los 22 kilos del equipo fotográfico que llevo encima. He perdido la cuenta del número de veces que he visitado esta remota zona desértica de Nuevo México. A pesar de ser una de las más fantásticas localizaciones que conozco, hasta ahora no he conseguido fotografiarla con una luz que esté a la altura de su carácter único. Se anuncian fuertes tormentas y las nubes se empiezan a volver más densas y oscuras. Tengo que apurar la marcha. Esta vez no se me puede escapar. Después de casi tres décadas viajando con mi cámara y mi trípode por el mundo, me he dado cuenta de que la habilidad que me ha resultado más difícil de cultivar como fotógrafo es la paciencia. Lo cual añade el ingrediente menos valorado, pero el más importante en la fotografía de paisaje: el tiempo. Tiempo para comprender las cualidades de la luz, la influencia de las estaciones y de la meteorología, y sobre todo tiempo para entender la esencia del paisaje.\r\n\r\nEn una época en la que necesitamos colmar con inmediatez nuestros anhelos, eso significa estar dispuesto a regresar a casa con las manos vacías a ­pesar de las caminatas, los madrugones, de sufrir tórridas temperaturas en el desierto o el gélido aliento del ­invierno polar. Y todo esto casi siempre en soledad. Gracias a esta perseverancia, hay ocasiones en las que el azar se pone de mi parte. Es ese instante en el que todo encaja y un paisaje único es iluminado por una luz extraordinaria. Yo soy un testigo cuyo papel es congelarlo en una imagen irrepetible, levantando acta como un notario de la luz. En ese momento revelador cobra sentido todo el esfuerzo, los días, meses e incluso años de intentos sin fruto.\r\n\r\nYa es casi de madrugada cuando llego a mi tienda de campaña, tan mojado y lleno de barro como ­feliz, conocedor de que llevo la imagen soñada en mi ­cámara.?', 'img/4.jpg', '2018-12-20'),
(5, ' Test de Rorschach', 'HAY FOTOGRAFÍAS QUE no parecen fotografías, sino el principio de un pensamiento: he aquí una espiral, la concha de un caracol, la manifestación física de la geometría fractal de Mandelbrot, el ojo de un huracán, un remolino, un sumidero, el váter tras activar la cisterna, el final del aparato excretor, las cloacas del Estado, los círculos del infierno, Vértigo, Hitchcock, el comisario Villarejo, el laberinto de la democracia, con la globalización y el auge de los nacionalismos al fondo. Hay imágenes que no parecen imágenes, sino un test de Rorschach. Esto no es más que una escalera, le respondería el doctor, la del hotel Bristol Kempinski, en Berlín, fotografiada el pasado 12 de noviembre.', 'img/5.jpg', '2018-12-10'),
(6, 'Dave Heath: la melancólica rapsodia', 'El centro Le Bal presenta en París la mayor exposición dedicada al artista en Europa. Reúne 150 obras  junto con la maqueta de A Dialogue with Solitude, libro que publicado en 1965 constituye su obra más señera. La obra se exhibe en diálogo con tres piezas del cine independiente americano de dicha época que abordan el tema de la soledad: Salesman (1968), de Albert y David Maysle y Charlotte Mitchell Zwerin, Portrait of Jason (1966), de Shirley Clarke, y The Savage Eye (1960), de Ben Maddow, Sydney Meyers y Joseph Strick.\r\nPrácticamente autodidacta, Heath es reconocido “entre los fotógrafos más eruditos de la segunda parte del siglo XX”, como apunta Francesco Zanot en el catálogo que acompaña a la muestra. Su obra se sitúa como un híbrido entre la fotografía documental y experimental. “Poseía un profundo conocimiento de la técnica, de la historia y de la teoría de la fotografía”. Ansiaba alcanzar una mente “creativamente libre”, definida por la conciencia de uno mismo, la conciencia histórica, y la conciencia metodológica. “La cuestión de la identidad, no es solo una constante en obra de este fotógrafo americano sino de hecho su catalizador”, matiza.', 'img/6.jpg', '2018-12-23'),
(7, 'Vincent van Gogh era su hermano', 'Era una de las dos únicas fotos conocidas de Vicent van Gogh, tomada supuestamente cuando el pintor holandés tenía 13 años. Pero la imagen de un joven de rostro serio sobre fondo sepia ha resultado ser una instantánea de su hermano menor, Theo, retratado a los 15, según anunció ayer el Museo Van Gogh de Ámsterdam, en cuyos fondos documentales se hallaba. El descubrimiento obligará a corregir muchas publicaciones sobre la obra del artista, pues la foto se incluye en catálogos y folletos y ha aparecido en múltiples exposiciones. Al pintor que dejó tantos autorretratos no le gustaban ni la fotografía ni posar, y para la posteridad solo quedará de él una instantánea tomada cuando tenía 19 años.', 'img/7.jpg', '2018-12-05'),
(8, 'Alcobendas, capital de la fotografí', 'Marcada con trazos blancos, negros y de colores en el calendario expositivo madrileño de los próximos dos meses, la foto española tiene una cita ineludible con Alcobendas. No es exagerado decir que, durante ese tiempo, esta localidad se va a convertir en epicentro del panorama fotográfico de la Comunidad de Madrid. Con motivo de la celebración del 25 aniversario de la Colección Pública de Fotografía de Alcobendas se han programado una serie de actividades que engloban la presentación de cinco exposiciones, junto a la realización de distintas iniciativas paralelas como tertulias, clases magistrales, encuentros y visitas guiadas, que ocuparán íntegramente todos los espacios expositivos de la ciudad, incluyendo también dos museos al aire libre -lo que supone una acertada manera de aproximar el medio fotográfico a la ciudadanía.\r\n\r\nEsta amplia variedad de iniciativas corre en paralelo a la propia diversidad de la colección (la mejor selección de foto pública en España, con un total de 825 imágenes pertenecientes a más de 170 fotógrafos), que ya desde sus inicios apostó por recoger todas las tendencias existentes dentro del mundo de la imagen en nuestro país. En este sentido, hay que destacar el buen hacer y el criterio de José María Díaz-Maroto, actual conservador de la colección y comisario de las exposiciones, quien recogió con acierto el testigo iniciado en 1993 por Manuel Sonseca. ', 'img/8.jpg', '2018-12-20'),
(9, 'I Open de Fotografía Submarina ‘Cos', ' El Ayuntamiento de San Andrés y Sauces estrenó con éxito el I Open de Fotografía Submarina Costa de San Andrés y Sauces, un certamen deportivo y con aspiraciones de promoción turística que ha nacido con vocación de continuidad para consolidarse como punto de encuentro de los deportistas amantes del submarinismo en la costa del municipio, informan en nota de prensa.\r\n\r\nEl alcalde de San Andrés y Sauces, Francisco Paz, destaca el trabajo municipal previo para establecer este certamen, del que manifestó, “supone un mecanismo más de promoción, como destino turístico y para la práctica de este deporte en un municipio que aspira un aprovechamiento sostenible de sus costas”. El alcalde, que defiende la continuidad del proyecto a medio y largo plazo, resaltó “el atractivo que presenta la costa del municipio y la sana convivencia del certamen entre medio ambiente, sostenibilidad, desarrollo y actividad para pequeñas y medianas empresas de la localidad, y como mecanismo de concienciación para la conservación y protección del litoral”.\r\n\r\nDesde el Ayuntamiento, en un balance general tras el desarrollo de la prueba, se destacan las excelentes condiciones marítimas y climatológicas para la celebración del Fotosub, permitiendo a los deportistas inscritos realizar inmersiones y captar imágenes singulares.\r\n\r\nEn contraste con el verde de la vegetación terrestre en San Andrés y Sauces, su fondo marino con veriles, arcos, cuevas, diques, fondos arenosos y zonas intermareales, fue el gran escenario utilizado por los fotógrafos amateurs,  aficionados que quisieron estrenarse en el mundo de la fotografía submarina.', 'img/9.jpg', '2018-12-20'),
(10, 'Fotografía salvaje', 'La sede del Colegio Oficial de Arquitectos de Madrid (COAM) acoge hasta el próximo 9 de diciembre la exposición de un centenar de imágenes seleccionadas, de las más de 45.000 presentadas al concurso de fotografía sobre naturaleza «Wildlife Photographer of the Year 2018» que, convocado por el Museo de Historia Natural de Londres, reconoce arte, técnica y sensibilidad ambiental, y con las que se trata de transmitir la belleza de la naturaleza al mismo tiempo que fomentar el conocimiento y el respeto hacia la vida natural. Esta muestra llega a Madrid tras su presentación en la capital británica el pasado 19 de octubre, siendo una de las primeras sedes en exhibirla.\r\n\r\nEl objetivo de este galardón es promover el trabajo de los fotógrafos de naturaleza, reconociendo no sólo el trabajo de profesionales, sino también el de los reporteros aficionados y premiar a los últimos en diversas categorías, como niños, jóvenes y adultos.\r\n\r\nEl ganador de la edición de este año es el holandés Marsel van Oosten por la fotografía titulada «La pareja dorada», que muestra dos monos dorados de nariz chata. La imagen fue tomada en el bosque de las montañas chinas de Qinling, único hábitat de estos primates que se encuentran en peligro de extinción, recordando la fragilidad de los ecosistemas, muy amenazados y alterados por la actividad humana. «Leoparda relajada» es la instantánea reconocida en la categoría juvenil. Obra de la joven de 16 años, Skye Meaker, retrata a una hembra de leopardo despertándose en la reserva de caza Mashatu, situada al este de Botsuana.', 'img/10.jpg', '2018-12-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `titulo` varchar(35) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float(8,2) NOT NULL,
  `id_cliente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `imagen`, `titulo`, `descripcion`, `precio`, `id_cliente`) VALUES
(6, 'img/6.jpg', 'El primer trabajo del año', 'El apasionante mundo del arte se mezcla con la realidad para dar lugar a esta majestuosidad', 125.00, 0),
(7, 'img/7.jpg', 'Naturaleza Humana', 'En este trabajo se fusionan humano y naturaleza para crear una sensación de belleza inigualable', 110.00, 0),
(8, 'img/8.jpg', 'Ro(ck)', 'Trabajo personalizado para una guitarrista llena de pasion y roll', 180.00, 10),
(9, 'img/9.jpg', 'Return to Gray', 'Este impactante trabajo nos pone antiguas imagenes superpuestas en sus lugares contemporáneos', 300.00, 4),
(10, 'img/10.jpg', 'Blue Ridge Mountains', 'Este fantástico proyecto de nuestro fotógrafo estrella te sumergirá en las nevadas laderas de las Bl', 599.00, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
