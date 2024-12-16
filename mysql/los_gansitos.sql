-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 11:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `los_gansitos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `id_evento`, `id_servicio`, `monto`) VALUES
(7, 34, 7, 0),
(8, 34, 8, 0),
(9, 36, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `provincia` varchar(100) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `invitados` int(11) NOT NULL,
  `costo` int(11) NOT NULL DEFAULT 100000,
  `estado` enum('pendiente','aprobado','rechazado') NOT NULL DEFAULT 'pendiente',
  `privacidad` enum('privado','publico') NOT NULL DEFAULT 'privado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `id_usuario`, `nombre`, `descripcion`, `fecha`, `provincia`, `direccion`, `invitados`, `costo`, `estado`, `privacidad`) VALUES
(34, 2, 'Boda', 'Boda para 100 personas', '2024-12-16 22:33:34', 'Cartago', 'Barrio Amon', 100, 3100000, 'aprobado', 'privado'),
(35, 2, 'Evento Libre', 'Evento para todo publico', '2024-12-25 06:00:00', 'San José', 'Barrio Amon', 80, 100000, 'pendiente', 'publico'),
(36, 1, 'prueba', 'Prueba11', '2024-12-16 22:40:32', 'San José', 'Barrio Amon', 80, 1700000, 'pendiente', 'publico');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `descripcion`, `costo`) VALUES
(7, 'Catering', 'Un servicio profesional que puede incluir la comida, las bebidas, la mantelería, los cubiertos, y el servicio de camareros, cocineros, y personal de limpieza.', 20000),
(8, 'Servicio de cóctel', 'Los camareros sirven la comida y la bebida con bandejas desde la cocina o puntos estratégicos de barras interiores. ', 10000),
(9, 'Carga y descarga', 'Se encarga del traslado de materiales durante el montaje y el desmontaje, evitando cualquier daño posible.', 1000),
(10, 'Seguridad e higiene', 'Contar con un recinto donde se cumplan las normas sanitarias, como ventilación, distancia de seguridad, hidrogeles, limpieza con maquinaria especializada, etc. ', 2000),
(11, 'Brunch', 'Un servicio habitual para eventos y reuniones entre la hora del desayuno y el almuerzo. ', 5000),
(12, 'Sonido y animación. ', 'Podemos contar con un equipo que anime el evento y que lo haga más dinámico. Siempre será algo divertido sin que interrumpa en las charlas o el trabajo de los profesionales.', 4000),
(13, 'Servicio de fotografía.', ' También se puede contratar los servicios de un fotógrafo profesional para plasmar los mejores momentos del evento y que los asistentes se hagan fotos en un photocall con los logotipos de las empresas patrocinadoras y organizadores del evento.', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `rol`) VALUES
(1, 'admin', '12345', 'admin'),
(2, 'cliente', '12345', 'cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `evento_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
