-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 10:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outerclove_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `f_desc` varchar(500) NOT NULL,
  `f_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`f_id`, `f_name`, `f_desc`, `f_img`) VALUES
(1, 'Bar', 'Within our restaurant\'s ambiance, you\'ll discover a stylish and inviting bar that adds a touch of sophistication to your visit. Our handcrafted cocktails, curated selection of fine wines, and an array of premium spirits are ready to elevate your time with us.', 'images/F_Images/bar-img1.jpg'),
(2, 'Main Hall Seating', 'Immerse yourself in the lively energy of our Main Hall seating. The expansive and open layout provides a vibrant atmosphere, making it ideal for social gatherings and larger parties. Enjoy the buzz of the surroundings while savoring delectable dishes in the heart of the action.', 'images/F_Images/seating.jpg'),
(3, 'Private Dining Halls', 'Experience the epitome of exclusivity in our private dining halls. Perfect for intimate celebrations, business meetings, or special occasions, these secluded spaces offer a personalized setting where you can enjoy privacy and exceptional service. Revel in an intimate dining experience tailored to your preferences.', 'images/F_Images/private-seating.jpg'),
(4, 'Booth Seating', 'Discover comfort and privacy in our cozy booth seating. Nestled within the charming corners of our restaurant, these intimate spaces are perfect for a romantic dinner or quiet conversations. With a balance of seclusion and proximity to the bustling atmosphere, booth seating offers a delightful dining experience tailored to your preferences.', 'images/F_Images/booth.jpg'),
(5, 'Outdoor Dining Area', 'Escape to our enchanting outdoor dining area, where nature meets culinary delight. Surrounded by the beauty of the outdoors, this al fresco setting provides a breath of fresh air to your dining experience. Whether under the stars or bathed in sunlight, relish the flavors of our cuisine in a serene and natural environment.', 'images/F_Images/outdoor.jpg'),
(6, 'Live Music', 'Immerse yourself in the vibrant tunes of live music at our restaurant. We host regular live performances, creating a harmonious atmosphere that complements your dining experience.', 'images/F_Images/live-music.jpg'),
(7, 'Car Park', 'Enjoy the convenience of our spacious car park, ensuring hassle-free arrival and departure for our valued guests. With a capacity to accommodate a large number of vehicles, including dedicated spaces for handicapped parking, we provide assurance that your vehicle will be securely and conveniently housed during your visit.', 'images/F_Images/parking-img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Maria', 'tomkandy@gmail.com', 'general', 'rtet'),
(3, 'John Doe', 'johndoe@example.com', 'general', '\"May I know whether the restaurant is open on public holidays? If so, may I know the time?\"');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cusine_type` varchar(50) NOT NULL,
  `dietary` varchar(50) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `name`, `cusine_type`, `dietary`, `service_type`, `price`, `image`) VALUES
(37, 'Vegetable Pakora', 'Indian', 'Vegan', 'Appetizer', 290, 'images/MenuImages/37.jpg'),
(38, 'Chicken Biryani', 'Indian', 'Gluten Free', 'Main', 800, 'images/MenuImages/38.jpg'),
(40, 'Gulab Jamun', 'Indian', 'None', 'Dessert', 300, 'images/MenuImages/40.jpg'),
(41, 'Antipasto Salad', 'Italian', 'Vegan', 'Appetizer', 230, 'images/MenuImages/41.jpg'),
(42, 'Italian Pizza', 'Italian', 'None', 'Main', 790, 'images/MenuImages/42.jpeg'),
(43, 'Lemon Ricotta Cake', 'Italian', 'None', 'Dessert', 230, 'images/MenuImages/43.jpg'),
(44, 'Thai Spring Rolls', 'Thai', 'Vegan', 'Appetizer', 200, 'images/MenuImages/44.jpg'),
(47, 'Tom Yum', 'Thai', 'None', 'Main', 860, 'images/MenuImages/47.jpg'),
(48, 'Thai Crispy Pancake', 'Thai', 'Gluten Free', 'Dessert', 230, 'images/MenuImages/48.jpg'),
(49, 'Lasagna', 'Italian', 'None', 'Main', 1000, 'images/MenuImages/49.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `service` varchar(100) NOT NULL,
  `total_price` int(11) NOT NULL,
  `address` varchar(225) NOT NULL,
  `confirmed_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `order_date`, `service`, `total_price`, `address`, `confirmed_status`) VALUES
(2, 'Silva', '2023-12-27 14:12:55', 'pickme', 800, 'No 45, Kandy Road, Pilimathalawa', 1),
(6, 'Ann Marr', '2023-12-31 05:51:09', 'pickme', 1820, 'No 45, Peradeniya, Kandy', 0),
(7, '6gtfd', '2023-12-31 06:08:32', 'ubereats', 530, 'hbgvfcd', 0),
(8, 'eds', '2023-12-31 15:26:11', 'ubereats', 860, 'dx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `no_guests` int(11) NOT NULL,
  `seating_type` varchar(50) NOT NULL,
  `confirmed_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `username`, `name`, `email`, `date`, `time`, `no_guests`, `seating_type`, `confirmed_status`) VALUES
(8, 'Ann', 'Ann Thomas', 'annkandy@gmail.com', '2023-12-31', '21:00:00', 6, 'main-hall', 1),
(9, 'Ann', 'John Meyer', 'jonhm@gmail.com', '2024-02-23', '12:00:00', 2, 'private-hall', 0),
(10, NULL, 'Ellen Moore', 'ellenmoore@gmail.com', '2024-01-25', '10:03:00', 10, 'outdoor', 0),
(11, NULL, 'Megan Dioor', 'mdkandy@gmail.com', '2023-12-30', '12:05:00', 5, 'booth', 1),
(12, NULL, 'Maria Steinfield', 'mskandy@gmail.com', '2024-02-16', '21:05:00', 10, 'private-hall', 0),
(13, NULL, 'John David', 'jddcolombo@gmail.com', '2024-01-01', '08:06:00', 1, 'main-hall', 1),
(14, 'Silva', 'Silva', 'silvekandy@gmail.com', '2023-12-30', '21:09:00', 2, 'booth', 0),
(15, 'Silva', 'Silva Fenn', 'silvekandy@gmail.com', '2024-01-10', '22:10:00', 2, 'private-hall', 0),
(16, 'Silva', 'Maria', 'mariyakandy@gmail.com', '2024-01-03', '14:13:00', 2, 'private-hall', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `user_type`) VALUES
(1, 'tom', 'tom1234', 'tomkandy@gmail.com', 'Customer'),
(4, 'Ann', 'Ann123', 'annkandy@gmail.com', 'Customer'),
(5, 'Silva', 'Silva1234', 'Silvekandy@gmail.com', 'Customer'),
(6, 'Admin', 'admin123', 'outercloveadmin@gmail.com', 'Admin'),
(7, 'Staff', 'staff123', 'outerclovestaff@gmail.com', 'Staff'),
(8, 'Megan', 'megan123', 'meagnbb@gmail.com', 'Customer'),
(9, 'Customer', 'customer123', 'customersample@gmail.com', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
