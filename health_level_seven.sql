-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 05:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_level_seven`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othernames` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferred_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `doctor_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `surname`, `othernames`, `preferred_date`, `gender`, `appointment_type`, `hospital_id`, `doctor_type`, `status`, `phone_number`, `email_address`, `created_at`, `updated_at`, `last_edited_by`) VALUES
(5, 'Pinponsuhu', 'Joseph', '2022-01-31', 'Male', 'Routine', 3, 'Dentist', 'Active', '09078810948', 'pinponsuhuj@gmail.com', '2022-01-31 06:37:03', '2022-01-31 06:37:03', 'Department1');

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE `assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `itemr_id` int(10) UNSIGNED NOT NULL,
  `assigned_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bed_spaces`
--

CREATE TABLE `bed_spaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othernames` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checked_in_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `checked_in_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bed_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `PID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_out_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bed_spaces`
--

INSERT INTO `bed_spaces` (`id`, `surname`, `othernames`, `status`, `gender`, `phone_number`, `checked_in_date`, `hospital_id`, `checked_in_time`, `bed_number`, `ward`, `next_of_kin`, `next_of_kin_number`, `doctor_name`, `created_at`, `updated_at`, `PID`, `reason`, `last_edited_by`, `check_out_time`) VALUES
(5, 'Pinponsuhu', 'Josefa', 'Serious', 'Male', '09078810947', '2022-01-29', 3, '18:38', '29', 'two', 'Pinponsuhu Joy', '08055068272', 'dr Jay', '2022-01-29 16:38:33', '2022-01-29 16:38:33', NULL, 'Shot fired', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hospital_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `title`, `content`, `to`, `from`, `status`, `is_read`, `created_at`, `updated_at`, `hospital_id`) VALUES
(1, 'Shaba', 'Test', 'Super Admin', 'Shaba Health Centre', 'Closed', '0', '2022-01-25 21:36:26', '2022-01-29 14:57:11', '3'),
(2, 'Shazam', 'testing files', 'Super Admin', 'Shaba Health Centre', 'Closed', '0', '2022-01-25 21:37:10', '2022-01-26 21:35:52', '3');

-- --------------------------------------------------------

--
-- Table structure for table `complain_files`
--

CREATE TABLE `complain_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `complain_id` int(10) UNSIGNED NOT NULL,
  `complain_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complain_files`
--

