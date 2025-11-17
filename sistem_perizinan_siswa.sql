-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2025 at 07:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_perizinan_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru_dashboard`
--

CREATE TABLE `guru_dashboard` (
  `IdGuru` int NOT NULL,
  `UserId` int NOT NULL,
  `NUPTK` varchar(100) NOT NULL,
  `NamaGuru` varchar(100) NOT NULL,
  `Mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru_dashboard`
--

INSERT INTO `guru_dashboard` (`IdGuru`, `UserId`, `NUPTK`, `NamaGuru`, `Mapel`) VALUES
(9071, 98765, '082233', 'ferlin', 'sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_dashboard`
--

CREATE TABLE `siswa_dashboard` (
  `IdStudent` varchar(200) NOT NULL,
  `UserId` varchar(200) NOT NULL,
  `NISN` varchar(200) NOT NULL,
  `NamaLengkap` varchar(200) NOT NULL,
  `KelasJurusan` varchar(200) NOT NULL,
  `NomorOrtu` varchar(200) NOT NULL,
  `Alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa_dashboard`
--

INSERT INTO `siswa_dashboard` (`IdStudent`, `UserId`, `NISN`, `NamaLengkap`, `KelasJurusan`, `NomorOrtu`, `Alamat`) VALUES
('343454', '1234567890', '2002987', 'rakhawar', 'XI PPLG', '08239987238', 'aws');

-- --------------------------------------------------------

--
-- Table structure for table `table_perizinan`
--

CREATE TABLE `table_perizinan` (
  `IdPerizinan` int NOT NULL,
  `IdStudent` int NOT NULL,
  `WaktuIzin` datetime NOT NULL,
  `TanggalMulai` date NOT NULL,
  `TanggalAkhir` date NOT NULL,
  `AlasanIzin` varchar(300) NOT NULL,
  `BuktiIzin` varchar(300) NOT NULL,
  `StatusIzin` enum('Pending','Diterima','Ditolak') NOT NULL,
  `DiSetujui_oleh` int NOT NULL,
  `TTL_persetujuan` datetime NOT NULL,
  `Catatan_guru` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_perizinan`
--

INSERT INTO `table_perizinan` (`IdPerizinan`, `IdStudent`, `WaktuIzin`, `TanggalMulai`, `TanggalAkhir`, `AlasanIzin`, `BuktiIzin`, `StatusIzin`, `DiSetujui_oleh`, `TTL_persetujuan`, `Catatan_guru`) VALUES
(9097887, 1234567890, '2025-12-17 14:50:00', '2025-12-17', '2025-12-18', 'sakit asma kambuh', 'foto obat', 'Diterima', 976865, '2025-12-17 00:00:00', 'cepat sembuh ya');

-- --------------------------------------------------------

--
-- Table structure for table `user_dashboard`
--

CREATE TABLE `user_dashboard` (
  `UserId` int NOT NULL,
  `NamaUser` varchar(100) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `role` enum('admin','guru','siswa') NOT NULL,
  `Dibuat_pada` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_dashboard`
--

INSERT INTO `user_dashboard` (`UserId`, `NamaUser`, `Password`, `role`, `Dibuat_pada`) VALUES
(1234567890, 'rakhawar', 'password123', 'siswa', '2025-11-17 06:40:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru_dashboard`
--
ALTER TABLE `guru_dashboard`
  ADD PRIMARY KEY (`IdGuru`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `siswa_dashboard`
--
ALTER TABLE `siswa_dashboard`
  ADD PRIMARY KEY (`IdStudent`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `table_perizinan`
--
ALTER TABLE `table_perizinan`
  ADD PRIMARY KEY (`IdPerizinan`),
  ADD KEY `IdStudent` (`IdStudent`);

--
-- Indexes for table `user_dashboard`
--
ALTER TABLE `user_dashboard`
  ADD PRIMARY KEY (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
