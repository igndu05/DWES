-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-12-2025 a las 09:17:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_horarios_exam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id_aula`, `nombre`) VALUES
(1, 'PATIO 2'),
(2, 'PATIO 3'),
(3, 'PATIO 1'),
(4, '112'),
(5, '522'),
(6, '105'),
(7, '102'),
(8, '314'),
(9, '203'),
(10, '103'),
(11, '526'),
(12, '601'),
(13, '401'),
(14, '403'),
(15, '405'),
(16, '422'),
(17, '426'),
(18, '411'),
(19, '413'),
(20, '416'),
(21, '201'),
(22, '404'),
(23, '402'),
(24, '406'),
(25, '514'),
(26, '417'),
(27, '412'),
(28, '302'),
(29, '424'),
(30, '111'),
(31, '312'),
(32, '423'),
(33, '513'),
(34, '521'),
(35, '525'),
(36, '303'),
(37, '117'),
(38, '211'),
(39, '116'),
(40, '115'),
(41, '114'),
(42, 'TIC3'),
(43, '510'),
(44, '101'),
(45, '602'),
(46, '415'),
(47, '118'),
(48, '104'),
(49, '204'),
(50, '408'),
(51, '409'),
(52, '414'),
(53, '501'),
(54, '502'),
(55, 'GIMNASIO'),
(56, '113'),
(57, '425'),
(58, '202'),
(59, '313'),
(60, '524'),
(61, '512'),
(62, 'TIC2'),
(63, '301'),
(64, 'Sin asignar o sin aula'),
(65, 'TIC1'),
(66, 'MÚSICA'),
(67, '407');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre`) VALUES
(1, '1ESO A'),
(2, '1ESO B'),
(3, '1ESO C'),
(4, '1ESO D'),
(5, '1ESO E'),
(6, '1ESO F'),
(7, '1ESO G'),
(8, '1ESO H'),
(9, '2ESO A'),
(10, '2ESO B'),
(11, '2ESO C'),
(12, '2ESO D'),
(13, '2ESO E'),
(14, '2ESO F'),
(15, '2ESO G'),
(16, '3ESO A'),
(17, '3ESO C'),
(18, '3ESO B'),
(20, '3ESO D'),
(21, '3ESO E'),
(22, '3ESO F'),
(23, '3ESO G'),
(24, '4ESO A'),
(25, '4ESO B'),
(26, '4ESO C'),
(27, '4ESO D'),
(28, '4ESO E'),
(29, '4ESO F'),
(30, '1 FPB'),
(31, '2 FPB'),
(32, '1 BS A'),
(33, '1 BS B'),
(34, '1 BSH'),
(35, '1 BCT'),
(36, '1 B. ARTES'),
(37, '2 B. ARTES'),
(38, '2 BS'),
(39, '2 BSH'),
(40, '2 BCT'),
(41, '1 GA A'),
(42, '1 ITE'),
(43, '1 SMR'),
(44, '2 GA'),
(45, '2 ITE'),
(46, '2 SMR'),
(47, '1 AFI A'),
(48, '1 DWA'),
(49, '2 AFI A'),
(50, '2 DAW'),
(51, 'GUARD'),
(52, 'FDIR'),
(53, 'GEXP'),
(54, 'GJE'),
(55, '2 BPA'),
(56, '2 ESPA'),
(57, 'GBIB'),
(58, 'GCON'),
(59, '1 BPA'),
(60, 'GRECBIB'),
(61, 'GJEREC'),
(62, 'GREC-0'),
(63, '1 GA B'),
(64, '1 AFI B'),
(65, '2 AFI B'),
(66, 'GREC-1'),
(67, 'GREC-2'),
(68, 'GREC-3'),
(69, 'GREC-4'),
(70, 'GREC-5'),
(71, 'GREC-6'),
(72, 'GREC-7'),
(73, 'GREC-8'),
(74, 'GREC-9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_lectivo`
--

CREATE TABLE `horario_lectivo` (
  `id_horario` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `dia` int(1) NOT NULL,
  `hora` int(2) NOT NULL,
  `grupo` int(11) NOT NULL,
  `aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipo` enum('normal','admin') NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `usuario`, `clave`, `email`, `tipo`) VALUES
(1, 'Apellido1 Apellido2, NOMBRE1', 'profesor1', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(2, 'Apellido1 Apellido2, NOMBRE2', 'profesor2', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(3, 'Apellido1 Apellido2, NOMBRE3', 'profesor3', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(4, 'Apellido1 Apellido2, NOMBRE4', 'profesor4', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(5, 'Apellido1 Apellido2, NOMBRE5', 'profesor5', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(6, 'Apellido1 Apellido2, NOMBRE6', 'profesor6', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(7, 'Apellido1 Apellido2, NOMBRE7', 'profesor7', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(8, 'Apellido1 Apellido2, NOMBRE8', 'profesor8', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(9, 'Apellido1 Apellido2, NOMBRE9', 'profesor9', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(10, 'Apellido1 Apellido2, NOMBRE10', 'profesor10', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(11, 'Apellido1 Apellido2, NOMBRE11', 'profesor11', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(12, 'Apellido1 Apellido2, NOMBRE12', 'profesor12', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(13, 'Apellido1 Apellido2, NOMBRE13', 'profesor13', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(14, 'Apellido1 Apellido2, NOMBRE14', 'profesor14', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(15, 'Apellido1 Apellido2, NOMBRE15', 'profesor15', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(16, 'Apellido1 Apellido2, NOMBRE16', 'profesor16', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(17, 'Apellido1 Apellido2, NOMBRE17', 'profesor17', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(18, 'Apellido1 Apellido2, NOMBRE18', 'profesor18', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(19, 'Apellido1 Apellido2, NOMBRE19', 'profesor19', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(20, 'Apellido1 Apellido2, NOMBRE20', 'profesor20', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(21, 'Apellido1 Apellido2, NOMBRE21', 'profesor21', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(22, 'Apellido1 Apellido2, NOMBRE22', 'profesor22', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(23, 'Apellido1 Apellido2, NOMBRE23', 'profesor23', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(24, 'Apellido1 Apellido2, NOMBRE24', 'profesor24', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(25, 'Apellido1 Apellido2, NOMBRE25', 'profesor25', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(26, 'Apellido1 Apellido2, NOMBRE26', 'profesor26', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(27, 'Apellido1 Apellido2, NOMBRE27', 'profesor27', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(28, 'Apellido1 Apellido2, NOMBRE28', 'profesor28', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(29, 'Apellido1 Apellido2, NOMBRE29', 'profesor29', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(30, 'Apellido1 Apellido2, NOMBRE30', 'profesor30', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(31, 'Apellido1 Apellido2, NOMBRE31', 'profesor31', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(32, 'Apellido1 Apellido2, NOMBRE32', 'profesor32', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(33, 'Apellido1 Apellido2, NOMBRE33', 'profesor33', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(34, 'Apellido1 Apellido2, NOMBRE34', 'profesor34', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(35, 'Apellido1 Apellido2, NOMBRE35', 'profesor35', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(36, 'Apellido1 Apellido2, NOMBRE36', 'profesor36', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(37, 'Apellido1 Apellido2, NOMBRE37', 'profesor37', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(38, 'Apellido1 Apellido2, NOMBRE38', 'profesor38', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(39, 'Apellido1 Apellido2, NOMBRE39', 'profesor39', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(40, 'Apellido1 Apellido2, NOMBRE40', 'profesor40', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(41, 'Apellido1 Apellido2, NOMBRE41', 'profesor41', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(42, 'Apellido1 Apellido2, NOMBRE42', 'profesor42', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(43, 'Apellido1 Apellido2, NOMBRE43', 'profesor43', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(44, 'Apellido1 Apellido2, NOMBRE44', 'profesor44', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(45, 'Apellido1 Apellido2, NOMBRE45', 'profesor45', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(46, 'Apellido1 Apellido2, NOMBRE46', 'profesor46', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(47, 'Apellido1 Apellido2, NOMBRE47', 'profesor47', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(48, 'Apellido1 Apellido2, NOMBRE48', 'profesor48', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(49, 'Apellido1 Apellido2, NOMBRE49', 'profesor49', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(50, 'Apellido1 Apellido2, NOMBRE50', 'profesor50', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(51, 'Apellido1 Apellido2, NOMBRE51', 'profesor51', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(52, 'Apellido1 Apellido2, NOMBRE52', 'profesor52', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(53, 'Apellido1 Apellido2, NOMBRE53', 'profesor53', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(54, 'Apellido1 Apellido2, NOMBRE54', 'profesor54', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(55, 'Apellido1 Apellido2, NOMBRE55', 'profesor55', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(56, 'Apellido1 Apellido2, NOMBRE56', 'profesor56', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(57, 'Apellido1 Apellido2, NOMBRE57', 'profesor57', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(58, 'Apellido1 Apellido2, NOMBRE58', 'profesor58', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(59, 'Apellido1 Apellido2, NOMBRE59', 'profesor59', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(60, 'Apellido1 Apellido2, NOMBRE60', 'profesor60', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(61, 'Apellido1 Apellido2, NOMBRE61', 'profesor61', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(62, 'Apellido1 Apellido2, NOMBRE62', 'profesor62', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(63, 'Apellido1 Apellido2, NOMBRE63', 'profesor63', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(64, 'Apellido1 Apellido2, NOMBRE64', 'profesor64', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(65, 'Apellido1 Apellido2, NOMBRE65', 'profesor65', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(66, 'Apellido1 Apellido2, NOMBRE66', 'profesor66', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(67, 'Apellido1 Apellido2, NOMBRE67', 'profesor67', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(68, 'Apellido1 Apellido2, NOMBRE68', 'profesor68', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(69, 'Apellido1 Apellido2, NOMBRE69', 'profesor69', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(70, 'Apellido1 Apellido2, NOMBRE70', 'profesor70', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(71, 'Apellido1 Apellido2, NOMBRE71', 'profesor71', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(72, 'Apellido1 Apellido2, NOMBRE72', 'profesor72', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(73, 'Apellido1 Apellido2, NOMBRE73', 'profesor73', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(74, 'Apellido1 Apellido2, NOMBRE74', 'profesor74', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(75, 'Apellido1 Apellido2, NOMBRE75', 'profesor75', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(76, 'Apellido1 Apellido2, NOMBRE76', 'profesor76', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(77, 'Apellido1 Apellido2, NOMBRE77', 'profesor77', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(78, 'Apellido1 Apellido2, NOMBRE78', 'profesor78', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(79, 'Apellido1 Apellido2, NOMBRE79', 'profesor79', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(80, 'Apellido1 Apellido2, NOMBRE80', 'profesor80', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(81, 'Apellido1 Apellido2, NOMBRE81', 'profesor81', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(82, 'Apellido1 Apellido2, NOMBRE82', 'profesor82', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(83, 'Apellido1 Apellido2, NOMBRE83', 'profesor83', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(84, 'Apellido1 Apellido2, NOMBRE84', 'profesor84', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(85, 'Apellido1 Apellido2, NOMBRE85', 'profesor85', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(86, 'Apellido1 Apellido2, NOMBRE86', 'profesor86', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(87, 'Apellido1 Apellido2, NOMBRE87', 'profesor87', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(88, 'Apellido1 Apellido2, NOMBRE88', 'profesor88', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(89, 'Apellido1 Apellido2, NOMBRE89', 'profesor89', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(90, 'Apellido1 Apellido2, NOMBRE90', 'profesor90', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(91, 'Apellido1 Apellido2, NOMBRE91', 'profesor91', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(92, 'Apellido1 Apellido2, NOMBRE92', 'profesor92', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(93, 'Apellido1 Apellido2, NOMBRE93', 'profesor93', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(94, 'Apellido1 Apellido2, NOMBRE94', 'profesor94', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(95, 'Apellido1 Apellido2, NOMBRE95', 'profesor95', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(96, 'Apellido1 Apellido2, NOMBRE96', 'profesor96', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(97, 'Apellido1 Apellido2, NOMBRE97', 'profesor97', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(98, 'Apellido1 Apellido2, NOMBRE98', 'profesor98', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(99, 'Apellido1 Apellido2, NOMBRE99', 'profesor99', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(100, 'Apellido1 Apellido2, NOMBRE100', 'profesor100', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(101, 'Apellido1 Apellido2, NOMBRE101', 'profesor101', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(102, 'Apellido1 Apellido2, NOMBRE102', 'profesor102', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(103, 'Apellido1 Apellido2, NOMBRE103', 'profesor103', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(104, 'Apellido1 Apellido2, NOMBRE104', 'profesor104', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(105, 'Apellido1 Apellido2, NOMBRE105', 'profesor105', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(106, 'Apellido1 Apellido2, NOMBRE106', 'profesor106', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(107, 'Apellido1 Apellido2, NOMBRE107', 'profesor107', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(108, 'Apellido1 Apellido2, NOMBRE108', 'profesor108', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(109, 'Apellido1 Apellido2, NOMBRE109', 'profesor109', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(110, 'Apellido1 Apellido2, NOMBRE110', 'profesor110', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(111, 'Apellido1 Apellido2, NOMBRE111', 'profesor111', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(112, 'Apellido1 Apellido2, NOMBRE112', 'profesor112', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(113, 'Apellido1 Apellido2, NOMBRE113', 'profesor113', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(114, 'Apellido1 Apellido2, NOMBRE114', 'profesor114', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(115, 'Apellido1 Apellido2, NOMBRE115', 'profesor115', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(116, 'Apellido1 Apellido2, NOMBRE116', 'profesor116', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(117, 'Apellido1 Apellido2, NOMBRE117', 'profesor117', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(118, 'Apellido1 Apellido2, NOMBRE118', 'profesor118', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(119, 'Apellido1 Apellido2, NOMBRE119', 'profesor119', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(120, 'Apellido1 Apellido2, NOMBRE120', 'profesor120', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(121, 'Apellido1 Apellido2, NOMBRE121', 'profesor121', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(122, 'Apellido1 Apellido2, NOMBRE122', 'profesor122', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(123, 'Apellido1 Apellido2, NOMBRE123', 'profesor123', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(124, 'Apellido1 Apellido2, NOMBRE124', 'profesor124', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'normal'),
(126, 'Administrador', 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `horario_lectivo`
--
ALTER TABLE `horario_lectivo`
  ADD PRIMARY KEY (`id_horario`),
  ADD UNIQUE KEY `usuario` (`usuario`,`grupo`,`aula`),
  ADD KEY `usuario_2` (`usuario`,`grupo`,`aula`),
  ADD KEY `aula` (`aula`),
  ADD KEY `grupo` (`grupo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `horario_lectivo`
--
ALTER TABLE `horario_lectivo`
  ADD CONSTRAINT `horario_lectivo_ibfk_1` FOREIGN KEY (`aula`) REFERENCES `aulas` (`id_aula`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `horario_lectivo_ibfk_2` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `horario_lectivo_ibfk_3` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
