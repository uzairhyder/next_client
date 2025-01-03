-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2025 at 03:50 PM
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
-- Database: `next_client_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` longtext COLLATE utf8mb4_unicode_ci,
  `title4` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title5` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title6` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title7` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `page_id`, `section_name`, `title1`, `title2`, `title3`, `title4`, `title5`, `title6`, `title7`, `video`, `banner_image`, `description`, `created_at`, `updated_at`) VALUES
(1, '1', 'home-banner', 'Customers', 'have chosen whether or not to work with', 'businesses based on their', 'ratings and reviews', 'for years...', 'Businesses should choose customers the same way!', NULL, NULL, '1678823285.png', '<p>Every small business owner has their own book on customers who have been great to work with, as well as the ones whom they will never work with again. If you are in business for yourself long enough, you will find customers who do not follow through on payment and/or are litigious and compromise the strength of your business. You will also have those customers who insist on paying nothing up front and all of it when the work is done. That puts you in a position to gamble on if that customer will follow through on their promise and if you should take that risk. What if you could share that list of good and bad customers with other business&nbsp;owners? Next Client allows exactly that. We are a members-only based service that allows business owners to candidly share their experiences with different customers. Take advantage of using the experiences of other&nbsp;businesses so you know if that customer was a pain or if they actually did pay when the work was done and you can feel confident that they will do the same for you! This information is not posted for the public to see. Only approved business owners have access to our database and can add to it. Check out below for more details!</p>', '2022-11-11 12:01:03', '2023-07-26 22:43:30'),
(3, '1', 'second-section', 'Add To Our Database', 'It\'s Free To Add Your Reviews To Our Database!', 'Next Client balances the scales for business owners! For far too long, businesses have been held hostage to the threats of customers leaving negative reviews, which threatens the ability for businesses to gain customers in the future. Now, businesses can take the power back and balance the scales by being able to use that same argument. Share the details that matter to you as a business owner.', NULL, NULL, NULL, NULL, NULL, '1678823310.png', '<p>Did they pay on time?</p><p>Were they easy to work with?</p><p>Would you like to work with them again?</p><p>Were they letigious?</p><p>Should other businesses avoid them?</p><p>Overall rating out of 5 stars</p>', '2022-11-11 12:08:45', '2023-07-26 22:54:18'),
(4, '1', 'third-section', 'Search Our Database', 'View Reviews For Potential Customers', NULL, NULL, NULL, NULL, NULL, NULL, '1677184236.png', '<p>Our subscribers are able to not only leave reviews, but also search for reviews based on the customer name. If that name matches another phone, email or home address, you will be able to read reviews from other businesses. Our system allows us to track people, even if they move, change email or change their phone number.&nbsp;</p>', '2022-11-11 12:08:58', '2023-07-26 17:22:05'),
(5, '1', 'video-section', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1678823444.mp4', '1678823444.png', NULL, '2022-11-11 12:09:15', '2023-03-15 18:50:45'),
(6, '1', 'sell-section', 'Get', '90% off', 'For Your First Year', 'For a Limited Time Only!', NULL, NULL, NULL, NULL, '1678823468.png', NULL, '2023-02-24 14:53:11', '2023-03-15 18:51:08'),
(7, '1', 'contact', 'Get In Touch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1678823481.png', NULL, '2023-02-24 14:56:51', '2023-03-15 18:51:21'),
(8, '14', 'search-banner', 'Search', 'Our', 'Database', NULL, NULL, NULL, NULL, NULL, '1678823494.png', '<p>*<strong>Only Information matching your search criteria will be displayed. We do not publish address, email or phone numbers</strong><br>Search our database based on name, email, phone and address.<br>Only searches that result in customers with reviews count against your available searches.</p>', '2023-02-24 14:59:36', '2023-07-26 17:04:04'),
(9, '15', 'banner-review', 'Leave', 'a', 'Review', NULL, NULL, NULL, NULL, NULL, '1678823507.png', NULL, '2023-02-24 15:07:18', '2023-03-15 18:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `image`, `date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum is placeholder text commonly used in the graphic', 'lorem-ipsum-is-placeholder-text-commonly-used-in-the-graphic', '1667340369.png', '2022-11-02', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.&nbsp;</p>', 1, '2022-11-02 16:06:09', '2022-11-08 14:54:49'),
(2, 'Lorem ipsum is a name for a common type of placeholder text', 'lorem-ipsum-is-a-name-for-a-common-type-of-placeholder-text', '1667422467.jpg', '2022-11-02', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', 1, '2022-11-02 16:06:57', '2022-11-08 17:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint UNSIGNED NOT NULL,
  `copy_right` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `copy_right`, `contact`, `email`, `address`, `map_link`, `short_description`, `created_at`, `updated_at`) VALUES
