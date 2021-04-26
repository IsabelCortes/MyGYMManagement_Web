-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2021 a las 19:03:36
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
  `weight` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `bmi` float NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercise_muscle`
--

CREATE TABLE `exercise_muscle` (
  `cod_exercise_muscle` int(11) NOT NULL,
  `exercise` int(11) NOT NULL,
  `muscle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muscle`
--

CREATE TABLE `muscle` (
  `cod_muscle` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routine`
--

CREATE TABLE `routine` (
  `cod_routine` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(255) NOT NULL,
  `objective` int(11) NOT NULL,
  `difficulty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routine_difficulty`
--

CREATE TABLE `routine_difficulty` (
  `cod_difficulty` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routine_exercise`
--

CREATE TABLE `routine_exercise` (
  `cod_routine_exercise` int(11) NOT NULL,
  `exercise` int(11) NOT NULL,
  `routine` int(11) NOT NULL,
  `load` int(3) NOT NULL,
  `repetitions` int(3) NOT NULL,
  `sets` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `routine_objective`
--

CREATE TABLE `routine_objective` (
  `cod_objective` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_routine`
--

CREATE TABLE `user_routine` (
  `cod_user_routine` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `routine` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `monday` tinyint(1) NOT NULL,
  `tuesday` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL,
  `saturday` tinyint(1) NOT NULL,
  `sunday` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`cod_exercise`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `exercise_muscle`
--
ALTER TABLE `exercise_muscle`
  ADD PRIMARY KEY (`cod_exercise_muscle`);

--
-- Indices de la tabla `muscle`
--
ALTER TABLE `muscle`
  ADD PRIMARY KEY (`cod_muscle`);

--
-- Indices de la tabla `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`cod_routine`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `routine_difficulty`
--
ALTER TABLE `routine_difficulty`
  ADD PRIMARY KEY (`cod_difficulty`),
  ADD UNIQUE KEY `color` (`color`);

--
-- Indices de la tabla `routine_exercise`
--
ALTER TABLE `routine_exercise`
  ADD PRIMARY KEY (`cod_routine_exercise`);

--
-- Indices de la tabla `routine_objective`
--
ALTER TABLE `routine_objective`
  ADD PRIMARY KEY (`cod_objective`);

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
-- AUTO_INCREMENT de la tabla `exercise`
--
ALTER TABLE `exercise`
  MODIFY `cod_exercise` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `exercise_muscle`
--
ALTER TABLE `exercise_muscle`
  MODIFY `cod_exercise_muscle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `muscle`
--
ALTER TABLE `muscle`
  MODIFY `cod_muscle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `routine`
--
ALTER TABLE `routine`
  MODIFY `cod_routine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `routine_difficulty`
--
ALTER TABLE `routine_difficulty`
  MODIFY `cod_difficulty` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `routine_exercise`
--
ALTER TABLE `routine_exercise`
  MODIFY `cod_routine_exercise` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `routine_objective`
--
ALTER TABLE `routine_objective`
  MODIFY `cod_objective` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_routine`
--
ALTER TABLE `user_routine`
  MODIFY `cod_user_routine` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
