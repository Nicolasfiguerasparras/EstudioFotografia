-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2019 a las 09:35:55
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
(2, '2018-12-06', '12:30', 'Pagar Trabajo', 'Oficina', 11),
(3, '2018-12-22', '18:00', 'Solicitud de Trabajo', 'Oficinas', 6),
(4, '2019-01-01', '10:00', 'Sesion de fotos con Yusef', 'Alhambra', 1);

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
(0, 'Disponible', '', '', '', '', 'admin', 'admin'),
(1, 'Juan Manuel', 'Cristobal Soria', 'Calle Calcará 3, nº 12', '652451356', '', 'jManuel', 'manuel312'),
(2, 'Alberto ', 'Garcia Montor', 'Calle Luis Miguel 5, nº 8', '624153465', '958462134', 'aGarcia7', '77448Garcia'),
(3, 'Francisco ', 'Roca Gutierrez', 'Calle Tortosa 9, nº 17', '722154685', '', 'franRoca17', '722Gutierrez'),
(4, 'Fernando ', 'Garzon Contreras', 'Calle Alcahueta 90, nº 4', '645128468', '958451624', 'fGarCon', 'Contreras25'),
(5, 'Alfredo', 'Sanchez Jimenez', 'Calle imventada 5, n3', '684512354', '', 'forodo90', 'gamyee'),
(6, 'Estefania', 'Moreno Carrillo', 'Calle Comodoro 5, nº 34', '615489654', '922451654', 'eMoreno13', 'morenoCarrillo'),
(7, 'Sandra ', 'Caballer Puig', 'Calle Francés 5, nº 75', '612451548', '', 'sandraPuig', 'CabbaPuig5'),
(8, 'Asuncion', 'Molina Villamar', 'Calle Neptunio 5, nº 6', '612457854', '955487651', 'Asuiter007', 'bond'),
(9, 'Tania', 'Calvo Marañon', 'Calle Cuatro 5, nº 4', '741000369', '923050696', 'tanit4', 'marañonVeinte'),
(10, 'Rocio', 'Alvarez Mesana', 'Calle Galante 5, nº 87', '741258887', '', 'asturMolina', 'ruber34'),
(11, 'Nicolás', 'Figueras Parras', 'Calle Nicolás', '654215543', '954854512', 'nicopafi', 'nicopafi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titular` varchar(200) NOT NULL,
  `contenido` varchar(2000) NOT NULL,
  `imagen` varchar(80) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titular`, `contenido`, `imagen`, `fecha`) VALUES
(3, 'Así será la tecnología en 2019', 'Es el lugar en el que todas las compañías que dedican a fabricar tecnología deben estar. El CES (por las siglas en inglés de Consumer Electronics Show, o feria de electrónica de consumo) se celebra desde 1967, y aquí se han anunciado inventos como la grabadora de vídeo VHS, el CD, la televisión en alta definición, el Blu-Ray o las impresoras 3D. Este año han pasado por esta feria, que se cerró en Las Vegas (EE UU) este sábado, 180.000 asistentes, 4.500 exhibidores y 6.000 periodistas. No se han realizado grandes anuncios pero sí se han confirmado tendencias como la esperada llegada del 5G, la omnipresencia de los televisores con definición 8K o la inteligencia artificial destinada a conectar todos los dispositivos que hay en nuestra vida, incluyendo coches y lavadoras. Y también ha estado presente la única compañía tecnológica que se permite el lujo de estar ausente cada año, Apple: tanto Samsung como LG han anunciado un acuerdo para que el software de la compañía esté presente en sus televisores, un acuerdo más relevante de lo que parece y que podría indicar que las pobres ventas del iPhone están obligando a la firma fundada por Steve Jobs a poner fin a su tradicional política de aislamiento.', 'img/3.jpg', '2018-12-05'),
(4, 'La coalición de Gobierno griega se rompe a causa del acuerdo con Macedonia', 'El primer ministro griego, Alexis Tsipras, y su socio de Gobierno, el líder de los nacionalistas Griegos Independientes (Anel) y ministro de Defensa del país, Panos Kammenos, negociaron hoy la fractura de la coalición de Gobierno por sus diferencias ante la inminente entrada en el Parlamento heleno del acuerdo con Macedonia.\r\n\r\n\"Ha habido colaboración durante cuatro años en un Gobierno de unidad nacional. Conseguimos sacar al país de los memorandos. Nuestro primer objetivo ha sido conseguido. El problema con Macedonia no me permite no sacrificar mi puesto\", anunció Kammenos tras reunirse con Tsipras.\r\n\r\nEsta reunión estaba prevista para el viernes pero la negociación de los pormenores del divorcio de la coalición que gobierna Grecia desde enero de 2015 se retrasó hasta hoy, mientras el Parlamento macedonio conseguía aprobar la noche del viernes los cambios en la Constitución necesarios para que el país se llame Macedonia del Norte.', 'img/4.jpg', '2018-12-20'),
(5, 'Una gélida ciudad de cuento', 'La nieve ha teñido de blanco los tejados de pizarra del casco antiguo de la localidad alemana de Freudenberg. Situada en el corazón del Estado federado de Renania del Norte-Westfalia —cerca de la ciudad de Siegen—, esta joya urbana es conocida por sus picudas e idénticas casas: encaladas, con entramados de madera y alineadas en perfecta formación a los lados de las estrechas calles de adoquines. Los edificios, de origen medieval, fueron reconstruidos en el siglo XVII, después de que las llamas los devoraran. Por suerte, sus habitantes decidieron reproducir los originales. A aquella sabia decisión deben hoy una sólida industria turística.?', 'img/5.jpg', '2018-12-10'),
(6, 'Selección Natural pasó el rodillo en Industrial Copera', 'Selección Natural, el conjunto formado por Oscar Mulero, Reeko y Exium, cuatro de los pilares donde se sustenta la escena techno española pasaron un auténtico rodillo anoche en la sala granadina.\r\n\r\nLa expectación que creó el anuncio de la visita de Selección Natural a Granada se vio reflejada en una sala repleta y el cartel de «no hay billetes» en la puerta. Clubbers llegados desde diferentes puntos de la península esperaban con afán la segunda cita de los de Pole Group en España.\r\n\r\nPara la gente de a pie este sábado pudo pasar como otro cualquiera, sin embargo, el tiempo dará el valor que se merece a esta noche, cuando el techno volvió a escribir una página de oro en Granada.\r\n\r\nEn cuanto a lo musical, cinco horas de set en las que Selección Natural no se movió de su guión preestablecido allá por mayo de 2018, donde ellos mismos explicaban que en este proyecto «no encontrarás interludios ambientales, ni himnos, ni grandes interrupciones … cada pieza de esta creación ha sido diseñada para las mejores pistas de baile. Texturas ásperas mezcladas con ritmos sólidos y líneas continuas de sintetizador, techno en esencia creado por aquellos que nunca abandonaron el barco en tiempos difíciles: pioneros en la banda sonora del futuro«.\r\n\r\n5 horas de conexión plena entre los cuatro, provocando que el baile llegara hasta la extenuación por parte de un público muy entregado a la causa.', 'img/6.jpg', '2018-12-23'),
(7, 'Vincent van Gogh era su hermano', 'Era una de las dos únicas fotos conocidas de Vicent van Gogh, tomada supuestamente cuando el pintor holandés tenía 13 años. Pero la imagen de un joven de rostro serio sobre fondo sepia ha resultado ser una instantánea de su hermano menor, Theo, retratado a los 15, según anunció ayer el Museo Van Gogh de Ámsterdam, en cuyos fondos documentales se hallaba. El descubrimiento obligará a corregir muchas publicaciones sobre la obra del artista, pues la foto se incluye en catálogos y folletos y ha aparecido en múltiples exposiciones. Al pintor que dejó tantos autorretratos no le gustaban ni la fotografía ni posar, y para la posteridad solo quedará de él una instantánea tomada cuando tenía 19 años.', 'img/7.jpg', '2018-12-05'),
(8, 'Primera vicepresidenta del Congreso inauguró edición del Parlamento Joven', 'La primera vicepresidenta del Congreso, Rosa María Bartra, invocó a los jóvenes a velar por la igualdad, justicia y democracia, durante la inauguración de una nueva edición del Parlamento Joven\r\n \r\n\"Necesitamos políticos con valor, comprometidos\", dijo la legisladora, recordando que se inscribieron en este encuentro de jóvenes políticos 10 mil aspirantes, entre los 18 y 29 años, de los cuales se capacitaron virtualmente 3,500 de Lima Metropolitana y la mayoría de ellos con altas notas aprobatorias.\r\n\r\nEl Parlamento Joven eligió hoy a su Mesa Directiva para el presente periodo parlamentario.\r\n\r\nEl acto electoral y juramentación se efectuó en el auditorio José Faustino Sánchez Carrión y en él fueron electos: Diego Pomareda, como presidente; Jimena Huanca Miranda, primera vicepresidenta; Azleen Solís Arce, segunda vicepresidenta; y Fernando Vega Portugal, como tercer vicepresidente.\r\n\r\nEl Parlamento Joven está compuesto por 67 damas y 53 varones, cuyas edades fluctúan entre 18 y 29 años. Ellos fueron seleccionados entre 3,500 aspirantes de la región Lima.\r\n\r\nHugo Rovira, encargado de la organización del Parlamento Joven, sostuvo que un Parlamento es la expresión máxima de la democracia basado en principios importantes como la libertad, igualdad y tolerancia.\r\n\r\nEl ejercicio democrático del Parlamento Joven continuará hasta mañana y los representantes se dividieron en cinco comisiones de trabajo donde discutirán iniciativas legislativas de importancia para ese sector de la población.', 'img/8.jpg', '2018-12-20'),
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
(1, 'img/1.jpg', 'Naturaleza Humana', 'En este trabajo se fusionan humano y naturaleza para crear una sensación de belleza inigualable', 110.00, 3),
(2, 'img/2.jpg', 'Ro(ck)', 'Trabajo personalizado para una guitarrista llena de pasion y roll', 180.00, 10),
(3, 'img/3.jpg', 'Pintada a mano', 'Naturaleza muerta de pintura al óleo', 270.99, 3),
(9, 'img/9.jpg', 'Return to Gray', 'Este impactante trabajo nos pone antiguas imagenes superpuestas en sus lugares contemporáneos', 300.00, 11),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
