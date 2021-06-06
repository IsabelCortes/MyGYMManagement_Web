-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2021 a las 07:24:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mygymmanagement`
--
CREATE DATABASE IF NOT EXISTS `mygymmanagement` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mygymmanagement`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bmi_calc`
--

CREATE TABLE `bmi_calc` (
  `cod_bmi` int(11) NOT NULL,
  `date` date NOT NULL,
  `weight` float NOT NULL,
  `height` int(3) NOT NULL,
  `bmi` float NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bmi_calc`
--

INSERT INTO `bmi_calc` (`cod_bmi`, `date`, `weight`, `height`, `bmi`, `user`) VALUES
(1, '2021-06-02', 76, 171, 25.99, 1),
(2, '2021-06-02', 75, 171, 25.65, 1),
(3, '2021-06-02', 75, 171, 25.65, 1),
(5, '2021-06-03', 74, 167, 26.53, 1),
(6, '2021-06-05', 79, 171, 27.02, 1),
(7, '2021-06-05', 32, 217, 6.8, 1),
(8, '2021-06-05', 32, 217, 6.8, 1),
(9, '2021-06-05', 71, 160, 27.73, 1),
(10, '2021-06-05', 56, 171, 19.15, 1),
(11, '2021-06-05', 56, 190, 15.51, 1),
(12, '2021-06-05', 70, 180, 21.6, 1),
(13, '2021-06-05', 95, 180, 29.32, 1),
(14, '2021-06-05', 110, 180, 33.95, 1),
(15, '2021-06-05', 125, 180, 38.58, 1),
(16, '2021-06-05', 232, 180, 71.6, 1),
(17, '2021-06-06', 50, 171, 17.1, 5),
(18, '2021-06-06', 90, 171, 30.78, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercise`
--

CREATE TABLE `exercise` (
  `cod_exercise` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(255) NOT NULL,
  `execution` text NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `exercise`
--

INSERT INTO `exercise` (`cod_exercise`, `name`, `info`, `execution`, `link`) VALUES
(1, 'Press sentado con mancuernas', 'Ejercicio básico para fortalecer hombros y trapecio en el que levantaremos unas mancuernas sentados en un banco con la espalda resta.', 'Siéntese en un banco con la espalda erguida y apoyada y sostenga las mancuernas con las palmas de las manos boca abajo, en un agarre pronado.\r\n<br>1- Levante las mancuernas hasta la altura de los hombros para iniciar el movimiento, y luego estire los brazos casi por completo.\r\n<br>2- Baje las mancuernas hasta la altura del cuello y repita el movimiento.', 'pcUdkiCNh_c'),
(2, 'Remo vertical con barra', 'Ejercicio básico de hombros, en el que también trabajaremos bíceps y trapecio, que realizaremos de pie y con una barra.', 'De pie, sostenga la barra con las palmas de las manos hacia adentro.\r\n<br>1- Levante la barra en la dirección de la barbilla, dejando los codos lo más alto posible.\r\n<br>2- Baje la barra lentamente de nuevo a la posición inicial y repita el movimiento.', 'z7jqwDbajh4'),
(3, 'Press de banca plano con barra', 'Uno de los ejercicios más conocidos para entrenar pectorales, se realiza tumbado en un banco plano y con barra', 'Se acostará en un banco recto con la espalda apoyada, manteniendo el cuerpo rígido. Sostenga la barra con la palma de las manos hacia arriba, en un agarre pronado. La distancia entre las manos debe ser un poco mayor que la distancia entre sus hombros.\r\n<br>1- Levante la barra hasta que los brazos estén casi estirados.\r\n<br>2- Baje la barra lentamente hasta la altura del pectoral y repita el movimiento.', '6RexLioSoMQ'),
(4, 'Aperturas con mancuernas en banco inclinado', 'Uno de los ejercicios básicos para entrenar pectoral con mancuernas, se puede realizar también en banco plano', 'Siéntese en un banco inclinado y sostenga las mancuernas encima del tórax con los brazos ligeramente flexionados y las palmas de las manos giradas entre sí.\r\n<br>1- Baje las mancuernas lateralmente llevando los pesos hasta el nivel del tórax.\r\n<br>2- Levante las mancuernas de nuevo a la posición inicial y repita el movimiento.', 'bhRTIO31e-E'),
(5, 'Curl de bíceps con barra', 'Ejercicio básico para entrenar bíceps, de pie y con barra.', 'Manténgase de pie con los pies alineados con los hombros. Sostenga la barra con los brazos ligeramente extendidos y las palmas de las manos hacia arriba, en un agarre supinado.\r\n<br>1- Levante la barra lentamente hasta la altura de los hombros.\r\n<br>2- Vuelva a la posición inicial y repita el movimiento', 'qC0yZwpF9Ew'),
(6, 'Abdominal crunch', 'Uno de los ejercicios más conocidos, esencial para trabajar el abdomen, pero hay que realizarlo de manera correcta para no dañar la espalda.', 'Se acostará con los pies apoyados en el suelo y las rodillas flexionadas.\r\n<br>1- Levante la parte superior de la espalda hacia las rodillas.\r\n<br>2- Vuelva a la posición inicial y repita el movimiento.', 'OsUz898onTE'),
(7, 'Plancha lateral', 'Ejercicio fundamental para trabajar el abdomen y los oblicuos, difícil de ejecutar correctamente al inicio.', 'Acostarse de lado, apoyar el codo en el suelo y mantener las piernas unidas. Apoye la otra mano en la cintura o en la cabeza y levante la cadera.\r\n<br>1- Quédate en esta posición con el abdomen contraído el máximo de tiempo que puedas.\r\n<br>2- Repita el movimiento con el otro lado del cuerpo.', 'zfiOU4yxLKo'),
(8, 'Abdominales alternos', 'Los abdominales alternos o también conocidos como abdominales oblicuos es un ejercicio fundamental para trabajar el abdomen y los oblicuos.', 'Se acostará con los pies apoyados en el suelo y las rodillas flexionadas.\r\n<br>1- Levantar la parte superior de la espalda y accionar el movimiento rotacional del tronco, llevando un codo hacia la rodilla opuesta.\r\n<br>2- Vuelve a la posición inicial y repite el movimiento del otro lado del cuerpo.', '3xBFyjLGWTU'),
(9, 'Abductores en máquina', 'Ejercicio específico para entrenar abductores, aunque también trabajaremos un poco los glúteos.', 'Siéntese en la máquina, con la espalda apoyada y las piernas dentro de las almohadillas laterales.\r\n<br>1- Aleje las piernas, dejándolas lo más lejos posible una de la otra.\r\n<br>2- Vuelva las piernas a la posición inicial hasta que estén casi juntas, y repita el movimiento.', 'A5Bz9bSPKUA'),
(10, 'Abductores en polea baja', 'Ejercicio básico para entrenar abductores, no confundir con el ejercicio similar para entrenar aductores.', 'Manténgase de pie con el lateral del cuerpo orientado hacia la polea. Fije el cable de la polea en el tobillo de la pierna a ser trabajada, que será opuesta a la polea.\r\n<br>1- Levante lateralmente la pierna trabajada lo máximo posible.\r\n<br>2- Vuelva a la posición inicial y repita el movimiento.', 'tMvppH03tr4'),
(11, 'Aductores en máquina', 'Ejercicio muy similar al de abductores en máquina, para trabajar aductores tendremos que hacer fuerza al cerrar las piernas.', 'Siéntese en la máquina con la espalda apoyada. Sostenga los pestillos, y apoye los pies en los laterales de la máquina.\r\n<br>1- Aproxime las piernas lo máximo posible.\r\n<br>2- Vuelva lentamente a la posición inicial y repita el movimiento.', '_G1X-qYw7_w'),
(12, 'Extensión de piernas en máquina', 'Uno de los ejercicios más conocidos de entrenamiento del tronco inferior, concretamente trabaremos el cuádriceps con este ejercicio-', 'Siéntese en la máquina, y coloque los pies debajo de los rodillos.\r\n<br>1- Levante las piernas hacia arriba hasta que las rodillas estén casi estiradas.\r\n<br>2- Baje las piernas de nuevo a la posición inicial, con las rodillas dobladas a 90 grados, y repita el movimiento.', 'r7ZMTzfiICA'),
(13, 'Prensa de piernas inclinada', 'Un ejercicio muy completo para trabajar el tronco inferior en el que activaremos prácticamente la totalidad de músculos de las piernas.', 'Acuéstese en la máquina y apoye los pies en la plataforma. Deje el tronco y la cabeza apoyados en el respaldo.\r\n<br>1- Desciende el peso doblando las rodillas, formando un ángulo de 90 grados.\r\n<br>2- Levante el peso de nuevo a la posición inicial y repita el movimiento.', 'VljDsFudTok'),
(14, 'Press francés con barra en banco plano', 'Una de las variantes del press francés, en este caso con barra y tumbado en banco plano.', 'Se acostará en un banco recto con la espalda hacia abajo y los pies totalmente apoyados en el suelo.\r\nSostenga la barra con las palmas de las manos boca arriba, en un agarre pronado.\r\n<br>1- Baje la barra flexionando los brazos manteniendo la barra hacia su frente.\r\n<br>2- Levante la barra de vuelta a la posición inicial y repita el movimiento.', 'Loxe7Gh-fwc'),
(15, 'Remo horizontal en polea baja', 'El ejercicio típico de remo para trabajar la espalda, en el que también activaremos los brazos.', 'Siéntese en el asiento, coloque los pies en la plataforma y deje las rodillas ligeramente flexionadas.\r\n<br>1- Tire del peatón hacia el abdomen proyectando los hombros hacia atrás y el pecho hacia adelante. Mantenga la espalda estática, evitando balances.\r\n<br>2- Vuelva a la posición inicial hasta que los brazos queden casi estirados. Deje que los hombros estén ligeramente proyectados hacia adelante y repita el movimiento.', 'P6INB55u7ks'),
(16, 'Jalón frontal inclinado polea alta con agarre cerrado', 'Con este ejercicio, también llamado comúnmente jalón al pecho o polea al pecho, activamos una amplia zona muscular.', 'Siéntese en la máquina de polea alta y sostenga la barra de la polea alta con las palmas de las manos boca abajo, en un agarre pronado. Deje la distancia entre las manos más pequeño que una palma para hacer el agarre cerado.\r\n<br>1- Tire de la barra hacia abajo hacia el pectoral.\r\n<br>2- Vuelva con la barra a la posición inicial hasta que sus brazos y hombros queden levemente extendidos y repita el movimiento.', 'jxZKSTqh6JM'),
(17, 'Hiperextensiones', 'Las hiperextensiones o extensión del tronco es un ejercicio en el que trabajaremos principalmente los lumbares, pero también ampliamente la zona del abdomen.', 'Se coloca boca abajo en el banco de hiperextensiones. Apoye los talones en los soportes acolchados del asiento y sostenga una arandela junto a su pecho.\r\n<br>1- Levante la parte superior del cuerpo hasta que la cadera y la cintura estén extendidas.\r\n<br>2- Baje la parte superior del cuerpo manteniendo la espalda recta. Vuelva a la posición inicial y repita el movimiento.', 'Dd27xSYbjb8'),
(18, 'Flexión de piernas sentado en máquina', 'No confundir este ejercicio con la extensión de piernas, haremos fuerza al bajar las piernas para trabajar los isquiotibiales  y las pantorrillas.', 'Siéntese y se acomoda en la máquina.\r\n<br>1- Presione el rodillo hacia atrás hasta que sus piernas estén flexionadas en un ángulo de 90 grados.\r\n<br>2- Vuelva lentamente a la posición inicial y repita el movimiento.', '1To5mHH2zEc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercise_muscle`
--

CREATE TABLE `exercise_muscle` (
  `cod_exercise_muscle` int(11) NOT NULL,
  `exercise` int(11) NOT NULL,
  `muscle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `exercise_muscle`
--

INSERT INTO `exercise_muscle` (`cod_exercise_muscle`, `exercise`, `muscle`) VALUES
(1, 1, 1),
(2, 1, 10),
(3, 2, 1),
(4, 2, 10),
(5, 2, 3),
(6, 3, 2),
(7, 3, 6),
(8, 3, 11),
(9, 4, 2),
(10, 4, 1),
(11, 5, 3),
(12, 5, 6),
(13, 6, 4),
(14, 7, 4),
(15, 7, 5),
(16, 8, 4),
(17, 8, 5),
(18, 9, 7),
(19, 9, 14),
(20, 10, 7),
(21, 10, 14),
(22, 11, 8),
(23, 12, 9),
(24, 13, 9),
(25, 13, 14),
(26, 13, 8),
(27, 13, 15),
(28, 14, 11),
(29, 15, 3),
(30, 15, 10),
(31, 15, 1),
(32, 15, 12),
(33, 16, 1),
(34, 16, 3),
(35, 16, 10),
(36, 16, 12),
(37, 17, 4),
(38, 17, 13),
(39, 18, 15),
(40, 18, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muscle`
--

CREATE TABLE `muscle` (
  `cod_muscle` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `muscle`
--

INSERT INTO `muscle` (`cod_muscle`, `name`) VALUES
(4, 'Abdomen'),
(7, 'Abductores'),
(8, 'Aductores'),
(6, 'Antebrazo'),
(3, 'Bíceps'),
(9, 'Cuádriceps'),
(12, 'Dorsales'),
(14, 'Glúteos'),
(1, 'Hombros'),
(15, 'Isquiotibiales'),
(13, 'Lumbares'),
(5, 'Oblicuos'),
(16, 'Pantorrillas'),
(2, 'Pectorales'),
(10, 'Trapecio'),
(11, 'Tríceps');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routine`
--

CREATE TABLE `routine` (
  `cod_routine` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(999) NOT NULL,
  `objective` int(11) NOT NULL,
  `difficulty` int(11) NOT NULL,
  `user_created` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `routine`
--

INSERT INTO `routine` (`cod_routine`, `name`, `info`, `objective`, `difficulty`, `user_created`) VALUES
(9, 'Aumentar Masa Muscular ', 'Desarrolla tu masa muscular y obtén un físico imponente. Esta división de entrenamiento consiste en entrenar músculos grandes y pequeños en equilibrio. Todas las rutinas estimulan un músculo principal y sus músculos relacionados: la receta clásica para adquirir una estética perfecta.', 1, 1, 0),
(10, 'Cuerpo Completo II', 'Al ejercitar a un grupo muscular directamente una vez por semana, los músculos quedarán en estado de crecimiento unos pocos días después del entrenamiento. Pero si dejas pasar una semana entera entre cada sesión, estarás perdiendo una segunda oportunidad (y quizás una tercera) para estimular el crecimiento muscular.', 1, 2, 0),
(11, 'Fuerza y Volumen Muscular', 'La fuerza y la masa muscular están directamente relacionadas y se complementan entre sí. Rutinas periódicas son esenciales para obtener más fuerza y para sacarte del estancamiento y aumentar tu rendimiento.', 1, 3, 0),
(12, 'Perder Peso y Tonificar', 'Elimina la grasa corporal y gana masa muscular con facilidad. Este programa de entrenamiento se enfoca en la definición corporal y fue diseñado para practicantes de musculación que están en la fase de transición de principiante a intermedio. Esta rutina es adecuada para aquellos que desean perder peso y tonificar sus músculos.', 2, 1, 0),
(13, 'Intensidad Máxima', 'El descanso activo es una técnica ideal para las personas que priorizan un entrenamiento rápido y dinámico, pero con la misma eficiencia que un entrenamiento ordinario. Esta técnica consiste en descansar el músculo trabajado en un ejercicio durante el entrenamiento mientras se realiza otro. Hemos preparado una rutina de entrenamiento con la técnica de descanso activo en todos los ejercicios, haciendo que el entrenamiento sea más rápido y dinámico.', 2, 2, 0),
(14, 'Construyendo el Cuerpo Perfecto', 'La espalda, cuando está bien desarrollada, es responsable de la famosa forma en V deseada por la mayoría de la audiencia masculina que practica musculación. Hemos preparado una rutina de entrenamiento para el crecimiento muscular general, centrándose en la musculatura de la espalda asociada con la quema de grasa.', 2, 3, 0),
(15, 'Pierde Peso con Salud', 'Tener el peso adecuado es importante para mantener la salud y garantizar la buena estética corporal deseada por hombres y mujeres. Esta rutina de entrenamiento fue preparada para que pierdas peso y consigas un cuerpo visiblemente atractivo.', 3, 1, 0),
(16, 'Entrenamiento acelerado', 'El descanso activo es una técnica ideal para las personas que priorizan un entrenamiento rápido y dinámico, pero con la misma eficiencia que un entrenamiento ordinario. Esta técnica consiste en descansar el músculo trabajado en un ejercicio durante el entrenamiento mientras se realiza otro. Hemos preparado una rutina de entrenamiento con la técnica de descanso activo en todos los ejercicios, haciendo que el entrenamiento sea más rápido y dinámico.', 3, 2, 0),
(17, 'Construyendo el Cuerpo Perfecto II', 'La espalda, cuando está bien desarrollada, es responsable de la famosa forma en V deseada por la mayoría de la audiencia masculina que practica musculación. Hemos preparado una rutina de entrenamiento para el crecimiento muscular general, centrándose en la musculatura de la espalda asociada con la quema de grasa.', 3, 3, 0),
(18, 'Nombre de prueba', 'Info de prueba', 2, 3, 1),
(19, 'dsa', 'asd', 2, 1, 1),
(20, 'sadas', 'asdads', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routine_color`
--

CREATE TABLE `routine_color` (
  `cod_color` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hex_code` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `routine_color`
--

INSERT INTO `routine_color` (`cod_color`, `name`, `hex_code`) VALUES
(6, 'Amarillo', '#FFFF00'),
(5, 'Azul', '#0000FF'),
(7, 'Cian', '#00FFFF'),
(8, 'Magenta', '#FF00FF'),
(3, 'Rojo', '#FF0000'),
(4, 'Verde', '#00FF00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routine_difficulty`
--

CREATE TABLE `routine_difficulty` (
  `cod_difficulty` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `routine_difficulty`
--

INSERT INTO `routine_difficulty` (`cod_difficulty`, `type`) VALUES
(3, 'Avanzada'),
(2, 'Intermedia'),
(1, 'Principante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routine_exercise`
--

CREATE TABLE `routine_exercise` (
  `cod_routine_exercise` int(11) NOT NULL,
  `routine` int(11) NOT NULL,
  `exercise` int(11) NOT NULL,
  `sets` int(2) NOT NULL,
  `repetitions` int(3) NOT NULL,
  `load` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `routine_exercise`
--

INSERT INTO `routine_exercise` (`cod_routine_exercise`, `routine`, `exercise`, `sets`, `repetitions`, `load`) VALUES
(2, 9, 1, 3, 15, 50),
(3, 9, 2, 2, 20, 25),
(4, 10, 3, 4, 6, 35),
(5, 10, 4, 3, 8, 15),
(6, 11, 5, 3, 15, 25),
(7, 11, 6, 2, 40, 30),
(8, 12, 7, 3, 10, 40),
(9, 12, 8, 3, 12, 35),
(10, 13, 9, 5, 6, 15),
(11, 13, 10, 3, 12, 60),
(12, 14, 11, 2, 30, 10),
(13, 14, 12, 3, 8, 30),
(14, 15, 13, 2, 15, 32.5),
(15, 15, 14, 3, 8, 25),
(16, 16, 15, 3, 10, 12.5),
(17, 16, 16, 3, 9, 25),
(18, 17, 17, 3, 5, 12.5),
(19, 17, 18, 2, 40, 20),
(20, 2, 19, 1, 1, 0),
(21, 2, 19, 2, 3, 2),
(22, 2, 19, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routine_objective`
--

CREATE TABLE `routine_objective` (
  `cod_objective` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `routine_objective`
--

INSERT INTO `routine_objective` (`cod_objective`, `type`) VALUES
(2, 'Definición'),
(1, 'Hipertrofia'),
(3, 'Perder Peso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `premium` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `age`, `username`, `password`, `email`, `premium`) VALUES
(1, 'Admin', 0, 'admin', '$2y$10$LqacqHOmnW01vV4mlUs5ouLjPJZTMe24LZ68Vw5HuK6sb3fgfAfmC', 'admin@aeroprueba.es', 1),
(5, 'User prueba', 13, 'prueba', '$2y$10$W1k6H.4aQGvujolvN13MluN1EkBDYbGW23USw4Ogg5oTlKUmO6zWa', 'prueba@prueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_routine`
--

CREATE TABLE `user_routine` (
  `cod_user_routine` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `routine` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `monday` tinyint(1) NOT NULL,
  `tuesday` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL,
  `saturday` tinyint(1) NOT NULL,
  `sunday` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_routine`
--

INSERT INTO `user_routine` (`cod_user_routine`, `user`, `routine`, `color`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(8, 1, 9, 7, 1, 0, 1, 0, 0, 1, 0),
(9, 1, 12, 8, 0, 0, 0, 1, 1, 1, 0),
(10, 1, 11, 5, 0, 1, 0, 1, 0, 1, 0),
(11, 1, 18, 3, 1, 0, 1, 0, 1, 0, 1),
(12, 5, 9, 6, 0, 0, 0, 0, 0, 0, 0),
(13, 5, 19, 6, 0, 0, 0, 0, 0, 0, 0),
(14, 5, 20, 6, 1, 1, 0, 1, 1, 1, 1),
(15, 5, 9, 5, 1, 1, 0, 0, 0, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bmi_calc`
--
ALTER TABLE `bmi_calc`
  ADD PRIMARY KEY (`cod_bmi`);

--
-- Indices de la tabla `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`cod_exercise`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Indices de la tabla `exercise_muscle`
--
ALTER TABLE `exercise_muscle`
  ADD PRIMARY KEY (`cod_exercise_muscle`);

--
-- Indices de la tabla `muscle`
--
ALTER TABLE `muscle`
  ADD PRIMARY KEY (`cod_muscle`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`cod_routine`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `routine_color`
--
ALTER TABLE `routine_color`
  ADD PRIMARY KEY (`cod_color`),
  ADD UNIQUE KEY `name` (`name`,`hex_code`);

--
-- Indices de la tabla `routine_difficulty`
--
ALTER TABLE `routine_difficulty`
  ADD PRIMARY KEY (`cod_difficulty`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indices de la tabla `routine_exercise`
--
ALTER TABLE `routine_exercise`
  ADD PRIMARY KEY (`cod_routine_exercise`);

--
-- Indices de la tabla `routine_objective`
--
ALTER TABLE `routine_objective`
  ADD PRIMARY KEY (`cod_objective`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `user_routine`
--
ALTER TABLE `user_routine`
  ADD PRIMARY KEY (`cod_user_routine`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bmi_calc`
--
ALTER TABLE `bmi_calc`
  MODIFY `cod_bmi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `exercise`
--
ALTER TABLE `exercise`
  MODIFY `cod_exercise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `exercise_muscle`
--
ALTER TABLE `exercise_muscle`
  MODIFY `cod_exercise_muscle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `muscle`
--
ALTER TABLE `muscle`
  MODIFY `cod_muscle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `routine`
--
ALTER TABLE `routine`
  MODIFY `cod_routine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `routine_color`
--
ALTER TABLE `routine_color`
  MODIFY `cod_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `routine_difficulty`
--
ALTER TABLE `routine_difficulty`
  MODIFY `cod_difficulty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `routine_exercise`
--
ALTER TABLE `routine_exercise`
  MODIFY `cod_routine_exercise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `routine_objective`
--
ALTER TABLE `routine_objective`
  MODIFY `cod_objective` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user_routine`
--
ALTER TABLE `user_routine`
  MODIFY `cod_user_routine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