(1, '© ALL RIGHTS RESERVED BY Next Client', '(470) 388-4601', 'sckeenon@gmail.com', '3698 Burel Mill Dr.buford 30519, US', 'https://goo.gl/maps/rwrXCnGcqHgYiGzW8', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.</p>', '2022-11-11 09:26:38', '2023-04-11 19:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `questions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `questions`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(2, 'What if a business leaves false reviews or abuses the service?', '<p>If we find a business is abusing our service by inaccurately&nbsp;posting negative reviews on homeowners, we will investigate the incident and delete the inaccurate&nbsp;review. Additional measures include proceeding with a warning to the business with possible suspension or revocation&nbsp;of their account.</p>', '1', '2023-02-24 15:32:18', '2023-08-18 17:29:39'),
(3, 'What if someone moves?', '<p>We use multiple data sources to track individuals. This allows a review to follow someone, even if they change their address, email, or phone number.</p>', '1', '2023-02-24 15:32:30', '2023-08-18 17:30:15'),
(4, 'Will I be charged a search credit if my search finds no reviews for that person?', '<p>No. Only searches resulting in the correct person with a review will count as a search credit. You will be asked to verify that you would like to use that credit before seeing the review(s).</p>', '1', '2023-02-24 15:32:48', '2023-08-18 17:30:40'),
(5, 'Can I leave a review without having search credits?', '<p>Yes. However, you will need to create an account with us and verify that you are a legitimate business prior to being allowed to leave reviews.</p>', '1', '2023-02-24 15:32:58', '2023-08-18 17:31:03'),
(6, 'Can I edit a review after it has been submitted?', '<p>Yes. You can do that under your member account.</p>', '1', '2023-02-24 15:33:14', '2023-08-18 17:33:50'),
(11, 'How do I dispute a review that was left for me as an individual?', '<p>Please go to our Contact Us page and submit a request for us to look into the review. We will need as much detail as possible about why you are disputing this review so that we may reach out to the business and come to a resolution that works for everyone. If the review is found to have no merit, it will be removed and we will follow up with the business who left the review for further action.</p>', '1', '2023-03-14 21:38:27', '2023-08-18 17:34:11'),
(12, 'What if I cancel my membership?', '<p>You are welcome to cancel your membership at any time. You will still have access to your account and credits until the end of your billing cycle and it will not be renewed. We do not offer prorated refunds.</p>', '1', '2023-08-18 17:34:27', '2023-08-18 17:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image_title`, `image_slug`, `image_name`, `image_path`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Home', '1667577984.jpg', NULL, 1, NULL, '2022-11-05 10:06:24', '2022-11-05 10:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint UNSIGNED NOT NULL,
  `page_title` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_content` longtext COLLATE utf8mb4_unicode_ci,
  `home_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint UNSIGNED NOT NULL,
  `industry_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `industry_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Appliance Repair', 1, '2023-06-01 10:02:23', '2023-06-02 02:26:38'),
(2, 'Auto Sales', 1, '2023-06-01 10:12:43', '2023-06-01 10:12:43'),
(3, 'Automotive', 1, '2023-06-01 10:17:48', '2023-06-02 02:28:18'),
(4, 'Catering', 1, '2023-06-01 10:18:54', '2023-06-02 02:28:38'),
(7, 'Contractor/Builder', 1, '2023-06-02 02:28:58', '2023-06-02 02:28:58'),
(8, 'Electrician', 1, '2023-06-02 02:29:14', '2023-06-02 02:29:14'),
(9, 'Event/Yard Signs', 1, '2023-06-02 02:29:33', '2023-06-02 02:29:33'),
(10, 'Hair Stylist', 1, '2023-06-02 02:30:01', '2023-06-02 02:30:01'),
(11, 'Hotel/Vacation Rental', 1, '2023-06-02 02:30:21', '2023-06-02 02:30:21'),
(12, 'House Cleaning', 1, '2023-06-02 02:30:37', '2023-06-02 02:30:37'),
(13, 'HVAC', 1, '2023-06-02 02:30:59', '2023-06-02 02:30:59'),
(14, 'Lawn service/Landscaping', 1, '2023-06-02 02:31:15', '2023-06-02 02:34:40'),
(15, 'Mortgage Loans', 1, '2023-06-02 02:31:32', '2023-06-02 02:31:32'),
(16, 'Pest control', 1, '2023-06-02 02:31:47', '2023-06-02 02:31:47'),
(17, 'Photography', 1, '2023-06-02 02:32:04', '2023-06-02 02:32:04'),
(18, 'Plumbing', 1, '2023-06-02 02:32:32', '2023-06-02 02:32:32'),
(19, 'Real Estate', 1, '2023-06-02 02:32:55', '2023-06-03 04:46:11'),
(20, 'Recreation Vehicle Rentals', 1, '2023-06-02 02:33:17', '2023-06-02 02:33:17'),
(21, 'Roofing', 1, '2023-06-02 02:33:33', '2023-06-02 02:33:33'),
(22, 'Veterinarian', 1, '2023-06-02 02:33:53', '2023-06-02 02:33:53'),
(23, 'Weddings', 1, '2023-06-02 02:34:26', '2023-06-02 02:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `industries_names`
--

CREATE TABLE `industries_names` (
  `id` bigint UNSIGNED NOT NULL,
  `industry_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `contact`, `message`, `created_at`, `updated_at`) VALUES
(25, 'Jaime Morin', 'laketazy@mailinator.com', '(174) 598-7772', 'Est cillum soluta in', '2023-02-28 13:11:38', '2023-02-28 13:11:38'),
(26, 'Eugenia Livingston', 'nekefizyz@mailinator.com', '(193) 552-4625', 'Qui ut cum rerum tot', '2023-02-28 17:46:03', '2023-02-28 17:46:03'),
(28, 'Tanya Booker', 'sisuwa@mailinator.com', '(181) 147-8452', 'Cupidatat odit modi', '2023-03-02 14:09:22', '2023-03-02 14:09:22'),
(29, 'Candice Camacho', 'wohazoc@mailinator.com', '(188) 715-1158', 'Ea consectetur aliqu', '2023-03-02 14:10:06', '2023-03-02 14:10:06'),
(30, 'Aaron Francis', 'sonemesuz@mailinator.com', '(155) 670-7840', 'Anim sit libero eni', '2023-03-07 22:50:43', '2023-03-07 22:50:43'),
(31, 'Chastity Galloway', 'gisyrydo@mailinator.com', '(144) 497-2838', 'Ullam mollit repudia', '2023-03-07 22:50:55', '2023-03-07 22:50:55'),
(36, 'David Joy', 'djoy62471@gmail.com', '(123) 456-7898', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2023-03-10 17:26:49', '2023-03-10 17:26:49'),
(39, 'Ian Ratliff', 'facycy@mailinator.com', '(135) 270-2781', 'Totam quod et maiore', '2023-03-14 21:40:31', '2023-03-14 21:40:31'),
(42, 'EmmaJohn', 'EmmaJohn@gmail.com', '(031) 710-5555', 'testing', '2023-03-15 09:12:15', '2023-03-15 09:12:15'),
(47, 'David Joy', 'cujon@mailinator.com', '(186) 526-7462', 'Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2023-03-21 14:19:58', '2023-03-21 14:19:58'),
(48, 'David Joy', 'davidoy@gmail.com', '+93 983 98403282', 'Hello David Joy', '2023-08-17 21:36:50', '2023-08-17 21:36:50'),
(49, 'test', 'test123@email.com', '(080) 517-5561', 'test', '2024-08-06 19:46:25', '2024-08-06 19:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `map_link`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Houston', 'https://goo.gl/maps/xCPfwnLAtu7Hr5ZR7', 'houston', '1667503661.png', 1, '2022-11-04 13:27:41', '2022-11-08 15:50:17'),
(3, 'test', 'Ducimus nisi culpa', 'test', '1667926252.jpg', 1, '2022-11-09 10:50:52', '2022-11-09 10:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `type`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Favicon', '1678823242.png', '2022-11-05 18:16:45', '2023-03-15 18:47:22'),
(2, 'Logo', '1678823270.png', '2022-11-05 13:17:29', '2023-03-15 18:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `parent_category_id`, `main_category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, '5', 'My Cat', 'my-cat', 1, '2022-11-03 13:35:57', '2022-11-03 13:35:57'),
(10, '3', 'Devices & Accessories', 'devices-accessories', 1, '2022-11-03 14:25:49', '2022-11-16 15:19:40'),
(12, '6', 'Devices and Accessories', 'devices-and-accessories', 1, '2022-11-10 13:19:41', '2022-11-16 14:56:53'),
(13, '1', 'Home and Lifestyle', 'home-and-lifestyle', 1, '2022-11-10 13:38:20', '2022-11-16 15:02:29'),
(17, '4', 'Home Furniture', 'home-furniture', 1, '2022-11-16 15:05:51', '2022-11-16 15:06:21'),
(18, '7', 'Home Electronics', 'home-electronics', 1, '2022-11-16 15:13:19', '2022-11-16 15:17:47'),
(19, '8', 'Electronic Devices', 'electronic-devices', 1, '2022-11-25 10:48:47', '2022-11-25 10:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_03_03_210155_create_logos_table', 2),
(5, '2022_03_04_205232_create_homes_table', 3),
(8, '2022_10_13_190725_create_testimonials_table', 6),
(9, '2022_10_18_184937_testimonial', 7),
(10, '2022_10_18_190709_create__testimonial_table', 8),
(11, '2022_10_27_173542_create_faqs_table', 9),
(12, '2022_10_28_215824_create_portfolio', 10),
(13, '2022_10_31_164116_create_inquiries_table', 11),
(14, '2022_10_31_173933_create_packages_table', 12),
(16, '2022_10_31_214150_create_socials_table', 14),
(17, '2022_10_31_223033_create_services_table', 15),
(18, '2022_10_31_230211_create_portfolios_table', 16),
(19, '2014_10_12_000000_create_users_table', 17),
(21, '2022_11_01_170350_create_pages_table', 18),
(22, '2022_11_01_180422_create_banners_table', 19),
(24, '2022_11_01_195440_create_privacy_policies_table', 20),
(25, '2022_11_01_201457_create_terms_conditions_table', 21),
(26, '2022_11_01_203428_create_page_contents_table', 22),
(28, '2022_11_01_212644_create_blogs_table', 23),
(30, '2022_11_02_151719_create_parent_categories_table', 24),
(31, '2022_11_02_161824_create_main_categories_table', 25),
(32, '2022_11_02_170134_create_sub_categories_table', 26),
(33, '2022_11_03_181130_create_locations_table', 27),
(34, '2022_11_04_155504_create_galleries_table', 28),
(36, '2022_11_07_212636_create_configurations_table', 29),
(39, '2022_11_08_215416_create_attributes_table', 30),
(42, '2022_11_08_214745_create_products_table', 31),
(45, '2022_11_09_174828_create_brands_table', 32),
(46, '2022_11_11_151231_create_otp_verifications_table', 33),
(47, '2022_11_11_190922_create_subscriptions_table', 34),
(48, '2022_11_14_222008_create_user_addresses_table', 35),
(49, '2022_11_14_224938_create_wishlists_table', 36),
(50, '2022_11_15_195941_create_orders_table', 37),
(51, '2022_11_16_182850_create_offers_table', 38),
(52, '2022_11_24_204011_create_carts_table', 39),
(53, '2022_11_28_221652_create_reviews_table', 40),
(54, '2023_03_02_205359_create_package_subscriptions_table', 41),
(55, '2023_03_03_180736_create_search_histories_table', 42),
(56, '2023_04_14_223318_create_profile_updates_table', 43),
(57, '2023_04_14_231328_create_profile_updates_table', 44),
(58, '2023_04_14_234650_create_profile_updates_table', 45),
(59, '2023_05_30_173733_add_image_to_packages', 46),
(60, '2023_05_31_163655_add_business_name_to_users', 47),
(61, '2023_05_31_212629_create_industries_names_table', 48),
(62, '2023_05_31_220754_create_industries_table', 49),
(63, '2023_06_01_160418_add_industry_id_to_users', 50),
(64, '2023_06_01_165525_add_industry_id_to_profile_updates', 51);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `page_id`, `section_name`, `title1`, `title2`, `title3`, `title4`, `slug`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(1, '1', 'Biggest Sale', 'This weekend only', 'biggest', 'sale', 'up to 70% off', 'this-weekend-only', '1668703864.webp', '1668703811.webp', '2022-11-17 13:30:33', '2022-11-18 10:51:04'),
(2, '2', 'Buy One Get One Free', 'Buy One', 'Get One', 'Free', NULL, 'buy-one', '1668628909.webp', '1668704100.webp', '2022-11-17 13:57:38', '2022-11-18 10:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_count` int DEFAULT '0',
  `order_status` tinyint(1) DEFAULT NULL COMMENT '1 pending, 2 dispatch, 3 deliver',
  `billing_address_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `total_price`, `product_count`, `order_status`, `billing_address_id`, `shipping_address_id`, `created_at`, `updated_at`) VALUES
(1, '4', NULL, NULL, NULL, 3, NULL, NULL, NULL, '2022-11-26 14:44:10', '2022-11-26 17:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otp_verifications`
--

INSERT INTO `otp_verifications` (`id`, `email`, `otp`, `created_at`, `updated_at`) VALUES
(1, 'djoy62471@gmail.com', '532271', '2022-11-12 10:54:16', '2022-11-12 10:54:16'),
(2, 'abdulqadeersolangi007@gmail.com', '829116', '2022-11-12 17:23:57', '2022-11-12 17:23:57'),
(3, 'abdulqadeersolangi007@gmail.com', '126386', '2022-11-12 17:23:58', '2022-11-12 17:23:58'),
(4, 'djoy62471@gmail.com', '757150', '2022-11-16 09:41:28', '2022-11-16 09:41:28'),
(5, 'djoy62471@gmail.com', '559103', '2022-11-16 09:41:34', '2022-11-16 09:41:34'),
(6, 'djoy62471@gmail.com', '190999', '2022-11-16 09:48:41', '2022-11-16 09:48:41'),
(7, 'djoy62471@gmail.com', '833355', '2022-11-16 09:50:41', '2022-11-16 09:50:41'),
(8, 'djoy62471@gmail.com', '124298', '2022-11-16 09:52:55', '2022-11-16 09:52:55'),
(9, 'djoy62471@gmail.com', '122262', '2022-11-16 09:55:28', '2022-11-16 09:55:28'),
(10, 'djoy62471@gmail.com', '563785', '2022-11-16 09:55:40', '2022-11-16 09:55:40'),
(11, 'djoy62471@gmail.com', '321883', '2022-11-16 09:56:54', '2022-11-16 09:56:54'),
(12, 'djoy62471@gmail.com', '580078', '2022-11-16 09:58:05', '2022-11-16 09:58:05'),
(13, 'djoy62471@gmail.com', '152555', '2022-11-16 10:00:03', '2022-11-16 10:00:03'),
(14, 'djoy62471@gmail.com', '741864', '2022-11-16 11:03:57', '2022-11-16 11:03:57'),
(15, 'djoy62471@gmail.com', '287418', '2022-11-16 11:09:21', '2022-11-16 11:09:21'),
(16, 'djoy62471@gmail.com', '567107', '2022-11-16 11:41:09', '2022-11-16 11:41:09'),
(17, 'djoy62471@gmail.com', '841019', '2022-11-16 11:41:53', '2022-11-16 11:41:53'),
(18, 'djoy62471@gmail.com', '847219', '2022-11-16 12:00:46', '2022-11-16 12:00:46'),
(19, 'abdulqadeersolangi007@gmail.com', '349616', '2022-11-16 16:39:30', '2022-11-16 16:39:30'),
(20, 'abdulqadeersolangi007@gmail.com', '268297', '2022-11-16 16:42:43', '2022-11-16 16:42:43'),
(21, 'abdulqadeersolangi007@gmail.com', '834507', '2022-11-16 16:45:35', '2022-11-16 16:45:35'),
(22, 'abdulqadeersolangi007@gmail.com', '167421', '2022-11-16 16:45:38', '2022-11-16 16:45:38'),
(23, 'abdulqadeersolangi007@gmail.com', '140035', '2022-11-16 16:48:17', '2022-11-16 16:48:17'),
(24, 'djoy62471@gmail.com', '290125', '2022-11-16 16:52:15', '2022-11-16 16:52:15'),
(25, 'djoy62471@gmail.com', '624403', '2022-11-17 15:49:27', '2022-11-17 15:49:27'),
(26, 'abdulqadeersolangi007@gmail.com', '516282', '2022-11-17 15:53:14', '2022-11-17 15:53:14'),
(27, 'abdulqadeersolangi007@gmail.com', '489403', '2022-11-17 15:53:21', '2022-11-17 15:53:21'),
(28, 'djoy62471@gmail.com', '407496', '2022-11-17 15:56:53', '2022-11-17 15:56:53'),
(29, 'djoy62471@gmail.com', '400946', '2022-11-17 15:56:56', '2022-11-17 15:56:56'),
(30, 'djoy62471@gmail.com', '172956', '2022-11-17 15:59:57', '2022-11-17 15:59:57'),
(31, 'djoy62471@gmail.com', '327483', '2022-11-17 16:03:45', '2022-11-17 16:03:45'),
(32, 'djoy62471@gmail.com', '945899', '2022-11-17 16:07:28', '2022-11-17 16:07:28'),
(33, 'djoy62471@gmail.com', '124906', '2022-11-17 16:15:11', '2022-11-17 16:15:11'),
(34, 'iamjamesalbertt@gmail.com', '380527', '2022-11-17 17:05:59', '2022-11-17 17:05:59'),
(35, 'iamjamesalbertt@gmail.com', '630127', '2022-11-17 17:06:08', '2022-11-17 17:06:08'),
(36, 'aq.developer007@gmail.com', '134466', '2022-11-18 09:49:47', '2022-11-18 09:49:47'),
(37, 'aq.developer007@gmail.com', '968555', '2022-11-18 10:18:53', '2022-11-18 10:18:53'),
(38, 'aq.developer007@gmail.com', '451849', '2022-11-18 10:22:07', '2022-11-18 10:22:07'),
(39, 'aq.developer007@gmail.com', '882727', '2022-11-18 10:24:36', '2022-11-18 10:24:36'),
(40, 'aq.developer007@gmail.com', '697665', '2022-11-18 10:24:39', '2022-11-18 10:24:39'),
(41, 'djoy62471@gmail.com', '242774', '2022-11-19 12:26:52', '2022-11-19 12:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_points` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `price`, `image`, `description`, `package_points`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Monthly', '5/Month', '1685472667.PNG', '<p>For 01 Search/Month</p>', '1', 1, '2023-02-24 15:12:37', '2023-05-31 05:51:07'),
(2, 'Monthly', '49/Month', '1685748655.PNG', '<p>For 10 Search/Month</p>', '10', 1, '2023-02-24 15:13:18', '2023-06-03 10:30:55'),
(3, 'Monthly', '99/Month', '1686852371.PNG', '<p>For Unlimited Search/Month</p>', 'unlimited', 1, '2023-02-24 15:15:14', '2023-06-16 10:06:11'),
(4, 'Annual', '49', '1685469166.PNG', '<p>For 12 Searches</p>', '12', 1, '2023-02-24 15:15:55', '2023-05-31 04:52:46'),
(5, 'Annual', '499', '1685469177.PNG', '<p>For 120 Searches&nbsp;</p>', '120', 1, '2023-02-24 15:16:13', '2023-05-31 04:52:57'),
(6, 'Annual', '999', '1685748599.PNG', '<p>For Unlimited Searches</p>', 'unlimited', 1, '2023-02-24 15:16:43', '2023-08-10 17:01:59'),
(7, 'Free Sign up', '', '1685748599.PNG', '', '', 1, '2023-02-24 15:16:43', '2023-06-03 10:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `package_subscriptions`
--

CREATE TABLE `package_subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscriptionID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `cancel_status` int NOT NULL DEFAULT '0' COMMENT '1=admin, 2=user',
  `package_response` longtext COLLATE utf8mb4_unicode_ci,
  `package_points` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_points` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_subscriptions`
--

INSERT INTO `package_subscriptions` (`id`, `user_id`, `name`, `package_amount`, `package_id`, `orderID`, `subscriptionID`, `status`, `cancel_status`, `package_response`, `package_points`, `previous_points`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '5', NULL, NULL, '2', '1GC80568FG326031P', 'I-9NYYXC6UW1TF', 0, 1, '{\"orderID\":\"1GC80568FG326031P\",\"subscriptionID\":\"I-9NYYXC6UW1TF\",\"facilitatorAccessToken\":\"A21AAKwj5EFq7jZlCySs6BC-Lx9lOalm2jIkwNNzabsl3lNHj8C1s3nJeGPH16ILtw4Sjb6VDU4sxTUgaxHPmUt-xWYR2UsgQ\",\"paymentSource\":\"paypal\"}', '0', '0', '2023-07-12 11:11:09', '2023-07-23 15:48:51', '2023-07-12 15:11:09', '2023-07-24 19:48:51'),
(2, '6', NULL, NULL, '2', '3F164480GY5559728', 'I-5WRDTMD6A9FN', 0, 2, '{\"orderID\":\"3F164480GY5559728\",\"subscriptionID\":\"I-5WRDTMD6A9FN\",\"facilitatorAccessToken\":\"A21AAKwj5EFq7jZlCySs6BC-Lx9lOalm2jIkwNNzabsl3lNHj8C1s3nJeGPH16ILtw4Sjb6VDU4sxTUgaxHPmUt-xWYR2UsgQ\",\"paymentSource\":\"paypal\"}', '0', NULL, '2023-06-15 11:18:07', '2023-08-15 11:18:07', '2023-07-12 15:18:07', '2023-07-21 19:30:46'),
(3, '7', NULL, NULL, '2', '8DU749255L142393X', 'I-X07KHUFG7EX9', 1, 1, '{\"orderID\":\"8DU749255L142393X\",\"subscriptionID\":\"I-X07KHUFG7EX9\",\"facilitatorAccessToken\":\"A21AAJ9lJyysrf84rYWdH4Q5zBtLOLByfnUvvO6wGpLXbFU9EHyBWWv-7Mci7f45lym1mlcgJcRLpZErhgGI-sToknndyTHyQ\",\"paymentSource\":\"paypal\"}', '0', NULL, '2023-07-20 16:51:35', '2023-08-19 16:51:35', '2023-07-20 20:51:35', '2023-07-21 15:47:12'),
(4, '7', NULL, NULL, '1', '34U65496FW2049214', 'I-G8Y7FYERU68N', 1, 1, '{\"orderID\":\"34U65496FW2049214\",\"subscriptionID\":\"I-G8Y7FYERU68N\",\"facilitatorAccessToken\":\"A21AAILXEibqvw-nQ3vm1KZRvOF0T2AyePximTw9sjUQpvvxBRQgfdAew6VPyQ1rEPGGiMkPaqiXEOAdzxqX4Gi-e1DV-rrhw\",\"paymentSource\":\"paypal\"}', '4', '0', '2023-07-21 11:47:13', '2023-08-20 11:47:13', '2023-07-21 15:47:13', '2023-07-21 16:34:31'),
(5, '7', NULL, NULL, '1', '9CJ71858SG196753W', 'I-9T1GH7THL3JD', 0, 1, '{\"orderID\":\"9CJ71858SG196753W\",\"subscriptionID\":\"I-9T1GH7THL3JD\",\"facilitatorAccessToken\":\"A21AALnzBH0vI2_Xp7Fe_QlUtwj3jtZreWFJq6706D9eSc0ayjeaGoiAUFslKFJ14fMC2OE8BI6MwfolnPnc_C6d7Y_fAtJVw\",\"paymentSource\":\"paypal\"}', '0', '0', '2023-07-21 12:34:32', '2023-07-20 12:45:12', '2023-07-21 16:34:32', '2023-07-21 16:45:12'),
(6, '8', NULL, NULL, '1', '94X43181NL772072S', 'I-E28T466V99G4', 0, 2, '{\"orderID\":\"94X43181NL772072S\",\"subscriptionID\":\"I-E28T466V99G4\",\"facilitatorAccessToken\":\"A21AAKoUyR1kLpXS3XvSv6dVbGiqxpdTLBpOM8HZcRco5XLg_ETw2wMQKvRCi9X9CMCRtLtOGLNA5JljWeptGXDaAlWS-okuA\",\"paymentSource\":\"paypal\"}', '0', NULL, '2023-07-21 17:57:12', '2023-08-20 17:57:12', '2023-07-21 21:57:12', '2023-07-24 19:04:33'),
(7, '9', NULL, NULL, '1', '8AX91007YM128363T', 'I-1Y0LBTM73JR9', 0, 2, '{\"orderID\":\"8AX91007YM128363T\",\"subscriptionID\":\"I-1Y0LBTM73JR9\",\"facilitatorAccessToken\":\"A21AAKD5PhdlJUr-Bbdl28vqRaqdk6CriPicDVMUcwGAuyfn4nghBtiH288rRinSbTBR8ymRM6nurFBCMbjzyVWBNnKOgZxig\",\"paymentSource\":\"paypal\"}', '0', NULL, '2023-07-24 16:37:59', '2023-08-23 16:37:59', '2023-07-24 20:37:59', '2023-08-10 14:58:25'),
(8, '10', NULL, NULL, '2', '9XR745244W2330531', 'I-VVU3VXB78LFT', 0, 2, '{\"orderID\":\"9XR745244W2330531\",\"subscriptionID\":\"I-VVU3VXB78LFT\",\"facilitatorAccessToken\":\"A21AAITXBbOgqqCIoFuohI2ZUpHibGNpBL2rQRfFsHKaSFMxCJB-a70jMpOTf6JpFuId24NhPkOClkqHU_8xgvTEQo2jIJPHQ\",\"paymentSource\":\"paypal\"}', '5', NULL, '2023-07-25 11:51:39', '2023-08-24 11:51:39', '2023-07-25 15:51:39', '2023-08-08 17:11:17'),
(9, '14', 'Free Sign up', NULL, '7', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '2023-08-11 20:55:24', '2023-08-11 20:55:24'),
(10, '15', 'Free Sign up', NULL, '7', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '2023-08-11 20:57:37', '2023-08-11 20:57:37'),
(11, '14', NULL, NULL, '3', '0T47064313194101J', 'I-9XL532MHGD35', 0, 0, '{\"orderID\":\"0T47064313194101J\",\"subscriptionID\":\"I-9XL532MHGD35\",\"facilitatorAccessToken\":\"A21AAIRTsGyoJl66PVvLg7M_nlFbOUe8nBxGjDrhqojHKAsIuthv4UUlTYNtzZDNYfwqrM7oiiZxCeSlFAv8_B-229kqOt5JQ\",\"paymentSource\":\"paypal\"}', 'unlimited', NULL, '2023-08-15 11:24:44', '2023-09-14 11:24:44', '2023-08-15 15:24:44', '2023-08-15 15:24:44'),
(12, '15', NULL, NULL, '1', '0WS26781CK0258542', 'I-3J34KHKY4AHD', 1, 0, '{\"orderID\":\"0WS26781CK0258542\",\"subscriptionID\":\"I-3J34KHKY4AHD\",\"facilitatorAccessToken\":\"A21AALVWRAAs4NY7gzPt8_dUc4T4mu03V4qhNuYW8rDQCtq_-zaGCEwtlPP4JMorR_O26h2TmOVE5pdNfb7NaPLCCazRAJynA\",\"paymentSource\":\"paypal\"}', '0', NULL, '2023-08-15 12:35:22', '2023-09-14 12:35:22', '2023-08-15 16:35:22', '2023-08-15 17:02:32'),
(13, '15', NULL, NULL, '3', '9G34967756741730R', 'I-XXF0E7MPKB4H', 0, 0, '{\"orderID\":\"9G34967756741730R\",\"subscriptionID\":\"I-XXF0E7MPKB4H\",\"facilitatorAccessToken\":\"A21AAL42D3Cg6vux6IxQKeuHCPhEjCuNyUAM7S1Ofq7w3cUP0BsbLHX2GSQYUagAl-vBHXSu3HMBQKZXPZ6pkaPxG7LS2vJ-g\",\"paymentSource\":\"paypal\"}', 'unlimited', '0', '2023-08-15 13:02:33', '2023-09-14 13:02:33', '2023-08-15 17:02:33', '2023-08-15 17:02:33'),
(14, '16', 'Free Sign up', NULL, '7', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, '2023-08-15 17:03:56', '2023-08-15 17:03:56'),
(15, '17', 'Free Sign up', NULL, '7', NULL, NULL, 1, 0, NULL, NULL, NULL, '2023-08-15 13:13:26', '2024-08-14 13:13:26', '2023-08-15 17:13:26', '2023-08-15 17:13:26'),
(16, '16', NULL, NULL, '2', '3TW85160KV599923M', 'I-WG9PT0FSVKGK', 0, 0, '{\"orderID\":\"3TW85160KV599923M\",\"subscriptionID\":\"I-WG9PT0FSVKGK\",\"facilitatorAccessToken\":\"A21AAIE8GsBornc6HjwCkdUo7x7wuy84UsLnlXsP-lNswoAiMsKOQq_UMa2zLBSnUeFiI9KfAxiocjGPjsOwL9LxRrx8FXIPQ\",\"paymentSource\":\"paypal\"}', '5', NULL, '2023-08-17 14:03:53', '2023-09-16 14:03:53', '2023-08-17 18:03:53', '2023-08-19 01:36:14'),
(17, '18', NULL, NULL, '6', '6LF81715Y48982516', 'I-A585SKHSV6Y4', 1, 1, '{\"orderID\":\"6LF81715Y48982516\",\"subscriptionID\":\"I-A585SKHSV6Y4\",\"facilitatorAccessToken\":\"A21AALJDn0johYevspYmfmg40zLnTjxRNED8ob4Q-JNQexrsv_PwpRxBUDlDDRae9SczzhjT2ETWh-i7K_wjyGOg6aqNWqkng\",\"paymentSource\":\"credit\"}', '0', '0', '2023-08-25 08:38:46', '2024-08-05 09:21:36', '2023-08-25 17:38:46', '2024-08-06 16:22:46'),
(18, '19', 'Free Sign up', NULL, '7', NULL, NULL, 1, 0, NULL, NULL, NULL, '2023-08-29 11:48:02', '2024-08-28 11:48:02', '2023-08-29 20:48:02', '2023-08-29 20:48:02'),
(19, '18', NULL, NULL, '2', '9YR320930J678032N', 'I-86MYWAS5XUEB', 1, 0, '{\"orderID\":\"9YR320930J678032N\",\"subscriptionID\":\"I-86MYWAS5XUEB\",\"facilitatorAccessToken\":\"A21AALcZv2jsaccczxMXUX9H6IHurzj-EASzgaqEc0iV9_yYnLsQDfsZCiN1zo-DoZLCNIbTSuCLE8qnKXPESMEZmzM7RCvyQ\",\"paymentSource\":\"paypal\"}', '10', NULL, '2024-08-06 10:10:27', '2024-09-05 10:10:27', '2024-08-06 17:10:27', '2024-08-06 17:35:08'),
(20, '18', NULL, NULL, '1', '7PU93932MM552815E', 'I-SGCK9855G84F', 1, 0, '{\"orderID\":\"7PU93932MM552815E\",\"subscriptionID\":\"I-SGCK9855G84F\",\"facilitatorAccessToken\":\"A21AALcZv2jsaccczxMXUX9H6IHurzj-EASzgaqEc0iV9_yYnLsQDfsZCiN1zo-DoZLCNIbTSuCLE8qnKXPESMEZmzM7RCvyQ\",\"paymentSource\":\"paypal\"}', '1', NULL, '2024-08-06 10:45:50', '2024-09-05 10:45:50', '2024-08-06 17:35:09', '2024-08-06 18:34:51'),
(21, '22', NULL, NULL, '5', '7SW911686B034804X', 'I-7M0MXH92VEL3', 0, 0, '{\"orderID\":\"7SW911686B034804X\",\"subscriptionID\":\"I-7M0MXH92VEL3\",\"facilitatorAccessToken\":\"A21AAI56Vwkpc8LLV5j0sk-LRdqsPK11NnkPlyCN2Juq_Tj3M2r0Z60JlyITEV6F_qz6fWr-Q2YQEZN-1r3KndpR5dtMjePSg\",\"paymentSource\":\"paypal\"}', '120', NULL, '2024-08-06 11:19:00', '2025-08-05 11:19:00', '2024-08-06 18:19:00', '2024-08-06 18:19:00'),
(22, '23', NULL, NULL, '5', '83860713JU459983X', 'I-VRCAXHAY747A', 0, 0, '{\"orderID\":\"83860713JU459983X\",\"subscriptionID\":\"I-VRCAXHAY747A\",\"facilitatorAccessToken\":\"A21AAIYfc1guxQomLXawFAk9fip5wagWPjMN69WVHK5fzC-KS-om3kUL1SI4-joe_ruTlXaWObh6pv5oJygwAKIJhBQ1i5rSw\",\"paymentSource\":\"paypal\"}', '120', NULL, '2024-08-06 11:28:42', '2025-08-05 11:28:42', '2024-08-06 18:28:42', '2024-08-06 18:28:42'),
(23, '24', 'Free Sign up', NULL, '7', NULL, NULL, 1, 0, NULL, NULL, NULL, '2024-08-06 11:29:25', '2025-08-05 11:29:25', '2024-08-06 18:29:25', '2024-08-06 18:29:25'),
(24, '25', NULL, NULL, '5', '12M66199XP365525P', 'I-YFGGHBBLM4SD', 0, 0, '{\"orderID\":\"12M66199XP365525P\",\"subscriptionID\":\"I-YFGGHBBLM4SD\",\"facilitatorAccessToken\":\"A21AAIYfc1guxQomLXawFAk9fip5wagWPjMN69WVHK5fzC-KS-om3kUL1SI4-joe_ruTlXaWObh6pv5oJygwAKIJhBQ1i5rSw\",\"paymentSource\":\"paypal\"}', '120', NULL, '2024-08-06 11:30:21', '2025-08-05 11:30:21', '2024-08-06 18:30:21', '2024-08-06 18:30:21'),
(25, '26', NULL, NULL, '5', '2L5272732P806282F', 'I-THNLF46EED0V', 0, 0, '{\"orderID\":\"2L5272732P806282F\",\"subscriptionID\":\"I-THNLF46EED0V\",\"facilitatorAccessToken\":\"A21AAIYfc1guxQomLXawFAk9fip5wagWPjMN69WVHK5fzC-KS-om3kUL1SI4-joe_ruTlXaWObh6pv5oJygwAKIJhBQ1i5rSw\",\"paymentSource\":\"paypal\"}', '120', NULL, '2024-08-06 11:33:25', '2025-08-05 11:33:25', '2024-08-06 18:33:25', '2024-08-06 18:33:25'),
(26, '18', NULL, NULL, '1', '2WK76642EC909490F', 'I-7RLSGT6M898C', 1, 0, '{\"orderID\":\"2WK76642EC909490F\",\"subscriptionID\":\"I-7RLSGT6M898C\",\"facilitatorAccessToken\":\"A21AAIYfc1guxQomLXawFAk9fip5wagWPjMN69WVHK5fzC-KS-om3kUL1SI4-joe_ruTlXaWObh6pv5oJygwAKIJhBQ1i5rSw\",\"paymentSource\":\"paypal\"}', '1', '1', '2024-08-06 11:34:51', '2024-09-05 11:34:51', '2024-08-06 18:34:51', '2024-08-06 18:49:33'),
(27, '18', NULL, NULL, '2', '1XM5155641046463J', 'I-97RDUBJ7LJLV', 1, 0, '{\"orderID\":\"1XM5155641046463J\",\"subscriptionID\":\"I-97RDUBJ7LJLV\",\"facilitatorAccessToken\":\"A21AAIYfc1guxQomLXawFAk9fip5wagWPjMN69WVHK5fzC-KS-om3kUL1SI4-joe_ruTlXaWObh6pv5oJygwAKIJhBQ1i5rSw\",\"paymentSource\":\"paypal\"}', '10', '1', '2024-08-06 11:49:33', '2024-09-05 11:49:33', '2024-08-06 18:49:33', '2024-08-06 18:51:19'),
(28, '18', NULL, NULL, '5', '2DW79620SG905071Y', 'I-XGYMW8W79VPJ', 1, 0, '{\"orderID\":\"2DW79620SG905071Y\",\"subscriptionID\":\"I-XGYMW8W79VPJ\",\"facilitatorAccessToken\":\"A21AAIYfc1guxQomLXawFAk9fip5wagWPjMN69WVHK5fzC-KS-om3kUL1SI4-joe_ruTlXaWObh6pv5oJygwAKIJhBQ1i5rSw\",\"paymentSource\":\"paypal\"}', '120', '10', '2024-08-06 11:51:19', '2025-08-05 11:51:19', '2024-08-06 18:51:19', '2024-08-06 18:53:27'),
(29, '18', NULL, NULL, '2', '9LJ12335E27548625', 'I-DSXVDLE3NBJX', 1, 0, '{\"orderID\":\"9LJ12335E27548625\",\"subscriptionID\":\"I-DSXVDLE3NBJX\",\"facilitatorAccessToken\":\"A21AAIYfc1guxQomLXawFAk9fip5wagWPjMN69WVHK5fzC-KS-om3kUL1SI4-joe_ruTlXaWObh6pv5oJygwAKIJhBQ1i5rSw\",\"paymentSource\":\"paypal\"}', '10', '120', '2024-08-06 11:53:27', '2024-09-05 11:53:27', '2024-08-06 18:53:27', '2024-08-06 18:56:38'),
(30, '18', NULL, NULL, '5', '5UW45861J0863172H', 'I-1PJLK6CJCXK1', 1, 0, '{\"orderID\":\"5UW45861J0863172H\",\"subscriptionID\":\"I-1PJLK6CJCXK1\",\"facilitatorAccessToken\":\"A21AAIYfc1guxQomLXawFAk9fip5wagWPjMN69WVHK5fzC-KS-om3kUL1SI4-joe_ruTlXaWObh6pv5oJygwAKIJhBQ1i5rSw\",\"paymentSource\":\"paypal\"}', '120', '10', '2024-08-06 11:56:38', '2025-08-05 11:56:38', '2024-08-06 18:56:38', '2024-08-06 18:57:33'),
(31, '18', NULL, NULL, '2', '9SA491579E935293P', 'I-YXCNCY0D75KT', 1, 0, '{\"orderID\":\"9SA491579E935293P\",\"subscriptionID\":\"I-YXCNCY0D75KT\",\"facilitatorAccessToken\":\"A21AAIYfc1guxQomLXawFAk9fip5wagWPjMN69WVHK5fzC-KS-om3kUL1SI4-joe_ruTlXaWObh6pv5oJygwAKIJhBQ1i5rSw\",\"paymentSource\":\"paypal\"}', '10', '120', '2024-08-06 11:57:33', '2024-09-05 11:57:33', '2024-08-06 18:57:33', '2024-08-06 19:00:38'),
(32, '18', NULL, NULL, '2', '9TE8353841933334E', 'I-W3LVS4AHTUL0', 1, 0, '{\"orderID\":\"9TE8353841933334E\",\"subscriptionID\":\"I-W3LVS4AHTUL0\",\"facilitatorAccessToken\":\"A21AAJ1aBDfnXAhcnHp4EHZ9EDjgLCe3h2Z8yd6f0cVPjEmGbX6QiMnA_OKN4HzK8nwOqN_geRjJu83tifGQBk7j_058eqVwA\",\"paymentSource\":\"paypal\"}', '10', '10', '2024-08-06 12:00:38', '2024-09-05 12:00:38', '2024-08-06 19:00:38', '2024-08-06 19:03:19'),
(33, '18', NULL, NULL, '2', '77H88492VR057432R', 'I-TEGP6PB7SSGK', 1, 0, '{\"orderID\":\"77H88492VR057432R\",\"subscriptionID\":\"I-TEGP6PB7SSGK\",\"facilitatorAccessToken\":\"A21AAJ1aBDfnXAhcnHp4EHZ9EDjgLCe3h2Z8yd6f0cVPjEmGbX6QiMnA_OKN4HzK8nwOqN_geRjJu83tifGQBk7j_058eqVwA\",\"paymentSource\":\"paypal\"}', '10', '10', '2024-08-06 12:03:19', '2024-09-05 12:03:19', '2024-08-06 19:03:19', '2024-08-06 19:04:48'),
(34, '18', NULL, NULL, '1', '6NW88804DY927152M', 'I-U2WCK39JCFYV', 1, 2, '{\"orderID\":\"6NW88804DY927152M\",\"subscriptionID\":\"I-U2WCK39JCFYV\",\"facilitatorAccessToken\":\"A21AAJ1aBDfnXAhcnHp4EHZ9EDjgLCe3h2Z8yd6f0cVPjEmGbX6QiMnA_OKN4HzK8nwOqN_geRjJu83tifGQBk7j_058eqVwA\",\"paymentSource\":\"paypal\"}', '1', '0', '2024-08-06 12:18:29', '2024-09-05 12:18:29', '2024-08-06 19:04:49', '2024-08-06 19:22:08'),
(35, '18', NULL, NULL, '5', '19L3377253598004K', 'I-M1J31GEAF5FU', 1, 2, '{\"orderID\":\"19L3377253598004K\",\"subscriptionID\":\"I-M1J31GEAF5FU\",\"facilitatorAccessToken\":\"A21AAJ1aBDfnXAhcnHp4EHZ9EDjgLCe3h2Z8yd6f0cVPjEmGbX6QiMnA_OKN4HzK8nwOqN_geRjJu83tifGQBk7j_058eqVwA\",\"paymentSource\":\"paypal\"}', '120', '10', '2024-08-06 12:07:48', '2025-08-05 12:07:48', '2024-08-06 19:07:48', '2024-08-06 19:18:29'),
(36, '18', NULL, NULL, '2', '5MJ292643S968421F', 'I-1VM47MTDD8J8', 1, 2, '{\"orderID\":\"5MJ292643S968421F\",\"subscriptionID\":\"I-1VM47MTDD8J8\",\"facilitatorAccessToken\":\"A21AAJ1aBDfnXAhcnHp4EHZ9EDjgLCe3h2Z8yd6f0cVPjEmGbX6QiMnA_OKN4HzK8nwOqN_geRjJu83tifGQBk7j_058eqVwA\",\"paymentSource\":\"paypal\"}', '10', '0', '2024-08-06 12:22:09', '2024-09-05 12:22:09', '2024-08-06 19:22:09', '2024-08-06 19:26:45'),
(37, '18', NULL, NULL, '4', '3V915831TY789014C', 'I-91S8TG2BRPRH', 0, 0, '{\"orderID\":\"3V915831TY789014C\",\"subscriptionID\":\"I-91S8TG2BRPRH\",\"facilitatorAccessToken\":\"A21AAJ1aBDfnXAhcnHp4EHZ9EDjgLCe3h2Z8yd6f0cVPjEmGbX6QiMnA_OKN4HzK8nwOqN_geRjJu83tifGQBk7j_058eqVwA\",\"paymentSource\":\"paypal\"}', '12', '0', '2024-08-06 12:26:46', '2025-08-05 12:26:46', '2024-08-06 19:26:46', '2024-08-06 19:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 1, '2022-11-02 11:55:44', '2022-11-08 14:44:23'),
(2, 'About us', 0, '2022-11-02 11:55:52', '2022-11-02 11:55:52'),
(3, 'Contact Us', 0, '2022-11-02 11:56:04', '2022-11-02 11:56:04'),
(4, 'Gallery', 0, '2022-11-02 11:56:30', '2022-11-02 11:56:30'),
(5, 'Privacy Policy', 0, '2022-11-02 11:56:42', '2022-11-02 11:56:42'),
(6, 'Terms & Conditions', 0, '2022-11-02 11:57:19', '2022-11-02 11:57:19'),
(7, 'Sign up', 0, '2022-11-02 11:57:39', '2022-11-05 13:34:50'),
(8, 'Sign in', 0, '2022-11-02 11:57:48', '2022-11-05 10:49:17'),
(9, 'Testimonials', 0, '2022-11-02 11:59:38', '2022-11-02 11:59:38'),
(10, 'Faq', 0, '2022-11-02 11:59:48', '2022-11-02 11:59:48'),
(11, 'Portfolio', 0, '2022-11-02 12:00:58', '2022-11-03 14:03:31'),
(12, 'Category', 0, '2022-11-11 10:39:53', '2022-11-11 10:39:53'),
(13, 'Shop', 0, '2022-11-11 10:40:29', '2022-11-11 10:40:29'),
(14, 'Search Our Databse', 1, '2023-02-24 20:00:18', '2023-02-24 20:00:18'),
(15, 'Review', 1, '2023-02-24 20:05:50', '2023-02-24 20:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` int NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `page_id`, `section_name`, `title`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'About Section', 'Lorem ipsum is placeholder text', 'lorem-ipsum-is-placeholder-text', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available&nbsp;</p>', '1667337496.png', '2022-11-02 15:18:16', '2022-11-04 16:46:25'),
(2, 2, 'Contact Us', 'Lorem ipsum is placeholder text commonly used in the graphic', 'lorem-ipsum-is-placeholder-text-commonly-used-in-the-graphic', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', '1667337580.png', '2022-11-02 15:19:40', '2022-11-02 15:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `parent_categories`
--

CREATE TABLE `parent_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_categories`
--

INSERT INTO `parent_categories` (`id`, `parent_category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home Appliances', 'home-appliances', 1, '2022-11-03 10:11:20', '2022-11-16 09:03:30'),
(3, 'Computers', 'computers', 1, '2022-11-03 10:12:15', '2022-11-16 14:50:40'),
(4, 'Furniture', 'furniture', 0, '2022-11-03 10:12:27', '2022-11-16 15:31:21'),
(5, 'New Cat', 'new-cat', 0, '2022-11-03 13:35:29', '2022-11-16 15:08:59'),
(6, 'Mobile Phones', 'mobile-phones', 1, '2022-11-10 13:18:44', '2022-11-10 13:18:49'),
(7, 'TV & Home Appliances', 'tv-home-appliances', 1, '2022-11-16 15:10:43', '2022-11-16 15:10:43'),
(8, 'Electronics Accessories', 'electronics-accessories', 1, '2022-11-25 10:48:24', '2022-11-25 10:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aq.developer007@gmail.co', 'zQkg3ZKDAD8MvTio7ESYI753r1ZV16uWqmzZ8z3Dk1v84HKY47YnwXZeTmzV6uOK', '2023-03-03 14:44:01'),
('djoy624710@gmail.com', '3ftXayrC0X3yOW5aF9qNeuuHC04h3FhW8qpr0aXkvykREAzY6ur6SToI0a5Sv3yr', '2023-03-03 14:44:18'),
('admin@nextclient.com', 'S9Efcmq92seELPMyHXwgQ8xTPDnqEeTpPlKzeKnGiIBf6vPqYWD46IiYIT7UxAPR', '2023-03-09 22:26:45'),
('admin@nextclient.com', 'LsWGArlGaV1pjn9eYrQ3eQk8bfm2pIrgodDCHFqAK3TBILl6Jp0hLYHMj7VD2a6G', '2023-03-09 22:26:52'),
('djoy62471@nextclient.com', 'PxHHliqyhhAV7nF58w2mMixIhHKEaeziaHXLAywcRx6vOdooA5z4hsGue7XFOEJy', '2023-03-09 22:27:01'),
('djoy62471@gamil.com', 'eu19bd04JMfw60sVSTeXpVI9i1jf5JX7o3fyTSO927i4Gz0X8vnHcU7nPA8HLcT6', '2023-03-09 22:27:29'),
('admin@nextclient.com', 'Rq8ZlzTWTHOWj4Rkr0DTaeqU9WM9HCPqUtXiEr3b0UNm9nutdnHkaPJRLQbkwlCb', '2023-03-10 14:09:17'),
('admin@nextclient.com', 'OfUrNdE73ie8sIpgEeFHD2E7IJTlSw2IvF8GlzlJnusFyy0fdFNHXv8RSpoDWlz6', '2023-03-10 17:49:30'),
('admin@nextclient.com', 'IRci5Z18mQWJuTPnU7EaRPuhQhIY1uVr5RLzxQYRmDQXYYl3EfjbxmRcbSw7pdgv', '2023-03-10 17:49:38'),
('admin@nextclient.com', 'jhycTeIwX3SSoElyLN01MjHNxT1ZbhNI63KVofBOaCcoNCSKChhuy1boRJNg0bD7', '2023-03-10 19:03:20'),
('admin@nextclient.com', 'wXd01g3w2dYgc88HWA6q1mwADaRJFVltfYm5dCm9Oun0mnvbsAeGcNnuhyZhzt5a', '2023-03-11 16:19:58'),
('rixarisixu@mailinator.com', '5z9YFVfMnAkoIaRLrqwdYWRZ6vLNSbtGLV4HfzrRvQ3Ou72aSKH9Zv1bFfHvCZlf', '2023-03-14 16:55:05'),
('rixarisixu@mailinator.com', 'VW8J86L8UkrpFalbI3EsuxmOoLWyV7O1fUXaaBautFReEPp9VYhpXfjkp3HKusXA', '2023-03-14 16:55:13'),
('rixarisixu@mailinator.c', 'uFTJbMb3cgsX1k1YqiDzTND9dd0N0cauuyb2VZXjD6rMfak5lxiz1ODcyo2Zhe4A', '2023-03-14 16:55:19'),
('admin@nextclient.com', 'HLALZeYANhaMr7GClD6655Bq1c14YsnZs4PdkSWHsDSCvaN861FnIXDAB1oK3rfg', '2023-03-14 21:46:23'),
('admin@adminpanel.com', 'vulFKwKVSwkhYUY0D9SK7zyImVSwpBKWbWcOy1N58EXjFVD65uxE0Jjy6abgQj5p', '2023-03-14 22:42:25'),
('aq.developer007@gmail.com', 'CM5O31e1jrSFvTu8uppfLrKN1gzX4LO6FZZRdEJdGI5vxSMLWGssFgcdM1nV1a2c', '2023-03-15 21:39:48'),
('aq.developer007@gmail.com', '17xt0P6BMwEyrZCgIoIiTV80bkk9y5DfRzhlfpHWDA8ahOD7CjQOUYOPpEVwzjti', '2023-03-16 14:18:13'),
('aq.developer007@gmail.com', 'GRQWyfSHC0WbAVXrRLwQPdMwCBYQO1nIF97kEmJVvXCOD5drwx4NaL7Cwxvn7f7M', '2023-03-16 14:18:15'),
('zamu@mailinator.com', '45mUV6i8hvzZHIUdpV9yieJhSgwM5Odu3pIzJIhmQKr3AzAIehylvii8TBbOmfHh', '2023-03-17 14:20:20'),
('djoy624711@gmail.com', 'lgP04xApAzMHD6ATCIRyZY2341nmYowsFyAALemVTgA71HnfrwrKI1AKRP1U99GR', '2023-03-17 14:20:36'),
('djoy6247@gmail.com', 'fQSatfn6K4Qt6EQt74z9MgxYQBg5mjDAdjELuf57SyfwWe53KqtYfEzlo18Bwceg', '2023-03-17 14:20:44'),
('admin@nextclient.com', 'mZKFIy5NSvrqsPwm9DNnElAwlZbLVyThAZw7gvhDJv32fewAxdGBWNhlYF05IqYW', '2023-03-21 14:12:11'),
('dominicxavier143@gmail.com', 'UzlzjegZcCpyXZjvf4kYUrIhkdPaZVeF4PdE6YarVBLzZz6lM6OzN7wLXTelcZPx', '2023-04-11 06:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint UNSIGNED NOT NULL,
  `type` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `type`, `image`, `image_thumbnail`, `video`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, '1667319869.png', '1667318978.jpg', '1667319546.jpg', 1, '2022-11-02 10:09:38', '2022-11-04 14:50:20'),
(6, 1, '1667576142.jpg', '1667582735.jpg', '1667502769.mp4', 1, '2022-11-04 13:12:49', '2022-11-05 11:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'How It Works', NULL, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p><p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis&nbsp;</p>', '2022-11-02 14:28:44', '2023-02-24 18:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `profile_updates`
--

CREATE TABLE `profile_updates` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_status` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_id` int DEFAULT NULL,
  `business_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_license` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_license_copy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_updates`
--

INSERT INTO `profile_updates` (`id`, `user_id`, `first_name`, `last_name`, `slug`, `profile_status`, `name`, `email`, `date_of_birth`, `contact`, `address`, `postal_code`, `industry_id`, `business_name`, `business_license`, `business_information`, `business_license_copy`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 3, 'Mona', 'Pickett', 'mona-pickett', 1, 'Mona Pickett', 'iamjamesalbertt@gmail.com', '2019-01-31', '(166) 516-6139', 'wogy@mailinator.com', '100', 21, NULL, 'fuqavy@mailinator.com', 'Ut ut quia autem ven', NULL, NULL, '2023-04-19 04:29:03', '2023-06-19 22:20:39'),
(15, 17, 'New', 'Chota', 'new-chota', 1, 'New Chota', 'chota@mailinator.com', '1986-02-15', '(141) 127-4202', 'qivunavit@mailinator.com', '16', 21, NULL, 'resa@mailinator.com', 'Rem quos corrupti d', '1692980793.jpg', '1693417049.jpg', '2023-08-17 15:35:55', '2023-08-31 02:44:54'),
(16, 16, 'test', 'user', 'test-user', 1, 'test user', 'freeuser@mailinator.com', NULL, '(021) 321-3312', 'UK', '42123', 23, NULL, 'Ea reprehenderit ali', 'Quas similique deser', '1692992172.jpg', '1693491530.jpg', '2023-08-18 15:23:40', '2023-08-31 23:19:12'),
(17, 18, 'emma', 'nizamani', 'emma-nizamani', 0, 'emma nizamani', 'emma@conceptionmasters.com', NULL, NULL, NULL, NULL, 11, NULL, '12345678', 'Test', NULL, NULL, '2023-08-25 17:41:27', '2023-09-15 23:24:25'),
(18, 19, 'Mariko', 'Stephenson', 'mariko-stephenson', 1, 'Mariko Stephenson', 'sekeheleju@mailinator.com', NULL, NULL, NULL, NULL, 8, NULL, '222211', 'Maxime cum est eius', 'how-to-make-your-own-id-picture.jpg', NULL, '2023-08-30 20:56:17', '2023-08-30 20:57:00'),
(19, 9, 'Veda', 'Farmer', 'veda-farmer', 0, 'Veda Farmer', 'Veda@mailinator.com', NULL, NULL, NULL, NULL, 21, NULL, 'Natus est provident', 'Elit veniam et lab', 'Nationalist Great Replacement Theory.jpg', NULL, '2023-09-15 23:14:35', '2023-09-15 23:14:35'),
(20, 20, 'Ima', 'Nelson', 'ima-nelson', 0, 'Ima Nelson', 'batokece@mailinator.com', NULL, NULL, NULL, NULL, 16, NULL, 'Accusamus sunt sint', 'Beatae labore ut vel', 'how-to-make-your-own-id-picture.jpg', NULL, '2023-09-15 23:14:50', '2023-09-15 23:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `answer2` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `answer`, `status`, `created_at`, `updated_at`, `answer2`) VALUES
(1, 'First Name', 'First Name', 1, '2023-09-06 19:08:06', '2023-09-06 19:08:06', NULL),
(2, 'Last Name', 'Last Name', 1, '2023-09-06 19:08:13', '2023-09-13 19:37:18', NULL),
(3, 'Email', 'Email', 1, '2023-09-06 19:08:30', '2023-09-06 19:08:30', NULL),
(4, 'Contact No.', 'Contact No.', 1, '2023-09-06 19:08:57', '2023-09-06 19:08:57', NULL),
(5, 'Address', 'Address', 1, '2023-09-06 19:09:05', '2023-09-06 19:09:05', NULL),
(6, 'How would you rate this customer?', NULL, 1, '2023-09-06 19:10:19', '2023-09-15 16:44:02', NULL),
(7, 'Was the customer easy to work with?', 'Yes', 1, '2023-09-06 19:18:50', '2023-09-08 18:47:35', 'No'),
(8, 'Did the customer pay on time?', 'Yes', 1, '2023-09-06 19:19:00', '2023-09-08 18:49:16', 'No'),
(9, 'Would you recommend this customer to other businesses?', 'Yes', 1, '2023-09-06 19:19:15', '2023-09-13 18:59:22', 'No'),
(10, 'test-Description....', 'Description....', 1, '2023-09-06 19:19:34', '2023-09-13 20:56:18', 'No'),
(11, 'Accept Term & Condition', NULL, 1, '2023-09-06 20:35:27', '2023-09-06 20:35:27', NULL),
(12, 'How would you rate this customer?', 'Yes', 0, '2023-09-08 15:07:07', '2023-09-12 20:27:07', 'No'),
(13, 'How would you rate this customer?', 'Yes', 0, '2023-09-08 15:07:12', '2023-09-12 20:26:29', 'No'),
(14, 'Was the customer easy to work with?', 'Yes', 0, '2023-09-08 15:07:24', '2023-09-12 20:26:27', 'No'),
(15, 'Was the customer easy to work with?', 'Yes', 0, '2023-09-08 15:07:30', '2023-09-12 20:26:22', 'No'),
(16, 'Did the customer pay on time?', 'Yes', 0, '2023-09-08 15:07:43', '2023-09-12 20:26:19', 'No'),
(17, 'Did the customer pay on time?', 'Yes', 0, '2023-09-08 15:07:52', '2023-09-12 20:26:17', 'No'),
(18, 'Would you recommend this customer to other businesses second?', 'Yes', 0, '2023-09-08 15:08:00', '2023-09-15 16:54:21', 'No'),
(19, 'Would you recommend this customer to other businesses test?', 'Yes-test', 0, '2023-09-08 15:08:32', '2023-09-12 20:26:12', 'No'),
(20, 'Description....', 'Description....', 0, '2023-09-08 15:10:47', '2023-09-15 20:35:55', 'Description....'),
(21, 'test-Description....test', 'Description....', 0, '2023-09-08 15:11:00', '2023-09-18 19:30:43', 'Description....');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_with_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_pay_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_recommendation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_description` text COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_rating_2` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_rating_3` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_recommendation_2` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_recommendation_3` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_work_2` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_description_2` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_description_3` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_payment_time_2` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_payment_time_3` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_work_3` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_pay_time_2` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_pay_time_3` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ques_last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_customer_rating` text COLLATE utf8mb4_unicode_ci,
  `ques_customer_rating_2` text COLLATE utf8mb4_unicode_ci,
  `ques_customer_rating_3` text COLLATE utf8mb4_unicode_ci,
  `ques_customer_work_1` text COLLATE utf8mb4_unicode_ci,
  `ques_customer_work_2` text COLLATE utf8mb4_unicode_ci,
  `ques_customer_work_3` text COLLATE utf8mb4_unicode_ci,
  `ques_customer_pay_time_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_customer_pay_time_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_customer_pay_time_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_customer_recommendation_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_customer_recommendation_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_customer_recommendation_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_customer_description_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_customer_description_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_customer_description_3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ques_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uncheck_customer_work_1` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uncheck_customer_work_2` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uncheck_customer_work_3` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uncheck_customer_pay_time_1` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uncheck_customer_pay_time_2` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uncheck_customer_pay_time_3` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uncheck_customer_recommendation_1` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uncheck_customer_recommendation_2` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uncheck_customer_recommendation_3` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `user_name`, `name`, `first_name`, `last_name`, `email`, `contact`, `address`, `customer_rating`, `working_with_customer`, `customer_pay_time`, `customer_recommendation`, `customer_description`, `status`, `created_at`, `updated_at`, `customer_rating_2`, `customer_rating_3`, `customer_recommendation_2`, `customer_recommendation_3`, `customer_work_2`, `customer_description_2`, `customer_description_3`, `customer_payment_time_2`, `customer_payment_time_3`, `customer_work_3`, `customer_pay_time_2`, `customer_pay_time_3`, `ques_last_name`, `ques_customer_rating`, `ques_customer_rating_2`, `ques_customer_rating_3`, `ques_customer_work_1`, `ques_customer_work_2`, `ques_customer_work_3`, `ques_customer_pay_time_1`, `ques_customer_pay_time_2`, `ques_customer_pay_time_3`, `ques_customer_recommendation_1`, `ques_customer_recommendation_2`, `ques_customer_recommendation_3`, `ques_customer_description_1`, `ques_customer_description_2`, `ques_customer_description_3`, `ques_first_name`, `ques_email`, `ques_contact`, `ques_address`, `uncheck_customer_work_1`, `uncheck_customer_work_2`, `uncheck_customer_work_3`, `uncheck_customer_pay_time_1`, `uncheck_customer_pay_time_2`, `uncheck_customer_pay_time_3`, `uncheck_customer_recommendation_1`, `uncheck_customer_recommendation_2`, `uncheck_customer_recommendation_3`) VALUES
(66, '1', 'Admin', 'Damon Richardson', 'Damon', 'Richardson', 'vygofided@mailinator.com', '(156) 626-5713', 'Sit ut assumenda do', '4', 'Yes', 'No', 'Yes', 'Modi aut ut quidem e', 0, '2023-09-12 18:15:02', '2023-09-12 18:15:02', '4', '4', 'Yes', 'Yes-test', 'No', NULL, NULL, NULL, NULL, 'Yes', 'No', 'No', 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses test?', 'Description....', 'Description....', 'Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes-test'),
(67, '1', 'Admin', 'Ross Torres', 'Ross', 'Torres', 'homefune@mailinator.com', '(140) 164-1291', 'Repellendus Nisi es', '3', 'No', 'Yes', 'Yes', 'Eligendi tempor dese', 0, '2023-09-12 18:18:22', '2023-09-12 18:18:22', '4', '5', 'No', 'No', 'Yes', NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses test?', 'Description....', 'Description....', 'Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'Yes-test'),
(68, '1', 'Admin', 'Karen Madden', 'Karen', 'Madden', 'jetyj@mailinator.com', '(197) 393-2315', 'Nesciunt harum quia', '4', 'No', 'Yes', 'No', 'Et ex rerum necessit', 0, '2023-09-12 18:35:12', '2023-09-12 19:56:46', '3', '5', 'No', 'Yes-test', 'Yes', NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses test?', 'Description....', 'Description....', 'Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'No', 'No', 'No', 'No', 'No', 'Yes', 'Yes', 'No'),
(69, '1', 'Admin', 'Maryam Monroe', 'Maryam', 'Monroe', 'zixeriwod@mailinator.com', '(159) 827-9872', 'Sit atque impedit a', '2', 'No', 'Yes', 'Yes', 'Elit quis quisquam', 0, '2023-09-12 19:12:34', '2023-09-12 19:50:32', '3', '4', 'Yes', 'No', 'Yes', NULL, NULL, NULL, NULL, 'No', 'No', 'Yes', 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses test?', 'Description....', 'Description....', 'Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes', 'No', 'Yes-test'),
(70, '1', 'Admin', 'dsd dsd', 'dsd', 'dsd', 'testvendor@email.com', '(123) 213-2132', 'dsdd', '4', 'Yes', 'Yes', 'Yes', 'dsd', 0, '2023-09-12 19:13:14', '2023-09-12 19:41:56', NULL, NULL, 'Yes', 'Yes-test', 'Yes', NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses test?', 'Description....', 'Description....', 'Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(71, '1', 'Admin', 'sa sas', 'sa', 'sas', 'subiloten@mailinator.com', '(231) 321-3213', 'Impedit vero sunt s', '3', 'Yes', 'Yes', 'Yes', 'dsd', 1, '2023-09-12 19:58:13', '2023-09-12 20:46:05', '2', '4', 'Yes', 'Yes-test', 'Yes', NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses test?', 'Description....', 'Description....', 'Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(72, '1', 'Admin', 'Odette Crosby', 'Odette', 'Crosby', 'jaqehegu@mailinator.com', '(198) 381-9899', 'Et ullamco voluptate', '2', 'No', 'Yes', 'No', 'Reprehenderit veniam', 1, '2023-09-12 20:45:58', '2023-09-12 20:45:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses test?', 'Description....', 'Description....', 'Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test'),
(73, '1', 'Admin', 'test Cortez', 'test', 'Cortez', 'koleman@mailinator.com', '(180) 891-5768', 'Qui velit labore occ', '3', 'No', 'No', 'Yes', 'Similique voluptatem', 0, '2023-09-13 20:46:19', '2023-09-13 20:46:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'Description....', 'Description....', 'Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes-test'),
(74, '1', 'Admin', 'Jena Trujillo', 'Jena', 'Trujillo', 'zywasokyzu@mailinator.com', '(152) 868-9256', 'Dolor lorem autem ea', '3', 'No', 'Yes', 'No', 'Aut consequat Labor', 0, '2023-09-13 23:02:04', '2023-09-13 23:02:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test'),
(75, '1', 'Admin', 'test Marquez', 'test', 'Marquez', 'wutis@mailinator.com', '(163) 531-9491', 'Aut irure ut ullam c', '3', 'No', 'Yes', 'No', 'Aut sunt tempor magn', 0, '2023-09-13 23:09:16', '2023-09-13 23:09:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test'),
(76, '1', 'Admin', 'new test test', 'new test', 'test', 'test@email.com', '(143) 648-3601', 'test', '5', 'Yes', 'Yes', 'No', 'test', 1, '2023-09-13 23:51:52', '2023-09-13 23:51:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test'),
(77, '18', 'emma nizamani', 'Alden Byers', 'Alden', 'Byers', 'jicix@mailinator.com', '(139) 650-2378', 'In dolore doloribus', '3', 'No', 'No', 'Yes', 'Debitis dolor veniam', 1, '2023-09-15 16:52:53', '2023-09-15 16:53:04', NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes-test'),
(78, '18', 'emma nizamani', 'Phyllis Frank', 'Phyllis', 'Frank', 'xakekul@mailinator.com', '(136) 922-4257', 'Quis quae optio tem', '5', 'Yes', 'Yes', 'No', 'Nihil amet perspici', 1, '2023-09-15 16:55:04', '2023-09-15 16:55:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test'),
(79, '18', 'emma nizamani', 'Edan Scott', 'Edan', 'Scott', 'fytyxuxinu@mailinator.com', '(170) 487-7646', 'Quas veniam non mag', '5', 'No', 'Yes', NULL, 'Omnis earum tempor d', 1, '2023-09-15 16:56:43', '2023-09-15 20:42:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test'),
(80, '18', 'emma nizamani', 'Brenna Hess', 'Brenna', 'Hess', 'jykepek@mailinator.com', '(174) 399-9583', 'Ratione vero cupidat', '4', 'Yes', 'Yes', 'Yes', 'Mollit qui quidem nu', 1, '2023-09-15 17:02:11', '2023-09-18 18:48:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes-test'),
(81, '1', 'Admin', 'test Rasmussen', 'test', 'Rasmussen', 'fyfuzyco@mailinator.com', '(131) 876-7728', 'Et irure quia dolore', '4', 'No', 'No', 'No', 'Omnis aute vero offi', 0, '2023-09-15 18:10:00', '2023-09-15 18:10:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test'),
(82, '1', 'Admin', 'Eleanor Thomas', 'Eleanor', 'Thomas', 'zepeh@mailinator.com', '(144) 788-5729', 'Voluptatem Reprehen', '5', 'Yes', 'Yes', 'No', 'test', 0, '2023-09-15 19:00:10', '2023-09-15 19:00:10', NULL, NULL, NULL, NULL, NULL, NULL, 'dsd', NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test'),
(83, '1', 'Admin', 'Kamal Haney', 'Kamal', 'Haney', 'pekezoh@mailinator.com', '(121) 391-3259', 'Eos impedit minima', '5', 'Yes', 'Yes', 'No', 'ds', 1, '2023-09-15 19:03:05', '2023-09-15 19:03:05', NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test'),
(84, '1', 'Admin', 'new-test Levine', 'new-test', 'Levine', 'mujuga@mailinator.com', '(144) 236-5643', 'Et quia sint velit n', '4', 'Yes', 'Yes', 'Yes', 'new-testds', 1, '2023-09-15 19:03:53', '2023-09-15 19:03:53', NULL, NULL, NULL, NULL, NULL, 'ds2', 'ds3', NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'No', 'Yes', 'Yes-test'),
(85, '18', 'emma nizamani', 'Kyla Abbott', 'Kyla', 'Abbott', 'vojudalar@mailinator.com', '(180) 255-9796', 'Fugiat possimus sae', '3', 'Yes', 'No', 'Yes', 'Corporis culpa quia', 1, '2023-09-18 19:14:03', '2023-09-18 19:14:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes-test'),
(86, '18', 'emma nizamani', 'test Pruitt', 'test', 'Pruitt', 'bobu@mailinator.com', '(178) 327-7288', 'Hic repellendus Fug', '5', 'No', 'Yes', NULL, NULL, 1, '2023-09-18 19:30:05', '2023-09-18 19:41:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Last Name', 'How would you rate this customer?', 'How would you rate this customer?', 'How would you rate this customer?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Was the customer easy to work with?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Did the customer pay on time?', 'Would you recommend this customer to other businesses?', 'Would you recommend this customer to other businesses second?', 'Would you recommend this customer to other businesses test?', 'test-Description....', 'Description....', 'test-Description....test', 'First Name', 'Email', 'Contact No.', 'Address', 'Yes', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes-test');

-- --------------------------------------------------------

--
-- Table structure for table `search_histories`
--

CREATE TABLE `search_histories` (
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_histories`
--

INSERT INTO `search_histories` (`user_id`, `review_id`, `created_at`, `updated_at`, `id`) VALUES
('5', '1', '2023-07-12 15:15:17', '2023-07-12 15:15:17', 1),
('6', '1', '2023-07-12 15:19:25', '2023-07-12 15:19:25', 2),
('6', '1', '2023-07-12 15:19:52', '2023-07-12 15:19:52', 3),
('6', '2', '2023-07-12 15:21:55', '2023-07-12 15:21:55', 4),
('6', '2', '2023-07-12 15:21:58', '2023-07-12 15:21:58', 5),
('6', '3', '2023-07-12 16:02:36', '2023-07-12 16:02:36', 6),
('6', '4', '2023-07-12 16:25:34', '2023-07-12 16:25:34', 7),
('7', '5', '2023-07-20 20:53:43', '2023-07-20 20:53:43', 8),
('7', '5', '2023-07-20 20:57:57', '2023-07-20 20:57:57', 9),
('7', '5', '2023-07-20 20:58:38', '2023-07-20 20:58:38', 10),
('7', '5', '2023-07-20 20:58:56', '2023-07-20 20:58:56', 11),
('7', '5', '2023-07-20 20:59:22', '2023-07-20 20:59:22', 12),
('7', '5', '2023-07-20 20:59:49', '2023-07-20 20:59:49', 13),
('7', '8', '2023-07-20 21:17:17', '2023-07-20 21:17:17', 14),
('6', '13', '2023-07-21 19:29:21', '2023-07-21 19:29:21', 15),
('6', '14', '2023-07-21 19:30:46', '2023-07-21 19:30:46', 16),
('8', '15', '2023-07-21 22:49:48', '2023-07-21 22:49:48', 17),
('8', '16', '2023-07-24 18:47:27', '2023-07-24 18:47:27', 18),
('8', '16', '2023-07-24 18:55:17', '2023-07-24 18:55:17', 19),
('8', '14', '2023-07-24 19:04:33', '2023-07-24 19:04:33', 20),
('8', '16', '2023-07-24 19:47:44', '2023-07-24 19:47:44', 21),
('8', '16', '2023-07-24 20:04:10', '2023-07-24 20:04:10', 22),
('8', '16', '2023-07-24 20:15:30', '2023-07-24 20:15:30', 23),
('9', '16', '2023-07-24 20:42:17', '2023-07-24 20:42:17', 24),
('9', '18', '2023-07-24 20:45:54', '2023-07-24 20:45:54', 25),
('9', '18', '2023-07-24 21:00:30', '2023-07-24 21:00:30', 26),
('9', '18', '2023-07-24 21:07:26', '2023-07-24 21:07:26', 27),
('9', '17', '2023-07-24 21:18:23', '2023-07-24 21:18:23', 28),
('9', '17', '2023-07-24 21:19:07', '2023-07-24 21:19:07', 29),
('10', '19', '2023-07-25 15:52:30', '2023-07-25 15:52:30', 30),
('10', '19', '2023-07-25 16:17:18', '2023-07-25 16:17:18', 31),
('10', '19', '2023-07-25 16:28:17', '2023-07-25 16:28:17', 32),
('10', '16', '2023-07-25 16:34:54', '2023-07-25 16:34:54', 33),
('10', '2', '2023-08-08 17:10:22', '2023-08-08 17:10:22', 34),
('10', '10', '2023-08-08 17:10:33', '2023-08-08 17:10:33', 35),
('10', '#', '2023-08-08 17:11:17', '2023-08-08 17:11:17', 36),
('10', '#', '2023-08-08 17:11:23', '2023-08-08 17:11:23', 37),
('10', '10', '2023-08-08 17:11:26', '2023-08-08 17:11:26', 38),
('10', '10', '2023-08-08 18:34:23', '2023-08-08 18:34:23', 39),
('10', '10', '2023-08-08 18:34:34', '2023-08-08 18:34:34', 40),
('10', '#', '2023-08-08 18:34:55', '2023-08-08 18:34:55', 41),
('10', '10', '2023-08-08 18:34:59', '2023-08-08 18:34:59', 42),
('9', '18', '2023-08-09 17:27:42', '2023-08-09 17:27:42', 43),
('9', '19', '2023-08-09 18:43:12', '2023-08-09 18:43:12', 44),
('9', '19', '2023-08-09 18:45:21', '2023-08-09 18:45:21', 45),
('9', '19', '2023-08-09 19:04:00', '2023-08-09 19:04:00', 46),
('9', '18', '2023-08-09 19:44:36', '2023-08-09 19:44:36', 47),
('9', '19', '2023-08-09 20:00:46', '2023-08-09 20:00:46', 48),
('9', '16', '2023-08-10 14:53:44', '2023-08-10 14:53:44', 49),
('9', '17', '2023-08-10 14:56:29', '2023-08-10 14:56:29', 50),
('9', '13', '2023-08-10 14:58:25', '2023-08-10 14:58:25', 51),
('14', '19', '2023-08-15 16:13:48', '2023-08-15 16:13:48', 52),
('14', '19', '2023-08-15 16:14:58', '2023-08-15 16:14:58', 53),
('14', '19', '2023-08-15 16:16:06', '2023-08-15 16:16:06', 54),
('15', '19', '2023-08-15 16:36:04', '2023-08-15 16:36:04', 55),
('15', '18', '2023-08-15 17:03:07', '2023-08-15 17:03:07', 56),
('16', '19', '2023-08-17 18:07:04', '2023-08-17 18:07:04', 57),
('16', '20', '2023-08-17 19:41:53', '2023-08-17 19:41:53', 58),
('16', '20', '2023-08-17 19:42:57', '2023-08-17 19:42:57', 59),
('16', '16', '2023-08-17 19:51:40', '2023-08-17 19:51:40', 60),
('16', '16', '2023-08-17 19:51:50', '2023-08-17 19:51:50', 61),
('16', '16', '2023-08-17 19:52:45', '2023-08-17 19:52:45', 62),
('16', '16', '2023-08-17 19:53:23', '2023-08-17 19:53:23', 63),
('16', '13', '2023-08-18 17:03:40', '2023-08-18 17:03:40', 64),
('16', '11', '2023-08-19 01:36:14', '2023-08-19 01:36:14', 65),
('16', '11', '2023-08-19 01:36:24', '2023-08-19 01:36:24', 66),
('18', '19', '2023-08-25 17:55:53', '2023-08-25 17:55:53', 67),
('18', '6', '2023-08-25 17:57:11', '2023-08-25 17:57:11', 68),
('18', '18', '2023-08-25 17:57:15', '2023-08-25 17:57:15', 69),
('18', '19', '2023-08-25 21:52:48', '2023-08-25 21:52:48', 70),
('16', '19', '2023-08-26 01:49:49', '2023-08-26 01:49:49', 71),
('16', '19', '2023-08-26 02:28:44', '2023-08-26 02:28:44', 72),
('18', '19', '2023-08-29 18:07:17', '2023-08-29 18:07:17', 73),
('18', '19', '2023-09-01 18:28:55', '2023-09-01 18:28:55', 74),
('18', '80', '2023-09-18 20:04:17', '2023-09-18 20:04:17', 75),
('18', '80', '2023-09-18 20:11:48', '2023-09-18 20:11:48', 76),
('18', '80', '2023-09-18 20:11:54', '2023-09-18 20:11:54', 77),
('18', '80', '2023-09-18 20:12:11', '2023-09-18 20:12:11', 78),
('18', '84', '2023-09-18 20:12:16', '2023-09-18 20:12:16', 79),
('18', '84', '2023-09-18 20:14:42', '2023-09-18 20:14:42', 80),
('18', '86', '2023-09-18 20:14:43', '2023-09-18 20:14:43', 81),
('18', '76', '2023-09-18 20:14:46', '2023-09-18 20:14:46', 82),
('18', '84', '2023-09-18 20:14:48', '2023-09-18 20:14:48', 83),
('18', '86', '2023-09-18 20:14:54', '2023-09-18 20:14:54', 84),
('18', '84', '2023-09-18 20:27:03', '2023-09-18 20:27:03', 85),
('18', '84', '2023-09-18 20:27:07', '2023-09-18 20:27:07', 86),
('18', '86', '2023-09-18 20:27:08', '2023-09-18 20:27:08', 87),
('18', '84', '2023-09-18 20:27:11', '2023-09-18 20:27:11', 88),
('18', '76', '2023-09-18 20:27:12', '2023-09-18 20:27:12', 89),
('18', '86', '2023-09-18 20:27:18', '2023-09-18 20:27:18', 90),
('18', '84', '2023-09-18 20:27:33', '2023-09-18 20:27:33', 91),
('18', '86', '2023-09-18 20:27:36', '2023-09-18 20:27:36', 92),
('18', '78', '2023-09-18 21:37:49', '2023-09-18 21:37:49', 93),
('18', '79', '2023-09-18 21:39:27', '2023-09-18 21:39:27', 94),
('18', '86', '2023-09-18 21:45:08', '2023-09-18 21:45:08', 95),
('18', '71', '2023-09-19 00:51:29', '2023-09-19 00:51:29', 96),
('18', '80', '2023-09-19 01:34:43', '2023-09-19 01:34:43', 97),
('18', '80', '2023-09-19 01:34:45', '2023-09-19 01:34:45', 98),
('18', '80', '2023-09-19 01:34:50', '2023-09-19 01:34:50', 99),
('18', '80', '2023-09-19 01:35:48', '2023-09-19 01:35:48', 100),
('18', '80', '2023-09-19 01:36:12', '2023-09-19 01:36:12', 101),
('18', '80', '2023-09-19 01:37:18', '2023-09-19 01:37:18', 102),
('18', '80', '2023-09-19 01:37:28', '2023-09-19 01:37:28', 103),
('18', '80', '2023-09-19 01:38:27', '2023-09-19 01:38:27', 104),
('18', '80', '2023-09-19 01:39:31', '2023-09-19 01:39:31', 105),
('18', '84', '2023-09-19 01:41:24', '2023-09-19 01:41:24', 106),
('18', '84', '2023-09-19 01:53:32', '2023-09-19 01:53:32', 107),
('18', '86', '2023-09-19 01:53:33', '2023-09-19 01:53:33', 108),
('18', '76', '2023-09-19 01:53:37', '2023-09-19 01:53:37', 109),
('18', '85', '2024-08-06 16:02:23', '2024-08-06 16:02:23', 110),
('18', '85', '2024-08-06 17:32:34', '2024-08-06 17:32:34', 111),
('18', '83', '2024-08-06 17:33:39', '2024-08-06 17:33:39', 112);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `created_at`, `updated_at`) VALUES
(1, 'Logo Design', '2022-11-01 16:36:04', '2022-11-01 16:36:04'),
(2, 'Animation', '2022-11-01 16:36:25', '2022-11-01 16:36:25'),
(3, 'Website Design and Development', '2022-11-01 16:36:37', '2022-11-01 16:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `instagram`, `youtube`, `linkedin`, `slug`, `created_at`, `updated_at`) VALUES
(5, 'http://facebook.com', 'https://twitter.com/', 'https://www.instagram.com/', NULL, 'http://linkedin.com', NULL, '2022-11-03 16:17:58', '2023-03-03 12:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'djoy62471@gmail.com', 1, '2022-11-12 13:37:01', '2022-11-12 13:37:01'),
(3, 'iamjamesalbertt@gmail.com', 1, '2022-11-15 09:46:28', '2022-11-15 09:46:28'),
(4, 'abdulqadeersolangi007@gmail.com', 1, '2022-11-17 16:48:37', '2022-11-17 16:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `parent_category_id`, `main_category_id`, `sub_category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, '5', '3', 'Sub Category 3', 'sub-category-3', 1, '2022-11-03 13:36:17', '2022-11-16 09:03:52'),
(6, '1', '13', 'Home Iron', 'home-iron', 1, '2022-11-11 13:25:16', '2022-11-11 13:25:16'),
(10, '6', '12', 'Xiomi Phones', 'xiomi-phones', 1, '2022-11-15 17:53:57', '2022-11-15 17:53:57'),
(12, '6', '12', 'Samsung Mobiles', 'samsung-mobiles', 1, '2022-11-15 17:55:06', '2022-11-15 17:55:06'),
(13, '6', '12', 'Vivo Mobiles', 'vivo-mobiles', 1, '2022-11-15 17:55:26', '2022-11-15 17:55:26'),
(14, '1', '13', 'All Small Appliances', 'all-small-appliances', 1, '2022-11-16 14:44:29', '2022-11-16 14:44:29'),
(15, '1', '13', 'Water Heater', 'water-heater', 1, '2022-11-16 14:44:55', '2022-11-16 14:44:55'),
(18, '1', '13', 'Sandwich Makers', 'sandwich-makers', 1, '2022-11-16 14:45:54', '2022-11-16 14:45:54'),
(19, '1', '13', 'Rice Cookers', 'rice-cookers', 1, '2022-11-16 14:46:17', '2022-11-16 14:46:17'),
(20, '1', '13', 'Stand Mixer', 'stand-mixer', 1, '2022-11-16 14:46:37', '2022-11-16 14:46:37'),
(21, '3', '10', 'Monitors', 'monitors', 1, '2022-11-16 14:53:31', '2022-11-16 14:53:31'),
(22, '3', '10', 'Laptops', 'laptops', 1, '2022-11-16 14:53:47', '2022-11-16 14:53:47'),
(24, '6', '12', 'Headphone and Headsets', 'headphone-and-headsets', 1, '2022-11-16 14:58:00', '2022-11-16 15:26:14'),
(25, '6', '12', 'Phone Cases', 'phone-cases', 1, '2022-11-16 14:58:46', '2022-11-16 14:58:46'),
(26, '6', '12', 'Power Banks', 'power-banks', 1, '2022-11-16 14:58:59', '2022-11-16 14:58:59'),
(27, '6', '12', 'Tecno Mobiles', 'tecno-mobiles', 1, '2022-11-16 14:59:33', '2022-11-16 14:59:33'),
(29, '6', '12', 'Oppo Mobiles', 'oppo-mobiles', 1, '2022-11-16 15:00:30', '2022-11-16 15:00:30'),
(30, '4', '17', 'Bedroom', 'bedroom', 1, '2022-11-16 15:07:36', '2022-11-16 15:07:36'),
(31, '4', '17', 'Home Office', 'home-office', 1, '2022-11-16 15:07:50', '2022-11-16 15:07:50'),
(32, '4', '17', 'Living Room', 'living-room', 1, '2022-11-16 15:07:58', '2022-11-16 15:07:58'),
(33, '4', '17', 'Kitchen Furniture', 'kitchen-furniture', 1, '2022-11-16 15:08:09', '2022-11-16 15:08:09'),
(34, '4', '17', 'Gaming Furniture', 'gaming-furniture', 1, '2022-11-16 15:08:31', '2022-11-16 15:08:31'),
(35, '7', '18', 'Air Conditioner', 'air-conditioner', 1, '2022-11-16 15:13:38', '2022-11-16 15:13:38'),
(36, '7', '18', 'Televesions', 'televesions', 1, '2022-11-16 15:13:58', '2022-11-16 15:13:58'),
(37, '7', '18', 'Washing Machine', 'washing-machine', 1, '2022-11-16 15:14:16', '2022-11-16 15:14:16'),
(38, '7', '18', 'Generator', 'generator', 1, '2022-11-16 15:14:37', '2022-11-16 15:14:37'),
(39, '7', '18', 'UPS', 'ups', 1, '2022-11-16 15:14:45', '2022-11-16 15:14:45'),
(40, '7', '18', 'Solar System', 'solar-system', 1, '2022-11-16 15:14:54', '2022-11-16 15:14:54'),
(41, '7', '18', 'TV Accessories', 'tv-accessories', 1, '2022-11-16 15:15:26', '2022-11-16 15:15:26'),
(42, '7', '18', 'Refrigerators & Freezers', 'refrigerators-freezers', 1, '2022-11-16 15:16:00', '2022-11-16 15:17:15'),
(43, '7', '18', 'Projectors', 'projectors', 1, '2022-11-16 15:16:33', '2022-11-16 15:16:33'),
(44, '3', '10', 'Graphics Card', 'graphics-card', 1, '2022-11-16 15:22:04', '2022-11-16 15:22:04'),
(45, '3', '10', 'Chargers', 'chargers', 1, '2022-11-16 15:22:26', '2022-11-16 15:22:26'),
(46, '3', '10', 'Keyboards', 'keyboards', 1, '2022-11-16 15:22:59', '2022-11-16 15:23:24'),
(47, '3', '10', 'Internal Storage', 'internal-storage', 1, '2022-11-16 15:24:07', '2022-11-16 15:24:07'),
(48, '3', '10', 'External Storage', 'external-storage', 1, '2022-11-16 15:24:17', '2022-11-16 15:24:17'),
(49, '3', '10', 'Gaming PC', 'gaming-pc', 1, '2022-11-16 15:25:24', '2022-11-16 15:25:24'),
(50, '1', '13', 'Pressure Cooker', 'pressure-cooker', 1, '2022-11-16 15:28:17', '2022-11-16 15:28:17'),
(51, '1', '13', 'Water Dispensers', 'water-dispensers', 1, '2022-11-16 15:28:59', '2022-11-16 15:28:59'),
(52, '8', '19', 'Smart Watches', 'smart-watches', 1, '2022-11-25 10:49:17', '2022-11-25 10:49:17'),
(53, '8', '19', 'Camera', 'camera', 1, '2022-11-25 10:49:33', '2022-11-25 10:49:33'),
(54, '8', '19', 'Headphone', 'headphone', 1, '2022-11-25 10:49:53', '2022-11-25 10:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'How It Works', NULL, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p><p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis</p>', '2022-11-02 14:27:49', '2023-03-14 21:36:22'),
(2, 'Term and Condition', NULL, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p><p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis</p>', '2023-08-18 15:40:56', '2023-08-18 15:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `short_description`, `long_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Freya Steele', '1666729111.jpg', 'Sapiente dicta sed q', '<p>wdqwerkebfkbfkbhg</p>', 0, '2022-10-26 14:18:31', '2022-11-05 10:47:55'),
(3, 'Boris Barry', '1666814435.jpg', 'testing testing', '<p>aefwerfwerfwsedqa</p>', 1, '2022-10-26 14:20:27', '2022-11-09 10:56:25'),
(4, 'Boris Barry', '1667423137.jpg', 'Officiis debitis eiu', '<p>aefwerfwerfwsedqa</p>', 0, '2022-10-26 14:20:34', '2022-11-05 10:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `package_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int DEFAULT '0',
  `profile_status` int DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_login` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` char(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_id` int DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_license` text COLLATE utf8mb4_unicode_ci,
  `business_information` text COLLATE utf8mb4_unicode_ci,
  `business_license_copy` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `package_id`, `name`, `email`, `first_name`, `last_name`, `user_name`, `role`, `type`, `profile_status`, `slug`, `social_login`, `contact`, `gender`, `address`, `postal_code`, `province`, `city`, `date_of_birth`, `industry_id`, `business_name`, `business_license`, `business_information`, `business_license_copy`, `status`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@nextclient.com', NULL, NULL, NULL, '1', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1, NULL, NULL, '$2y$10$31W7x2S/s1I3iA.H.O2M0OEnRuDVjn3z1.HcbXWD5/KLB4itpwmSq', NULL, '2022-11-02 14:18:37', '2022-11-02 14:18:37'),
(3, NULL, 'Ariana N Bird', 'iamjamesalbertt@gmail.com', 'Ariana N', 'Bird', NULL, '2', 1, 0, 'ariana-n-bird', NULL, '(178) 478-1270', NULL, 'gigequ@mailinator.com', '18', 'none', 'male', '2021-04-07', 7, NULL, 'rimotijesy@mailinator.com', 'Ullamco consequatur', '1681516985.jpg', 1, '1681495508.png', NULL, '$2y$10$k9cNt30eHZyskyFF89SgwONnQsRKAnlG5fk7efn.i8pWVI.aIK4N2', NULL, '2022-11-02 09:52:39', '2023-07-11 14:45:44'),
(4, NULL, 'David Joy', 'djoy62471@gmail.com', 'David', 'Joy', NULL, '2', 0, 0, 'david-joy', NULL, '(163) 631-1865', 'male', 'test address', '123456', 'none', 'none', '1999-01-06', 4, 'Aws', 'business license', 'business information', '1678385201.jpg', 1, '1677615826.webp', NULL, '$2y$10$bWQn5yAOKU731/SVeNoxd.2oi0D1L6Mzuvjnc3Gh9CtE1YCBUDVBS', NULL, '2022-11-12 10:55:58', '2023-04-18 10:08:13'),
(5, NULL, 'Paro Howe', 'paro@gmail.com', 'Velma', 'Howe', NULL, '2', 1, 0, 'velma-howe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, NULL, 'Tempor incididunt au', 'Quos et dolorem rem', '1689075621.jpg', 1, NULL, NULL, '$2y$10$E6FPeYUUGnBp22.pU8mzae6BGphvc6DQlHFh/4KKUWswl3GKqUDZG', NULL, '2023-07-11 15:40:30', '2023-07-11 15:41:57'),
(6, NULL, 'Brenna Haynes', 'Brenna@mailinator.com', 'Brenna', 'Haynes', NULL, '2', 0, 0, 'brenna-haynes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, NULL, 'Ad voluptatem nemo c', 'Architecto incidunt', 'Asset 1-100.jpg', 1, NULL, NULL, '$2y$10$M9jjZmuT5HtqKApWAIlmMObbOPdDMmmZJTD2EZPvsJkIBhPRKKSH.', NULL, '2023-07-12 15:17:38', '2023-07-12 15:18:31'),
(7, NULL, 'Charlotte Jimenez', 'charlotte@mailinator.com', 'Charlotte', 'Jimenez', NULL, '2', 1, 0, 'charlotte-jimenez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, 'Quis doloribus eius', 'Ipsum nostrud non c', 'tree-736885_1280 (1).jpg', 1, NULL, NULL, '$2y$10$u9tyLHvnxVs709gnE88Unuy43zE8NaOp3XqPujQ6NxA2c6STj.vzO', NULL, '2023-07-20 20:47:23', '2023-07-20 21:19:52'),
(8, NULL, 'upton Dorsey', 'upton@mailinator.com', 'upton', 'Dorsey', NULL, '2', 0, 0, 'upton-dorsey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, 'Aliqua Quis nulla o', 'Vero omnis earum con', 'Lubumbashi.jpg', 1, NULL, NULL, '$2y$10$u54s3aZ0R/JMbdLNZMHN..VSdviVQ7WRASq1bmGPMUf43eUqY5EGm', NULL, '2023-07-21 21:55:44', '2023-07-21 21:58:10'),
(9, NULL, 'Veda Farmer', 'Veda@mailinator.com', 'Veda', 'Farmer', NULL, '2', 0, 0, 'veda-farmer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, NULL, 'Natus est provident', 'Elit veniam et lab', 'Nationalist Great Replacement Theory.jpg', 1, NULL, NULL, '$2y$10$8/vF0aOfcXAArEENE0HJ4O48m1OgP0lWH0yCmTEe9K.zSOwt/sKGy', NULL, '2023-07-24 20:37:25', '2023-09-15 23:14:35'),
(10, NULL, 'Magee Tran', 'vybevosuca@mailinator.com', 'Magee', 'Tran', NULL, '2', 0, 0, 'magee-tran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, 'Laborum Qui est ver', 'Dolores pariatur Pe', 'HD-Facebook-Background-Free-Download.jpg', 1, NULL, NULL, '$2y$10$4TccaCY7s6Jkzdgj8n0cUu.pFzjPpwXTQOlDWzYzQ5x8d2Nd4pRU.', NULL, '2023-07-25 15:36:46', '2023-07-25 15:42:40'),
(14, NULL, 'Bruno Hodge', 'Bruno@mailinator.com', 'Bruno', 'Hodge', NULL, '2', 0, 0, 'bruno-hodge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, NULL, 'Est est sit repudia', 'Rerum excepturi quis', 'pic 350px.png', 1, NULL, NULL, '$2y$10$jm6b01L9lI0vompue9W5DORZt7nG7TEZj8H6rOvsVsSd2kDBaeMny', NULL, '2023-08-11 20:55:24', '2023-08-11 20:56:43'),
(15, NULL, 'Darryl Jones', 'gusozo@mailinator.com', 'Darryl', 'Jones', NULL, '2', 0, 0, 'darryl-jones', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '432878', 'Et inventore sunt re', 'New pic 350px.png', 1, NULL, NULL, '$2y$10$uBdKomBQgLi201JEfSVVsuFImCSn5rvGy.0H33lRQbq3.Noy7sZ16', NULL, '2023-08-11 20:57:37', '2023-08-25 17:35:13'),
(16, NULL, 'Jescie Prince', 'freeuser@mailinator.com', 'Jescie', 'Prince', NULL, '2', 0, 0, 'jescie-prince', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, NULL, 'Ea reprehenderit ali', 'Quas similique deser', 'pic 350px.png', 1, NULL, NULL, '$2y$10$lgNEbhewmPkf.VnJ3zhpX.ryWZxk4wn/LqdWeS9R20J9gghM3NICG', NULL, '2023-08-15 17:03:55', '2023-08-31 23:19:12'),
(17, NULL, 'Vivian Burgess', 'chota@mailinator.com', 'Vivian', 'Burgess', NULL, '2', 0, 0, 'vivian-burgess', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, 'sogasi@mailinator.com', 'lafaxyzyp@mailinator.com', 'pic 350px.png', 1, NULL, NULL, '$2y$10$8oviQlq5rdzfQo0HkwqC3OaOaP48wxe7MvV5uQR.RxBo1bqdvFabq', NULL, '2023-08-15 17:13:26', '2023-08-31 02:44:54'),
(18, NULL, 'emma nizamani', 'emma@conceptionmasters.com', 'emma', 'nizamani', NULL, '2', 1, 0, 'emma-nizamani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, '12345678', 'Test', '1692982608.png', 1, NULL, NULL, '$2y$10$JskuEvg44YL0zb23EX8TXu1WfKtDsEWdpJi8lrx.gOFOCJI0kwYrq', NULL, '2023-08-25 17:37:12', '2023-09-15 23:24:25'),
(19, NULL, 'Mariko Stephenson', 'sekeheleju@mailinator.com', 'Mariko', 'Stephenson', NULL, '2', 0, 0, 'mariko-stephenson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, '2222', 'Maxime cum est eius', 'how-to-make-your-own-id-picture.jpg', 1, NULL, NULL, '$2y$10$Fbw1Ek2EnTdng6VHv1C9WOvPeiu/5LE64pj4U5nUe7bImqcLP/R4a', NULL, '2023-08-29 20:48:02', '2023-08-30 20:57:00'),
(20, NULL, 'Ima Nelson', 'batokece@mailinator.com', 'Ima', 'Nelson', NULL, '2', 1, 0, 'ima-nelson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, 'Accusamus sunt sint', 'Beatae labore ut vel', 'how-to-make-your-own-id-picture.jpg', 1, NULL, NULL, '$2y$10$LZ5xYtQXBx0VQao5O392KeOl8e9JeecdA83nU6L9LctNxvX.vcEZu', NULL, '2023-09-01 21:35:42', '2023-09-15 23:14:50'),
(21, NULL, 'Linda Mack', 'vuxyxod@mailinator.com', 'Linda', 'Mack', NULL, '2', 0, 0, 'linda-mack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, 'Est consequatur rei', 'Et alias voluptatem', 'new.png', 0, NULL, NULL, '$2y$10$QwYTSE9VFE7zdXdJhEIz0uQ8QXysSsIkfbikChdPwniN/7cmu5vUy', NULL, '2024-08-06 18:16:58', '2024-08-06 18:16:58'),
(22, NULL, 'August Bell', 'devuhyr@mailinator.com', 'August', 'Bell', NULL, '2', 0, 0, 'august-bell', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, 'Consectetur vel erro', 'Qui voluptate enim m', 'new.png', 0, NULL, NULL, '$2y$10$ERavsY/Bf7ECIa9sIcoHXOAEAY1xnCkvTp/ChqG6NzoNoWA4ZhQBa', NULL, '2024-08-06 18:18:04', '2024-08-06 18:18:04'),
(23, NULL, 'Keelie Oneill', 'pukuqajyf@mailinator.com', 'Keelie', 'Oneill', NULL, '2', 0, 0, 'keelie-oneill', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, 'Voluptas dolore dolo', 'Quam temporibus dign', 'new.png', 0, NULL, NULL, '$2y$10$U1esfJbaKB6ShFcfA1j3POGyLN2GYLee56K8j7umaygS0JoT2Vi2m', NULL, '2024-08-06 18:28:11', '2024-08-06 18:28:11'),
(24, NULL, 'Keelie Oneill', 'pukuqajyf@mailinator.com', 'Keelie', 'Oneill', NULL, '2', 0, 0, 'keelie-oneill', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, 'Voluptas dolore dolo', 'Quam temporibus dign', 'new.png', 0, NULL, NULL, '$2y$10$PXbbOqtmKwgTihcMQRNY7.WSq8cbiW3RN1Tnlyjf9hrijA6LlhtAa', NULL, '2024-08-06 18:29:25', '2024-08-06 18:29:25'),
(25, NULL, 'Caldwell Phelps', 'quren@mailinator.com', 'Caldwell', 'Phelps', NULL, '2', 0, 0, 'caldwell-phelps', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, NULL, 'Voluptatem ut volupt', 'Id magnam ad sunt mo', 'new.png', 0, NULL, NULL, '$2y$10$/0s6mY7BZZVe6qO.Pg31/.DNAZTd3vk1Jy.tey0g01O5RtCHsb.4u', NULL, '2024-08-06 18:29:49', '2024-08-06 18:29:49'),
(26, NULL, 'Gloria Mays', 'zudi@mailinator.com', 'Gloria', 'Mays', NULL, '2', 0, 0, 'gloria-mays', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, 'Qui doloribus alias', 'Vel molestias fuga', 'new.png', 0, NULL, NULL, '$2y$10$n1dp0J98Y5TOae/h0BUtU.tKvkydUkP/qp.uYrN2LYHsZZr6gtrWe', NULL, '2024-08-06 18:32:53', '2024-08-06 18:32:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries_names`
--
ALTER TABLE `industries_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_subscriptions`
--
ALTER TABLE `package_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_categories`
--
ALTER TABLE `parent_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_updates`
--
ALTER TABLE `profile_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_histories`
--
ALTER TABLE `search_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `industries_names`
--
ALTER TABLE `industries_names`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package_subscriptions`
--
ALTER TABLE `package_subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent_categories`
--
ALTER TABLE `parent_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_updates`
--
ALTER TABLE `profile_updates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `search_histories`
--
ALTER TABLE `search_histories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
