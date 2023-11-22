-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2023 at 08:13 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progres_kemajuan_pekerjaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `acting_commitment_markers`
--

CREATE TABLE `acting_commitment_markers` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acting_commitment_markers`
--

INSERT INTO `acting_commitment_markers` (`id`, `name`, `phone_number`, `nip`, `position`, `user_id`, `created_at`, `updated_at`) VALUES
('9a8e6e97-c4f7-49a9-beee-fb901e392d3e', 'Jimmy Alran M.S., SE., M.Si', '0', '19790612 200212 1 002', 'PPK', '9a8e6e97-c058-4521-a2f7-502c9259e634', '2023-11-07 13:55:14', '2023-11-07 13:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE `agreements` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_report_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kind_of_work_detail_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `week` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Awal','Disetujui Rekanan','Ditolak Rekanan','Disetujui Pengawas Lapangan 1','Ditolak Pengawas Lapangan 1','Disetujui Pengawas Lapangan 2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agreements`
--

INSERT INTO `agreements` (`id`, `user_id`, `task_report_id`, `kind_of_work_detail_id`, `role`, `week`, `date`, `progress`, `status`, `information`, `created_at`, `updated_at`) VALUES
(1, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 'Acting Commitment Marker', '1', '05-11', '0.62', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(2, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 'Acting Commitment Marker', '1', '05-11', '0.14', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(3, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-be92-436f-a780-29300e9f3bd1', 'Acting Commitment Marker', '1', '05-11', '0.26', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(4, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c05a-4876-9c06-b79f31d4809f', 'Acting Commitment Marker', '1', '05-11', '0.01', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(5, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c191-44b9-b42a-eb57445c1939', 'Acting Commitment Marker', '1', '05-11', '0.03', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(6, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 'Acting Commitment Marker', '1', '05-11', '0.03', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(7, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 'Acting Commitment Marker', '1', '05-11', '0.03', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(8, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 'Acting Commitment Marker', '1', '05-11', '0.26', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(9, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 'Acting Commitment Marker', '1', '05-11', '0.02', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(10, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 'Acting Commitment Marker', '1', '05-11', '0.03', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(11, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 'Acting Commitment Marker', '1', '05-11', '0.28', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(12, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 'Acting Commitment Marker', '1', '05-11', '0.19', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(13, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c988-437d-99cd-abf13a525246', 'Acting Commitment Marker', '1', '05-11', '0.06', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(14, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 'Acting Commitment Marker', '1', '05-11', '0.07', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:33', '2023-11-08 08:30:11'),
(15, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cae0-4076-a392-13c50a5ca345', 'Acting Commitment Marker', '1', '05-11', '0.05', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:34', '2023-11-08 08:30:11'),
(16, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 'Acting Commitment Marker', '1', '05-11', '0.05', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:34', '2023-11-08 08:30:11'),
(17, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cc44-495b-839b-20df23047966', 'Acting Commitment Marker', '1', '05-11', '0.05', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:34', '2023-11-08 08:30:11'),
(18, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-ccf0-481a-9227-0b667f67d739', 'Acting Commitment Marker', '1', '05-11', '0.05', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:34', '2023-11-08 08:30:11'),
(19, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 'Acting Commitment Marker', '1', '05-11', '0.05', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:34', '2023-11-08 08:30:11'),
(20, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-ce95-4457-afe3-c52b60b24897', 'Acting Commitment Marker', '1', '05-11', '0.04', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:34', '2023-11-08 08:30:11'),
(21, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 'Acting Commitment Marker', '1', '05-11', '0.03', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:34', '2023-11-08 08:30:11'),
(22, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-d039-4286-90c9-6f029df8113f', 'Acting Commitment Marker', '1', '05-11', '0.08', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:18:34', '2023-11-08 08:30:11'),
(23, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 'Acting Commitment Marker', '2', '12-18', '0.31', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:41:29', '2023-11-08 08:43:49'),
(24, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c988-437d-99cd-abf13a525246', 'Acting Commitment Marker', '2', '12-18', '0.06', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:41:29', '2023-11-08 08:43:49'),
(25, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-d039-4286-90c9-6f029df8113f', 'Acting Commitment Marker', '2', '12-18', '0.08', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:41:29', '2023-11-08 08:43:49'),
(26, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c05a-4876-9c06-b79f31d4809f', 'Acting Commitment Marker', '3', '19-25', '0.02', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:52:37', '2023-11-08 08:54:46'),
(27, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-d039-4286-90c9-6f029df8113f', 'Acting Commitment Marker', '3', '19-25', '0.08', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 08:52:37', '2023-11-08 13:00:06'),
(28, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 'Acting Commitment Marker', '4', '26-01', '10', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 14:10:05', '2023-11-08 14:12:34'),
(29, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e792a-4feb-455e-bb35-468e801b623f', 'Acting Commitment Marker', '4', '26-01', '1', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 14:10:05', '2023-11-08 14:12:34'),
(30, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', NULL, 'Acting Commitment Marker', '4', '26-01', '5', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 14:10:05', '2023-11-08 14:12:34'),
(31, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 'Acting Commitment Marker', '5', '02-08', '0.17', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 14:15:51', '2023-11-08 14:17:35'),
(32, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', NULL, 'Acting Commitment Marker', '5', '02-08', '2', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 14:15:51', '2023-11-08 14:17:35'),
(33, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 'Acting Commitment Marker', '6', '09-15', '0.46', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 14:22:11', '2023-11-08 14:32:45'),
(34, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 'Acting Commitment Marker', '6', '09-15', '10', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 14:22:11', '2023-11-08 14:32:45'),
(35, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c05a-4876-9c06-b79f31d4809f', 'Acting Commitment Marker', '7', '16-22', '0.04', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 14:36:32', '2023-11-08 14:38:15'),
(36, '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-d039-4286-90c9-6f029df8113f', 'Acting Commitment Marker', '7', '16-22', '0.32', 'Disetujui Pengawas Lapangan 2', NULL, '2023-11-08 14:36:32', '2023-11-08 14:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `agreement_task_reports`
--

CREATE TABLE `agreement_task_reports` (
  `id` bigint UNSIGNED NOT NULL,
  `task_report_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_agree` tinyint(1) DEFAULT NULL,
  `information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cv_consultants`
--

CREATE TABLE `cv_consultants` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cv_consultants`
--

INSERT INTO `cv_consultants` (`id`, `name`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
('9a8dfec8-0082-4224-bd0c-c1410c72f5b3', 'CV. TIGA CAHAYA', '0', 'DK Gatak RT. 05 Timbulharjo Sewon Bantul', '2023-11-07 08:42:35', '2023-11-07 08:42:35'),
('9a8dff1b-df07-49fb-9823-9efafcf97e14', 'CV. ARIMBI KENCANA', '0', 'Kali Pucang RT 003 Bangunjiwo,Kasihan Bantul', '2023-11-07 08:43:30', '2023-11-07 08:43:30'),
('9a8e0042-2703-4fce-be9e-a0bfc5397dbd', 'CV. PANGESTU REJEKI SENTOSA', '0', 'Sareyan Rt.03, Karangtalun, Imogiri, Bantul', '2023-11-07 08:46:43', '2023-11-07 08:46:43'),
('9a8e00d5-7b43-4039-9e86-7e9ed291852c', 'CV. ASRI MULIA KONSULTANT', '0', 'Jl.Tluki I/181 Perumnas CC Rt.05 Rw.22 Ngringin, Condongcatur, Depok', '2023-11-07 08:48:20', '2023-11-07 08:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `division_master_data`
--

CREATE TABLE `division_master_data` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `division_master_data`
--

INSERT INTO `division_master_data` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'DIVISI 1. UMUM', '2023-10-31 23:22:21', '2023-10-31 23:22:21'),
(4, 'DIVISI 2. DRAINASE', '2023-10-31 23:22:36', '2023-10-31 23:22:36'),
(5, 'DIVISI 3. PEKERJAAN  TANAH DAN GEOSINTETIK', '2023-10-31 23:22:44', '2023-10-31 23:22:44'),
(6, 'DIVISI 4. PEKERJAAN PREVENTIF', '2023-10-31 23:22:53', '2023-10-31 23:22:53'),
(7, 'DIVISI 5. PERKERASAN  BERBUTIR', '2023-11-07 01:49:46', '2023-11-07 01:49:46'),
(8, 'DIVISI  6.  PERKERASAN  ASPAL', '2023-11-07 01:49:55', '2023-11-07 01:49:55'),
(9, 'DIVISI  7.  STRUKTUR', '2023-11-07 01:50:01', '2023-11-07 01:50:01'),
(10, 'DIVISI  8.  REHABILITASI JEMBATAN', '2023-11-07 01:50:12', '2023-11-07 01:50:12'),
(11, 'DIVISI  9.  PEKERJAAN  HARIAN & PEKERJAAN LAIN-LAIN', '2023-11-07 01:50:22', '2023-11-07 01:50:22'),
(12, 'DIVISI  10.  PEKERJAAN PEMELIHARAAN KINERJA', '2023-11-07 01:50:30', '2023-11-07 01:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kind_of_works`
--

CREATE TABLE `kind_of_works` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kind_of_works`
--

INSERT INTO `kind_of_works` (`id`, `task_id`, `name`, `created_at`, `updated_at`) VALUES
('9a8e7565-b2f1-447f-9726-208ab5b7e588', '9a8e729b-9cfb-4dff-832c-09f3fce81456', 'DIVISI 1. UMUM', '2023-11-07 14:14:16', '2023-11-07 14:14:16'),
('9a8e7680-5913-443f-8d39-4f34eaf0b491', '9a8e729b-9cfb-4dff-832c-09f3fce81456', 'DIVISI 2. DRAINASE', '2023-11-07 14:17:21', '2023-11-07 14:17:21'),
('9a8e779c-ca7e-4f71-940a-7ff828fa55b1', '9a8e729b-9cfb-4dff-832c-09f3fce81456', 'DIVISI 6. PERKERASAN  ASPAL', '2023-11-07 14:20:27', '2023-11-07 14:20:27'),
('9a8e792a-4ac9-4c59-b558-84b4e41cbe31', '9a8e729b-9cfb-4dff-832c-09f3fce81456', 'DIVISI 1. UMUM', '2023-11-07 14:24:48', '2023-11-11 11:37:47'),
('9a8e7972-a615-4984-a134-0e36d254d85b', '9a8e729b-9cfb-4dff-832c-09f3fce81456', 'DIVISI 10. PEKERJAAN PEMELIHARAAN KINERJA', '2023-11-07 14:25:35', '2023-11-07 14:25:35'),
('9a953c04-c4bd-41e2-a92f-1a75d520e613', '9a8e729b-9cfb-4dff-832c-09f3fce81456', 'DIVISI 1. UMUM', '2023-11-10 23:04:37', '2023-11-10 23:04:37'),
('9a953e3e-a8c8-41fe-a3ff-10a5e9a62a71', '9a8e729b-9cfb-4dff-832c-09f3fce81456', 'DIVISI 3. PEKERJAAN  TANAH DAN GEOSINTETIK', '2023-11-10 23:10:50', '2023-11-10 23:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `kind_of_work_details`
--

CREATE TABLE `kind_of_work_details` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind_of_work_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contract_volume` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contract_unit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contract_unit_price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_contract_price` bigint DEFAULT NULL,
  `mc_volume` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mc_unit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mc_unit_price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `total_mc_price` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `work_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kind_of_work_details`
--

INSERT INTO `kind_of_work_details` (`id`, `kind_of_work_id`, `name`, `information`, `contract_volume`, `contract_unit`, `contract_unit_price`, `total_contract_price`, `mc_volume`, `mc_unit`, `mc_unit_price`, `total_mc_price`, `work_value`, `created_at`, `updated_at`) VALUES
('9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Mobilisasi', NULL, NULL, NULL, NULL, NULL, '1', NULL, '12000000', '12000000', '4.13', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Papan Nama', NULL, NULL, NULL, NULL, NULL, '2', NULL, '200000', '400000', '0.14', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-be92-436f-a780-29300e9f3bd1', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Pembuatan dokumen RKK, RMPK, RKPPL, dan RMLLP', NULL, NULL, NULL, NULL, NULL, '1', NULL, '750000', '750000', '0.26', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c05a-4876-9c06-b79f31d4809f', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Penyusunan pelaporan penerapan SMKK', NULL, NULL, NULL, NULL, NULL, '1', NULL, '500000', '500000', '0.17', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c191-44b9-b42a-eb57445c1939', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Spanduk (Banner)', NULL, NULL, NULL, NULL, NULL, '1', NULL, '75000', '75000', '0.03', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c38b-4d57-8b01-46dfe77589a1', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Poster/leaflet', NULL, NULL, NULL, NULL, NULL, '1', NULL, '75000', '75000', '0.03', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Papan Informasi Keselamatan Konstruksi', NULL, NULL, NULL, NULL, NULL, '1', NULL, '75000', '75000', '0.03', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Topi pelindung (Safety Helmet)', NULL, NULL, NULL, NULL, NULL, '10', NULL, '75000', '750000', '0.26', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c6ae-4346-8b84-e43573ec1d80', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Pelindung pernafasan dan mulut (masker, masker respirator)', NULL, NULL, NULL, NULL, NULL, '10', NULL, '5000', '50000', '0.02', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c76d-46f0-8b67-5a8ea52f0129', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Sarung tangan (Safety Gloves)', NULL, NULL, NULL, NULL, NULL, '10', NULL, '10000', '100000', '0.03', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c826-45a7-a3bf-2b80c5e323fc', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Sepatu keselamatan (Safety Shoes, rubber safety shoes and toe cap)', NULL, NULL, NULL, NULL, NULL, '10', NULL, '80000', '800000', '0.28', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Rompi keselamatan (Safety Vest)', NULL, NULL, NULL, NULL, NULL, '10', NULL, '55000', '550000', '0.19', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-c988-437d-99cd-abf13a525246', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Petugas pengatur lalu lintas', NULL, NULL, NULL, NULL, NULL, '1', NULL, '2100000', '2100000', '0.72', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Peralatan P3K', NULL, NULL, NULL, NULL, NULL, '1', NULL, '200000', '200000', '0.07', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-cae0-4076-a392-13c50a5ca345', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Rambu petunjuk', NULL, NULL, NULL, NULL, NULL, '2', NULL, '75000', '150000', '0.05', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Rambu larangan', NULL, NULL, NULL, NULL, NULL, '2', NULL, '75000', '150000', '0.05', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-cc44-495b-839b-20df23047966', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Rambu peringatan', NULL, NULL, NULL, NULL, NULL, '2', NULL, '75000', '150000', '0.05', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-ccf0-481a-9227-0b667f67d739', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Rambu informasi', NULL, NULL, NULL, NULL, NULL, '2', NULL, '75000', '150000', '0.05', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Kerucut lalu lintas (traffic cone)', NULL, NULL, NULL, NULL, NULL, '2', NULL, '75000', '150000', '0.05', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-ce95-4457-afe3-c52b60b24897', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Tongkat pengatur lalu lintas (Warning Lights Stick)', NULL, NULL, NULL, NULL, NULL, '2', NULL, '60000', '120000', '0.04', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-cf6a-46e6-be69-719e2d1b1136', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Bendera K3', NULL, NULL, NULL, NULL, NULL, '1', NULL, '75000', '75000', '0.03', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7565-d039-4286-90c9-6f029df8113f', '9a8e7565-b2f1-447f-9726-208ab5b7e588', 'Manajemen Mutu', NULL, NULL, NULL, NULL, NULL, '1', NULL, '3000000', '3000000', '1.03', '2023-11-07 14:14:16', '2023-11-08 07:02:55'),
('9a8e7680-5f9d-4e64-b355-5518a51dc4fb', '9a8e7680-5913-443f-8d39-4f34eaf0b491', 'Galian Biasa', NULL, NULL, NULL, NULL, NULL, '12', NULL, '33000', '396000', '0.14', '2023-11-07 14:17:21', '2023-11-08 07:02:55'),
('9a8e7680-60f3-4b8a-b719-36763c3849be', '9a8e7680-5913-443f-8d39-4f34eaf0b491', 'Galian Perkerasan Beraspal tanpa Cold Milling Machine', NULL, NULL, NULL, NULL, NULL, '2', NULL, '163000', '326000', '0.11', '2023-11-07 14:17:21', '2023-11-08 07:02:55'),
('9a8e7680-61f4-4d21-8cef-f38b86f7b017', '9a8e7680-5913-443f-8d39-4f34eaf0b491', 'Galian Perkerasan berbutir', NULL, NULL, NULL, NULL, NULL, '7', NULL, '147000', '1029000', '0.35', '2023-11-07 14:17:21', '2023-11-08 07:02:55'),
('9a8e7680-62ca-4d59-9a81-a25ad4a76d23', '9a8e7680-5913-443f-8d39-4f34eaf0b491', 'Timbunan Biasa dari hasil galian', NULL, NULL, NULL, NULL, NULL, '32', NULL, '22500', '720000', '0.25', '2023-11-07 14:17:21', '2023-11-08 07:02:55'),
('9a8e7680-6401-481a-a11a-aed733e3f0e4', '9a8e7680-5913-443f-8d39-4f34eaf0b491', 'Timbunan Pilihan dari sumber galian', NULL, NULL, NULL, NULL, NULL, '12', NULL, '104000', '1248000', '0.43', '2023-11-07 14:17:21', '2023-11-08 07:02:55'),
('9a8e7680-6513-4e7a-a0cb-65076b551ccb', '9a8e7680-5913-443f-8d39-4f34eaf0b491', 'Penyiapan Badan Jalan', NULL, NULL, NULL, NULL, NULL, '130', NULL, '3700', '481000', '0.17', '2023-11-07 14:17:21', '2023-11-08 07:02:55'),
('9a8e779c-d038-4f92-9ed1-92cbf56c5df4', '9a8e779c-ca7e-4f71-940a-7ff828fa55b1', 'Lapis Pondasi Agregat Kelas A', NULL, NULL, NULL, NULL, NULL, '6.30', NULL, '540000', '3402000', '1.17', '2023-11-07 14:20:27', '2023-11-08 07:02:55'),
('9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', '9a8e779c-ca7e-4f71-940a-7ff828fa55b1', 'Lapis Resap Pengikat - Aspal Cair/Emulsi', NULL, NULL, NULL, NULL, NULL, '50.40', NULL, '17475', '880740', '0.30', '2023-11-07 14:20:27', '2023-11-08 07:02:55'),
('9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', '9a8e779c-ca7e-4f71-940a-7ff828fa55b1', 'Lapis Perekat - Aspal Cair', NULL, NULL, NULL, NULL, NULL, '210.40', NULL, '18920', '3980768', '1.37', '2023-11-07 14:20:27', '2023-11-08 07:02:55'),
('9a8e779c-d44c-4d4d-aa51-608be1f05b06', '9a8e779c-ca7e-4f71-940a-7ff828fa55b1', 'Laston Lapis Antara (AC-BC)', NULL, NULL, NULL, NULL, NULL, '108', NULL, '1462657', '157966956', '54.34', '2023-11-07 14:20:28', '2023-11-08 07:02:55'),
('9a8e779c-d531-4936-9677-e7cb28ddfaf2', '9a8e779c-ca7e-4f71-940a-7ff828fa55b1', 'Bahan anti pengelupasan', NULL, NULL, NULL, NULL, NULL, '17.41', NULL, '71600', '1246556', '0.43', '2023-11-07 14:20:28', '2023-11-08 07:02:55'),
('9a8e792a-4feb-455e-bb35-468e801b623f', '9a8e792a-4ac9-4c59-b558-84b4e41cbe31', 'Tameng muka (Face Shield)', NULL, NULL, NULL, NULL, NULL, '11', 'Buah', '1526152', '16787672', '5.78', '2023-11-07 14:24:48', '2023-11-11 11:37:47'),
('9a8e7972-ad1f-473e-975b-0f8a01666a05', '9a8e7972-a615-4984-a134-0e36d254d85b', 'Perbaikan Lapis Fondasi Agregat Kelas A', NULL, NULL, NULL, NULL, NULL, '14.16', NULL, '492296', '6970911', '2.40', '2023-11-07 14:25:35', '2023-11-08 07:02:55'),
('9a8e7972-ae76-4bf4-9b2c-30c913c251f6', '9a8e7972-a615-4984-a134-0e36d254d85b', 'Perbaikan Campuran Aspal Panas', NULL, NULL, NULL, NULL, NULL, '2.07', NULL, '3715000', '7690050', '2.65', '2023-11-07 14:25:35', '2023-11-08 07:02:55'),
('9a8e7972-b328-4817-b725-8f0bfc6bdc54', '9a8e7972-a615-4984-a134-0e36d254d85b', 'Residu Bitumen untuk Pemeliharaan', NULL, NULL, NULL, NULL, NULL, '219.69', NULL, '19500', '4283955', '1.47', '2023-11-07 14:25:35', '2023-11-08 07:02:55'),
('9a953c04-c555-4965-866c-a1a2d62c6730', '9a953c04-c4bd-41e2-a92f-1a75d520e613', 'Papan Nama', 'excuse me', NULL, NULL, NULL, NULL, NULL, 'Bh', NULL, NULL, NULL, '2023-11-10 23:04:37', '2023-11-10 23:04:37'),
('9a953c04-c5cf-4b63-af69-6d26760c1f2b', '9a953c04-c4bd-41e2-a92f-1a75d520e613', 'Penyusunan pelaporan penerapan SMKK', 'hello', NULL, NULL, NULL, NULL, NULL, 'Set', NULL, NULL, NULL, '2023-11-10 23:04:37', '2023-11-10 23:04:37'),
('9a953de3-140e-44b8-982d-97202c62a823', '9a8e7972-a615-4984-a134-0e36d254d85b', 'Pebaikan Pasangan Batu dengan Mortar', NULL, NULL, NULL, NULL, NULL, NULL, 'M3', NULL, NULL, NULL, '2023-11-10 23:09:50', '2023-11-10 23:09:50'),
('9a953de3-14ef-4bb5-973f-c22c69657b6d', '9a8e7972-a615-4984-a134-0e36d254d85b', 'Pengendalian Tanaman', NULL, NULL, NULL, NULL, NULL, NULL, 'M2', NULL, NULL, NULL, '2023-11-10 23:09:50', '2023-11-10 23:09:50'),
('9a953e3e-a9a1-41e6-9138-5fdf1c02fba0', '9a953e3e-a8c8-41fe-a3ff-10a5e9a62a71', 'Geotekstil Stabilisator (Kelas 1)', NULL, NULL, NULL, NULL, NULL, NULL, 'M2', NULL, NULL, NULL, '2023-11-10 23:10:50', '2023-11-10 23:10:50'),
('9a953e3e-aaa2-4a4e-b8db-c34a90115319', '9a953e3e-a8c8-41fe-a3ff-10a5e9a62a71', 'Galian Biasa', NULL, NULL, NULL, NULL, NULL, NULL, 'M3', NULL, NULL, NULL, '2023-11-10 23:10:50', '2023-11-10 23:10:50'),
('9a953e64-1acb-48c4-bf49-f95d8e6906a9', '9a953e3e-a8c8-41fe-a3ff-10a5e9a62a71', 'Galian Batu', NULL, NULL, NULL, NULL, NULL, NULL, 'M3', NULL, NULL, NULL, '2023-11-10 23:11:15', '2023-11-10 23:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `mc_histories`
--

CREATE TABLE `mc_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `task_report_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kind_of_work_detail_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mc_volume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `mc_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `mc_unit_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `work_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `total_mc_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `total_mc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mc_histories`
--

INSERT INTO `mc_histories` (`id`, `task_report_id`, `kind_of_work_detail_id`, `mc_volume`, `mc_unit`, `mc_unit_price`, `work_value`, `total_mc_price`, `total_mc`, `created_at`, `updated_at`) VALUES
(1, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', NULL, 'LS', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(2, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', NULL, 'Bh', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(3, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-be92-436f-a780-29300e9f3bd1', NULL, 'Set', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(4, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c05a-4876-9c06-b79f31d4809f', NULL, 'Set', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(5, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c191-44b9-b42a-eb57445c1939', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(6, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c38b-4d57-8b01-46dfe77589a1', NULL, 'Lembar', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(7, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', NULL, 'Lembar ', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(8, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(9, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c6ae-4346-8b84-e43573ec1d80', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(10, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', NULL, 'Pasang', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(11, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', NULL, 'Pasang', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(12, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(13, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c988-437d-99cd-abf13a525246', NULL, 'Orang', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(14, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', NULL, 'Set', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(15, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cae0-4076-a392-13c50a5ca345', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(16, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(17, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cc44-495b-839b-20df23047966', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(18, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-ccf0-481a-9227-0b667f67d739', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(19, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(20, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-ce95-4457-afe3-c52b60b24897', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(21, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cf6a-46e6-be69-719e2d1b1136', NULL, 'Buah', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(22, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-d039-4286-90c9-6f029df8113f', NULL, 'LS', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(23, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(24, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-60f3-4b8a-b719-36763c3849be', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(25, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-61f4-4d21-8cef-f38b86f7b017', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(26, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(27, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-6401-481a-a11a-aed733e3f0e4', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(28, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-6513-4e7a-a0cb-65076b551ccb', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(29, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(30, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', NULL, 'Liter', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(31, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', NULL, 'Liter', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(32, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d44c-4d4d-aa51-608be1f05b06', NULL, 'Ton', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(33, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d531-4936-9677-e7cb28ddfaf2', NULL, 'Kg', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(34, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e792a-4feb-455e-bb35-468e801b623f', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(35, '9a8e729b-9cfb-4dff-832c-09f3fce81456', NULL, NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(36, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7972-ad1f-473e-975b-0f8a01666a05', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(37, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', NULL, 'M', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(38, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7972-b328-4817-b725-8f0bfc6bdc54', NULL, 'Liter', NULL, NULL, NULL, 'Awal', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(39, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '1', NULL, '12000', '100.00', '12000', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(40, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', '2', NULL, '200000', '97.09', '400000', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:39'),
(41, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-be92-436f-a780-29300e9f3bd1', '1', NULL, '750000', '64.54', '750000', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:56'),
(42, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c05a-4876-9c06-b79f31d4809f', '1', NULL, '500000', '30.08', '500000', '0', '2023-11-07 14:29:23', '2023-11-07 14:30:22'),
(43, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c191-44b9-b42a-eb57445c1939', '1', NULL, '75000', '4.32', '75000', '0', '2023-11-07 14:29:23', '2023-11-07 14:30:42'),
(44, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c38b-4d57-8b01-46dfe77589a1', NULL, 'Lembar', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(45, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', NULL, 'Lembar ', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(46, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(47, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c6ae-4346-8b84-e43573ec1d80', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(48, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', NULL, 'Pasang', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(49, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', NULL, 'Pasang', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(50, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(51, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-c988-437d-99cd-abf13a525246', NULL, 'Orang', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(52, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', NULL, 'Set', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(53, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cae0-4076-a392-13c50a5ca345', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(54, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(55, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cc44-495b-839b-20df23047966', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(56, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-ccf0-481a-9227-0b667f67d739', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(57, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(58, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-ce95-4457-afe3-c52b60b24897', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(59, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-cf6a-46e6-be69-719e2d1b1136', NULL, 'Buah', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(60, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7565-d039-4286-90c9-6f029df8113f', NULL, 'LS', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(61, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(62, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-60f3-4b8a-b719-36763c3849be', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(63, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-61f4-4d21-8cef-f38b86f7b017', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(64, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(65, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-6401-481a-a11a-aed733e3f0e4', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(66, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7680-6513-4e7a-a0cb-65076b551ccb', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(67, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(68, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', NULL, 'Liter', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(69, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', NULL, 'Liter', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(70, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d44c-4d4d-aa51-608be1f05b06', NULL, 'Ton', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(71, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e779c-d531-4936-9677-e7cb28ddfaf2', NULL, 'Kg', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(72, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e792a-4feb-455e-bb35-468e801b623f', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(73, '9a8e729b-9cfb-4dff-832c-09f3fce81456', NULL, NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(74, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7972-ad1f-473e-975b-0f8a01666a05', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(75, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', NULL, 'M', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23'),
(76, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9a8e7972-b328-4817-b725-8f0bfc6bdc54', NULL, 'Liter', NULL, '0.00', '0', '0', '2023-11-07 14:29:23', '2023-11-07 14:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_11_10_193801_add_division_master_data_id_to_task_master_data_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'date-now', NULL, NULL, NULL),
(2, 'cron', '1', NULL, NULL),
(3, '9a8e729b-9cfb-4dff-832c-09f3fce81456', '', NULL, '2023-11-08 14:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv_consultant_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `phone_number`, `cv_consultant_id`, `position`, `user_id`, `created_at`, `updated_at`) VALUES
('9a8e7193-314c-4864-a4a1-fc0241b89c3f', 'Purwanto', '0', '9a8dff1b-df07-49fb-9823-9efafcf97e14', 'Inspector', '9a8e7193-2b82-4223-8eeb-8541b3a6d04c', '2023-11-07 14:03:35', '2023-11-07 14:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress_pictures`
--

CREATE TABLE `progress_pictures` (
  `id` bigint UNSIGNED NOT NULL,
  `schedule_id` bigint UNSIGNED DEFAULT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `week` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `kind_of_work_detail_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `week` int DEFAULT '0',
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `progress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_site_supervisor_agree` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `kind_of_work_detail_id`, `week`, `date`, `progress`, `is_site_supervisor_agree`, `created_at`, `updated_at`) VALUES
(1, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 1, '05-11', '0.62', 1, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(2, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 2, '12-18', '0.31', 1, '2023-11-08 08:07:26', '2023-11-08 08:43:16'),
(3, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 3, '19-25', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(4, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 4, '26-01', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(5, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 5, '02-08', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(6, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 6, '09-15', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(7, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 7, '16-22', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(8, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 8, '23-29', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(9, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 9, '30-05', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(10, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 10, '06-12', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(11, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 11, '13-19', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(12, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 12, '20-26', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(13, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 13, '27-02', '0', NULL, '2023-11-08 08:07:26', '2023-11-08 08:38:42'),
(14, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 1, '05-11', '0.14', 1, '2023-11-08 08:07:43', '2023-11-08 08:27:10'),
(15, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 2, '12-18', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(16, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 3, '19-25', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(17, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 4, '26-01', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(18, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 5, '02-08', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(19, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 6, '09-15', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(20, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 7, '16-22', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(21, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 8, '23-29', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(22, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 9, '30-05', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(23, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 10, '06-12', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(24, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 11, '13-19', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(25, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 12, '20-26', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(26, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 13, '27-02', '0', NULL, '2023-11-08 08:07:43', '2023-11-08 08:07:43'),
(27, '9a8e7565-be92-436f-a780-29300e9f3bd1', 1, '05-11', '0.26', 1, '2023-11-08 08:08:34', '2023-11-08 08:27:10'),
(28, '9a8e7565-be92-436f-a780-29300e9f3bd1', 2, '12-18', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(29, '9a8e7565-be92-436f-a780-29300e9f3bd1', 3, '19-25', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(30, '9a8e7565-be92-436f-a780-29300e9f3bd1', 4, '26-01', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(31, '9a8e7565-be92-436f-a780-29300e9f3bd1', 5, '02-08', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(32, '9a8e7565-be92-436f-a780-29300e9f3bd1', 6, '09-15', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(33, '9a8e7565-be92-436f-a780-29300e9f3bd1', 7, '16-22', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(34, '9a8e7565-be92-436f-a780-29300e9f3bd1', 8, '23-29', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(35, '9a8e7565-be92-436f-a780-29300e9f3bd1', 9, '30-05', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(36, '9a8e7565-be92-436f-a780-29300e9f3bd1', 10, '06-12', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(37, '9a8e7565-be92-436f-a780-29300e9f3bd1', 11, '13-19', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(38, '9a8e7565-be92-436f-a780-29300e9f3bd1', 12, '20-26', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(39, '9a8e7565-be92-436f-a780-29300e9f3bd1', 13, '27-02', '0', NULL, '2023-11-08 08:08:34', '2023-11-08 08:08:34'),
(40, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 1, '05-11', '0.01', 1, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(41, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 2, '12-18', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(42, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 3, '19-25', '0.02', 1, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(43, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 4, '26-01', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(44, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 5, '02-08', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(45, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 6, '09-15', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(46, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 7, '16-22', '0.04', 1, '2023-11-08 08:09:06', '2023-11-08 14:37:49'),
(47, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 8, '23-29', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(48, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 9, '30-05', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(49, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 10, '06-12', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(50, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 11, '13-19', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(51, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 12, '20-26', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(52, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 13, '27-02', '0', NULL, '2023-11-08 08:09:06', '2023-11-08 14:36:10'),
(53, '9a8e7565-c191-44b9-b42a-eb57445c1939', 1, '05-11', '0.03', 1, '2023-11-08 08:10:02', '2023-11-08 08:27:10'),
(54, '9a8e7565-c191-44b9-b42a-eb57445c1939', 2, '12-18', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(55, '9a8e7565-c191-44b9-b42a-eb57445c1939', 3, '19-25', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(56, '9a8e7565-c191-44b9-b42a-eb57445c1939', 4, '26-01', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(57, '9a8e7565-c191-44b9-b42a-eb57445c1939', 5, '02-08', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(58, '9a8e7565-c191-44b9-b42a-eb57445c1939', 6, '09-15', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(59, '9a8e7565-c191-44b9-b42a-eb57445c1939', 7, '16-22', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(60, '9a8e7565-c191-44b9-b42a-eb57445c1939', 8, '23-29', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(61, '9a8e7565-c191-44b9-b42a-eb57445c1939', 9, '30-05', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(62, '9a8e7565-c191-44b9-b42a-eb57445c1939', 10, '06-12', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(63, '9a8e7565-c191-44b9-b42a-eb57445c1939', 11, '13-19', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(64, '9a8e7565-c191-44b9-b42a-eb57445c1939', 12, '20-26', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(65, '9a8e7565-c191-44b9-b42a-eb57445c1939', 13, '27-02', '0', NULL, '2023-11-08 08:10:02', '2023-11-08 08:10:02'),
(66, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 1, '05-11', '0.03', 1, '2023-11-08 08:10:53', '2023-11-08 08:27:10'),
(67, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 2, '12-18', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(68, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 3, '19-25', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(69, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 4, '26-01', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(70, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 5, '02-08', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(71, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 6, '09-15', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(72, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 7, '16-22', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(73, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 8, '23-29', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(74, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 9, '30-05', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(75, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 10, '06-12', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(76, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 11, '13-19', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(77, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 12, '20-26', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(78, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 13, '27-02', '0', NULL, '2023-11-08 08:10:53', '2023-11-08 08:10:53'),
(79, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 1, '05-11', '0.03', 1, '2023-11-08 08:11:12', '2023-11-08 08:27:10'),
(80, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 2, '12-18', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(81, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 3, '19-25', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(82, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 4, '26-01', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(83, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 5, '02-08', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(84, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 6, '09-15', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(85, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 7, '16-22', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(86, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 8, '23-29', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(87, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 9, '30-05', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(88, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 10, '06-12', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(89, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 11, '13-19', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(90, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 12, '20-26', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(91, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 13, '27-02', '0', NULL, '2023-11-08 08:11:12', '2023-11-08 08:11:12'),
(92, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 1, '05-11', '0.26', 1, '2023-11-08 08:11:27', '2023-11-08 08:27:10'),
(93, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 2, '12-18', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(94, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 3, '19-25', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(95, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 4, '26-01', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(96, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 5, '02-08', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(97, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 6, '09-15', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(98, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 7, '16-22', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(99, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 8, '23-29', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(100, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 9, '30-05', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(101, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 10, '06-12', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(102, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 11, '13-19', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(103, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 12, '20-26', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(104, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 13, '27-02', '0', NULL, '2023-11-08 08:11:27', '2023-11-08 08:11:27'),
(105, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 1, '05-11', '0.02', 1, '2023-11-08 08:11:44', '2023-11-08 08:27:10'),
(106, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 2, '12-18', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(107, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 3, '19-25', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(108, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 4, '26-01', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(109, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 5, '02-08', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(110, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 6, '09-15', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(111, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 7, '16-22', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(112, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 8, '23-29', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(113, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 9, '30-05', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(114, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 10, '06-12', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(115, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 11, '13-19', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(116, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 12, '20-26', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(117, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 13, '27-02', '0', NULL, '2023-11-08 08:11:44', '2023-11-08 08:11:44'),
(118, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 1, '05-11', '0.03', 1, '2023-11-08 08:12:20', '2023-11-08 08:27:10'),
(119, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 2, '12-18', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(120, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 3, '19-25', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(121, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 4, '26-01', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(122, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 5, '02-08', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(123, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 6, '09-15', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(124, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 7, '16-22', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(125, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 8, '23-29', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(126, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 9, '30-05', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(127, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 10, '06-12', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(128, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 11, '13-19', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(129, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 12, '20-26', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(130, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 13, '27-02', '0', NULL, '2023-11-08 08:12:20', '2023-11-08 08:12:20'),
(131, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 1, '05-11', '0.28', 1, '2023-11-08 08:13:24', '2023-11-08 08:27:10'),
(132, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 2, '12-18', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(133, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 3, '19-25', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(134, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 4, '26-01', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(135, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 5, '02-08', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(136, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 6, '09-15', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(137, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 7, '16-22', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(138, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 8, '23-29', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(139, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 9, '30-05', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(140, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 10, '06-12', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(141, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 11, '13-19', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(142, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 12, '20-26', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(143, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 13, '27-02', '0', NULL, '2023-11-08 08:13:24', '2023-11-08 08:13:24'),
(144, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 1, '05-11', '0.19', 1, '2023-11-08 08:13:51', '2023-11-08 08:27:10'),
(145, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 2, '12-18', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(146, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 3, '19-25', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(147, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 4, '26-01', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(148, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 5, '02-08', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(149, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 6, '09-15', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(150, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 7, '16-22', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(151, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 8, '23-29', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(152, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 9, '30-05', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(153, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 10, '06-12', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(154, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 11, '13-19', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(155, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 12, '20-26', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(156, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 13, '27-02', '0', NULL, '2023-11-08 08:13:51', '2023-11-08 08:13:51'),
(157, '9a8e7565-c988-437d-99cd-abf13a525246', 1, '05-11', '0.06', 1, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(158, '9a8e7565-c988-437d-99cd-abf13a525246', 2, '12-18', '0.06', 1, '2023-11-08 08:14:20', '2023-11-08 08:43:16'),
(159, '9a8e7565-c988-437d-99cd-abf13a525246', 3, '19-25', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(160, '9a8e7565-c988-437d-99cd-abf13a525246', 4, '26-01', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(161, '9a8e7565-c988-437d-99cd-abf13a525246', 5, '02-08', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(162, '9a8e7565-c988-437d-99cd-abf13a525246', 6, '09-15', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(163, '9a8e7565-c988-437d-99cd-abf13a525246', 7, '16-22', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(164, '9a8e7565-c988-437d-99cd-abf13a525246', 8, '23-29', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(165, '9a8e7565-c988-437d-99cd-abf13a525246', 9, '30-05', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(166, '9a8e7565-c988-437d-99cd-abf13a525246', 10, '06-12', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(167, '9a8e7565-c988-437d-99cd-abf13a525246', 11, '13-19', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(168, '9a8e7565-c988-437d-99cd-abf13a525246', 12, '20-26', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(169, '9a8e7565-c988-437d-99cd-abf13a525246', 13, '27-02', '0', NULL, '2023-11-08 08:14:20', '2023-11-08 08:39:10'),
(170, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 1, '05-11', '0.07', 1, '2023-11-08 08:14:51', '2023-11-08 08:27:10'),
(171, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 2, '12-18', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(172, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 3, '19-25', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(173, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 4, '26-01', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(174, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 5, '02-08', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(175, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 6, '09-15', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(176, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 7, '16-22', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(177, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 8, '23-29', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(178, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 9, '30-05', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(179, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 10, '06-12', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(180, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 11, '13-19', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(181, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 12, '20-26', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(182, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 13, '27-02', '0', NULL, '2023-11-08 08:14:51', '2023-11-08 08:14:51'),
(183, '9a8e7565-cae0-4076-a392-13c50a5ca345', 1, '05-11', '0.05', 1, '2023-11-08 08:15:07', '2023-11-08 08:27:10'),
(184, '9a8e7565-cae0-4076-a392-13c50a5ca345', 2, '12-18', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(185, '9a8e7565-cae0-4076-a392-13c50a5ca345', 3, '19-25', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(186, '9a8e7565-cae0-4076-a392-13c50a5ca345', 4, '26-01', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(187, '9a8e7565-cae0-4076-a392-13c50a5ca345', 5, '02-08', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(188, '9a8e7565-cae0-4076-a392-13c50a5ca345', 6, '09-15', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(189, '9a8e7565-cae0-4076-a392-13c50a5ca345', 7, '16-22', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(190, '9a8e7565-cae0-4076-a392-13c50a5ca345', 8, '23-29', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(191, '9a8e7565-cae0-4076-a392-13c50a5ca345', 9, '30-05', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(192, '9a8e7565-cae0-4076-a392-13c50a5ca345', 10, '06-12', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(193, '9a8e7565-cae0-4076-a392-13c50a5ca345', 11, '13-19', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(194, '9a8e7565-cae0-4076-a392-13c50a5ca345', 12, '20-26', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(195, '9a8e7565-cae0-4076-a392-13c50a5ca345', 13, '27-02', '0', NULL, '2023-11-08 08:15:07', '2023-11-08 08:15:07'),
(196, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 1, '05-11', '0.05', 1, '2023-11-08 08:15:33', '2023-11-08 08:27:10'),
(197, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 2, '12-18', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(198, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 3, '19-25', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(199, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 4, '26-01', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(200, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 5, '02-08', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(201, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 6, '09-15', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(202, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 7, '16-22', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(203, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 8, '23-29', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(204, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 9, '30-05', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(205, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 10, '06-12', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(206, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 11, '13-19', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(207, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 12, '20-26', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(208, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 13, '27-02', '0', NULL, '2023-11-08 08:15:33', '2023-11-08 08:15:33'),
(209, '9a8e7565-cc44-495b-839b-20df23047966', 1, '05-11', '0.05', 1, '2023-11-08 08:15:44', '2023-11-08 08:27:10'),
(210, '9a8e7565-cc44-495b-839b-20df23047966', 2, '12-18', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(211, '9a8e7565-cc44-495b-839b-20df23047966', 3, '19-25', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(212, '9a8e7565-cc44-495b-839b-20df23047966', 4, '26-01', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(213, '9a8e7565-cc44-495b-839b-20df23047966', 5, '02-08', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(214, '9a8e7565-cc44-495b-839b-20df23047966', 6, '09-15', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(215, '9a8e7565-cc44-495b-839b-20df23047966', 7, '16-22', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(216, '9a8e7565-cc44-495b-839b-20df23047966', 8, '23-29', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(217, '9a8e7565-cc44-495b-839b-20df23047966', 9, '30-05', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(218, '9a8e7565-cc44-495b-839b-20df23047966', 10, '06-12', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(219, '9a8e7565-cc44-495b-839b-20df23047966', 11, '13-19', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(220, '9a8e7565-cc44-495b-839b-20df23047966', 12, '20-26', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(221, '9a8e7565-cc44-495b-839b-20df23047966', 13, '27-02', '0', NULL, '2023-11-08 08:15:44', '2023-11-08 08:15:44'),
(222, '9a8e7565-ccf0-481a-9227-0b667f67d739', 1, '05-11', '0.05', 1, '2023-11-08 08:16:06', '2023-11-08 08:27:10'),
(223, '9a8e7565-ccf0-481a-9227-0b667f67d739', 2, '12-18', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(224, '9a8e7565-ccf0-481a-9227-0b667f67d739', 3, '19-25', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(225, '9a8e7565-ccf0-481a-9227-0b667f67d739', 4, '26-01', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(226, '9a8e7565-ccf0-481a-9227-0b667f67d739', 5, '02-08', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(227, '9a8e7565-ccf0-481a-9227-0b667f67d739', 6, '09-15', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(228, '9a8e7565-ccf0-481a-9227-0b667f67d739', 7, '16-22', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(229, '9a8e7565-ccf0-481a-9227-0b667f67d739', 8, '23-29', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(230, '9a8e7565-ccf0-481a-9227-0b667f67d739', 9, '30-05', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(231, '9a8e7565-ccf0-481a-9227-0b667f67d739', 10, '06-12', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(232, '9a8e7565-ccf0-481a-9227-0b667f67d739', 11, '13-19', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(233, '9a8e7565-ccf0-481a-9227-0b667f67d739', 12, '20-26', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(234, '9a8e7565-ccf0-481a-9227-0b667f67d739', 13, '27-02', '0', NULL, '2023-11-08 08:16:06', '2023-11-08 08:16:06'),
(235, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 1, '05-11', '0.05', 1, '2023-11-08 08:16:31', '2023-11-08 08:27:10'),
(236, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 2, '12-18', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(237, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 3, '19-25', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(238, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 4, '26-01', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(239, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 5, '02-08', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(240, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 6, '09-15', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(241, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 7, '16-22', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(242, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 8, '23-29', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(243, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 9, '30-05', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(244, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 10, '06-12', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(245, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 11, '13-19', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(246, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 12, '20-26', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(247, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 13, '27-02', '0', NULL, '2023-11-08 08:16:32', '2023-11-08 08:16:32'),
(248, '9a8e7565-ce95-4457-afe3-c52b60b24897', 1, '05-11', '0.04', 1, '2023-11-08 08:17:16', '2023-11-08 08:27:10'),
(249, '9a8e7565-ce95-4457-afe3-c52b60b24897', 2, '12-18', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(250, '9a8e7565-ce95-4457-afe3-c52b60b24897', 3, '19-25', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(251, '9a8e7565-ce95-4457-afe3-c52b60b24897', 4, '26-01', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(252, '9a8e7565-ce95-4457-afe3-c52b60b24897', 5, '02-08', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(253, '9a8e7565-ce95-4457-afe3-c52b60b24897', 6, '09-15', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(254, '9a8e7565-ce95-4457-afe3-c52b60b24897', 7, '16-22', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(255, '9a8e7565-ce95-4457-afe3-c52b60b24897', 8, '23-29', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(256, '9a8e7565-ce95-4457-afe3-c52b60b24897', 9, '30-05', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(257, '9a8e7565-ce95-4457-afe3-c52b60b24897', 10, '06-12', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(258, '9a8e7565-ce95-4457-afe3-c52b60b24897', 11, '13-19', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(259, '9a8e7565-ce95-4457-afe3-c52b60b24897', 12, '20-26', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(260, '9a8e7565-ce95-4457-afe3-c52b60b24897', 13, '27-02', '0', NULL, '2023-11-08 08:17:16', '2023-11-08 08:17:16'),
(261, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 1, '05-11', '0.03', 1, '2023-11-08 08:17:35', '2023-11-08 08:27:10'),
(262, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 2, '12-18', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(263, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 3, '19-25', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(264, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 4, '26-01', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(265, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 5, '02-08', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(266, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 6, '09-15', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(267, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 7, '16-22', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(268, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 8, '23-29', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(269, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 9, '30-05', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(270, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 10, '06-12', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(271, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 11, '13-19', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(272, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 12, '20-26', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(273, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 13, '27-02', '0', NULL, '2023-11-08 08:17:35', '2023-11-08 08:17:35'),
(274, '9a8e7565-d039-4286-90c9-6f029df8113f', 1, '05-11', '0.08', 1, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(275, '9a8e7565-d039-4286-90c9-6f029df8113f', 2, '12-18', '0.08', 1, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(276, '9a8e7565-d039-4286-90c9-6f029df8113f', 3, '19-25', '0.08', 1, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(277, '9a8e7565-d039-4286-90c9-6f029df8113f', 4, '26-01', '0', NULL, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(278, '9a8e7565-d039-4286-90c9-6f029df8113f', 5, '02-08', '0', NULL, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(279, '9a8e7565-d039-4286-90c9-6f029df8113f', 6, '09-15', '0', NULL, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(280, '9a8e7565-d039-4286-90c9-6f029df8113f', 7, '16-22', '0.32', 1, '2023-11-08 08:17:57', '2023-11-08 14:37:49'),
(281, '9a8e7565-d039-4286-90c9-6f029df8113f', 8, '23-29', '0', NULL, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(282, '9a8e7565-d039-4286-90c9-6f029df8113f', 9, '30-05', '0', NULL, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(283, '9a8e7565-d039-4286-90c9-6f029df8113f', 10, '06-12', '0', NULL, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(284, '9a8e7565-d039-4286-90c9-6f029df8113f', 11, '13-19', '0', NULL, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(285, '9a8e7565-d039-4286-90c9-6f029df8113f', 12, '20-26', '0', NULL, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(286, '9a8e7565-d039-4286-90c9-6f029df8113f', 13, '27-02', '0', NULL, '2023-11-08 08:17:57', '2023-11-08 14:35:43'),
(287, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 1, '05-11', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(288, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 2, '12-18', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(289, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 3, '19-25', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(290, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 4, '26-01', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(291, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 5, '02-08', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(292, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 6, '09-15', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(293, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 7, '16-22', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(294, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 8, '23-29', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(295, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 9, '30-05', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(296, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 10, '06-12', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(297, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 11, '13-19', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(298, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 12, '20-26', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(299, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 13, '27-02', '0', NULL, '2023-11-08 08:39:56', '2023-11-08 08:39:56'),
(300, '9a8e7680-60f3-4b8a-b719-36763c3849be', 1, '05-11', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(301, '9a8e7680-60f3-4b8a-b719-36763c3849be', 2, '12-18', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(302, '9a8e7680-60f3-4b8a-b719-36763c3849be', 3, '19-25', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(303, '9a8e7680-60f3-4b8a-b719-36763c3849be', 4, '26-01', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(304, '9a8e7680-60f3-4b8a-b719-36763c3849be', 5, '02-08', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(305, '9a8e7680-60f3-4b8a-b719-36763c3849be', 6, '09-15', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(306, '9a8e7680-60f3-4b8a-b719-36763c3849be', 7, '16-22', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(307, '9a8e7680-60f3-4b8a-b719-36763c3849be', 8, '23-29', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(308, '9a8e7680-60f3-4b8a-b719-36763c3849be', 9, '30-05', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(309, '9a8e7680-60f3-4b8a-b719-36763c3849be', 10, '06-12', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(310, '9a8e7680-60f3-4b8a-b719-36763c3849be', 11, '13-19', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(311, '9a8e7680-60f3-4b8a-b719-36763c3849be', 12, '20-26', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(312, '9a8e7680-60f3-4b8a-b719-36763c3849be', 13, '27-02', '0', NULL, '2023-11-08 08:40:41', '2023-11-08 08:40:41'),
(313, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 1, '05-11', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(314, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 2, '12-18', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(315, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 3, '19-25', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(316, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 4, '26-01', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(317, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 5, '02-08', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(318, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 6, '09-15', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(319, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 7, '16-22', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(320, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 8, '23-29', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(321, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 9, '30-05', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(322, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 10, '06-12', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(323, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 11, '13-19', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(324, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 12, '20-26', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(325, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 13, '27-02', '0', NULL, '2023-11-08 08:40:53', '2023-11-08 08:41:05'),
(326, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 1, '05-11', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(327, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 2, '12-18', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(328, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 3, '19-25', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(329, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 4, '26-01', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(330, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 5, '02-08', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(331, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 6, '09-15', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(332, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 7, '16-22', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(333, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 8, '23-29', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(334, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 9, '30-05', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(335, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 10, '06-12', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(336, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 11, '13-19', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(337, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 12, '20-26', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(338, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 13, '27-02', '0', NULL, '2023-11-08 08:41:21', '2023-11-08 08:41:21'),
(339, '9a8e792a-4feb-455e-bb35-468e801b623f', 1, '05-11', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(340, '9a8e792a-4feb-455e-bb35-468e801b623f', 2, '12-18', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(341, '9a8e792a-4feb-455e-bb35-468e801b623f', 3, '19-25', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(342, '9a8e792a-4feb-455e-bb35-468e801b623f', 4, '26-01', '1', 1, '2023-11-08 14:08:41', '2023-11-08 14:11:54'),
(343, '9a8e792a-4feb-455e-bb35-468e801b623f', 5, '02-08', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(344, '9a8e792a-4feb-455e-bb35-468e801b623f', 6, '09-15', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(345, '9a8e792a-4feb-455e-bb35-468e801b623f', 7, '16-22', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(346, '9a8e792a-4feb-455e-bb35-468e801b623f', 8, '23-29', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(347, '9a8e792a-4feb-455e-bb35-468e801b623f', 9, '30-05', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(348, '9a8e792a-4feb-455e-bb35-468e801b623f', 10, '06-12', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(349, '9a8e792a-4feb-455e-bb35-468e801b623f', 11, '13-19', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(350, '9a8e792a-4feb-455e-bb35-468e801b623f', 12, '20-26', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(351, '9a8e792a-4feb-455e-bb35-468e801b623f', 13, '27-02', '0', NULL, '2023-11-08 14:08:41', '2023-11-08 14:08:41'),
(352, NULL, 1, '05-11', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(353, NULL, 2, '12-18', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(354, NULL, 3, '19-25', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(355, NULL, 4, '26-01', '5', 1, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(356, NULL, 5, '02-08', '2', 1, '2023-11-08 14:09:05', '2023-11-08 14:17:06'),
(357, NULL, 6, '09-15', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(358, NULL, 7, '16-22', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(359, NULL, 8, '23-29', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(360, NULL, 9, '30-05', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(361, NULL, 10, '06-12', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(362, NULL, 11, '13-19', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(363, NULL, 12, '20-26', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(364, NULL, 13, '27-02', '0', NULL, '2023-11-08 14:09:05', '2023-11-08 14:15:08'),
(365, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 1, '05-11', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(366, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 2, '12-18', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(367, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 3, '19-25', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(368, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 4, '26-01', '10', 1, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(369, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 5, '02-08', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(370, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 6, '09-15', '10', 1, '2023-11-08 14:09:47', '2023-11-08 14:32:15'),
(371, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 7, '16-22', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(372, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 8, '23-29', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(373, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 9, '30-05', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(374, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 10, '06-12', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(375, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 11, '13-19', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(376, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 12, '20-26', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(377, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 13, '27-02', '0', NULL, '2023-11-08 14:09:47', '2023-11-08 14:21:45'),
(378, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 1, '05-11', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(379, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 2, '12-18', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(380, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 3, '19-25', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(381, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 4, '26-01', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(382, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 5, '02-08', '0.17', 1, '2023-11-08 14:15:27', '2023-11-08 14:17:06'),
(383, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 6, '09-15', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(384, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 7, '16-22', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(385, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 8, '23-29', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(386, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 9, '30-05', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(387, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 10, '06-12', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(388, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 11, '13-19', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(389, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 12, '20-26', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(390, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 13, '27-02', '0', NULL, '2023-11-08 14:15:27', '2023-11-08 14:15:27'),
(391, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 1, '05-11', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(392, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 2, '12-18', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(393, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 3, '19-25', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(394, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 4, '26-01', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(395, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 5, '02-08', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(396, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 6, '09-15', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(397, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 7, '16-22', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(398, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 8, '23-29', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(399, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 9, '30-05', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(400, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 10, '06-12', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(401, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 11, '13-19', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(402, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 12, '20-26', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(403, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 13, '27-02', '0', NULL, '2023-11-08 14:15:43', '2023-11-08 14:15:43'),
(404, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 1, '05-11', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(405, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 2, '12-18', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(406, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 3, '19-25', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(407, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 4, '26-01', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(408, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 5, '02-08', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(409, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 6, '09-15', '0.46', 1, '2023-11-08 14:21:21', '2023-11-08 14:32:15'),
(410, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 7, '16-22', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(411, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 8, '23-29', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(412, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 9, '30-05', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(413, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 10, '06-12', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(414, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 11, '13-19', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(415, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 12, '20-26', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21'),
(416, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 13, '27-02', '0', NULL, '2023-11-08 14:21:21', '2023-11-08 14:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `site_supervisors`
--

CREATE TABLE `site_supervisors` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_supervisors`
--

INSERT INTO `site_supervisors` (`id`, `name`, `phone_number`, `nip`, `position`, `user_id`, `created_at`, `updated_at`) VALUES
('9a8e6e0c-cbf2-47af-9a05-f1ed63339858', 'Anang Surya J, S.T.M.Ling', '0', '0', 'Ketua', '9a8e6e0c-c73c-40f0-a133-78db5e50904b', '2023-11-07 13:53:43', '2023-11-07 13:53:43'),
('9a8e6e49-33d4-4d5d-bbc7-b24ac3f46f66', 'Sasmono', '0', '0', 'Sekretaris', '9a8e6e49-2e98-4ff8-8be8-43cbe312401d', '2023-11-07 13:54:23', '2023-11-07 13:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `supervising_consultants`
--

CREATE TABLE `supervising_consultants` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv_consultant_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervising_consultants`
--

INSERT INTO `supervising_consultants` (`id`, `name`, `phone_number`, `cv_consultant_id`, `position`, `user_id`, `created_at`, `updated_at`) VALUES
('9a8e0198-5f60-4ca7-a7b8-fcb311ea6499', 'LILIK ARYO INTARAN, ST', '0', '9a8e00d5-7b43-4039-9e86-7e9ed291852c', 'Site Engineer', '9a8e0198-5873-4cf4-9dbd-50e975826290', '2023-11-07 08:50:27', '2023-11-07 08:50:27'),
('9a8e021a-3621-4b14-aa83-f3f305592d2d', 'SUHARYANTO', '0', '9a8e00d5-7b43-4039-9e86-7e9ed291852c', 'Inspector', '9a8e021a-316e-4dbc-b48b-d1129195a166', '2023-11-07 08:51:53', '2023-11-07 08:51:53'),
('9a8e02ed-d033-4aad-ac1d-b1b0d5da3943', 'DWI NUR TJAHYO', '0', '9a8dff1b-df07-49fb-9823-9efafcf97e14', 'Inspector', '9a8e02ed-c1fd-4296-8818-53ba073d9eff', '2023-11-07 08:54:11', '2023-11-07 08:54:42'),
('9a8e03c8-1511-4016-a193-9abaaba8b801', 'SANDI DWI CAHYONO, S.PD.I', '0', '9a8e0042-2703-4fce-be9e-a0bfc5397dbd', 'Directur', '9a8e03c8-10b1-4450-a40d-35157d887297', '2023-11-07 08:56:34', '2023-11-07 08:56:34'),
('9a8e043c-b91d-4031-8db2-5f25b4945e7c', 'JUPRI SUSILA', '0', '9a8e0042-2703-4fce-be9e-a0bfc5397dbd', 'Pelaksana', '9a8e043c-b512-4bea-bbab-2e0e822d77de', '2023-11-07 08:57:51', '2023-11-07 08:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `task_master_data`
--

CREATE TABLE `task_master_data` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_master_data_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_master_data`
--

INSERT INTO `task_master_data` (`id`, `name`, `unit`, `division_master_data_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobilisasi', 'LS', 3, NULL, NULL),
(2, 'Papan Nama', 'Bh', 3, NULL, NULL),
(3, 'Manajemen dan Keselamatan Lalu Lintas ', 'LS', 3, NULL, NULL),
(4, 'Pembuatan dokumen RKK, RMPK, RKPPL, dan RMLLP', 'Set', 3, NULL, NULL),
(5, 'Pembuatan prosedur dan instruksi kerja', 'Set', 3, NULL, NULL),
(6, 'Penyusunan pelaporan penerapan SMKK', 'Set', 3, NULL, NULL),
(7, 'Induksi Keselamatan Konstruksi (Safety Induction)', 'Orang', 3, NULL, NULL),
(8, 'Pengarahan Keselamatan Konstruksi (Safety Briefing) ', 'Orang', 3, NULL, NULL),
(9, 'Pertemuan keselamatan (Safety Talk dan/atau Tool Box Meeting) ', 'Orang', 3, NULL, NULL),
(10, 'Pelatihan Keselamatan Konstruksi Bekerja di ketinggian ', 'Orang', 3, NULL, NULL),
(11, 'Pelatihan Keselamatan Konstruksi Penggunaan bahan kimia (MSDS) ', 'Orang', 3, NULL, NULL),
(12, 'Pelatihan Keselamatan Konstruksi Analisis keselamatan pekerjaan ', 'Orang', 3, NULL, NULL),
(13, 'Pelatihan Keselamatan Konstruksi Perilaku berbasis keselamatan (Budaya berkeselamatan konstruksi)', 'Orang', 3, NULL, NULL),
(14, 'Pelatihan Keselamatan Konstruksi P3K ', 'Orang', 3, NULL, NULL),
(15, 'Sosialisasi/penyuluhan HIV/AIDS', 'Orang', 3, NULL, NULL),
(16, 'Simulasi Keselamatan Konstruksi', 'LS', 3, NULL, NULL),
(17, 'Spanduk (Banner)', 'Buah', 3, NULL, NULL),
(18, 'Poster/leaflet', 'Lembar', 3, NULL, NULL),
(19, 'Papan Informasi Keselamatan Konstruksi', 'Lembar ', 3, NULL, NULL),
(20, 'Jaring pengaman (Safety Net)', 'Meter Panjang', 3, NULL, NULL),
(21, 'Tali keselamatan (Life Line)', 'Meter Panjang', 3, NULL, NULL),
(22, 'Penahan jatuh (Safety Deck)', 'Unit', 3, NULL, NULL),
(23, 'Pagar pengaman (Guard Railling)', 'Meter Panjang', 3, NULL, NULL),
(24, 'Pembatas area (Restricted Area)', 'Rol', 3, NULL, NULL),
(25, 'Perlengkapan keselamatan bencana (Disaster Safety Equipment)', 'Set', 3, NULL, NULL),
(26, 'Topi pelindung (Safety Helmet)', 'Buah', 3, NULL, NULL),
(27, 'Pelindung mata (Goggles, Spectacles)', 'Buah', 3, NULL, NULL),
(28, 'Tameng muka (Face Shield)', 'Buah', 3, NULL, NULL),
(29, 'Masker selam (Breathing Apparatus)', 'Buah', 3, NULL, NULL),
(30, 'Pelindung telinga (Ear Plug, Ear Muff)', 'Pasang', 3, NULL, NULL),
(31, 'Pelindung pernafasan dan mulut (masker, masker respirator)', 'Buah', 3, NULL, NULL),
(32, 'Sarung tangan (Safety Gloves)', 'Pasang', 3, NULL, NULL),
(33, 'Sepatu keselamatan (Safety Shoes, rubber safety shoes and toe cap)', 'Pasang', 3, NULL, NULL),
(34, 'Penunjang seluruh tubuh (Full Body Harness)', 'Buah', 3, NULL, NULL),
(35, 'Jaket pelampung (Life Vest)', 'Buah', 3, NULL, NULL),
(36, 'Rompi keselamatan (Safety Vest)', 'Buah', 3, NULL, NULL),
(37, 'Celemek (Apron/Coveralls)', 'Buah', 3, NULL, NULL),
(38, 'Pelindung jatuh (Fall Arrester)', 'Buah', 3, NULL, NULL),
(39, 'Asuransi (Construction All Risk/CAR)', 'LS', 3, NULL, NULL),
(40, 'Asuransi pengiriman peralatan', 'Unit', 3, NULL, NULL),
(41, 'Uji Riksa Peralatan', 'Unit', 3, NULL, NULL),
(42, 'Ahli K3 konstruksi/ahli keselamatan konstruksi (sebagai pimpinan UKK)', 'Orang', 3, NULL, NULL),
(43, 'Ahli K3 konstruksi/ahli keselamatan konstruksi', 'Orang', 3, NULL, NULL),
(44, 'Petugas Keselamatan Konstruksi, Petugas K3 Konstruksi', 'Orang', 3, NULL, NULL),
(45, 'Petugas Pengelolaan Lingkungan', 'Orang', 3, NULL, NULL),
(46, 'Petugas tanggap darurat/Petugas pemadam kebakaran', 'Orang', 3, NULL, NULL),
(47, 'Petugas P3K', 'Orang', 3, NULL, NULL),
(48, 'Tenaga medis dan/atau kesehatan (Dokter atau paramedis)', 'Orang', 3, NULL, NULL),
(49, 'Petugas pengatur lalu lintas', 'Orang', 3, NULL, NULL),
(50, 'Koordinator Manajemen dan Keselamatan Lalu Lintas (KMKL)', 'Orang', 3, NULL, NULL),
(51, 'Peralatan P3K', 'Set', 3, NULL, NULL),
(52, 'Ruang P3K', 'Set', 3, NULL, NULL),
(53, 'Peralatan Pengasapan (Obat dan mesin Fogging)', 'Unit', 3, NULL, NULL),
(54, 'Biaya protokol kesehatan wabah menular (misal: tempat cuci tangan, swab, vitamin di masa pandemi covid-19, dan sebagainya) ', 'LS', 3, NULL, NULL),
(55, 'Pemeriksaan Psikotropika dan HIV', 'Orang', 3, NULL, NULL),
(56, 'Perlengkapan Isolasi mandiri', 'Set', 3, NULL, NULL),
(57, 'Ambulans', 'Unit', 3, NULL, NULL),
(58, 'Rambu petunjuk', 'Buah', 3, NULL, NULL),
(59, 'Rambu larangan', 'Buah', 3, NULL, NULL),
(60, 'Rambu peringatan', 'Buah', 3, NULL, NULL),
(61, 'Rambu kewajiban', 'Buah', 3, NULL, NULL),
(62, 'Rambu informasi', 'Buah', 3, NULL, NULL),
(63, 'Rambu pekerjaan sementara', 'Buah', 3, NULL, NULL),
(64, 'Jalur Evakuasi (Petunjuk escape route)', 'Buah', 3, NULL, NULL),
(65, 'Kerucut lalu lintas (traffic cone)', 'Buah', 3, NULL, NULL),
(66, 'Tongkat pengatur lalu lintas (Warning Lights Stick)', 'Buah', 3, NULL, NULL),
(67, 'Lampu putar (rotary lamp)', 'Buah', 3, NULL, NULL),
(68, 'Pembatas Jalan (water tank barrier)', 'Meter Panjang', 3, NULL, NULL),
(69, 'Beton pembatas jalan (concrete barrier)', 'Meter Panjang', 3, NULL, NULL),
(70, 'Lampu/alat penerangan sementara', 'Buah', 3, NULL, NULL),
(71, 'Lampu darurat (Emergency Lamp)', 'Buah', 3, NULL, NULL),
(72, 'Rambu/alat pemberi isyarat lalu lintas sementara', 'Buah', 3, NULL, NULL),
(73, 'Marka jalan sementara', 'Meter Persegi', 3, NULL, NULL),
(74, 'Alat pembatas kecepatan', 'Buah', 3, NULL, NULL),
(75, 'Alat pembatas tinggi dan lebar kendaraan', 'Buah', 3, NULL, NULL),
(76, 'Penghalang lalu lintas', 'Buah', 3, NULL, NULL),
(77, 'Cermin tikungan', 'Buah', 3, NULL, NULL),
(78, 'Patok pengarah/delineator', 'Buah', 3, NULL, NULL),
(79, 'Pulau-pulau lalu lintas sementara', 'Buah', 3, NULL, NULL),
(80, 'Pita penggaduh/rumble strip', 'Meter Persegi', 3, NULL, NULL),
(81, 'Alat penerangan sementara', 'Buah', 3, NULL, NULL),
(82, 'Jembatan sementara', 'LS', 3, NULL, NULL),
(83, 'Ahli Lingkungan', 'Orang Kegiatan', 3, NULL, NULL),
(84, 'Ahli Jembatan', 'Orang Kegiatan', 3, NULL, NULL),
(85, 'Ahli Gedung', 'Orang Kegiatan', 3, NULL, NULL),
(86, 'Ahli Struktur', 'Orang Kegiatan', 3, NULL, NULL),
(87, 'Ahli Pondasi', 'Orang Kegiatan', 3, NULL, NULL),
(88, 'Ahli Bendungan', 'Orang Kegiatan', 3, NULL, NULL),
(89, 'Ahli Gempa', 'Orang Kegiatan', 3, NULL, NULL),
(90, 'Ahli Likuifaksi', 'Orang Kegiatan', 3, NULL, NULL),
(91, 'Ahli Lapangan Terbang', 'Orang Kegiatan', 3, NULL, NULL),
(92, 'Ahli Mekanikal', 'Orang Kegiatan', 3, NULL, NULL),
(93, 'Ahli Pertambangan', 'Orang Kegiatan', 3, NULL, NULL),
(94, 'Ahli Peledakan', 'Orang Kegiatan', 3, NULL, NULL),
(95, 'Ahli Elektrikal', 'Orang Kegiatan', 3, NULL, NULL),
(96, 'Ahli Perminyakan', 'Orang Kegiatan', 3, NULL, NULL),
(97, 'Ahli Manajemen', 'Orang Kegiatan', 3, NULL, NULL),
(98, 'Ahli Proteksi Kebakaran Gedung', 'Orang Kegiatan', 3, NULL, NULL),
(99, 'Alat Pemadam Api Ringan (APAR)', 'Buah', 3, NULL, NULL),
(100, 'Penangkal Petir', 'Buah', 3, NULL, NULL),
(101, 'Anemometer', 'Buah', 3, NULL, NULL),
(102, 'Bendera K3', 'Buah', 3, NULL, NULL),
(103, 'Pembuatan Kartu Identitas Pekerja (KIP)', 'Buah', 3, NULL, NULL),
(104, 'Patroli keselamatan konstruksi', 'Kegiatan', 3, NULL, NULL),
(105, 'Audit internal', 'Kegiatan', 3, NULL, NULL),
(106, 'CCTV', 'Unit', 3, NULL, NULL),
(107, 'Pengujian Baku Mutu Air Lengkap', 'Set', 3, NULL, NULL),
(108, 'Pengujian Baku Mutu Udara Ambien Lengkap', 'Set', 3, NULL, NULL),
(109, 'Pengujian Vibrasi Lingkungan untuk Kenyamanan dan Kesehatan', 'Buah', 3, NULL, NULL),
(110, 'Pengujian tingkat getaran kendaraan bermotor', 'Buah', 3, NULL, NULL),
(111, 'Pengujian parameter kualitas lingkungan', 'Buah', 3, NULL, NULL),
(112, 'Keselamatan dan Kesehatan Kerja', 'LS', 3, NULL, NULL),
(113, 'Pengeboran, termasuk SPT dan Laporan ', 'M', 3, NULL, NULL),
(114, 'Sondir termasuk Laporan', 'M', 3, NULL, NULL),
(115, 'Manajemen Mutu ', 'LS', 3, NULL, NULL),
(116, 'Galian untuk Selokan Drainase dan Saluran Air', 'M3', 4, NULL, NULL),
(117, 'Pasangan Batu dengan Mortar', 'M3', 4, NULL, NULL),
(118, 'Gorong-gorong Pipa Beton Tanpa Tulangan diameter dalam 20 cm', 'M', 4, NULL, NULL),
(119, 'Gorong-gorong Pipa Beton Tanpa Tulangan diameter dalam 25 cm', 'M', 4, NULL, NULL),
(120, 'Gorong-gorong Pipa Beton Tanpa Tulangan diameter dalam 30 cm', 'M', 4, NULL, NULL),
(121, 'Gorong-gorong Pipa Beton Bertulang, diameter dalam 40 cm', 'M', 4, NULL, NULL),
(122, 'Gorong-gorong Pipa Beton Bertulang, diameter dalam 60 cm', 'M', 4, NULL, NULL),
(123, 'Gorong-gorong Pipa Beton Bertulang, diameter dalam 80 cm', 'M', 4, NULL, NULL),
(124, 'Gorong-gorong Pipa Beton Bertulang, diameter dalam 100 cm', 'M', 4, NULL, NULL),
(125, 'Gorong-gorong Pipa Beton Bertulang, diameter dalam 120 cm', 'M', 4, NULL, NULL),
(126, 'Gorong-gorong Pipa Beton Bertulang, diameter dalam 150 cm', 'M', 4, NULL, NULL),
(127, 'Gorong-gorong Pipa Baja Bergelombang', 'Ton', 4, NULL, NULL),
(128, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 40 cm x 40 cm', 'M', 4, NULL, NULL),
(129, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 50 cm x 50 cm', 'M', 4, NULL, NULL),
(130, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 60 cm x 60 cm', 'M', 4, NULL, NULL),
(131, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 80 cm x 80 cm', 'M', 4, NULL, NULL),
(132, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 100 cm x 100 cm', 'M', 4, NULL, NULL),
(133, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 120 cm x 120 cm', 'M', 4, NULL, NULL),
(134, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 140 cm x 140 cm', 'M', 4, NULL, NULL),
(135, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 150 cm x 150 cm', 'M', 4, NULL, NULL),
(136, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 160 cm x 160 cm', 'M', 4, NULL, NULL),
(137, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 180 cm x 180 cm', 'M', 4, NULL, NULL),
(138, 'Gorong-gorong Kotak Beton Bertulang, ukuran dalam 200 cm x 200 cm', 'M', 4, NULL, NULL),
(139, 'Saluran berbentuk U Tipe DS 1', 'M', 4, NULL, NULL),
(140, 'Saluran berbentuk U Tipe DS 1a (dengan tutup)', 'M', 4, NULL, NULL),
(141, 'Saluran berbentuk U Tipe DS 2', 'M', 4, NULL, NULL),
(142, 'Saluran berbentuk U Tipe DS 2a (dengan tutup)', 'M', 4, NULL, NULL),
(143, 'Saluran berbentuk U Tipe DS 3', 'M', 4, NULL, NULL),
(144, 'Saluran berbentuk U Tipe DS 3a (dengan tutup)', 'M', 4, NULL, NULL),
(145, 'Saluran berbentuk U Tipe DS 4', 'M', 4, NULL, NULL),
(146, 'Saluran berbentuk U Tipe DS 4a (dengan tutup)', 'M', 4, NULL, NULL),
(147, 'Saluran berbentuk U Tipe DS 5', 'M', 4, NULL, NULL),
(148, 'Saluran berbentuk U Tipe DS 5a (dengan tutup)', 'M', 4, NULL, NULL),
(149, 'Saluran berbentuk U Tipe DS 6', 'M', 4, NULL, NULL),
(150, 'Saluran berbentuk U Tipe DS 6a (dengan tutup)', 'M', 4, NULL, NULL),
(151, 'Pasangan Batu tanpa Adukan (Aanstamping) ', 'M3', 4, NULL, NULL),
(152, 'Bahan Drainase Porous atau Penyaring (Filter)', 'M3', 4, NULL, NULL),
(153, 'Pipa Berlubang Banyak (Perforated Pipe) untuk Pekerjaan Drainase Bawah Permukaan, diameter 4 inch', 'M', 4, NULL, NULL),
(154, 'Pipa Berlubang Banyak (Perforated Pipe) untuk Pekerjaan Drainase Bawah Permukaan, diameter 5 inch', 'M', 4, NULL, NULL),
(155, 'Pipa Berlubang Banyak (Perforated Pipe) untuk Pekerjaan Drainase Bawah Permukaan, diameter 6 inch', 'M', 4, NULL, NULL),
(156, 'Pipa Berlubang Banyak (Perforated Pipe) untuk Pekerjaan Drainase Bawah Permukaan, diameter 8 inch', 'M', 4, NULL, NULL),
(157, 'Box Culvert Pracetak Ukuran 400 x 400 x 1000 mm Terpasang', 'M', 4, NULL, NULL),
(158, 'Box Culvert Pracetak Ukuran 500 x 500 x 1000 mm Terpasang', 'M', 4, NULL, NULL),
(159, 'Box Culvert Pracetak Ukuran 600 x 600 x 1000 mm gandar 21 ton terpasang (termasuk galian + lantai kerja + timbunan samping)', 'M', 4, NULL, NULL),
(160, 'Box Culvert Pracetak Ukuran 800 x 800 *1000 mm gandar 21 ton terpasang (termasuk galian + lantai kerja + timbunan samping)', 'Unit', 4, NULL, NULL),
(161, 'Box Culvert Pracetak Ukuran 1000 x 1000 x 1000mm (termasuk galian + lantai kerja + timbunan samping)', 'M', 4, NULL, NULL),
(162, 'Box Culvert Pracetak Manhole Ukuran 1000 x 1000 mm Termasuk Besi Tangga Dia. 16 mm', 'M', 4, NULL, NULL),
(163, 'Box Culvert Pracetak Ukuran 1200 x 1200 x 1000 mm Terpasang', 'M', 4, NULL, NULL),
(164, 'Box Culvert Pracetak Ukuran 1400 x 1400 x 1000 mm Terpasang', 'M', 4, NULL, NULL),
(165, 'Box Culvert Pracetak Ukuran 1500 x 1500 mm Terpasang', 'M', 4, NULL, NULL),
(166, 'Box Culvert Pracetak Ukuran 1800 x 1800 x 1000 mm Terpasang', 'M', 4, NULL, NULL),
(167, 'Box Culvert Pracetak Ukuran 2000 x 2000 x 1000 mm Terpasang', 'M', 4, NULL, NULL),
(168, 'U-Ditch Pracetak Ukuran 300 x 300 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(169, 'U-Ditch Pracetak Ukuran 300 x 300 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(170, 'U-Ditch Pracetak Ukuran 300 x 400 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(171, 'U-Ditch Pracetak Ukuran 300 x 400 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(172, 'U-Ditch Pracetak Ukuran 300 x 500 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(173, 'U-Ditch Pracetak Ukuran 300 x 500 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(174, 'U-Ditch Pracetak Ukuran 400 x 400 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(175, 'U-Ditch Pracetak Ukuran 400 x 400 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(176, 'U-Ditch Pracetak Ukuran 400 x 500 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(177, 'U-Ditch Pracetak Ukuran 400 x 500 x 1200 mm Terpasang (dengan tutup)', 'Unit', 4, NULL, NULL),
(178, 'U-Ditch Pracetak Ukuran 400 x 600 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(179, 'U-Ditch Pracetak Ukuran 400 x 600 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(180, 'U-Ditch Pracetak Ukuran 500 x 500 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(181, 'U-Ditch Pracetak Ukuran 500 x 500 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(182, 'U-Ditch Pracetak Ukuran 500 x 600 mm Terpasang', 'M', 4, NULL, NULL),
(183, 'U-Ditch Pracetak Ukuran 500 x 600 x 1200 mm dengan tutup HD terpasang (termasuk Galian + timbunan samping)', 'Unit', 4, NULL, NULL),
(184, 'U-Ditch Pracetak Ukuran 500 x 700 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(185, 'U-Ditch Pracetak Ukuran 500 x 700 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(186, 'U-Ditch Pracetak Ukuran 600 x 500 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(187, 'U-Ditch Pracetak Ukuran 600 x 500 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(188, 'U-Ditch Pracetak Ukuran 600 x 600 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(189, 'U-Ditch Pracetak Ukuran 600 x 600 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(190, 'U-Ditch Pracetak Ukuran 600 x 700 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(191, 'U-Ditch Pracetak Ukuran 600 x 700 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(192, 'U-Ditch Pracetak Ukuran 600 x 800 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(193, 'U-Ditch Pracetak Ukuran 600 x 800 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(194, 'U-Ditch Pracetak Ukuran 800 x 600 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(195, 'U-Ditch Pracetak Ukuran 800 x 600 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(196, 'U-Ditch Pracetak Ukuran 800 x 800 mm Terpasang', 'M', 4, NULL, NULL),
(197, 'U-Ditch Pracetak Ukuran 800 x 800 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(198, 'U-Ditch Pracetak Ukuran 800 x 900 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(199, 'U-Ditch Pracetak Ukuran 800 x 900 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(200, 'U-Ditch Pracetak Ukuran 800 x 1000 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(201, 'U-Ditch Pracetak Ukuran 800 x 1000 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(202, 'U-Ditch Pracetak Ukuran 800 x 1200 x 1200 mm Terpasang', 'M', 4, NULL, NULL),
(203, 'U-Ditch Pracetak Ukuran 800 x 1200 x 1200 mm Terpasang (dengan tutup)', 'M', 4, NULL, NULL),
(204, 'Beton K250 (fc’ 20) untuk struktur drainase beton minor (dengan tulangan ganda diameter 10mm)', 'M3', 4, NULL, NULL),
(205, 'Baja Tulangan untuk struktur drainase beton minor', 'Kg', 4, NULL, NULL),
(206, 'Pasang Batu Andesit 20x20', 'M2', 4, NULL, NULL),
(207, 'Pasang Keramik difabel 30x30', 'M', 4, NULL, NULL),
(208, 'Inlet Drain', 'Bh', 4, NULL, NULL),
(209, 'Tutup Manhole Baja Cor HD, Dia. 80 cm Tebal 1,5 cm + Angkur Baja', 'Unit', 4, NULL, NULL),
(210, 'Galian Biasa', 'M3', 5, NULL, NULL),
(211, 'Galian Tanah Biasa (manual)', 'M3', 5, NULL, NULL),
(212, 'Galian Batu Lunak', 'M3', 5, NULL, NULL),
(213, 'Galian Batu', 'M3', 5, NULL, NULL),
(214, 'Galian Struktur dengan kedalaman 0 - 2 meter', 'M3', 5, NULL, NULL),
(215, 'Galian Struktur dengan kedalaman 2 - 4 meter', 'M3', 5, NULL, NULL),
(216, 'Galian Struktur dengan kedalaman 4 - 6 meter', 'M3', 5, NULL, NULL),
(217, 'Galian Perkerasan Beraspal dengan Cold Milling Machine', 'M3', 5, NULL, NULL),
(218, 'Galian Perkerasan Beraspal tanpa Cold Milling Machine', 'M3', 5, NULL, NULL),
(219, 'Galian Perkerasan berbutir', 'M3', 5, NULL, NULL),
(220, 'Galian Perkerasan Beton', 'M3', 5, NULL, NULL),
(221, 'Timbunan Biasa dari sumber galian', 'M3', 5, NULL, NULL),
(222, 'Timbunan Biasa dari hasil galian', 'M3', 5, NULL, NULL),
(223, 'Timbunan Pilihan dari sumber galian', 'M3', 5, NULL, NULL),
(224, 'Timbunan Pilihan dari galian', 'M3', 5, NULL, NULL),
(225, 'Timbunan Pilihan (diukur diatas bak truk)', 'M3', 5, NULL, NULL),
(226, 'Timbunan Pilihan (diukur dengan rod & plate)', 'M3', 5, NULL, NULL),
(227, 'Penimbunan Kembali Berbutir (Granular Backfill)', 'M3', 5, NULL, NULL),
(228, 'Penyiapan Badan Jalan', 'M2', 5, NULL, NULL),
(229, 'Pembersihan dan Pengupasan Lahan ', 'M2', 5, NULL, NULL),
(230, 'Pemotongan Pohon diameter 15 – 30 cm + Dongklak dan pengisian galian', 'buah', 5, NULL, NULL),
(231, 'Pemotongan Pohon Pilihan diameter > 30 – 50 cm', 'buah', 5, NULL, NULL),
(232, 'Pemotongan Pohon Pilihan diameter > 50 – 75 cm', 'buah', 5, NULL, NULL),
(233, 'Pemotongan Pohon Pilihan diameter > 75 cm', 'buah', 5, NULL, NULL),
(234, 'Geotekstil Filter untuk Drainage Bawah Permukaan (Kelas 2)', 'M2', 5, NULL, NULL),
(235, 'Geotekstil Separator Kelas 1', 'M2', 5, NULL, NULL),
(236, 'Geotekstil Separator Kelas 2', 'M2', 5, NULL, NULL),
(237, 'Geotekstil Separator Kelas 3', 'M2', 5, NULL, NULL),
(238, 'Geotekstil Stabilisator (Kelas 1)', 'M2', 5, NULL, NULL),
(239, 'Pengabutan (Fog Seal) dengan Aspal Emulsi yang Mengikat Lambat (CSS-1h atau SS-1h)', 'Liter', 6, NULL, NULL),
(240, 'Pengabutan (Fog Seal) dengan Aspal Emulsi yang Mengikat Lebih Cepat (CQS-1h atau QS-1h)', 'Liter', 6, NULL, NULL),
(241, 'Pengabutan (Fog Seal) dengan Aspal Emulsi Modifikasi Polymer yang Mengikat Lebih Cepat (PMCQS-1h atau PMQS-1h)', 'Liter', 6, NULL, NULL),
(242, 'Laburan Aspal (Buras)', 'M2', 6, NULL, NULL),
(243, 'Penghamparan lapis penutup bubur aspal emulsi, tipe 1, CSS-1h SS-1h', 'M2', 6, NULL, NULL),
(244, 'Penghamparan lapis penutup bubur aspal emulsi, tipe 1, CQS-1h QS-1h', 'M2', 6, NULL, NULL),
(245, 'Penghamparan lapis penutup bubur aspal emulsi, tipe 2, CSS-1h SS-1h', 'M2', 6, NULL, NULL),
(246, 'Penghamparan lapis penutup bubur aspal emulsi, tipe 2, CQS-1h QS-1h', 'M2', 6, NULL, NULL),
(247, 'Penghamparan lapis penutup bubur aspal emulsi, tipe 3, CSS-1h SS-1h', 'M2', 6, NULL, NULL),
(248, 'Penghamparan lapis penutup bubur aspal emulsi, tipe 3, CQS-1h QS-1h', 'M2', 6, NULL, NULL),
(249, 'Lapis Permukaan Mikro dengan aspal emulsi modifikasi  polymer  PMCQS-1h atau PMCQS-1h untuk Tipe 1', 'M2', 6, NULL, NULL),
(250, 'Lapis Permukaan Mikro Perata dengan aspal emulsi modifikasi  polymer  PMCQS-1h atau PMCQS-1h untuk Tipe 1', 'Ton', 6, NULL, NULL),
(251, 'Lapis Permukaan Mikro dengan aspal emulsi modifikasi  polymer  PMCQS-1h atau PMCQS-1h untuk Tipe 2', 'M2', 6, NULL, NULL),
(252, 'Lapis Permukaan Mikro Perata dengan aspal emulsi modifikasi  polymer  PMCQS-1h atau PMCQS-1h untuk Tipe 2', 'Ton', 6, NULL, NULL),
(253, 'Latasir Kelas A (SS-A)', 'Ton', 6, NULL, NULL),
(254, 'Latasir Kelas B (SS-B)', 'Ton', 6, NULL, NULL),
(255, 'Latasir Kelas A Modifikasi (SS-A Mod)', 'Ton', 6, NULL, NULL),
(256, 'Latasir Kelas B Modifikasi (SS-B Mod)', 'Ton', 6, NULL, NULL),
(257, 'Lapis Tipis Beton Aspal - A (LTBA-A)', 'Ton', 6, NULL, NULL),
(258, 'Lapis Tipis Beton Aspal - B Halus (LTBA-B Halus)', 'Ton', 6, NULL, NULL),
(259, 'Lapis Tipis Beton Aspal - B Halus (LTBA-B Kasar)', 'Ton', 6, NULL, NULL),
(260, 'Lapis Tipis Beton Aspal - B Halus Modifikasi Kasar (LTBA-B Mod Kasar)', 'Ton', 6, NULL, NULL),
(261, 'Stone Matrix Asphalt Tipis (SMA Tipis)', 'Ton', 6, NULL, NULL),
(262, 'Stone Matrix Asphalt Modifikasi Tipis (SMA Mod Tipis)', 'Ton', 6, NULL, NULL),
(263, 'Tambalan Dangkal dengan Beton Semen Cepat Mengeras untuk Pembbukaan Lalu Lintas Umur Beton < 24 jam', 'M3', 6, NULL, NULL),
(264, 'Tambalan Dangkal dengan Beton Semen Cepat Mengeras untuk Pembukaan Lalu Lintas Umur Beton lebih dari 1 hari dan kurang dari 3 hari', 'M3', 6, NULL, NULL),
(265, 'Tambahan Dangkal dengan Beton Semen Cepat Mengeras untuk Pembukaan Lalu Lintas Umur Beton lebih dari 3 hari dan kurang dari 7 hari', 'M3', 6, NULL, NULL),
(266, 'Tambalan Penuh dengan Beton Semen Cepat Mengeras untuk Pembukaan Lalu Lintas Umur Beton < 24 jam', 'M3', 6, NULL, NULL),
(267, 'Tambalan Penuh dengan Beton Semen Cepat Mengeras untuk Pembukaan Lalu Lintas Umur Beton lebih dari 1 hari dan kurang dari 3 hari', 'M3', 6, NULL, NULL),
(268, 'Tambalan Penuh dengan Beton Semen Cepat Mengeras untuk Pembukaan Lalu Lintas Umur Beton lebih dari 3 hari dan kurang dari 7 hari', 'M3', 6, NULL, NULL),
(269, 'Pemasangan Ruji (Dowel)', 'Buah', 6, NULL, NULL),
(270, 'Pemasangan Sealant', 'M', 6, NULL, NULL),
(271, 'Penambahan dan/atau Penggantian Ruji (Dowel) pada Perkerasan Beton Semen dengan Epoksi', 'Buah', 6, NULL, NULL),
(272, 'Penjahitan Melintang Tipe 1 (tabel pelat beton = 150 - 175 mm)', 'Buah', 6, NULL, NULL),
(273, 'Penjahitan Melintang Tipe 2 (tabel pelat beton = > 175 mm - 200 mm)', 'Buah', 6, NULL, NULL),
(274, 'Penjahitan Melintang Tipe 3 (tabel pelat beton = > 200 mm - 225 mm)', 'Buah', 6, NULL, NULL),
(275, 'Penjahitan Melintang Tipe 4 (tabel pelat beton = > 225 mm - 250 mm)', 'Buah', 6, NULL, NULL),
(276, 'Penjahitan Melintang Tipe 5 (tabel pelat beton = > 250 mm - 275 mm)', 'Buah', 6, NULL, NULL),
(277, 'Penjahitan Melintang Tipe 6 (tabel pelat beton = > 275 mm -300 mm)', 'Buah', 6, NULL, NULL),
(278, 'Penjahitan Melintang Tipe 7 (tabel pelat beton = > 300 mm - 325 mm)', 'Buah', 6, NULL, NULL),
(279, 'Penjahitan Melintang Tipe 8 (tabel pelat beton = > 325 mm - 350 mm)', 'Buah', 6, NULL, NULL),
(280, 'Penutupan Sambungan Melintang (Termoplastik)', 'M', 6, NULL, NULL),
(281, 'Penutupan Sambungan Melintang (Termoseting)', 'M', 6, NULL, NULL),
(282, 'Penutupan Sambungan Melintang (Preformed)', 'M', 6, NULL, NULL),
(283, 'Penutupan Sambungan Memanjang (Termoplastik)', 'M', 6, NULL, NULL),
(284, 'Penutupan Sambungan Memanjang (Termoseting)', 'M', 6, NULL, NULL),
(285, 'Penutupan Sambungan Memanjang (Preformed)', 'M', 6, NULL, NULL),
(286, 'Penutupan Retak (Termoplastik)', 'M', 6, NULL, NULL),
(287, 'Penutupan Retak (Termoseting)', 'M', 6, NULL, NULL),
(288, 'Pengeboran Lubang ', 'Buah', 6, NULL, NULL),
(289, 'Material Injeksi Berbahan Dasar Semen', 'Kg', 6, NULL, NULL),
(290, 'Material Injeksi Berbahan Dasar Cellular ', 'Kg', 6, NULL, NULL),
(291, 'Lapis Pondasi Agregat Kelas A', 'M3', 7, NULL, NULL),
(292, 'Lapis Pondasi Agregat Kelas B', 'M3', 7, NULL, NULL),
(293, 'Lapis Pondasi Agregat Kelas S', 'M3', 7, NULL, NULL),
(294, 'Lapis Drainase', 'M3', 7, NULL, NULL),
(295, 'Lapis Permukaan Agregat Tanpa Penutup Aspal', 'M3', 7, NULL, NULL),
(296, 'Lapis Pondasi Agregat Tanpa Penutup Aspal', 'M3', 7, NULL, NULL),
(297, 'Perkerasan Beton Semen (PPC)', 'M3', 7, NULL, NULL),
(298, 'Perkerasan Beton Semen (OPC Tipe I + Fly ash)', 'M3', 7, NULL, NULL),
(299, 'Perkerasan Beton Semen Fast Track 8 Jam ', 'M3', 7, NULL, NULL),
(300, 'Perkerasan Beton Semen  Fast Track 24 Jam', 'M3', 7, NULL, NULL),
(301, 'Perkerasan Beton Semen dengan Anyaman Tulangan Tunggal ', 'M3', 7, NULL, NULL),
(302, 'Perkerasan Beton Semen Fast Track 8 Jam dengan Anyaman Tulangan Tunggal ', 'M3', 7, NULL, NULL),
(303, 'Perkerasan Beton Semen Fast Track 24 Jam dengan Anyaman Tulangan Tunggal ', 'M3', 7, NULL, NULL),
(304, 'Lapis Pondasi bawah Beton Kurus (Concrete Vibrator)', 'M3', 7, NULL, NULL),
(305, 'Stabilisasi Tanah Dasar dengan Semen', 'Ton', 7, NULL, NULL),
(306, 'Lapis Fondasi Tanah Semen', 'M3', 7, NULL, NULL),
(307, 'Lapis Fondasi Agregat Semen Kelas A (Cement Treated Base = CTB)', 'M3', 7, NULL, NULL),
(308, 'Lapis Fondasi Agregat Semen Kelas B (Cement Treated Sub-Base = CTSB)', 'M3', 7, NULL, NULL),
(309, 'Lapis Resap Pengikat - Aspal Cair/Emulsi', 'Liter', 8, NULL, NULL),
(310, 'Lapis Perekat - Aspal Cair', 'Liter', 8, NULL, NULL),
(311, 'Lapis Perekat - Aspal Emulsi Modifikasi Polimer', 'Liter', 8, NULL, NULL),
(312, 'Agregat Penutup BURTU', 'M2', 8, NULL, NULL),
(313, 'Agregat Penutup BURDA', 'M2', 8, NULL, NULL),
(314, 'Bahan Aspal Keras untuk Pekerjaan Pelaburan', 'Liter', 8, NULL, NULL),
(315, 'Bahan Aspal Emulsi Modifikasi untuk Pekerjaan Pelaburan', 'Liter', 8, NULL, NULL),
(316, 'Aspal Cair untuk Precoated', 'Liter', 8, NULL, NULL),
(317, 'Aspal Emulsi untuk Precoated', 'Liter', 8, NULL, NULL),
(318, 'Aspal Emulsi Modifikasi Polimer untuk Precoated', 'Liter', 8, NULL, NULL),
(319, 'Stone Matrix Asphalt Halus (SMA Halus)', 'Ton', 8, NULL, NULL),
(320, 'Stone Matrix Asphalt Modifikasi Halus (SMA Mod Halus)', 'Ton', 8, NULL, NULL),
(321, 'Stone Matrix Asphalt Kasar (SMA Kasar)', 'Ton', 8, NULL, NULL),
(322, 'Stone Matrix Asphalt Modifikasi Kasar (SMA Mod Kasar)', 'Ton', 8, NULL, NULL),
(323, 'Lataston Lapis Aus (HRS-WC) ', 'Ton', 8, NULL, NULL),
(324, 'Lataston Lapis Fondasi (HRS-Base) ', 'Ton', 8, NULL, NULL),
(325, 'Laston Lapis Aus (AC-WC)', 'Ton', 8, NULL, NULL),
(326, 'Laston Lapis Aus Modifikasi (AC-WC Mod)', 'Ton', 8, NULL, NULL),
(327, 'Laston Lapis Antara (AC-BC)', 'Ton', 8, NULL, NULL),
(328, 'Laston Lapis Antara Modifikasi (AC-BC Mod)', 'Ton', 8, NULL, NULL),
(329, 'Laston Lapis Fondasi (AC-Base)', 'Ton', 8, NULL, NULL),
(330, 'Laston Lapis Fondasi Modifikasi (AC-Base Mod)', 'Ton', 8, NULL, NULL),
(331, 'Bahan anti pengelupasan', 'Kg', 8, NULL, NULL),
(332, 'Laston Hangat Pen.60-70, WMAC Lapis Aus (WMAC-WC) dengan Zeolit', 'Ton', 8, NULL, NULL),
(333, 'Laston Hangat Pen.60-70, WMAC Lapis Aus (WMAC-WC) dengan Wax', 'Ton', 8, NULL, NULL),
(334, 'Laston Hangat Pen.60-70, WMAC Lapis Antara (WMAC-BC) dengan Zeolit', 'Ton', 8, NULL, NULL),
(335, 'Laston Hangat Pen.60-70, WMAC Lapis Antara (WMAC-BC) dengan Wax', 'Ton', 8, NULL, NULL),
(336, 'Laston Hangat Pen.60-70, WMAC Lapis Fondasi (WMAC-Base) dengan Zeolit', 'Ton', 8, NULL, NULL),
(337, 'Laston Hangat Pen.60-70, WMAC Lapis Fondasi (WMAC-Base) dengan Wax', 'Ton', 8, NULL, NULL),
(338, 'Laston Lapis Aus Asbuton (AC-WC Asb)', 'Ton', 8, NULL, NULL),
(339, 'Laston Lapis Antara Asbuton (AC-BC Asb)', 'Ton', 8, NULL, NULL),
(340, 'Laston Lapis Fondasi Asbuton (AC-Base Asb)', 'Ton', 8, NULL, NULL),
(341, 'CPHMA Kemasa Kantong', 'Ton', 8, NULL, NULL),
(342, 'Lapis Penetrasi Macadam (Leveling)', 'M3', 8, NULL, NULL),
(343, 'Lapis Penetrasi Macadam Asbuton', 'M3', 8, NULL, NULL),
(344, 'Beton struktur, fc’50 MPa', 'M3', 9, NULL, NULL),
(345, 'Beton struktur, fc’45 MPa', 'M3', 9, NULL, NULL),
(346, 'Beton struktur, fc’40 MPa ', 'M3', 9, NULL, NULL),
(347, 'Beton struktur, fc’35 MPa', 'M3', 9, NULL, NULL),
(348, 'Beton struktur, fc’30 Mpa', 'M3', 9, NULL, NULL),
(349, 'Beton struktur, fc’30 Mpa untuk plat lantai jembatan', 'M3', 9, NULL, NULL),
(350, 'Beton struktur bervolome besar, fc\'30 MPa', 'M3', 9, NULL, NULL),
(351, 'Beton strukutr memadat sendiri, fc\'30 MPa', 'M3', 9, NULL, NULL),
(352, 'Beton struktur, fc’25 Mpa (Struktur Lainnya)', 'M3', 9, NULL, NULL),
(353, 'Beton struktur bervolume besar, fc’25 Mpa', 'M3', 9, NULL, NULL),
(354, 'Beton struktur memadat sendiri, fc’25 Mpa', 'M3', 9, NULL, NULL),
(355, 'Beton struktur, fc’20 MPa ', 'M3', 9, NULL, NULL),
(356, 'Beton struktur, fc’20 MPa (Jalan)', 'M3', 9, NULL, NULL),
(357, 'Beton struktur, fc’20 MPa (Struktur Saluran dan lainnya)', 'M3', 9, NULL, NULL),
(358, 'Beton struktur bervolume besar, fc’20 MPa ', 'M3', 9, NULL, NULL),
(359, 'Beton struktur memadat sendiri, fc’20 MPa ', 'M3', 9, NULL, NULL),
(360, 'Beton struktur, fc’20 MPa yang dilaksanakan di air', 'M3', 9, NULL, NULL),
(361, 'Beton , fc’15 Mpa (Bahu Jalan)', 'M3', 9, NULL, NULL),
(362, 'Beton Siklop, fc’15 Mpa', 'M3', 9, NULL, NULL),
(363, 'Beton, fc’10 Mpa', 'M3', 9, NULL, NULL),
(364, 'Penyediaan Unit Pracetak Gelagar Tipe I Bentang 16 meter', 'Buah', 9, NULL, NULL),
(365, 'Penyediaan Unit Pracetak Gelagar Tipe I Bentang 25 meter', 'Buah', 9, NULL, NULL),
(366, 'Penyediaan dan pemasangan Unit Pracetak Gelagar Tipe 1 Bentang 35,60 meter (post tension segmental)', 'Buah', 9, NULL, NULL),
(367, 'Pemasangan Unit Pracetak Gelagar Tipe I Bentang 16 meter', 'Buah', 9, NULL, NULL),
(368, 'Pemasangan Unit Pracetak Gelagar Tipe I Bentang 25 meter', 'Buah', 9, NULL, NULL),
(369, 'Pemasangan Unit Pracetak Gelagar Tipe I Bentang ….. meter', 'Buah', 9, NULL, NULL),
(370, 'Penyediaan Unit Pracetak Gelagar Tipe U Bentang 16 meter', 'Buah', 9, NULL, NULL),
(371, 'Penyediaan Unit Pracetak Gelagar Tipe U Bentang ….. meter', 'Buah', 9, NULL, NULL),
(372, 'Pemasangan Unit Pracetak Gelagar Tipe U Bentang 16 meter', 'Buah', 9, NULL, NULL),
(373, 'Pemasangan Unit Pracetak Gelagar Tipe U Bentang … meter', 'Buah', 9, NULL, NULL),
(374, 'Penyediaan Unit Pracetak Gelagar Box bentang ….. meter lebar .……meter', 'Buah', 9, NULL, NULL),
(375, 'Pemasangan Unit Pracetak Gelagar Box bentang ….. meter lebar ……meter', 'Buah', 9, NULL, NULL),
(376, 'Baja Prategang ', 'Kg', 9, NULL, NULL),
(377, 'Penyediaan Pelat Berongga (Voided Slab) Pracetak bentang ….. Meter', 'Buah', 9, NULL, NULL),
(378, 'Pemasangan Pelat Berongga (Voided Slab) Pracetak bentang ….. Meter', 'Buah', 9, NULL, NULL),
(379, 'Beton Diafragma tepi fc’ 30 MPa termasuk pekerjaan penegangan setelah pengecoran (post tension)', 'Buah', 9, NULL, NULL),
(380, 'Beton Diafragma tengah fc’ 30 MPa termasuk pekerjaan penegangan setelah pengecoran (post tension)', 'Buah', 9, NULL, NULL),
(381, 'Penyediaan Balok T Beton Pratekan bentang 40m', 'Buah', 9, NULL, NULL),
(382, 'Pemasangan Balok T Beton Pratekan bentang 60 m', 'Buah', 9, NULL, NULL),
(383, 'Penyediaan Panel Full Depth slab', 'Buah', 9, NULL, NULL),
(384, 'Plat deck (120x100x7)cm', 'pcs', 9, NULL, NULL),
(385, 'Baja Tulangan Polos-BjTP 280', 'Kg', 9, NULL, NULL),
(386, 'Baja Tulangan Sirip BjTS 280', 'Kg', 9, NULL, NULL),
(387, 'Baja Tulangan Sirip BjTS 420A', 'Kg', 9, NULL, NULL),
(388, 'Baja Tulangan Sirip BjTS 420B', 'Kg', 9, NULL, NULL),
(389, 'Baja Tulangan Sirip BjTS 520', 'Kg', 9, NULL, NULL),
(390, 'Baja Tulangan Sirip BjTS 550', 'Kg', 9, NULL, NULL),
(391, 'Baja Tulangan Sirip BjTS 700', 'Kg', 9, NULL, NULL),
(392, 'Anyaman Kawat Yang Dilas (Welded Wire Mesh)', 'Kg', 9, NULL, NULL),
(393, 'Penyediaan Baja Struktur Grade 250 (Kuat Leleh 250 MPa)', 'Kg', 9, NULL, NULL),
(394, 'Penyediaan Baja Struktur Grade 345 (Kuat Leleh 345 MPa)', 'Kg', 9, NULL, NULL),
(395, 'Penyediaan Baja Struktur Grade 485 (Kuat Leleh 485 MPa)', 'Kg', 9, NULL, NULL),
(396, 'Penyediaan Baja Struktur Grade 690 (Kuat Leleh 690 Mpa Untuk Tebal Pelat < 2,5)', 'Kg', 9, NULL, NULL),
(397, 'Penyediaan Baja Struktur Grade 690 (Kuat Leleh 620 Mpa Untuk Tebal Pelat < 2,5-4,0 inch)', 'Kg', 9, NULL, NULL),
(398, 'Pemasangan Baja Struktur ', 'Kg', 9, NULL, NULL),
(399, 'Penyediaan Struktur Jembatan Rangka Baja Standar …… m', 'Kg', 9, NULL, NULL),
(400, 'Pemasangan Jembatan Rangka Baja Standar Panjang ….. M', 'Kg', 9, NULL, NULL),
(401, 'Pemasangan Jembatan Rangka Baja yang disediakan Pengguna Jasa', 'Kg', 9, NULL, NULL),
(402, 'Pengangkutan Bahan Jembatan yang disediakan Pengguna Jasa', 'Kg', 9, NULL, NULL),
(403, 'Tiang bor sekan primer diameter 80 cm (fc\' > 15 MPa)', 'M', 9, NULL, NULL),
(404, 'Tiang bor sekan sekunder diameter 80 cm (fc\' > 30 MPa)', 'M', 9, NULL, NULL),
(405, 'Tiang bor sekan primer  diameter 100 cm (fc\' > 15MPa)', 'M', 9, NULL, NULL),
(406, 'Tiang bor sekan sekunder diameter 100 cm (fc\' > 30 MPa)', 'M', 9, NULL, NULL),
(407, 'Tiang bor sekan primer diameter 120 cm (fc\' > 15 MPa)', 'M', 9, NULL, NULL),
(408, 'Tiang bor sekan sekunder diameter 120 cm (fc\' > 30 MPa)', 'M', 9, NULL, NULL),
(409, 'Tiang bor sekan primer diameter 150 cm (fc\' > 15 MPa)', 'M', 9, NULL, NULL),
(410, 'Tiang bor sekan sekunder diameter 150 cm (fc\' > 15 MPa)', 'M', 9, NULL, NULL),
(411, 'Tiang bor sekan primer diameter …… cm (fc\' > 15 MPa)', 'M', 9, NULL, NULL),
(412, 'Tiang bor sekan sekunder diameter …..  cm (fc\' > 15 MPa)', 'M', 9, NULL, NULL),
(413, 'Fondasi Cerucuk, Penyediaan dan Pemancangan', 'M', 9, NULL, NULL),
(414, 'Dinding Turap Kayu Tanpa Pengawetan, Penyediaan dan Pemancangan', 'M2', 9, NULL, NULL),
(415, 'Dinding Turap Kayu Dengan Pengawetan, Penyediaan dan Pemancangan', 'M2', 9, NULL, NULL),
(416, 'Dinding Turap Baja, Penyediaan dan Pemancangan', 'M2', 9, NULL, NULL),
(417, 'Dinding Turap Beton, Penyediaan dan Pemancangan', 'M2', 9, NULL, NULL),
(418, 'Penyediaan Tiang Pancang Kayu Tanpa Pengawetan Ukuran…… mm', 'M', 9, NULL, NULL),
(419, 'Penyediaan Tiang Pancang Kayu Dengan Pengawetan Ukuran…… mm', 'M', 9, NULL, NULL),
(420, 'Penyediaan Tiang Pancang Baja Diameter 500 mm tebal 10 mm', 'M', 9, NULL, NULL),
(421, 'Penyediaan Tiang Pancang Baja Diameter …. mm tebal …... mm', 'M', 9, NULL, NULL),
(422, 'Penyediaan Tiang Pancang Baja Diameter …... mm tebal …… mm', 'M', 9, NULL, NULL),
(423, 'Penyediaan Tiang Pancang Baja H Beam Ukuran 300 mm x 300 mm x 10 mm x 15 mm', 'M', 9, NULL, NULL),
(424, 'Penyediaan Tiang Pancang Baja H Beam Ukuran …..mm x …….. mm x …….mm x ……... mm', 'M', 9, NULL, NULL),
(425, 'Penyediaan Tiang Pancang Beton Bertulang Pracetak ukuran 350 mm x 350 mm', 'M', 9, NULL, NULL),
(426, 'Penyediaan Tiang Pancang Beton Bertulang Pracetak ukuran ……..mm x ……... mm', 'M', 9, NULL, NULL),
(427, 'Penyediaan Tiang Pancang Beton Pratekan Pracetak ukuran 400 mm x 400  mm', 'M', 9, NULL, NULL),
(428, 'Penyediaan Tiang Pancang Beton Pratekan Pracetak ukuran ……. mm x ……….  mm', 'M', 9, NULL, NULL),
(429, 'Penyediaan Tiang Pancang Beton Pratekan Pracetak diameter 450 mm', 'M', 9, NULL, NULL),
(430, 'Penyediaan Tiang Pancang Beton Pratekan Pracetak diameter ……...mm', 'M', 9, NULL, NULL),
(431, 'Pemancangan Tiang Pancang Kayu Ukuran ….. Mm', 'M', 9, NULL, NULL),
(432, 'Pemancangan Tiang Pancang Baja Diameter 500 mm ', 'M', 9, NULL, NULL),
(433, 'Pemancangan Tiang Pancang Baja Diameter …….. mm ', 'M', 9, NULL, NULL),
(434, 'Pemancangan Tiang Pancang Baja H beam Ukuran 300 mm x 300 mm x 10 mm x 15 mm', 'M', 9, NULL, NULL),
(435, 'Pemancangan Tiang Pancang Baja H beam Ukuran…….. mm x …….. mm x …….. mm x ……... mm', 'M', 9, NULL, NULL),
(436, 'Pemancangan Tiang Pancang Beton Bertulang Pracetak ukuran 350 mm x 350 mm ', 'M', 9, NULL, NULL),
(437, 'Pemancangan Tiang Pancang Beton Bertulang Pracetak ukuran………. mm x ………... mm ', 'M', 9, NULL, NULL),
(438, 'Pemancangan Tiang Pancang Beton Pratekan Pracetak ukuran 400 mm x 400 mm', 'M', 9, NULL, NULL),
(439, 'Pemancangan Tiang Pancang Beton Pratekan Pracetak ukuran ………. mm x ….. mm', 'M', 9, NULL, NULL),
(440, 'Pemancangan Tiang Pancang Beton Pratekan Pracetak diameter 450 mm', 'M', 9, NULL, NULL),
(441, 'Pemancangan Tiang Pancang Beton Pratekan Pracetak diameter ….. mm', '', 9, NULL, NULL),
(442, 'Tiang Bor Beton, diameter 800 mm', 'M', 9, NULL, NULL),
(443, 'Tiang Bor Beton, diameter ….. mm', 'M', 9, NULL, NULL),
(444, 'Tambahan Biaya untuk Nomor Mata Pembayaran 7.6.(13)s/d 7.6.(18) bila Tiang Pancang dikerjakan di tempat Yang Berair', 'M', 9, NULL, NULL),
(445, 'Tambahan Biaya untuk Nomor Mata Pembayaran 7.6.(19) Bila Tiang Bor Beton dikerjakan ditempat Yang Berair', 'M', 9, NULL, NULL),
(446, 'Pengujian Pembebanan Pada Tiang Dengan Diameter sampai 600 mm', 'Buah', 9, NULL, NULL),
(447, 'Pengujian Pembebanan Pada Tiang Dengan Diameter di atas 600 mm', 'Buah', 9, NULL, NULL),
(448, 'Tiang Uji jenis …. Ukuran ……', 'M', 9, NULL, NULL),
(449, 'Pengujian Pembebanan Statis pada Tiang ukuran / diameter .... Dengan beban hidrolik Cara Beban Siklik', 'Buah', 9, NULL, NULL),
(450, 'Pengujian Pembebanan Statis pada Tiang ukuran / diameter .... Dengan beban hidrolik Cara Beban Bertahap', 'Buah', 9, NULL, NULL),
(451, 'Pengujian Pembebanan Statis pada Tiang ukuran / diameter ……. meja beban statis Cara beban Siklik', 'Buah', 9, NULL, NULL),
(452, 'Pengujian Pembebanan Statis pada Tiang ukuran / diameter ……. meja beban statis Cara beban Bertahap', 'Buah', 9, NULL, NULL),
(453, 'Pengujian Crosshole sonic logging (CSL) pada Tiang bor beton diameter ....', 'Buah', 9, NULL, NULL),
(454, 'Pengujian Pembebanan Dinamis Jenis PDLT (Pile Dynamic Load Testing) pada Tiangukuran / diameter ....', 'Buah', 9, NULL, NULL),
(455, 'Pengujian Keutuhan Tiang dengan Pile Integrated Test (PIT)', 'Buah', 9, NULL, NULL),
(456, 'Dinding Sumuran Silinder terpasang, Diameter 4 meter', 'M', 9, NULL, NULL),
(457, 'Pasangan Batu', 'M3', 9, NULL, NULL),
(458, 'Pasangan Batu Kosong yang Diisi Adukan', 'M3', 9, NULL, NULL),
(459, 'Pasangan Batu Kosong', 'M3', 9, NULL, NULL),
(460, 'Bronjong dengan kawat yang dilapisi Galvanis batu kali', 'M3', 9, NULL, NULL),
(461, 'Bronjong dengan kawat yang dilapisi PVC', 'M3', 9, NULL, NULL),
(462, 'Tambahan Biaya  untuk Anyaman Penulangan Tanah dengan Kawat yang Dilapisi PVC', 'M2', 9, NULL, NULL),
(463, 'Sambungan Siar Muai Tipe Asphaltic Plug, Fixed', 'M', 9, NULL, NULL),
(464, 'Sabungan siar Muai Tipe Asphaltic Plug, Movable', 'M', 9, NULL, NULL),
(465, 'Sambungan Siar Muai Tipe Silicone Seal', 'M', 9, NULL, NULL),
(466, 'Sambungan Siar Muai Tipe Strip seal', 'M', 9, NULL, NULL),
(467, 'Sambungan Siar Muai Tipe Compression Seal', 'M', 9, NULL, NULL),
(468, 'Sambungan Siar Muai Expansion Joint Tipe Modular, lebar ……..', 'M', 9, NULL, NULL),
(469, 'Sambungan Siar Muai Expansion Joint Tipe Finger Plate, lebar ……..', 'M', 9, NULL, NULL),
(470, 'Sambungan Siar Muai Expansion Tipe Karet dengan Lebar Celah …….. Cm', 'M3', 9, NULL, NULL),
(471, 'Joint Filler untuk Sambungan Konstruksi', 'M3', 9, NULL, NULL),
(472, 'Sambungan Siar Muai Tipe Modular, Lebar ……..', 'M3', 9, NULL, NULL),
(473, 'Landasan Logam Tipe Fixed', 'Buah', 9, NULL, NULL),
(474, 'Landasan Logam Tipe Moveable', 'Buah', 9, NULL, NULL),
(475, 'Landasan Logam Tipe …….', 'Buah', 9, NULL, NULL),
(476, 'Perletakan Elastomerik uk. (400 x 600 x 50)', 'pcs', 9, NULL, NULL),
(477, 'Landasan Elastomerik Karet Sintetis Berlapis Baja Ukuran ….. Mm x ….. Mm x…….. Mm', 'Buah', 9, NULL, NULL),
(478, 'Landasan karet Strip', 'M', 9, NULL, NULL),
(479, 'Landasan Tipe Logam Berongga (Pot Bearing)', 'Buah', 9, NULL, NULL),
(480, 'Landasan Tipe Logam Jenis Spherical', 'Buah', 9, NULL, NULL),
(481, 'Sandaran (Railing) finishing cat', 'M', 9, NULL, NULL),
(482, 'Leuning Panjang 2 m\' (finishing cat tembok sekualitas Decolith)', 'Bh', 9, NULL, NULL),
(483, 'Papan Nama Jembatan', 'Bh', 9, NULL, NULL),
(484, 'Pembongkaran Pasangan Batu', 'M3', 9, NULL, NULL),
(485, 'Pembongkaran Beton', 'M3', 9, NULL, NULL),
(486, 'Pembongkaran Beton Pratekan', 'M3', 9, NULL, NULL),
(487, 'Pembongkaran Bangunan Gedung', 'M2', 9, NULL, NULL),
(488, 'Pembongkaran  Rangka Baja', 'M2', 9, NULL, NULL),
(489, 'Pembongkaran Balok Baja (Steel Stingers)', 'M', 9, NULL, NULL),
(490, 'Pembongkaran Lantai Jembatan Kayu', 'M2', 9, NULL, NULL),
(491, 'Pembongkaran Jembatan Kayu', 'M2', 9, NULL, NULL),
(492, 'Pengangkutan Hasil Bongkaran yang melebihi 5 km', 'M3/KM', 9, NULL, NULL),
(493, 'Dreck drain', 'Buah', 9, NULL, NULL),
(494, 'Pipa Drainase Baja diameter 150 mm', 'M', 9, NULL, NULL),
(495, 'Pipa Drainase Baja diameter 3\'\'', 'M', 9, NULL, NULL),
(496, 'Pipa Drainase PVC diameter 150 mm', 'M', 9, NULL, NULL),
(497, 'Pipa Drainase PVC diameter 3\'\'', 'M', 9, NULL, NULL),
(498, 'Pipa Penyalur PVC', 'M', 9, NULL, NULL),
(499, 'Pengujian Pembebanan Jembatan', 'Buah Jembatan', 9, NULL, NULL),
(500, 'Cairan Perekat (Epoksi resin)', 'Kg', 10, NULL, NULL),
(501, 'Bahan Penutup (Sealant)', 'Kg', 10, NULL, NULL),
(502, 'Tabung Penyuntik, penyediaan', 'Buah', 10, NULL, NULL),
(503, 'Tabung Penyuntik, penggunan', 'Buah', 10, NULL, NULL),
(504, 'Penambahan (Patching)', 'M3', 10, NULL, NULL),
(505, 'Perbaikan Dengan Cara Graut', 'M3', 10, NULL, NULL),
(506, 'Pengecetan protektif pada elemen struktur beton, tebal 200µm', 'M2', 10, NULL, NULL),
(507, 'Pengecetan protektif pada elemen struktur beton, tebal : ……µm', 'M2', 10, NULL, NULL),
(508, 'Pengecetan dekoratif pada elemen struktur beton, tebal : 100 µm', 'M2', 10, NULL, NULL),
(509, 'Pengecetan dekoratif pada elemen struktur beton, tebal : ….. µm', 'M2', 10, NULL, NULL),
(510, 'Perkuatan struktur dengan bahan FRP jenis e- glass per lapis pada daerah kering', 'M2', 10, NULL, NULL),
(511, 'Perkuatan Struktur dengan bahan FRP jenis e- glass-per lapis pada daerah basah', 'M2', 10, NULL, NULL),
(512, 'Perkuatan Struktur dengan bahan FRP Laminasi jenis glass pada daerah kering', 'M2', 10, NULL, NULL),
(513, 'Perkuatan Struktur dengan bahan FRP Jenis carbon per lapis pada daerah kering', 'M2', 10, NULL, NULL),
(514, 'Perkuatan struktur dengan bahan FRP jenis carbon per lapis pada daerah basah', 'M2', 10, NULL, NULL),
(515, 'Perkuatan struktur dengan bahan FRP lainasi jenis carbon pada daerah kering;ll', 'M2', 10, NULL, NULL),
(516, 'Pemasangan Perkuatan Pelat Lantai dengan Steel Plate Bonding', 'Kg', 10, NULL, NULL),
(517, 'Perkuatan external stressing jembatan beton bentang …… m', 'Buah', 10, NULL, NULL),
(518, 'Penggantian Baut Mutu Tinggi A325 Tipe 1 diameter M25', 'Buah', 10, NULL, NULL),
(519, 'Penggantian Baut Mutu Tinggi A325 Tipe 1 diameter M20', 'Buah', 10, NULL, NULL),
(520, 'Penggantian Baut Mutu Tinggi A325 Tipe 1 diameter …… mm', 'Buah', 10, NULL, NULL),
(521, 'Penggantian Baut Mutu Tinggi A490 Tipe 1 diameter M25', 'Buah', 10, NULL, NULL),
(522, 'Penggantian Baut Mutu Tinggi A490 Tipe 1 diameter M20', 'Buah', 10, NULL, NULL),
(523, 'Penggantian Baut Mutu Tinggi A490 Tipe 1 diameter …… mm', 'Buah', 10, NULL, NULL),
(524, 'Penggantian Baut Biasa Grade A diameter M25', 'Buah', 10, NULL, NULL),
(525, 'Penggantian Baut Biasa Grade A diameter ……. mm', 'Buah', 10, NULL, NULL),
(526, 'Penggantian Baut Biasa Grade B diameter M25', 'Buah', 10, NULL, NULL),
(527, 'Penggantian Baut Biasa Grade B diameter …….. Mm', 'Buah', 10, NULL, NULL),
(528, 'Penggantian Baut Biasa Grade C untuk anchor bolts diameter M25', 'Buah', 10, NULL, NULL),
(529, 'Penggantian Baut Biasa Grade C untuk anchor bolts diameter ……. Mm', 'Buah', 10, NULL, NULL),
(530, 'Pengencangan Baut Biasa Grade A diameter M25', 'Buah', 10, NULL, NULL),
(531, 'Pengencangan Baut Biasa Grade A diameter …… mm', 'Buah', 10, NULL, NULL),
(532, 'Pengencangan Baut Biasa Grade B diameter M25', 'Buah', 10, NULL, NULL),
(533, 'Pengencangan Baut Biasa Grade B diameter ……. mm', 'Buah', 10, NULL, NULL),
(534, 'Pengelasan SMAW pada baja Grade 30', 'M', 10, NULL, NULL),
(535, 'Pengelasan SMAW pada baja Grade …..', 'M', 10, NULL, NULL),
(536, 'Pengelasan SAW pada baja Grade 30', 'M', 10, NULL, NULL),
(537, 'Pengelasan SAW pada baja Grade ……', 'M', 10, NULL, NULL),
(538, 'Pengelasan GMAW pada baja Grade 30', 'M', 10, NULL, NULL),
(539, 'Pengelasan GMAW pada baja Grade …..', 'M', 10, NULL, NULL),
(540, 'Pengelasan FCAW pada baja Grade 30', 'M', 10, NULL, NULL),
(541, 'Pengelasan FCAW pada baja Grade ……', 'M', 10, NULL, NULL),
(542, 'Pengecatan struktur baja pada daerah kering tebal 80 mikron', 'M2', 10, NULL, NULL),
(543, 'Pengecatan struktur baja pada daerah kering tebal 240 mikron', 'M2', 10, NULL, NULL),
(544, 'Pengecatan struktur baja pada daerah kering tebal ……  mikron', 'M2', 10, NULL, NULL),
(545, 'Pengecatan struktur baja pada daerah basah/pasang surut 360 mikron', 'M2', 10, NULL, NULL),
(546, 'Pengecatan struktur baja pada daerah basah/pasang surut 500 mikron', 'M2', 10, NULL, NULL),
(547, 'Pengecatan struktur baja pada daerah basah/pasang surut ….. mikron', 'M2', 10, NULL, NULL),
(548, 'Pengecatan pada elemen sandaran dan/atau pagar pengaman (gruard rail) 80 mikron', 'M2', 10, NULL, NULL),
(549, 'Pengecatan pada elemen sandaran dan/atau pagar pengaman (gruard rail) 160 mikron', 'M2', 10, NULL, NULL),
(550, 'Pengecatan pada elemen sandaran dan/atau pagar pengaman (gruard rail) ….. mikron', 'M2', 10, NULL, NULL),
(551, 'Perbaikan Elemen Struktur Baja dengan Cara Pelurusan ', 'LS', 10, NULL, NULL),
(552, 'Penggantian Elemen Struktur Baja Grade 250 (Kuat Leleh 250 Mpa)', 'Kg', 10, NULL, NULL),
(553, 'Penggantian Elemen Struktur Baja Grade 345 (Kuat Leleh 345 Mpa)', 'Kg', 10, NULL, NULL),
(554, 'Penggantian Elemen Struktur Baja Grade 485 (Kuat Leleh 485 Mpa)', 'Kg', 10, NULL, NULL),
(555, 'Penggantian Elemen Struktur Baja Grade ……..', 'Kg', 10, NULL, NULL),
(556, 'Pekuatan dengan external stressing untuk jembatan baja dengan bentang ……….m', 'Buah', 10, NULL, NULL),
(557, 'Penggantian Lantai Kayu', 'M3', 10, NULL, NULL),
(558, 'Perbaikan Lantai Kayu', 'M3', 10, NULL, NULL),
(559, 'Penggantian Gelegar Kayu', 'M3', 10, NULL, NULL),
(560, 'Perbaikan Gelegar Kayu', 'M3', 10, NULL, NULL),
(561, 'Penggantian Balok Kepala Tiang', 'M3', 10, NULL, NULL),
(562, 'Perbaikan Papan Lajur Kendaraan', 'M3', 10, NULL, NULL),
(563, 'Pengantian Papan Lajur Kendaraan ', 'M3', 10, NULL, NULL),
(564, 'Perbaikan dan/atau Penggantian kerb kayu', 'M3', 10, NULL, NULL),
(565, 'Perbaikan dan/atau Penggantian sandaran Kayu', 'M3', 10, NULL, NULL),
(566, 'Pengecatan/Perlindungan Gelegar', 'M2', 10, NULL, NULL),
(567, 'Pengecatan/Perlindungan Lantai Kayu', 'M2', 10, NULL, NULL),
(568, 'Pengecatan/Perlindungan Tiang Pancang Kayu', 'M2', 10, NULL, NULL),
(569, 'Pengecatan/Perlindungan Balok Kepala Kayu', 'M2', 10, NULL, NULL),
(570, 'Pengecatan/Perlindungan Sandaran', 'M', 10, NULL, NULL),
(571, 'Penggantian dan Perbaikan Sambungan Siar Muai Tipe Asphaltic Plug', 'M', 10, NULL, NULL),
(572, 'Penggantian dan Perbaikan Sambungan Siar Muai Tipe Silicone Seal', 'M', 10, NULL, NULL),
(573, 'Penggantian Karet Pengisi Sambungan Siar Muai Tipe Strip Seal', 'M', 10, NULL, NULL),
(574, 'Penggantian Karet Pengisi Sambungan Siar Muai Tipe Compression Seal', 'M', 10, NULL, NULL),
(575, 'Penggantian Sambungan Siar Muai Tipe Modular, lebar ……..', 'M', 10, NULL, NULL),
(576, 'Penggantian Sambungan Siar Muai Tipe Finger Plate, lebar ……..', 'M', 10, NULL, NULL),
(577, 'Penggantian Sambungan Siar Muai Tipe Dobel Siku dengan Penutup Karet Neoprene', 'M', 10, NULL, NULL),
(578, 'Penggantian Landasan Logam Tipe ……', 'Buah', 10, NULL, NULL),
(579, 'Penggantian Landasan Elastomer Karet Alam Berlapis Baja Ukuruan …. mm x …… mm x ……. mm', 'Buah', 10, NULL, NULL),
(580, 'Penggantian Landasan Elastomer Sintetis Berlapis Baja Ukuran ….. mm x ….. mm x …….. mm', 'Buah', 10, NULL, NULL),
(581, 'Penggantian Landasan Karet Strip tebal …. mm', 'M', 10, NULL, NULL),
(582, 'Penggantian Landasan Logam Berongga (Pot Bearing)', 'Buah', 10, NULL, NULL),
(583, 'Penggantian Landasan Logam Jenis Spherical', 'Buah', 10, NULL, NULL),
(584, 'Penggantian Stopper Lateral dan Horisontal', 'Buah', 10, NULL, NULL),
(585, 'Perbaikan Sandaran Baja', 'M', 10, NULL, NULL),
(586, 'Penggantian Sandaran Baja', 'M', 10, NULL, NULL),
(587, 'Perbaikan Tembok Sandaran Beton', 'M', 10, NULL, NULL),
(588, 'Perbaikan Sandaran Beton-Baja', 'M', 10, NULL, NULL),
(589, 'Penggantian Sandaran Beton-Baja', 'M', 10, NULL, NULL),
(590, 'Penggantian Deck Drain', 'Buah', 10, NULL, NULL),
(591, 'Penggantian Pipa Penyalur, Pipa Cucuran PVC diamter …… mm', 'M', 10, NULL, NULL),
(592, 'Penggantian Pipa Penyalur, Pipa Cucuran Baja diamter …… mm', 'M', 10, NULL, NULL),
(593, 'Mandor', 'Jam', 11, NULL, NULL),
(594, 'Pekerja Biasa', 'Jam', 11, NULL, NULL),
(595, 'Tukang Kayu, Tukang Batu, dsb', 'Jam', 11, NULL, NULL),
(596, 'Dump Truck, kapasitas 3 - 4 m³', 'Jam', 11, NULL, NULL),
(597, 'Dump Truck, kapasitas 6 - 8 m³', 'Jam', 11, NULL, NULL),
(598, 'Truk Bak Datar 3 - 4 ton', 'Jam', 11, NULL, NULL),
(599, 'Truk Bak Datar 6 - 8 ton', 'Jam', 11, NULL, NULL),
(600, 'Truk Tangki 3000 - 4500 Liter', 'Jam', 11, NULL, NULL),
(601, 'Bulldozer 100 - 150 PK', 'Jam', 11, NULL, NULL),
(602, 'Motor Grader min 100 PK', 'Jam', 11, NULL, NULL),
(603, 'Loader Roda Karet 1.0 - 1.6 M3', 'Jam', 11, NULL, NULL),
(604, 'Loader Roda Berantai 75 - 100 PK', 'Jam', 11, NULL, NULL),
(605, 'Alat Penggali (Excavator) 80 - 140 PK', 'Jam', 11, NULL, NULL),
(606, 'Crane 10 - 15 Ton', 'Jam', 11, NULL, NULL),
(607, 'Penggilas Roda Besi 6 - 9 Ton', 'Jam', 11, NULL, NULL),
(608, 'Penggilas Bervibrasi  5 - 8  Ton', 'Jam', 11, NULL, NULL),
(609, 'Pemadat Bervibrasi 1.5 - 3.0 PK', 'Jam', 11, NULL, NULL),
(610, 'Penggilas Roda Karet 8 - 10 Ton', 'Jam', 11, NULL, NULL),
(611, 'Kompresor 4000 - 6500 Ltr/mnt', 'Jam', 11, NULL, NULL),
(612, 'Mesin Pengaduk beton (Molen) 0.3 - 0.6 M3', 'Jam', 11, NULL, NULL),
(613, 'Pompa Air 70 - 100 mm', 'Jam', 11, NULL, NULL),
(614, 'Jack Hammer', 'Jam', 11, NULL, NULL),
(615, 'Marka Jalan Termoplastik', 'M2', 11, NULL, NULL),
(616, 'Marka Jalan Bukan Termoplastik', 'M2', 11, NULL, NULL),
(617, 'Rambu Jalan Tunggal dengan Permukaan Pemantul Engineering Grade', 'Buah', 11, NULL, NULL),
(618, 'Rambu Jalan Ganda dengan Permukaan Pemantul Engineering Grade', 'Buah', 11, NULL, NULL),
(619, 'Rambu Jalan Tunggal dengan Pemantul High Intensity Grade', 'Buah', 11, NULL, NULL),
(620, 'Rambu Jalan Ganda dengan Pemantul High Intensity Grade', 'Buah', 11, NULL, NULL),
(621, 'Patok Pengarah', 'Buah', 11, NULL, NULL),
(622, 'Patok Kilometer', 'Buah', 11, NULL, NULL),
(623, 'Patok Hektometer', 'Buah', 11, NULL, NULL),
(624, 'Rel Pengaman', 'M', 11, NULL, NULL),
(625, 'Paku Jalan Tidak Memantul', 'Buah', 11, NULL, NULL),
(626, 'Paku Jalan Memantul Bujur Sangkar', 'Buah', 11, NULL, NULL),
(627, 'Paku Jalan Memantul Persegi panjang', 'Buah', 11, NULL, NULL),
(628, 'Paku Jalan Memantul Bulat', 'Buah', 11, NULL, NULL),
(629, 'Kerb Pracetak Jenis 1 (Peninggi/Mountable)', 'M', 11, NULL, NULL),
(630, 'Kereb Pracetak Jenis 2 (Penghalang/Barrier)', 'M', 11, NULL, NULL),
(631, 'Kereb Pracetak Jenis 3 (Kereb Berparit/Gutter)', 'M', 11, NULL, NULL),
(632, 'Kereb Pracetak Jenis 4 (Penghalang Berparit / Barrier Gutter) t = 20 cm', 'M', 11, NULL, NULL),
(633, 'Kereb Pracetak Jenis 5 (Penghalang Berparit / Barrier Gutter) t = 30 cm', 'M', 11, NULL, NULL),
(634, 'Kereb Pracetak Jenis 6 (Kereb dengan Bukaan)', 'Buah', 11, NULL, NULL),
(635, 'Kereb Pracetak Jenis 7 (Kereb pada Pelandaian Trotoar)', 'Buah', 11, NULL, NULL),
(636, 'Kereb Pracetak Jenis 8 (Kereb pada Pelandaian Trotoar)', 'Buah', 11, NULL, NULL),
(637, 'Kereb Pracetak Jenis 9 (Kereb pada Pelandaian Trotoar)', 'Buah', 11, NULL, NULL),
(638, 'Kereb yang digunakan kembali', 'M', 11, NULL, NULL),
(639, 'Perkerasan Blok Beton pada Trotoar dan Median', 'M2', 11, NULL, NULL),
(640, 'Pembengkokan Ubin Eksisting atau Perkerasan Blok Beton Eksisting pada Trotoar atau Median', 'M3', 11, NULL, NULL),
(641, 'Beton Pemisah Jalur (Concrete Barrier)', 'M', 11, NULL, NULL),
(642, 'Unit Lampu Penerangan Jalan Lengan Tunggal, Tipe LED', 'Buah', 11, NULL, NULL),
(643, 'Unit Lampu Penerangan Jalan Lengan Ganda, Tipe LED', 'Buah', 11, NULL, NULL);
INSERT INTO `task_master_data` (`id`, `name`, `unit`, `division_master_data_id`, `created_at`, `updated_at`) VALUES
(644, 'Unit Lampu Penerangan Jalan Lengan Tunggal, Tipe Merkuri 250 Watt', 'Buah', 11, NULL, NULL),
(645, 'Unit Lampu Penerangan Jalan Lengan Ganda, Tipe Merkuri 250 Watt ', 'Buah', 11, NULL, NULL),
(646, 'Unit Lampu Penerangan Jalan Lengan Tunggal, Tipe Merkuri 400 Watt', 'Buah', 11, NULL, NULL),
(647, 'Unit Lampu Penerangan Jalan Lengan Ganda, Tipe Merkuri 400 Watt', 'Buah', 11, NULL, NULL),
(648, 'Pagar Pemisah Pedestrian Carbon Steel', 'M', 11, NULL, NULL),
(649, 'Pagar Pemisah Pedestrian Galvanised', 'M', 11, NULL, NULL),
(650, 'Stabilisasi dengan Tanaman', 'M2', 11, NULL, NULL),
(651, 'Stabilisasi dengan Tanaman VS', 'M2', 11, NULL, NULL),
(652, 'Semak / Perdu………………….', 'M2', 11, NULL, NULL),
(653, 'Pohon Jenis …………………….', 'Buah', 11, NULL, NULL),
(654, 'Pengecatan Kerb ', 'M2', 11, NULL, NULL),
(655, 'Papan Informasi Ruas Jalan', 'Buah', 11, NULL, NULL),
(656, 'Pemasangan buis beton diameter 80 cm', 'Bh', 11, NULL, NULL),
(657, 'Pasangan Batu Bata 1/2 Bata', 'M2', 11, NULL, NULL),
(658, 'Plesteran ', 'M2', 11, NULL, NULL),
(659, 'Acian', 'M2', 11, NULL, NULL),
(660, 'Rooster Beton 20 x 20 cm', 'Buah', 11, NULL, NULL),
(661, 'Rangka Atap Baja Ringan', 'M2', 11, NULL, NULL),
(662, 'Atap Galvalum', 'M2', 11, NULL, NULL),
(663, 'Plafon GRC rangka hollow', 'M2', 11, NULL, NULL),
(664, 'Sambungan Hilti D16 (RTW Lama dengan RTW Baru)', 'Buah', 11, NULL, NULL),
(665, 'Waterstop Swealable (Pada sambungan RTW Lama Dan RTW Baru)', 'M', 11, NULL, NULL),
(666, 'Pengadaan Pompa Air 6 Inc 2000 LPM Total Head 20 m Termasuk tes', 'Unit', 11, NULL, NULL),
(667, 'Selang Fleksibel Spiral PVC 6 Inci ', 'M', 11, NULL, NULL),
(668, 'Tangga Monyet Baja Hollow 4 cm x 4 cm x 2 mm', 'M2', 11, NULL, NULL),
(669, 'Pintu Baja Rumah Pompa Plat Eser Rangka Hollow', 'M2', 11, NULL, NULL),
(670, 'Pintu Baja Groundtank Plat Eser Rangka Hollow', 'M2', 11, NULL, NULL),
(671, 'Pintu Air Engkel ', 'Unit', 11, NULL, NULL),
(672, 'Cat Tembok Baru Exterior (1 Lapis Cat Alkali, 2 Lapis Cat Penutup )  ', 'M2', 11, NULL, NULL),
(673, 'Cat Tembok Baru Interior (1 Lapis Cat Dasar, 2 Lapis Cat Penutup )  ', 'M2', 11, NULL, NULL),
(674, 'Cat Plafon (1 Lapis Cat Dasar, 2 Lapis Cat Penutup )  ', 'M2', 11, NULL, NULL),
(675, 'Cat Besi  (1 Lapis Cat Meni, 2 Lapis Cat Besi Penutup )  ', 'M2', 11, NULL, NULL),
(676, 'Galian pada Saluran Air atau Lereng untuk Pemeliharaan', 'M3', 12, NULL, NULL),
(677, 'Timbunan Pilihan pada Lereng Tepi Saluran untuk Pemeliharaan', 'M3', 12, NULL, NULL),
(678, 'Pebaikan Pasangan Batu dengan Mortar', 'M3', 12, NULL, NULL),
(679, 'Perbaikan Lapis Fondasi Agregat Kelas A ', 'M3', 12, NULL, NULL),
(680, 'Perbaikan Lapis Fondasi Agregat Kelas B', 'M3', 12, NULL, NULL),
(681, 'Perbaikan Lapis Fondasi Agregat Kelas S ', 'M3', 12, NULL, NULL),
(682, 'Perbaikan dan Perataan Permukaan JalanTanah', 'M2', 12, NULL, NULL),
(683, 'Perbaikan dan Perataan Permukan Perkerasan Berbutir Tanpa Penutup Aspal', 'M3', 12, NULL, NULL),
(684, 'Perbaikan Campuran Aspal Panas', 'M3', 12, NULL, NULL),
(685, 'Perbaikan Campuran Aspal Panas dengan Asbuton', 'M3', 12, NULL, NULL),
(686, 'Perbaikan Asbuton Campuran Panas Hampar Dingin', 'M3', 12, NULL, NULL),
(687, 'Perbaikan Lapis Penetrasi Macadam tanpa atau dengan Asbuton', 'Liter', 12, NULL, NULL),
(688, 'Residu Bitumen untuk Pemeliharaan', 'Liter', 12, NULL, NULL),
(689, 'Perbaikan Perkerasan Beton Semen ', 'M3', 12, NULL, NULL),
(690, 'Perbaikan Lapis Fondasi Bawah Beton Kurus ', 'M3', 12, NULL, NULL),
(691, 'Perbaikan Pasangan Batu', 'M2', 12, NULL, NULL),
(692, 'Pengecatan Kereb pada Trotoar atau Median', 'M', 12, NULL, NULL),
(693, 'Perbaikan Rel Pengaman ', 'Buah', 12, NULL, NULL),
(694, 'Pembersihan Patok', 'Buah', 12, NULL, NULL),
(695, 'Pembersihan Rambu', 'M', 12, NULL, NULL),
(696, 'Pembersihan Drainase', 'Buah', 12, NULL, NULL),
(697, 'Pengendalian Tanaman', 'M2', 12, NULL, NULL),
(698, 'Pemeliharaan Kinerja Jembatan …… bentang ….. m', 'LS', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_reports`
--

CREATE TABLE `task_reports` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kabupaten Bantul',
  `fiscal_year` year NOT NULL,
  `spk_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `spk_date` date NOT NULL,
  `contract_value` bigint UNSIGNED NOT NULL,
  `supervising_consultant_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_supervisor_id_1` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_supervisor_id_2` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_supervisor_id_3` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acting_commitment_marker_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aktif','SP 1','SCM 1','SCM 2','SCM 3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `execution_time` int NOT NULL,
  `is_agree` tinyint(1) DEFAULT NULL,
  `contract_terminated` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_reports`
--

INSERT INTO `task_reports` (`id`, `activity_name`, `task_name`, `location`, `fiscal_year`, `spk_number`, `spk_date`, `contract_value`, `supervising_consultant_id`, `partner_id`, `site_supervisor_id_1`, `site_supervisor_id_2`, `site_supervisor_id_3`, `acting_commitment_marker_id`, `status`, `execution_time`, `is_agree`, `contract_terminated`, `created_at`, `updated_at`) VALUES
('9a8e729b-9cfb-4dff-832c-09f3fce81456', 'Penyelenggaraan Infrastruktur pada Permukiman di Kawasan Strategis Daerah Kabupaten/ Kota', 'Ruas Jalan Kebun Buah - Mangunan', 'Kabupaten Bantul', 2023, '04/SPMK/PIP.KBH-MGN/APBD/VII/2023', '2023-07-05', 324858000, '9a8e02ed-d033-4aad-ac1d-b1b0d5da3943', '9a8e7193-314c-4864-a4a1-fc0241b89c3f', '9a8e6e0c-cbf2-47af-9a05-f1ed63339858', '9a8e6e49-33d4-4d5d-bbc7-b24ac3f46f66', '9a8e6e49-33d4-4d5d-bbc7-b24ac3f46f66', '9a8e6e97-c4f7-49a9-beee-fb901e392d3e', 'SCM 1', 90, 1, NULL, '2023-11-07 14:06:28', '2023-11-08 14:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `time_schedules`
--

CREATE TABLE `time_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `kind_of_work_detail_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `week` int DEFAULT '0',
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `progress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_schedules`
--

INSERT INTO `time_schedules` (`id`, `kind_of_work_detail_id`, `week`, `date`, `progress`, `created_at`, `updated_at`) VALUES
(1, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 1, '05-11', '0.31', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(2, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 2, '12-18', '0.31', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(3, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 3, '19-25', '0.31', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(4, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 4, '26-01', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(5, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 5, '02-08', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(6, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 6, '09-15', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(7, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 7, '16-22', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(8, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 8, '23-29', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(9, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 9, '30-05', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(10, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 10, '06-12', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(11, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 11, '13-19', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(12, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 12, '20-26', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(13, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', 13, '27-02', '0.32', '2023-11-08 07:20:56', '2023-11-08 07:21:59'),
(14, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 1, '05-11', '0.14', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(15, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 2, '12-18', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(16, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 3, '19-25', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(17, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 4, '26-01', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(18, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 5, '02-08', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(19, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 6, '09-15', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(20, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 7, '16-22', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(21, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 8, '23-29', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(22, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 9, '30-05', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(23, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 10, '06-12', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(24, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 11, '13-19', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(25, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 12, '20-26', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(26, '9a8e7565-bdc9-4f6d-b00f-a36c07d9d18d', 13, '27-02', '0', '2023-11-08 07:22:19', '2023-11-08 07:22:19'),
(27, '9a8e7565-be92-436f-a780-29300e9f3bd1', 1, '05-11', '0.13', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(28, '9a8e7565-be92-436f-a780-29300e9f3bd1', 2, '12-18', '0.13', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(29, '9a8e7565-be92-436f-a780-29300e9f3bd1', 3, '19-25', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(30, '9a8e7565-be92-436f-a780-29300e9f3bd1', 4, '26-01', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(31, '9a8e7565-be92-436f-a780-29300e9f3bd1', 5, '02-08', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(32, '9a8e7565-be92-436f-a780-29300e9f3bd1', 6, '09-15', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(33, '9a8e7565-be92-436f-a780-29300e9f3bd1', 7, '16-22', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(34, '9a8e7565-be92-436f-a780-29300e9f3bd1', 8, '23-29', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(35, '9a8e7565-be92-436f-a780-29300e9f3bd1', 9, '30-05', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(36, '9a8e7565-be92-436f-a780-29300e9f3bd1', 10, '06-12', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(37, '9a8e7565-be92-436f-a780-29300e9f3bd1', 11, '13-19', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(38, '9a8e7565-be92-436f-a780-29300e9f3bd1', 12, '20-26', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(39, '9a8e7565-be92-436f-a780-29300e9f3bd1', 13, '27-02', '0', '2023-11-08 07:22:35', '2023-11-08 07:22:35'),
(40, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 1, '05-11', '0.01', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(41, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 2, '12-18', '0.01', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(42, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 3, '19-25', '0.01', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(43, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 4, '26-01', '0.01', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(44, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 5, '02-08', '0.01', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(45, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 6, '09-15', '0.01', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(46, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 7, '16-22', '0.01', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(47, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 8, '23-29', '0.01', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(48, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 9, '30-05', '0.01', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(49, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 10, '06-12', '0.011', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(50, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 11, '13-19', '0.011', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(51, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 12, '20-26', '0.011', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(52, '9a8e7565-c05a-4876-9c06-b79f31d4809f', 13, '27-02', '0.011', '2023-11-08 07:25:33', '2023-11-08 07:25:33'),
(53, '9a8e7565-c191-44b9-b42a-eb57445c1939', 1, '05-11', '0.015', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(54, '9a8e7565-c191-44b9-b42a-eb57445c1939', 2, '12-18', '0.015', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(55, '9a8e7565-c191-44b9-b42a-eb57445c1939', 3, '19-25', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(56, '9a8e7565-c191-44b9-b42a-eb57445c1939', 4, '26-01', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(57, '9a8e7565-c191-44b9-b42a-eb57445c1939', 5, '02-08', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(58, '9a8e7565-c191-44b9-b42a-eb57445c1939', 6, '09-15', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(59, '9a8e7565-c191-44b9-b42a-eb57445c1939', 7, '16-22', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(60, '9a8e7565-c191-44b9-b42a-eb57445c1939', 8, '23-29', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(61, '9a8e7565-c191-44b9-b42a-eb57445c1939', 9, '30-05', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(62, '9a8e7565-c191-44b9-b42a-eb57445c1939', 10, '06-12', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(63, '9a8e7565-c191-44b9-b42a-eb57445c1939', 11, '13-19', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(64, '9a8e7565-c191-44b9-b42a-eb57445c1939', 12, '20-26', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(65, '9a8e7565-c191-44b9-b42a-eb57445c1939', 13, '27-02', '0', '2023-11-08 07:26:24', '2023-11-08 07:26:24'),
(66, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 1, '05-11', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(67, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 2, '12-18', '0.03', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(68, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 3, '19-25', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(69, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 4, '26-01', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(70, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 5, '02-08', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(71, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 6, '09-15', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(72, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 7, '16-22', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(73, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 8, '23-29', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(74, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 9, '30-05', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(75, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 10, '06-12', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(76, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 11, '13-19', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(77, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 12, '20-26', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(78, '9a8e7565-c38b-4d57-8b01-46dfe77589a1', 13, '27-02', '0', '2023-11-08 07:26:41', '2023-11-08 07:26:41'),
(79, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 1, '05-11', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(80, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 2, '12-18', '0.03', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(81, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 3, '19-25', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(82, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 4, '26-01', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(83, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 5, '02-08', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(84, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 6, '09-15', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(85, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 7, '16-22', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(86, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 8, '23-29', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(87, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 9, '30-05', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(88, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 10, '06-12', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(89, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 11, '13-19', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(90, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 12, '20-26', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(91, '9a8e7565-c4c8-4eed-8eaa-44d97c8c9bbb', 13, '27-02', '0', '2023-11-08 07:27:38', '2023-11-08 07:27:38'),
(92, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 1, '05-11', '0.26', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(93, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 2, '12-18', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(94, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 3, '19-25', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(95, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 4, '26-01', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(96, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 5, '02-08', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(97, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 6, '09-15', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(98, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 7, '16-22', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(99, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 8, '23-29', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(100, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 9, '30-05', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(101, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 10, '06-12', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(102, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 11, '13-19', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(103, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 12, '20-26', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(104, '9a8e7565-c5cc-4cb2-b7d5-2ea469ef967b', 13, '27-02', '0', '2023-11-08 07:28:06', '2023-11-08 07:28:06'),
(105, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 1, '05-11', '0.02', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(106, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 2, '12-18', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(107, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 3, '19-25', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(108, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 4, '26-01', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(109, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 5, '02-08', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(110, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 6, '09-15', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(111, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 7, '16-22', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(112, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 8, '23-29', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(113, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 9, '30-05', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(114, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 10, '06-12', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(115, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 11, '13-19', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(116, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 12, '20-26', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(117, '9a8e7565-c6ae-4346-8b84-e43573ec1d80', 13, '27-02', '0', '2023-11-08 07:28:21', '2023-11-08 07:28:21'),
(118, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 1, '05-11', '0.03', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(119, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 2, '12-18', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(120, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 3, '19-25', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(121, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 4, '26-01', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(122, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 5, '02-08', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(123, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 6, '09-15', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(124, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 7, '16-22', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(125, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 8, '23-29', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(126, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 9, '30-05', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(127, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 10, '06-12', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(128, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 11, '13-19', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(129, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 12, '20-26', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(130, '9a8e7565-c76d-46f0-8b67-5a8ea52f0129', 13, '27-02', '0', '2023-11-08 07:29:34', '2023-11-08 07:29:34'),
(131, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 1, '05-11', '0.28', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(132, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 2, '12-18', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(133, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 3, '19-25', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(134, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 4, '26-01', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(135, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 5, '02-08', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(136, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 6, '09-15', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(137, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 7, '16-22', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(138, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 8, '23-29', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(139, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 9, '30-05', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(140, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 10, '06-12', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(141, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 11, '13-19', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(142, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 12, '20-26', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(143, '9a8e7565-c826-45a7-a3bf-2b80c5e323fc', 13, '27-02', '0', '2023-11-08 07:30:02', '2023-11-08 07:30:02'),
(144, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 1, '05-11', '0.19', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(145, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 2, '12-18', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(146, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 3, '19-25', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(147, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 4, '26-01', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(148, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 5, '02-08', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(149, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 6, '09-15', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(150, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 7, '16-22', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(151, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 8, '23-29', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(152, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 9, '30-05', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(153, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 10, '06-12', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(154, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 11, '13-19', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(155, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 12, '20-26', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(156, '9a8e7565-c8e0-4b6e-bb76-e86f954ba03b', 13, '27-02', '0', '2023-11-08 07:30:28', '2023-11-08 07:30:28'),
(157, '9a8e7565-c988-437d-99cd-abf13a525246', 1, '05-11', '0.06', '2023-11-08 07:32:02', '2023-11-08 07:33:10'),
(158, '9a8e7565-c988-437d-99cd-abf13a525246', 2, '12-18', '0.06', '2023-11-08 07:32:02', '2023-11-08 07:33:10'),
(159, '9a8e7565-c988-437d-99cd-abf13a525246', 3, '19-25', '0.06', '2023-11-08 07:32:02', '2023-11-08 07:33:10'),
(160, '9a8e7565-c988-437d-99cd-abf13a525246', 4, '26-01', '0.06', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(161, '9a8e7565-c988-437d-99cd-abf13a525246', 5, '02-08', '0', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(162, '9a8e7565-c988-437d-99cd-abf13a525246', 6, '09-15', '0.06', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(163, '9a8e7565-c988-437d-99cd-abf13a525246', 7, '16-22', '0.06', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(164, '9a8e7565-c988-437d-99cd-abf13a525246', 8, '23-29', '0.06', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(165, '9a8e7565-c988-437d-99cd-abf13a525246', 9, '30-05', '0.06', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(166, '9a8e7565-c988-437d-99cd-abf13a525246', 10, '06-12', '0.06', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(167, '9a8e7565-c988-437d-99cd-abf13a525246', 11, '13-19', '0.06', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(168, '9a8e7565-c988-437d-99cd-abf13a525246', 12, '20-26', '0.06', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(169, '9a8e7565-c988-437d-99cd-abf13a525246', 13, '27-02', '0.055', '2023-11-08 07:32:03', '2023-11-08 07:33:10'),
(170, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 1, '05-11', '0.07', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(171, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 2, '12-18', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(172, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 3, '19-25', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(173, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 4, '26-01', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(174, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 5, '02-08', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(175, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 6, '09-15', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(176, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 7, '16-22', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(177, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 8, '23-29', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(178, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 9, '30-05', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(179, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 10, '06-12', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(180, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 11, '13-19', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(181, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 12, '20-26', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(182, '9a8e7565-ca2c-42e5-87d3-3041e0d8c7f8', 13, '27-02', '0', '2023-11-08 07:34:14', '2023-11-08 07:34:14'),
(183, '9a8e7565-cae0-4076-a392-13c50a5ca345', 1, '05-11', '0.05', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(184, '9a8e7565-cae0-4076-a392-13c50a5ca345', 2, '12-18', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(185, '9a8e7565-cae0-4076-a392-13c50a5ca345', 3, '19-25', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(186, '9a8e7565-cae0-4076-a392-13c50a5ca345', 4, '26-01', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(187, '9a8e7565-cae0-4076-a392-13c50a5ca345', 5, '02-08', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(188, '9a8e7565-cae0-4076-a392-13c50a5ca345', 6, '09-15', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(189, '9a8e7565-cae0-4076-a392-13c50a5ca345', 7, '16-22', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(190, '9a8e7565-cae0-4076-a392-13c50a5ca345', 8, '23-29', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(191, '9a8e7565-cae0-4076-a392-13c50a5ca345', 9, '30-05', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(192, '9a8e7565-cae0-4076-a392-13c50a5ca345', 10, '06-12', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(193, '9a8e7565-cae0-4076-a392-13c50a5ca345', 11, '13-19', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(194, '9a8e7565-cae0-4076-a392-13c50a5ca345', 12, '20-26', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(195, '9a8e7565-cae0-4076-a392-13c50a5ca345', 13, '27-02', '0', '2023-11-08 07:34:30', '2023-11-08 07:34:30'),
(196, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 1, '05-11', '0.05', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(197, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 2, '12-18', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(198, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 3, '19-25', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(199, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 4, '26-01', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(200, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 5, '02-08', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(201, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 6, '09-15', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(202, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 7, '16-22', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(203, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 8, '23-29', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(204, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 9, '30-05', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(205, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 10, '06-12', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(206, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 11, '13-19', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(207, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 12, '20-26', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(208, '9a8e7565-cb95-4a08-8ec1-2573d5d73f8d', 13, '27-02', '0', '2023-11-08 07:34:48', '2023-11-08 07:34:48'),
(209, '9a8e7565-cc44-495b-839b-20df23047966', 1, '05-11', '0.05', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(210, '9a8e7565-cc44-495b-839b-20df23047966', 2, '12-18', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(211, '9a8e7565-cc44-495b-839b-20df23047966', 3, '19-25', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(212, '9a8e7565-cc44-495b-839b-20df23047966', 4, '26-01', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(213, '9a8e7565-cc44-495b-839b-20df23047966', 5, '02-08', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(214, '9a8e7565-cc44-495b-839b-20df23047966', 6, '09-15', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(215, '9a8e7565-cc44-495b-839b-20df23047966', 7, '16-22', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(216, '9a8e7565-cc44-495b-839b-20df23047966', 8, '23-29', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(217, '9a8e7565-cc44-495b-839b-20df23047966', 9, '30-05', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(218, '9a8e7565-cc44-495b-839b-20df23047966', 10, '06-12', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(219, '9a8e7565-cc44-495b-839b-20df23047966', 11, '13-19', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(220, '9a8e7565-cc44-495b-839b-20df23047966', 12, '20-26', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(221, '9a8e7565-cc44-495b-839b-20df23047966', 13, '27-02', '0', '2023-11-08 07:35:13', '2023-11-08 07:35:13'),
(222, '9a8e7565-ccf0-481a-9227-0b667f67d739', 1, '05-11', '0.05', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(223, '9a8e7565-ccf0-481a-9227-0b667f67d739', 2, '12-18', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(224, '9a8e7565-ccf0-481a-9227-0b667f67d739', 3, '19-25', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(225, '9a8e7565-ccf0-481a-9227-0b667f67d739', 4, '26-01', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(226, '9a8e7565-ccf0-481a-9227-0b667f67d739', 5, '02-08', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(227, '9a8e7565-ccf0-481a-9227-0b667f67d739', 6, '09-15', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(228, '9a8e7565-ccf0-481a-9227-0b667f67d739', 7, '16-22', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(229, '9a8e7565-ccf0-481a-9227-0b667f67d739', 8, '23-29', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(230, '9a8e7565-ccf0-481a-9227-0b667f67d739', 9, '30-05', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(231, '9a8e7565-ccf0-481a-9227-0b667f67d739', 10, '06-12', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(232, '9a8e7565-ccf0-481a-9227-0b667f67d739', 11, '13-19', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(233, '9a8e7565-ccf0-481a-9227-0b667f67d739', 12, '20-26', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(234, '9a8e7565-ccf0-481a-9227-0b667f67d739', 13, '27-02', '0', '2023-11-08 07:35:27', '2023-11-08 07:35:27'),
(235, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 1, '05-11', '0.05', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(236, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 2, '12-18', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(237, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 3, '19-25', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(238, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 4, '26-01', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(239, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 5, '02-08', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(240, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 6, '09-15', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(241, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 7, '16-22', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(242, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 8, '23-29', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(243, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 9, '30-05', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(244, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 10, '06-12', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(245, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 11, '13-19', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(246, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 12, '20-26', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(247, '9a8e7565-cdc3-4d00-b23a-79c6d9d3b6b2', 13, '27-02', '0', '2023-11-08 07:35:48', '2023-11-08 07:35:48'),
(248, '9a8e7565-ce95-4457-afe3-c52b60b24897', 1, '05-11', '0.04', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(249, '9a8e7565-ce95-4457-afe3-c52b60b24897', 2, '12-18', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(250, '9a8e7565-ce95-4457-afe3-c52b60b24897', 3, '19-25', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(251, '9a8e7565-ce95-4457-afe3-c52b60b24897', 4, '26-01', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(252, '9a8e7565-ce95-4457-afe3-c52b60b24897', 5, '02-08', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(253, '9a8e7565-ce95-4457-afe3-c52b60b24897', 6, '09-15', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(254, '9a8e7565-ce95-4457-afe3-c52b60b24897', 7, '16-22', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(255, '9a8e7565-ce95-4457-afe3-c52b60b24897', 8, '23-29', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(256, '9a8e7565-ce95-4457-afe3-c52b60b24897', 9, '30-05', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(257, '9a8e7565-ce95-4457-afe3-c52b60b24897', 10, '06-12', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(258, '9a8e7565-ce95-4457-afe3-c52b60b24897', 11, '13-19', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(259, '9a8e7565-ce95-4457-afe3-c52b60b24897', 12, '20-26', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(260, '9a8e7565-ce95-4457-afe3-c52b60b24897', 13, '27-02', '0', '2023-11-08 07:36:16', '2023-11-08 07:36:16'),
(261, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 1, '05-11', '0.03', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(262, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 2, '12-18', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(263, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 3, '19-25', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(264, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 4, '26-01', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(265, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 5, '02-08', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(266, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 6, '09-15', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(267, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 7, '16-22', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(268, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 8, '23-29', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(269, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 9, '30-05', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(270, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 10, '06-12', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(271, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 11, '13-19', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(272, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 12, '20-26', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(273, '9a8e7565-cf6a-46e6-be69-719e2d1b1136', 13, '27-02', '0', '2023-11-08 07:36:35', '2023-11-08 07:36:35'),
(274, '9a8e7565-d039-4286-90c9-6f029df8113f', 1, '05-11', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(275, '9a8e7565-d039-4286-90c9-6f029df8113f', 2, '12-18', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(276, '9a8e7565-d039-4286-90c9-6f029df8113f', 3, '19-25', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(277, '9a8e7565-d039-4286-90c9-6f029df8113f', 4, '26-01', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(278, '9a8e7565-d039-4286-90c9-6f029df8113f', 5, '02-08', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(279, '9a8e7565-d039-4286-90c9-6f029df8113f', 6, '09-15', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(280, '9a8e7565-d039-4286-90c9-6f029df8113f', 7, '16-22', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(281, '9a8e7565-d039-4286-90c9-6f029df8113f', 8, '23-29', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(282, '9a8e7565-d039-4286-90c9-6f029df8113f', 9, '30-05', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(283, '9a8e7565-d039-4286-90c9-6f029df8113f', 10, '06-12', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(284, '9a8e7565-d039-4286-90c9-6f029df8113f', 11, '13-19', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(285, '9a8e7565-d039-4286-90c9-6f029df8113f', 12, '20-26', '0.08', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(286, '9a8e7565-d039-4286-90c9-6f029df8113f', 13, '27-02', '0.07', '2023-11-08 07:39:07', '2023-11-08 07:39:07'),
(287, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 1, '05-11', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(288, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 2, '12-18', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(289, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 3, '19-25', '0.14', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(290, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 4, '26-01', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(291, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 5, '02-08', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(292, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 6, '09-15', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(293, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 7, '16-22', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(294, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 8, '23-29', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(295, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 9, '30-05', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(296, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 10, '06-12', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(297, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 11, '13-19', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(298, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 12, '20-26', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(299, '9a8e7680-5f9d-4e64-b355-5518a51dc4fb', 13, '27-02', '0', '2023-11-08 07:39:41', '2023-11-08 07:39:41'),
(300, '9a8e7680-60f3-4b8a-b719-36763c3849be', 1, '05-11', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(301, '9a8e7680-60f3-4b8a-b719-36763c3849be', 2, '12-18', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(302, '9a8e7680-60f3-4b8a-b719-36763c3849be', 3, '19-25', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(303, '9a8e7680-60f3-4b8a-b719-36763c3849be', 4, '26-01', '0.11', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(304, '9a8e7680-60f3-4b8a-b719-36763c3849be', 5, '02-08', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(305, '9a8e7680-60f3-4b8a-b719-36763c3849be', 6, '09-15', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(306, '9a8e7680-60f3-4b8a-b719-36763c3849be', 7, '16-22', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(307, '9a8e7680-60f3-4b8a-b719-36763c3849be', 8, '23-29', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(308, '9a8e7680-60f3-4b8a-b719-36763c3849be', 9, '30-05', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(309, '9a8e7680-60f3-4b8a-b719-36763c3849be', 10, '06-12', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(310, '9a8e7680-60f3-4b8a-b719-36763c3849be', 11, '13-19', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(311, '9a8e7680-60f3-4b8a-b719-36763c3849be', 12, '20-26', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(312, '9a8e7680-60f3-4b8a-b719-36763c3849be', 13, '27-02', '0', '2023-11-08 07:41:19', '2023-11-08 07:41:19'),
(313, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 1, '05-11', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(314, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 2, '12-18', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(315, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 3, '19-25', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(316, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 4, '26-01', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(317, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 5, '02-08', '0.35', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(318, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 6, '09-15', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(319, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 7, '16-22', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(320, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 8, '23-29', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(321, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 9, '30-05', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(322, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 10, '06-12', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(323, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 11, '13-19', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(324, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 12, '20-26', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(325, '9a8e7680-61f4-4d21-8cef-f38b86f7b017', 13, '27-02', '0', '2023-11-08 07:41:54', '2023-11-08 07:41:54'),
(326, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 1, '05-11', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(327, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 2, '12-18', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(328, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 3, '19-25', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(329, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 4, '26-01', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(330, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 5, '02-08', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(331, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 6, '09-15', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(332, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 7, '16-22', '0.25', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(333, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 8, '23-29', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(334, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 9, '30-05', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(335, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 10, '06-12', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(336, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 11, '13-19', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(337, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 12, '20-26', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(338, '9a8e7680-62ca-4d59-9a81-a25ad4a76d23', 13, '27-02', '0', '2023-11-08 07:44:25', '2023-11-08 07:44:25'),
(339, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 1, '05-11', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(340, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 2, '12-18', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(341, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 3, '19-25', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(342, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 4, '26-01', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(343, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 5, '02-08', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(344, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 6, '09-15', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(345, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 7, '16-22', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(346, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 8, '23-29', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(347, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 9, '30-05', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(348, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 10, '06-12', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(349, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 11, '13-19', '0.43', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(350, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 12, '20-26', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(351, '9a8e7680-6401-481a-a11a-aed733e3f0e4', 13, '27-02', '0', '2023-11-08 07:45:21', '2023-11-08 07:45:21'),
(352, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 1, '05-11', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(353, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 2, '12-18', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(354, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 3, '19-25', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(355, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 4, '26-01', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(356, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 5, '02-08', '0.17', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(357, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 6, '09-15', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(358, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 7, '16-22', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(359, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 8, '23-29', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(360, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 9, '30-05', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(361, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 10, '06-12', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(362, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 11, '13-19', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(363, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 12, '20-26', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(364, '9a8e7680-6513-4e7a-a0cb-65076b551ccb', 13, '27-02', '0', '2023-11-08 07:46:02', '2023-11-08 07:46:02'),
(365, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 1, '05-11', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(366, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 2, '12-18', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(367, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 3, '19-25', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(368, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 4, '26-01', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(369, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 5, '02-08', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(370, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 6, '09-15', '1.17', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(371, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 7, '16-22', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(372, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 8, '23-29', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(373, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 9, '30-05', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(374, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 10, '06-12', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(375, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 11, '13-19', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(376, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 12, '20-26', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(377, '9a8e779c-d038-4f92-9ed1-92cbf56c5df4', 13, '27-02', '0', '2023-11-08 07:47:36', '2023-11-08 07:47:36'),
(378, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 1, '05-11', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:01'),
(379, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 2, '12-18', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:01'),
(380, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 3, '19-25', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:01'),
(381, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 4, '26-01', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:01'),
(382, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 5, '02-08', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:02'),
(383, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 6, '09-15', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:02'),
(384, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 7, '16-22', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:02'),
(385, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 8, '23-29', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:02'),
(386, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 9, '30-05', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:02'),
(387, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 10, '06-12', '0.30', '2023-11-08 07:48:23', '2023-11-08 07:49:02'),
(388, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 11, '13-19', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:02'),
(389, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 12, '20-26', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:02'),
(390, '9a8e779c-d1c1-4da4-89e1-61a5e4b4a375', 13, '27-02', '0', '2023-11-08 07:48:23', '2023-11-08 07:49:02'),
(391, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 1, '05-11', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(392, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 2, '12-18', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(393, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 3, '19-25', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(394, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 4, '26-01', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(395, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 5, '02-08', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(396, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 6, '09-15', '0.46', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(397, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 7, '16-22', '0.46', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(398, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 8, '23-29', '0.45', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(399, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 9, '30-05', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(400, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 10, '06-12', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(401, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 11, '13-19', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(402, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 12, '20-26', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(403, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', 13, '27-02', '0', '2023-11-08 07:51:12', '2023-11-08 07:52:07'),
(404, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 1, '05-11', '0', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(405, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 2, '12-18', '10', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(406, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 3, '19-25', '0', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(407, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 4, '26-01', '10', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(408, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 5, '02-08', '0', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(409, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 6, '09-15', '10', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(410, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 7, '16-22', '0', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(411, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 8, '23-29', '10', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(412, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 9, '30-05', '0', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(413, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 10, '06-12', '10', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(414, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 11, '13-19', '0', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(415, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 12, '20-26', '4.34', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(416, '9a8e779c-d44c-4d4d-aa51-608be1f05b06', 13, '27-02', '0', '2023-11-08 07:53:09', '2023-11-08 07:53:09'),
(417, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 1, '05-11', '0', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(418, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 2, '12-18', '0', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(419, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 3, '19-25', '0', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(420, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 4, '26-01', '0.1', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(421, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 5, '02-08', '0', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(422, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 6, '09-15', '0.1', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(423, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 7, '16-22', '0', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(424, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 8, '23-29', '0.1', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(425, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 9, '30-05', '0', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(426, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 10, '06-12', '0.12', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(427, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 11, '13-19', '0', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(428, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 12, '20-26', '0', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(429, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', 13, '27-02', '0', '2023-11-08 07:54:19', '2023-11-08 08:25:15'),
(430, '9a8e792a-4feb-455e-bb35-468e801b623f', 1, '05-11', '0', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(431, '9a8e792a-4feb-455e-bb35-468e801b623f', 2, '12-18', '0', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(432, '9a8e792a-4feb-455e-bb35-468e801b623f', 3, '19-25', '0', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(433, '9a8e792a-4feb-455e-bb35-468e801b623f', 4, '26-01', '1', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(434, '9a8e792a-4feb-455e-bb35-468e801b623f', 5, '02-08', '0', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(435, '9a8e792a-4feb-455e-bb35-468e801b623f', 6, '09-15', '1', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(436, '9a8e792a-4feb-455e-bb35-468e801b623f', 7, '16-22', '0', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(437, '9a8e792a-4feb-455e-bb35-468e801b623f', 8, '23-29', '1', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(438, '9a8e792a-4feb-455e-bb35-468e801b623f', 9, '30-05', '0', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(439, '9a8e792a-4feb-455e-bb35-468e801b623f', 10, '06-12', '1', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(440, '9a8e792a-4feb-455e-bb35-468e801b623f', 11, '13-19', '0', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(441, '9a8e792a-4feb-455e-bb35-468e801b623f', 12, '20-26', '1.78', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(442, '9a8e792a-4feb-455e-bb35-468e801b623f', 13, '27-02', '0', '2023-11-08 07:55:17', '2023-11-08 07:55:17'),
(443, NULL, 1, '05-11', '0', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(444, NULL, 2, '12-18', '0', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(445, NULL, 3, '19-25', '0', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(446, NULL, 4, '26-01', '0', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(447, NULL, 5, '02-08', '0', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(448, NULL, 6, '09-15', '5', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(449, NULL, 7, '16-22', '0', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(450, NULL, 8, '23-29', '5.4', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(451, NULL, 9, '30-05', '0', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(452, NULL, 10, '06-12', '5.55', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(453, NULL, 11, '13-19', '0', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(454, NULL, 12, '20-26', '5', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(455, NULL, 13, '27-02', '0', '2023-11-08 07:56:06', '2023-11-08 07:56:06'),
(456, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 1, '05-11', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(457, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 2, '12-18', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(458, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 3, '19-25', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(459, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 4, '26-01', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(460, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 5, '02-08', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(461, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 6, '09-15', '1', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(462, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 7, '16-22', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(463, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 8, '23-29', '1.4', '2023-11-08 07:56:51', '2023-11-08 07:56:51');
INSERT INTO `time_schedules` (`id`, `kind_of_work_detail_id`, `week`, `date`, `progress`, `created_at`, `updated_at`) VALUES
(464, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 9, '30-05', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(465, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 10, '06-12', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(466, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 11, '13-19', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(467, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 12, '20-26', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(468, '9a8e7972-ad1f-473e-975b-0f8a01666a05', 13, '27-02', '0', '2023-11-08 07:56:51', '2023-11-08 07:56:51'),
(469, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 1, '05-11', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(470, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 2, '12-18', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(471, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 3, '19-25', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(472, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 4, '26-01', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(473, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 5, '02-08', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(474, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 6, '09-15', '1', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(475, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 7, '16-22', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(476, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 8, '23-29', '1', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(477, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 9, '30-05', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(478, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 10, '06-12', '0.65', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(479, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 11, '13-19', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(480, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 12, '20-26', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(481, '9a8e7972-ae76-4bf4-9b2c-30c913c251f6', 13, '27-02', '0', '2023-11-08 07:57:30', '2023-11-08 07:57:30'),
(482, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 1, '05-11', '0', '2023-11-08 07:58:04', '2023-11-08 07:58:04'),
(483, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 2, '12-18', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(484, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 3, '19-25', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(485, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 4, '26-01', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(486, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 5, '02-08', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(487, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 6, '09-15', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(488, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 7, '16-22', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(489, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 8, '23-29', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(490, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 9, '30-05', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(491, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 10, '06-12', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(492, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 11, '13-19', '0', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(493, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 12, '20-26', '0.47', '2023-11-08 07:58:05', '2023-11-08 07:58:05'),
(494, '9a8e7972-b328-4817-b725-8f0bfc6bdc54', 13, '27-02', '1', '2023-11-08 07:58:05', '2023-11-08 07:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `time_schedule_histories`
--

CREATE TABLE `time_schedule_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `kind_of_work_detail_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_report_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `week` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_schedule_histories`
--

INSERT INTO `time_schedule_histories` (`id`, `kind_of_work_detail_id`, `task_report_id`, `week`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '10', '0.31', '0.32', '2023-11-08 07:21:14', '2023-11-08 07:21:14'),
(2, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '11', '0.31', '0.32', '2023-11-08 07:21:14', '2023-11-08 07:21:14'),
(3, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '6', '0.31', '0.32', '2023-11-08 07:21:27', '2023-11-08 07:21:27'),
(4, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '7', '0.31', '0.32', '2023-11-08 07:21:27', '2023-11-08 07:21:27'),
(5, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '8', '0.31', '0.32', '2023-11-08 07:21:27', '2023-11-08 07:21:27'),
(6, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '9', '0.31', '0.32', '2023-11-08 07:21:27', '2023-11-08 07:21:27'),
(7, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '4', '0.31', '0.32', '2023-11-08 07:21:59', '2023-11-08 07:21:59'),
(8, '9a8e7565-bc01-4f21-8e8f-7f0f5e2f9727', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '5', '0.31', '0.32', '2023-11-08 07:21:59', '2023-11-08 07:21:59'),
(9, '9a8e7565-c988-437d-99cd-abf13a525246', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '12', '0.05', '0.06', '2023-11-08 07:32:21', '2023-11-08 07:32:21'),
(10, '9a8e7565-c988-437d-99cd-abf13a525246', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '13', '0.05', '0.055', '2023-11-08 07:33:10', '2023-11-08 07:33:10'),
(11, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '8', '0.46', '0.47', '2023-11-08 07:51:27', '2023-11-08 07:51:27'),
(12, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '6', '0.45', '0.46', '2023-11-08 07:52:07', '2023-11-08 07:52:07'),
(13, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '7', '0.45', '0.46', '2023-11-08 07:52:07', '2023-11-08 07:52:07'),
(14, '9a8e779c-d2df-4cfd-8f16-40f149c0a1f1', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '8', '0.47', '0.45', '2023-11-08 07:52:07', '2023-11-08 07:52:07'),
(15, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '2', NULL, '0', '2023-11-08 08:25:15', '2023-11-08 08:25:15'),
(16, '9a8e779c-d531-4936-9677-e7cb28ddfaf2', '9a8e729b-9cfb-4dff-832c-09f3fce81456', '10', '0.13', '0.12', '2023-11-08 08:25:15', '2023-11-08 08:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Bh', '2023-11-07 01:08:19', '2023-11-07 01:08:19'),
(2, 'Lembar', NULL, NULL),
(3, 'Rol', NULL, NULL),
(4, 'Pasang', NULL, NULL),
(5, 'Orang', NULL, NULL),
(6, 'Meter Panjang', NULL, NULL),
(7, 'Meter Persegi', NULL, NULL),
(8, 'Orang Kegiatan', NULL, NULL),
(9, 'Kegiatan', NULL, NULL),
(10, 'Set', NULL, NULL),
(11, 'buah', NULL, NULL),
(12, 'Ton', NULL, NULL),
(13, 'pcs', NULL, NULL),
(14, 'M3/ km', NULL, NULL),
(15, 'Buah Jembatan', NULL, NULL),
(16, 'Kg', NULL, NULL),
(17, 'Jam', NULL, NULL),
(18, 'Bh', NULL, NULL),
(19, 'M\'', NULL, NULL),
(20, 'm\'', NULL, NULL),
(21, 'Unit', NULL, NULL),
(22, 'm2', NULL, NULL),
(23, 'Liter', NULL, NULL),
(24, 'M3', NULL, NULL),
(25, 'M1', NULL, NULL),
(26, 'Buah', NULL, NULL),
(27, 'M2', NULL, NULL),
(28, 'LS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Supervising Consultant','Partner','Site Supervisor','Acting Commitment Marker','Admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
('9a6baca9-04f2-41e8-bf22-bbf47b71659e', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', NULL, NULL, '2023-10-21 07:14:49', '2023-10-21 07:14:49'),
('9a8e0198-5873-4cf4-9dbd-50e975826290', 'LILIK', '$2y$10$tg8O9k14Vy5CN7Y2yAH1GuO1GfM4YSpUYKivGggkRYUgMVHfK8L3O', 'Supervising Consultant', NULL, NULL, '2023-11-07 08:50:27', '2023-11-07 08:50:27'),
('9a8e021a-316e-4dbc-b48b-d1129195a166', 'SUHARYANTO', '$2y$10$uKTC7o4c6RQlCiH5TyGr2uOdKftSIUN1pwsFQH7aAi2jCcWiGw6FS', 'Supervising Consultant', NULL, NULL, '2023-11-07 08:51:53', '2023-11-07 08:51:53'),
('9a8e02ed-c1fd-4296-8818-53ba073d9eff', 'DWINUR', '$2y$10$PYQSTNE0s3H9c/ItZ6t3hOw/Iwq6BnxTmJW9lg3IykwDO3gnDwjjm', 'Supervising Consultant', NULL, NULL, '2023-11-07 08:54:11', '2023-11-07 08:54:42'),
('9a8e03c8-10b1-4450-a40d-35157d887297', 'SANDIDWI', '$2y$10$zeeFXTun9A/Zs4vobg8RHOMA7VkTGIrzL3bm6rkBcH2oWjbZv3One', 'Supervising Consultant', NULL, NULL, '2023-11-07 08:56:34', '2023-11-07 08:56:34'),
('9a8e043c-b512-4bea-bbab-2e0e822d77de', 'JUPRISUSILA', '$2y$10$yej6sbUcW13JEB8.xLENUOEnmE2LnbBguXaMGoZnivIwy3DUAeFee', 'Supervising Consultant', NULL, NULL, '2023-11-07 08:57:51', '2023-11-07 08:57:51'),
('9a8e04fe-bebd-45e8-b8c9-79f24d6aa59e', 'PURWANTO', '$2y$10$KTOpVW8j934OY5XAdiQl2euaqK1sYci0xIln1TH9KJui2D3IN.3u.', 'Supervising Consultant', NULL, NULL, '2023-11-07 08:59:58', '2023-11-07 08:59:58'),
('9a8e6e0c-c73c-40f0-a133-78db5e50904b', 'anang', '$2y$10$szOfIQRNrtuRTIumX3QbYudmuoY0c8p8x7eW695jS0c0RHixPm0ia', 'Site Supervisor', NULL, NULL, '2023-11-07 13:53:43', '2023-11-07 13:53:43'),
('9a8e6e49-2e98-4ff8-8be8-43cbe312401d', 'sasmono', '$2y$10$NSSxMTPtuQeuMQ4L/KsiPOrCZpcO7DBwfQWr.PA8Bg3wbJDNH7yEa', 'Site Supervisor', NULL, NULL, '2023-11-07 13:54:23', '2023-11-07 13:54:23'),
('9a8e6e97-c058-4521-a2f7-502c9259e634', 'jimmy', '$2y$10$U0iJ0XeI61gzMsZR2QGcf.oyhemTznH0gUg2GdgHWngnj43Rug7v.', 'Acting Commitment Marker', NULL, NULL, '2023-11-07 13:55:14', '2023-11-07 13:55:14'),
('9a8e7193-2b82-4223-8eeb-8541b3a6d04c', 'purwanto1', '$2y$10$kAqQccajPkcC.9ISL/UwquldxXioL2b33bEwnvgYpHfDA3yx9QDWG', 'Partner', NULL, NULL, '2023-11-07 14:03:35', '2023-11-07 14:04:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acting_commitment_markers`
--
ALTER TABLE `acting_commitment_markers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acting_commitment_markers_user_id_foreign` (`user_id`);

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agreements_user_id_foreign` (`user_id`),
  ADD KEY `agreements_task_report_id_foreign` (`task_report_id`),
  ADD KEY `agreements_kind_of_work_detail_id_foreign` (`kind_of_work_detail_id`);

--
-- Indexes for table `agreement_task_reports`
--
ALTER TABLE `agreement_task_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agreement_task_reports_task_report_id_foreign` (`task_report_id`);

--
-- Indexes for table `cv_consultants`
--
ALTER TABLE `cv_consultants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division_master_data`
--
ALTER TABLE `division_master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kind_of_works`
--
ALTER TABLE `kind_of_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kind_of_works_task_id_foreign` (`task_id`);

--
-- Indexes for table `kind_of_work_details`
--
ALTER TABLE `kind_of_work_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kind_of_work_details_kind_of_work_id_foreign` (`kind_of_work_id`);

--
-- Indexes for table `mc_histories`
--
ALTER TABLE `mc_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mc_histories_task_report_id_foreign` (`task_report_id`),
  ADD KEY `mc_histories_kind_of_work_detail_id_foreign` (`kind_of_work_detail_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_cv_consultant_id_foreign` (`cv_consultant_id`),
  ADD KEY `partners_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `progress_pictures`
--
ALTER TABLE `progress_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progress_pictures_schedule_id_foreign` (`schedule_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_kind_of_work_detail_id_foreign` (`kind_of_work_detail_id`);

--
-- Indexes for table `site_supervisors`
--
ALTER TABLE `site_supervisors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_supervisors_user_id_foreign` (`user_id`);

--
-- Indexes for table `supervising_consultants`
--
ALTER TABLE `supervising_consultants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervising_consultants_cv_consultant_id_foreign` (`cv_consultant_id`),
  ADD KEY `supervising_consultants_user_id_foreign` (`user_id`);

--
-- Indexes for table `task_master_data`
--
ALTER TABLE `task_master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_reports`
--
ALTER TABLE `task_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_reports_supervising_consultant_id_foreign` (`supervising_consultant_id`),
  ADD KEY `task_reports_partner_id_foreign` (`partner_id`),
  ADD KEY `task_reports_site_supervisor_id_1_foreign` (`site_supervisor_id_1`),
  ADD KEY `task_reports_site_supervisor_id_2_foreign` (`site_supervisor_id_2`),
  ADD KEY `task_reports_site_supervisor_id_3_foreign` (`site_supervisor_id_3`),
  ADD KEY `task_reports_acting_commitment_marker_id_foreign` (`acting_commitment_marker_id`);

--
-- Indexes for table `time_schedules`
--
ALTER TABLE `time_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_schedules_kind_of_work_detail_id_foreign` (`kind_of_work_detail_id`);

--
-- Indexes for table `time_schedule_histories`
--
ALTER TABLE `time_schedule_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_schedule_histories_kind_of_work_detail_id_foreign` (`kind_of_work_detail_id`),
  ADD KEY `time_schedule_histories_task_report_id_foreign` (`task_report_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agreements`
--
ALTER TABLE `agreements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `agreement_task_reports`
--
ALTER TABLE `agreement_task_reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `division_master_data`
--
ALTER TABLE `division_master_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mc_histories`
--
ALTER TABLE `mc_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progress_pictures`
--
ALTER TABLE `progress_pictures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT for table `task_master_data`
--
ALTER TABLE `task_master_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=699;

--
-- AUTO_INCREMENT for table `time_schedules`
--
ALTER TABLE `time_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;

--
-- AUTO_INCREMENT for table `time_schedule_histories`
--
ALTER TABLE `time_schedule_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acting_commitment_markers`
--
ALTER TABLE `acting_commitment_markers`
  ADD CONSTRAINT `acting_commitment_markers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `agreements`
--
ALTER TABLE `agreements`
  ADD CONSTRAINT `agreements_kind_of_work_detail_id_foreign` FOREIGN KEY (`kind_of_work_detail_id`) REFERENCES `kind_of_work_details` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `agreements_task_report_id_foreign` FOREIGN KEY (`task_report_id`) REFERENCES `task_reports` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `agreements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `agreement_task_reports`
--
ALTER TABLE `agreement_task_reports`
  ADD CONSTRAINT `agreement_task_reports_task_report_id_foreign` FOREIGN KEY (`task_report_id`) REFERENCES `task_reports` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `kind_of_works`
--
ALTER TABLE `kind_of_works`
  ADD CONSTRAINT `kind_of_works_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `task_reports` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `kind_of_work_details`
--
ALTER TABLE `kind_of_work_details`
  ADD CONSTRAINT `kind_of_work_details_kind_of_work_id_foreign` FOREIGN KEY (`kind_of_work_id`) REFERENCES `kind_of_works` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `mc_histories`
--
ALTER TABLE `mc_histories`
  ADD CONSTRAINT `mc_histories_kind_of_work_detail_id_foreign` FOREIGN KEY (`kind_of_work_detail_id`) REFERENCES `kind_of_work_details` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `mc_histories_task_report_id_foreign` FOREIGN KEY (`task_report_id`) REFERENCES `task_reports` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_cv_consultant_id_foreign` FOREIGN KEY (`cv_consultant_id`) REFERENCES `cv_consultants` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `partners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `progress_pictures`
--
ALTER TABLE `progress_pictures`
  ADD CONSTRAINT `progress_pictures_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_kind_of_work_detail_id_foreign` FOREIGN KEY (`kind_of_work_detail_id`) REFERENCES `kind_of_work_details` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `site_supervisors`
--
ALTER TABLE `site_supervisors`
  ADD CONSTRAINT `site_supervisors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `supervising_consultants`
--
ALTER TABLE `supervising_consultants`
  ADD CONSTRAINT `supervising_consultants_cv_consultant_id_foreign` FOREIGN KEY (`cv_consultant_id`) REFERENCES `cv_consultants` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `supervising_consultants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `task_reports`
--
ALTER TABLE `task_reports`
  ADD CONSTRAINT `task_reports_acting_commitment_marker_id_foreign` FOREIGN KEY (`acting_commitment_marker_id`) REFERENCES `acting_commitment_markers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `task_reports_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `task_reports_site_supervisor_id_1_foreign` FOREIGN KEY (`site_supervisor_id_1`) REFERENCES `site_supervisors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `task_reports_site_supervisor_id_2_foreign` FOREIGN KEY (`site_supervisor_id_2`) REFERENCES `site_supervisors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `task_reports_site_supervisor_id_3_foreign` FOREIGN KEY (`site_supervisor_id_3`) REFERENCES `site_supervisors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `task_reports_supervising_consultant_id_foreign` FOREIGN KEY (`supervising_consultant_id`) REFERENCES `supervising_consultants` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `time_schedules`
--
ALTER TABLE `time_schedules`
  ADD CONSTRAINT `time_schedules_kind_of_work_detail_id_foreign` FOREIGN KEY (`kind_of_work_detail_id`) REFERENCES `kind_of_work_details` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `time_schedule_histories`
--
ALTER TABLE `time_schedule_histories`
  ADD CONSTRAINT `time_schedule_histories_kind_of_work_detail_id_foreign` FOREIGN KEY (`kind_of_work_detail_id`) REFERENCES `kind_of_work_details` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `time_schedule_histories_task_report_id_foreign` FOREIGN KEY (`task_report_id`) REFERENCES `task_reports` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