INSERT INTO `complain_files` (`id`, `complain_id`, `complain_title`, `filename`, `created_at`, `updated_at`) VALUES
(1, 2, 'Shazam', 'TfgiFl6C81oJ7ax23MkwUEPgtp3m2SkjWQRJwOI1.jpg', '2022-01-25 21:37:10', '2022-01-25 21:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `radiology_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inventory_permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `hospital_name`, `hospital_logo`, `HID`, `password`, `hospital_id`, `radiology_permission`, `bed_permission`, `appointment_permission`, `patient_permission`, `inventory_permission`, `created_at`, `updated_at`) VALUES
(5, 'Department', 'Shaba Health Centre', 'HKfou2J1eH6dCAJtJzdXetbYPoStPo73zZOBiHMu.jpg', '552939828756', '$2y$10$J4RPoeHeb9yDTy/7ErsLmeMGgxGuTjIQrfufk5NF5CID1xeF1lP3a', 3, 'on', 'on', 'on', NULL, 'on', '2022-01-31 09:59:03', '2022-01-31 09:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_of_hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shelf_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_brought_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `delivered_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliverer_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`id`, `name`, `quantity`, `shelf_no`, `item_id`, `item_category`, `date_brought_in`, `hospital_id`, `delivered_by`, `deliverer_number`, `serial_number`, `created_at`, `updated_at`, `expiry_date`, `item_condition`, `last_edited_by`) VALUES
(3, 'Moneyy', '200000', '17', '974800', 'Medicinal', '2022-01-28', 3, 'Money cartel', '09078810948', 'money1212', '2022-01-28 21:47:48', '2022-01-28 21:54:29', '2022-01-28', 'Good', 'shazz');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_read` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `text`, `content`, `created_at`, `updated_at`, `is_read`) VALUES
(1, '1', '2', 'text', 'Hello', NULL, '2022-01-15 11:32:05', '1'),
(2, '2', '1', 'text', 'How are you?', NULL, '2022-01-15 08:14:22', '1'),
(3, '1', '2', 'text', 'hi', '2022-01-14 22:25:47', '2022-01-15 11:32:05', '1'),
(4, '1', '2', 'text', 'hi', '2022-01-14 22:26:29', '2022-01-15 11:32:05', '1'),
(5, '1', '2', 'text', 'HI', '2022-01-15 07:39:23', '2022-01-15 11:32:05', '1'),
(6, '2', '1', 'text', 'How are you', '2022-01-15 07:40:46', '2022-01-15 08:14:22', '1'),
(7, '2', '1', 'text', 'How\'s you day going', '2022-01-15 07:41:08', '2022-01-15 08:14:22', '1'),
(8, '2', '1', 'text', 'How was your trip', '2022-01-15 07:41:27', '2022-01-15 08:14:22', '1'),
(9, '2', '1', 'text', 'hi', '2022-01-15 08:14:18', '2022-01-15 08:14:22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_01_125359_create_hospitals_table', 1),
(6, '2021_12_01_193038_create_patients_table', 1),
(7, '2021_12_01_225516_create_appointments_table', 1),
(8, '2021_12_03_222719_create_bed_spaces_table', 1),
(9, '2021_12_06_214916_add__p_i_d_to_bed_spaces_table', 1),
(10, '2021_12_07_183927_create_inventory_items_table', 1),
(11, '2021_12_07_214349_add_expiry_date_to_inventory_items_table', 1),
(12, '2021_12_08_161344_add_item_condition_to_inventory_items_table', 1),
(13, '2021_12_13_155918_add_reason_to_bed_spaces_table', 1),
(14, '2021_12_13_194258_add_date_registered_to_patients_table', 1),
(15, '2021_12_16_214030_create_radiology_uploads_table', 1),
(16, '2021_12_16_221422_create_radiology_files_table', 1),
(17, '2021_12_16_224155_add_hospital_id_to_radiology_uploads_table', 1),
(22, '2021_12_23_133842_create_departments_table', 2),
(23, '2022_01_06_182309_create_staff_table', 2),
(24, '2022_01_07_225231_add_last_edited_to_inventory_items_table', 3),
(25, '2022_01_08_050654_add_last_edited_to_radiology_uploads_table', 4),
(26, '2022_01_08_160922_add_last_edited_to_patients_table', 5),
(27, '2022_01_08_204900_add_last_edited_to_bed_spaces_table', 6),
(28, '2022_01_08_213557_add_last_edited_to_appointments_table', 7),
(33, '2022_01_09_230445_create_super_admins_table', 8),
(34, '2022_01_14_222343_create_messages_table', 9),
(35, '2022_01_14_232428_add_is_read_to_messages_table', 10),
(37, '2022_01_16_223247_add_check_out_time_to_bed_spaces_table', 11),
(62, '2022_01_17_175626_add_bed_number_to_users_table', 12),
(63, '2022_01_18_222130_create_requests_table', 13),
(64, '2022_01_19_165427_create_request_replies_table', 13),
(65, '2022_01_19_173729_create_request_reply_files_table', 13),
(68, '2022_01_24_205758_create_complains_table', 14),
(69, '2022_01_24_205823_create_complain_files_table', 14),
(70, '2022_01_24_205858_create_reply_complains_table', 14),
(71, '2022_01_24_205921_create_reply_complain_files_table', 14),
(72, '2022_01_25_223324_add_hospital_id_to_complains_table', 15),
(73, '2022_01_26_204110_add_filename_to_reply_complain_files_table', 16),
(74, '2022_02_02_070756_add_department_name_to_requests_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othernames` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_of_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resident_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin_number1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin_number2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_registered` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `passport`, `surname`, `othernames`, `date_of_birth`, `gender`, `phone_number`, `email_address`, `state_of_origin`, `occupation`, `resident_address`, `hospital_id`, `next_of_kin`, `next_of_kin_number1`, `next_of_kin_number2`, `PID`, `created_at`, `updated_at`, `date_registered`, `last_edited_by`) VALUES
(3, 'SqWMA6zyvGjcYy2UVAbTpjqRfenLvuliBHeBNlm0.jpg', 'Pinponsuhu', 'Josefa', '2022-01-29', 'Male', '09078810948', 'pinponsuhu@gmail.com', 'Lagos', 'Software developer', 'somewhere', 3, 'Joy Pinponsuhu', '783495024', '87569043', '7307470541', '2022-01-29 15:48:13', '2022-01-29 15:48:13', '29-January-2022', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radiology_files`
--

CREATE TABLE `radiology_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `upload_id` int(10) UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radiology_files`
--

INSERT INTO `radiology_files` (`id`, `upload_id`, `file_path`, `created_at`, `updated_at`) VALUES
(6, 2, '2NUsRnBQjRIV2hryi492KRxdRn9nRw4lD7xIoyWc.jpg', '2022-01-29 15:34:47', '2022-01-29 15:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `radiology_uploads`
--

CREATE TABLE `radiology_uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `PID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `last_edited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radiology_uploads`
--

INSERT INTO `radiology_uploads` (`id`, `PID`, `full_name`, `phone_number`, `email_address`, `test_type`, `gender`, `created_at`, `updated_at`, `hospital_id`, `last_edited_by`) VALUES
(2, NULL, 'Pinponsuhu Joseph', '09078810948', 'pinponsuhujo@gmail.com', 'MRI', 'Male', '2022-01-29 15:25:46', '2022-01-29 15:25:46', 3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `reply_complains`
--

CREATE TABLE `reply_complains` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reply_complains`
--

INSERT INTO `reply_complains` (`id`, `message`, `complain_id`, `from`, `to`, `is_read`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test reply', 2, 'Shaba Health Centre', 'Super Admin', '0', 'Open', '2022-01-26 19:39:04', '2022-01-26 19:39:04'),
(2, 'Test reply', 2, 'Shaba Health Centre', 'Super Admin', '0', 'Open', '2022-01-26 19:39:30', '2022-01-26 19:39:30'),
(3, 'Test with files', 2, 'Shaba Health Centre', 'Super Admin', '0', 'Open', '2022-01-26 19:40:09', '2022-01-26 19:40:09'),
(4, 'Test with files', 2, 'Shaba Health Centre', 'Super Admin', '0', 'Open', '2022-01-26 19:41:59', '2022-01-26 19:41:59'),
(5, 'flgjo', 2, 'Super Admin', '3', '0', 'Open', '2022-01-26 21:04:00', '2022-01-26 21:04:00'),
(6, 'Test with files', 1, 'Super Admin', '3', '0', 'Open', '2022-01-26 21:11:21', '2022-01-26 21:11:21'),
(7, 'Complaint has been resolved', 2, 'Super Admin', '3', '0', 'Open', '2022-01-26 21:35:52', '2022-01-26 21:35:52'),
(8, 'sukmiov', 1, 'Super Admin', '3', '0', 'Open', '2022-01-29 09:52:11', '2022-01-29 09:52:11'),
(9, 'smellov', 1, 'Shaba Health Centre', 'Super Admin', '0', 'Open', '2022-01-29 09:53:26', '2022-01-29 09:53:26'),
(10, 'smelliov mcfuckingstein', 1, 'Shaba Health Centre', 'Super Admin', '0', 'Open', '2022-01-29 09:54:42', '2022-01-29 09:54:42'),
(11, 'closing complaint', 1, 'Super Admin', '3', '0', 'Open', '2022-01-29 14:57:11', '2022-01-29 14:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `reply_complain_files`
--

CREATE TABLE `reply_complain_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `complain_id` int(10) UNSIGNED NOT NULL,
  `reply_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reply_complain_files`
--

INSERT INTO `reply_complain_files` (`id`, `complain_id`, `reply_id`, `created_at`, `updated_at`, `filename`) VALUES
(1, 2, 4, '2022-01-26 19:41:59', '2022-01-26 19:41:59', 'x4cB49xb76G5DjMsCvHpKE0FLpftOaf1FIP4w0L5.jpg'),
(2, 2, 4, '2022-01-26 19:41:59', '2022-01-26 19:41:59', 'lYmxRAbUE04J5I8YFSTPOW7Ow19GQ0gxdxfG89oQ.png'),
(3, 1, 6, '2022-01-26 21:11:21', '2022-01-26 21:11:21', 'tulWLrLvqYJGesmvBlNV1VBuFuoESLuzRFZ7GKml.jpg'),
(4, 1, 8, '2022-01-29 09:52:12', '2022-01-29 09:52:12', 'sCV10jATVZr5F5YHJuNRrldHwKA6VewKQaFcjnVH.jpg'),
(5, 1, 9, '2022-01-29 09:53:26', '2022-01-29 09:53:26', 'dXizdhHDTns84CrxO938RvKGS3LneHvfbS9Csilg.png'),
(6, 1, 10, '2022-01-29 09:54:42', '2022-01-29 09:54:42', 'a6cKMc52T7LiPAyI4XhU4egKu47YTS623BSPkE0K.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `is_read` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `title`, `content`, `status`, `to`, `from`, `hospital_id`, `is_read`, `created_at`, `updated_at`, `sender_name`) VALUES
(2, 'test', 'test', 'Open', 'Admin', '3', 3, '0', '2022-01-25 21:56:43', '2022-01-30 19:54:36', 'Josefa'),
(3, 'Testing new thing', 'Testing new thing as stated in the title by Jospeh', 'Open', 'Admin', '5', 3, '0', '2022-02-02 06:15:27', '2022-02-02 06:15:27', 'Department'),
(4, 'Testing new thing', 'Testing new thing as stated in the title by Joseph 2', 'Open', 'Admin', '5', 3, '0', '2022-02-02 06:16:56', '2022-02-02 06:16:56', 'Department');

-- --------------------------------------------------------

--
-- Table structure for table `request_files`
--

CREATE TABLE `request_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `requests_id` int(10) UNSIGNED NOT NULL,
  `request_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_files`
--

INSERT INTO `request_files` (`id`, `requests_id`, `request_title`, `filename`, `created_at`, `updated_at`) VALUES
(2, 2, 'test', 'Oh5L5YJ3iJFbqKKJQhqJV3VCPYmqa9Hy1TYMCt31.jpg', '2022-01-25 21:56:43', '2022-01-25 21:56:43'),
(3, 2, 'test', '2brKAsxcvIUWU0ZqnTnLsAr50nZcdLHJQxNBzLzH.png', '2022-01-25 21:56:43', '2022-01-25 21:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `request_replies`
--

CREATE TABLE `request_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_replies`
--

INSERT INTO `request_replies` (`id`, `request_id`, `message`, `from`, `to`, `status`, `is_read`, `hospital_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'closed', 'Admin', '3', 'Closed', 0, 3, '2022-01-30 19:54:36', '2022-01-30 19:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `request_reply_files`
--

CREATE TABLE `request_reply_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `reply_id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_of_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `house_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `super_admins`
--

CREATE TABLE `super_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admins`
--

INSERT INTO `super_admins` (`id`, `level`, `fullname`, `password`, `phone_number`, `email_address`, `gender`, `passport`, `username`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pinponsuhu Joseph', '$2y$10$sIIVy2j1f/GoC.MiZpD7MuBqZkcuqVtAPtqfbBi1XGESCh6Fzt7c2', '09078810948', 'pinponsuhuj@gmail.com', 'Male', 'hjW1bkUbWFL74l48aUEGSK7izBeL3qlhIxijjOov.jpg', 'Test', '2022-01-10 16:36:56', '2022-01-10 16:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_of_hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bed_number` int(11) NOT NULL,
  `shelf_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `hospital_name`, `head_of_hospital`, `email_address`, `phone_number`, `hospital_address`, `hospital_admin`, `hospital_logo`, `password`, `HID`, `created_at`, `updated_at`, `bed_number`, `shelf_number`) VALUES
(2, 'Pinponsuhu Healthcare', 'Pinponsuhu Joseph', 'pinponsuhuo@gmail.com', '080550682622', '27, Martins streets', '1', 'kSMkpy0cwgJXZm59q5lyrwOOPsPvkQooVt0gcvjJ.jpg', '$2y$10$sIIVy2j1f/GoC.MiZpD7MuBqZkcuqVtAPtqfbBi1XGESCh6Fzt7c2', '267411925595', '2022-01-14 18:44:50', '2022-01-14 18:44:50', 30, 20),
(3, 'Shaba Health Centre', 'Pinponsuhu Joseph', 'pinponsuhuoo@gmail.com', '0987656789', '27, Martins street', '1', 'HKfou2J1eH6dCAJtJzdXetbYPoStPo73zZOBiHMu.jpg', '$2y$10$7AC60eg3o4N0Z8BpCklP/uf/OSxpe5epsf59HORdYrUa3oV4FlMpK', '552939828756', '2022-01-14 18:52:14', '2022-01-23 20:27:52', 30, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigns_itemr_id_foreign` (`itemr_id`);

--
-- Indexes for table `bed_spaces`
--
ALTER TABLE `bed_spaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bed_spaces_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain_files`
--
ALTER TABLE `complain_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complain_files_complain_id_foreign` (`complain_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hospitals_hospital_name_unique` (`hospital_name`),
  ADD UNIQUE KEY `hospitals_email_address_unique` (`email_address`),
  ADD UNIQUE KEY `hospitals_hospital_admin_unique` (`hospital_admin`),
  ADD UNIQUE KEY `hospitals_hid_unique` (`HID`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory_items_item_id_unique` (`item_id`),
  ADD KEY `inventory_items_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_pid_unique` (`PID`),
  ADD KEY `patients_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `radiology_files`
--
ALTER TABLE `radiology_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radiology_files_upload_id_foreign` (`upload_id`);

--
-- Indexes for table `radiology_uploads`
--
ALTER TABLE `radiology_uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radiology_uploads_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `reply_complains`
--
ALTER TABLE `reply_complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_complains_complain_id_foreign` (`complain_id`);

--
-- Indexes for table `reply_complain_files`
--
ALTER TABLE `reply_complain_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_complain_files_reply_id_foreign` (`reply_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `request_files`
--
ALTER TABLE `request_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_files_requests_id_foreign` (`requests_id`);

--
-- Indexes for table `request_replies`
--
ALTER TABLE `request_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_replies_request_id_foreign` (`request_id`);

--
-- Indexes for table `request_reply_files`
--
ALTER TABLE `request_reply_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_reply_files_request_id_foreign` (`request_id`),
  ADD KEY `request_reply_files_reply_id_foreign` (`reply_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `super_admins_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `super_admins_email_address_unique` (`email_address`),
  ADD UNIQUE KEY `super_admins_username_unique` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_hospital_name_unique` (`hospital_name`),
  ADD UNIQUE KEY `users_email_address_unique` (`email_address`),
  ADD UNIQUE KEY `users_hid_unique` (`HID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bed_spaces`
--
ALTER TABLE `bed_spaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complain_files`
--
ALTER TABLE `complain_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radiology_files`
--
ALTER TABLE `radiology_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `radiology_uploads`
--
ALTER TABLE `radiology_uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reply_complains`
--
ALTER TABLE `reply_complains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reply_complain_files`
--
ALTER TABLE `reply_complain_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request_files`
--
ALTER TABLE `request_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_replies`
--
ALTER TABLE `request_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_reply_files`
--
ALTER TABLE `request_reply_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assigns`
--
ALTER TABLE `assigns`
  ADD CONSTRAINT `assigns_itemr_id_foreign` FOREIGN KEY (`itemr_id`) REFERENCES `inventory_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bed_spaces`
--
ALTER TABLE `bed_spaces`
  ADD CONSTRAINT `bed_spaces_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complain_files`
--
ALTER TABLE `complain_files`
  ADD CONSTRAINT `complain_files_complain_id_foreign` FOREIGN KEY (`complain_id`) REFERENCES `complains` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD CONSTRAINT `inventory_items_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `radiology_files`
--
ALTER TABLE `radiology_files`
  ADD CONSTRAINT `radiology_files_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `radiology_uploads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `radiology_uploads`
--
ALTER TABLE `radiology_uploads`
  ADD CONSTRAINT `radiology_uploads_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reply_complains`
--
ALTER TABLE `reply_complains`
  ADD CONSTRAINT `reply_complains_complain_id_foreign` FOREIGN KEY (`complain_id`) REFERENCES `complains` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reply_complain_files`
--
ALTER TABLE `reply_complain_files`
  ADD CONSTRAINT `reply_complain_files_reply_id_foreign` FOREIGN KEY (`reply_id`) REFERENCES `reply_complains` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_files`
--
ALTER TABLE `request_files`
  ADD CONSTRAINT `request_files_requests_id_foreign` FOREIGN KEY (`requests_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_replies`
--
ALTER TABLE `request_replies`
  ADD CONSTRAINT `request_replies_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_reply_files`
--
ALTER TABLE `request_reply_files`
  ADD CONSTRAINT `request_reply_files_reply_id_foreign` FOREIGN KEY (`reply_id`) REFERENCES `request_replies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_reply_files_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
