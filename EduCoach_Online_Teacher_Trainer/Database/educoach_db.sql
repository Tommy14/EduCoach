-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 03:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educoach_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(2) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `amount` varchar(5) NOT NULL,
  `course` varchar(5) NOT NULL,
  `create_at` datetime NOT NULL,
  `cus_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `customer_name`, `address`, `amount`, `course`, `create_at`, `cus_id`) VALUES
(5, 'Sahasra Nawodi', 'No 6,\r\nMain Road,\r\nHambanthota', '75000', '3', '2023-06-02 02:43:28', 1),
(6, 'Thihansi', ' Floor 10, Luxe Apartment, Kottawa', '75000', '1', '2023-06-11 04:38:32', 4),
(7, 'Thamindu Vimansha', '352/D14, Brilliance Houses,\r\nMadiwela, Kotte.', '5500', '2', '2023-06-11 04:41:38', 4),
(9, 'Thedeesha Gunawardena', 'Floor 10, Luxe Apartment,\r\nKottawa.', '75000', '1', '2023-06-11 18:05:52', 30);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `reply` varchar(1000) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `contact_number`, `message`, `reply`, `created_at`) VALUES
(1, 'Sasanka Madusith', 'sasanka@gmail.com', '0746712590', ' Our online teacher training system! We understand that teaching online can be challenging, but we’re here to help. Our system offers a range of features that make it easy for you to teach online. With our flexible scheduling options, you can choose when to conduct your lessons.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper, arcu sed rutrum fermentum, felis lacus consequat libero, in molestie quam neque non tellus. Vestibulum et semper velit. Morbi laoreet, orci non dignissim interdum, ligula nunc tempor orci, sed dictum lectus ipsum id urna. Nulla eu ligula vitae mauris fermentum tristique. ', '2023-06-02 04:00:31'),
(3, 'Radha', 'r@mail.com', '0746712590', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper, arcu sed rutrum fermentum, felis lacus consequat libero, in molestie quam neque non tellus. Vestibulum et semper velit. Morbi laoreet, orci non dignissim interdum, ligula nunc tempor orci, sed dictum lectus ipsum id urna. Nulla eu ligula vitae mauris fermentum tristique. ', '', '2023-06-02 04:06:11'),
(7, 'Thihansi Gunawardena', 'thihansis@gmail.com', '0701016062', ' need to know more details', '', '2023-06-11 18:00:34'),
(8, 'Thedeesha Gunawardena', 'thedeeshag@gmail.com', '0777900970', ' Communication skills course details', '', '2023-06-11 18:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `price`, `created_date`) VALUES
(1, 'Pre School Teacher Training', 'Our comprehensive Pre School Teacher Training course is designed to equip aspiring educators with the knowledge, skills, and techniques necessary to excel in the field of early childhood education. Delivered entirely online, this course offers convenience and flexibility, allowing you to learn at your own pace from anywhere in the world.', '75000', '2023-06-01 20:09:19'),
(2, 'Class Management 3-month Course', 'Our comprehensive Child Management course is designed to provide you with the essential skills and knowledge needed to effectively manage and guide children\'s behavior. Whether you\'re a parent, educator, caregiver, or anyone working with children, this course will empower you to create a positive and nurturing environment for their growth and development.', '5500', '2023-06-01 20:34:45'),
(3, 'Class Management Course	', 'Our comprehensive Child Management course is designed to provide you with the essential skills and knowledge needed to effectively manage and guide children\'s behavior. Whether you\'re a parent, educator, caregiver, or anyone working with children, this course will empower you to create a positive and nurturing environment for their growth and development.	', '58000', '2023-06-01 20:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `created_date`) VALUES
(1, 'Is the online payment method secure?', 'Trusted Payment Gateways: We partner with reputable and trusted payment gateways to process online transactions. These payment gateways employ industry-standard security protocols and have stringent measures in place to safeguard your payment information', '2023-06-01 23:35:08'),
(2, 'How do I sign up for an account?', 'To sign up for an account, click on the \"Sign Up\" or \"Create an Account\" button on our website\'s homepage, provide the required information in the registration form, and complete the process', '2023-06-01 23:39:43'),
(3, 'How do I update my account information or change my password?', 'To update your account information or change your password, log in to your account, navigate to the account settings or profile section, and follow the prompts to edit your information or update your password.', '2023-06-01 23:40:02'),
(4, 'How do I communicate with the instructor or ask questions?', 'You can communicate with the instructor or ask questions through the designated communication channels provided by the online training platform, such as discussion forums, messaging systems, or live chat features.', '2023-06-01 23:40:25'),
(5, 'Can I request a refund if I\'m unable to complete the course due to unforeseen circumstances?', 'Refund policies vary, but you may be eligible for a refund if you\'re unable to complete the course due to unforeseen circumstances. Please refer to our refund policy or contact our support team for more information on the specific refund process and eligibility criteria.', '2023-06-01 23:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `job`, `password`, `create_datetime`) VALUES
(26, 'Thihansi G', 'thihansis@gmail.com', 'Student', '3Mi9421224', '2023-06-11'),
(30, 'Thedeesha Gunawardena', 'thedeeshag@gmail.com', 'Pilot', 'Thedeesha@123', '2023-06-11'),
(31, 'Udeesha Gunawardena', 'udeeshag@gmail.com', 'Pilot', 'Udeesha#123', '2023-06-11'),
(32, 'Sudeesha G', 'sudeeshaU@gmail.com', 'Captain', 'Sudeesha@123', '2023-06-11'),
(33, 'Thamindu Vimansha', 'thaminduvd@gmail.com', 'Student', '3Mi9421224', '2023-06-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
