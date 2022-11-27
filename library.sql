-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 10:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_request`
--

CREATE TABLE `booking_request` (
  `booking_issue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_request`
--

INSERT INTO `booking_request` (`booking_issue_id`, `user_id`, `category_id`, `book_id`, `quantity`, `issue_date`, `return_date`) VALUES
(9, 6, 22, 9, 2, '2021-07-07', '2021-07-10'),
(13, 1, 8, 12, 2, '2021-07-06', '2021-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_quatity` int(11) NOT NULL DEFAULT 0,
  `meta_tags` varchar(255) DEFAULT NULL,
  `book_desc` text DEFAULT NULL,
  `book_status` int(11) NOT NULL DEFAULT 2 COMMENT '2= Inactive 1=active',
  `book_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `thumbnail`, `book_name`, `author_name`, `category_id`, `book_quatity`, `meta_tags`, `book_desc`, `book_status`, `book_date`) VALUES
(1, 'avatar.jpg', 'physics part-1', 'Mir Mohaiminul Islam', 18, 2, 'physics,part1', '																						', 2, '2021-07-02'),
(2, '168624himu.jpg', 'Sad Story', 'Naeem Anik', 8, 0, 'sad,Story,novel', 'test perpose																																																																		', 2, '2021-07-02'),
(5, '73843padmanodirmajhi.jpg', 'padma Nodir Majhi', 'Manik Bodopadhay', 8, 18, 'padma,manik,majhi', 'A short novel test\'\'																																																																																																														', 1, '2021-07-02'),
(9, '769916nora.jpg', 'Nora Barret', 'Nora Amanda Barrett', 22, 98, 'nora', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut cursus, dolor sed pulvinar vehicula, diam libero molestie ligula, et facilisis risus lorem sed nisl. Aenean iaculis lectus at vestibulum lacinia. Nunc vulputate, elit non placerat imperdiet, massa dui auctor justo, sed ultrices sem nisi id tortor. Nullam ipsum enim, ullamcorper vel tortor vel, porta tristique arcu. Curabitur magna turpis, fermentum sed consequat ut, interdum ut mi. Donec non nulla sit amet massa interdum hendrerit at at risus. Ut dictum posuere tellus, sit amet aliquam eros blandit id. Sed efficitur suscipit dictum.\r\n\r\nVivamus varius mollis libero, sit amet dignissim sapien suscipit at. Proin bibendum malesuada nibh, vel scelerisque nisl bibendum eu. Nulla nec imperdiet lacus. Aenean auctor neque sed urna tincidunt rhoncus ac convallis tortor. Vestibulum auctor tellus ac ligula consequat, imperdiet auctor est semper. In blandit ante et leo bibendum tincidunt. Vivamus in nibh nisl. In elit velit, hendrerit ut nisi eu, porttitor vestibulum ante. Curabitur ac nisi fringilla, efficitur lorem et, interdum magna. Donec nec turpis ultricies, congue nulla id, efficitur velit. Fusce elit eros, venenatis vel viverra eget, lobortis ut metus. Cras vitae feugiat orci. Morbi non aliquet turpis. Duis sodales felis sem, mattis porttitor dui dignissim at.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Cras interdum dapibus viverra. Praesent rhoncus justo eu risus semper, at viverra libero dignissim. Sed hendrerit sapien quam, ullamcorper ultricies sapien convallis mattis. Suspendisse vel diam aliquam, ultrices quam vitae, consectetur diam. Duis nec lorem vitae justo hendrerit accumsan a non est. Proin lobortis eget ante et congue. Pellentesque elementum vitae neque a vestibulum. Aenean id arcu quam.\r\n\r\nCras in risus dui. Mauris vel scelerisque ante. Sed dapibus porttitor ipsum ut vehicula. Mauris ac cursus purus, quis ultricies quam. Nulla consequat neque non nunc varius fringilla. Nulla facilisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec lectus tincidunt, molestie diam sit amet, euismod lacus. In scelerisque urna vitae augue pretium, vel cursus tellus pulvinar. Sed at tristique tortor, sit amet sollicitudin orci.																						', 1, '2021-07-05'),
(10, '544824hypocrite.jpg', 'The Hypocrite World', 'Polash', 10, 13, 'hypocrite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut cursus, dolor sed pulvinar vehicula, diam libero molestie ligula, et facilisis risus lorem sed nisl. Aenean iaculis lectus at vestibulum lacinia. Nunc vulputate, elit non placerat imperdiet, massa dui auctor justo, sed ultrices sem nisi id tortor. Nullam ipsum enim, ullamcorper vel tortor vel, porta tristique arcu. Curabitur magna turpis, fermentum sed consequat ut, interdum ut mi. Donec non nulla sit amet massa interdum hendrerit at at risus. Ut dictum posuere tellus, sit amet aliquam eros blandit id. Sed efficitur suscipit dictum.\r\n\r\nVivamus varius mollis libero, sit amet dignissim sapien suscipit at. Proin bibendum malesuada nibh, vel scelerisque nisl bibendum eu. Nulla nec imperdiet lacus. Aenean auctor neque sed urna tincidunt rhoncus ac convallis tortor. Vestibulum auctor tellus ac ligula consequat, imperdiet auctor est semper. In blandit ante et leo bibendum tincidunt. Vivamus in nibh nisl. In elit velit, hendrerit ut nisi eu, porttitor vestibulum ante. Curabitur ac nisi fringilla, efficitur lorem et, interdum magna. Donec nec turpis ultricies, congue nulla id, efficitur velit. Fusce elit eros, venenatis vel viverra eget, lobortis ut metus. Cras vitae feugiat orci. Morbi non aliquet turpis. Duis sodales felis sem, mattis porttitor dui dignissim at.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Cras interdum dapibus viverra. Praesent rhoncus justo eu risus semper, at viverra libero dignissim. Sed hendrerit sapien quam, ullamcorper ultricies sapien convallis mattis. Suspendisse vel diam aliquam, ultrices quam vitae, consectetur diam. Duis nec lorem vitae justo hendrerit accumsan a non est. Proin lobortis eget ante et congue. Pellentesque elementum vitae neque a vestibulum. Aenean id arcu quam.\r\n\r\nCras in risus dui. Mauris vel scelerisque ante. Sed dapibus porttitor ipsum ut vehicula. Mauris ac cursus purus, quis ultricies quam. Nulla consequat neque non nunc varius fringilla. Nulla facilisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec lectus tincidunt, molestie diam sit amet, euismod lacus. In scelerisque urna vitae augue pretium, vel cursus tellus pulvinar. Sed at tristique tortor, sit amet sollicitudin orci.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut cursus, dolor sed pulvinar vehicula, diam libero molestie ligula, et facilisis risus lorem sed nisl. Aenean iaculis lectus at vestibulum lacinia. Nunc vulputate, elit non placerat imperdiet, massa dui auctor justo, sed ultrices sem nisi id tortor. Nullam ipsum enim, ullamcorper vel tortor vel, porta tristique arcu. Curabitur magna turpis, fermentum sed consequat ut, interdum ut mi. Donec non nulla sit amet massa interdum hendrerit at at risus. Ut dictum posuere tellus, sit amet aliquam eros blandit id. Sed efficitur suscipit dictum.\r\n\r\nVivamus varius mollis libero, sit amet dignissim sapien suscipit at. Proin bibendum malesuada nibh, vel scelerisque nisl bibendum eu. Nulla nec imperdiet lacus. Aenean auctor neque sed urna tincidunt rhoncus ac convallis tortor. Vestibulum auctor tellus ac ligula consequat, imperdiet auctor est semper. In blandit ante et leo bibendum tincidunt. Vivamus in nibh nisl. In elit velit, hendrerit ut nisi eu, porttitor vestibulum ante. Curabitur ac nisi fringilla, efficitur lorem et, interdum magna. Donec nec turpis ultricies, congue nulla id, efficitur velit. Fusce elit eros, venenatis vel viverra eget, lobortis ut metus. Cras vitae feugiat orci. Morbi non aliquet turpis. Duis sodales felis sem, mattis porttitor dui dignissim at.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Cras interdum dapibus viverra. Praesent rhoncus justo eu risus semper, at viverra libero dignissim. Sed hendrerit sapien quam, ullamcorper ultricies sapien convallis mattis. Suspendisse vel diam aliquam, ultrices quam vitae, consectetur diam. Duis nec lorem vitae justo hendrerit accumsan a non est. Proin lobortis eget ante et congue. Pellentesque elementum vitae neque a vestibulum. Aenean id arcu quam.\r\n\r\nCras in risus dui. Mauris vel scelerisque ante. Sed dapibus porttitor ipsum ut vehicula. Mauris ac cursus purus, quis ultricies quam. Nulla consequat neque non nunc varius fringilla. Nulla facilisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec lectus tincidunt, molestie diam sit amet, euismod lacus. In scelerisque urna vitae augue pretium, vel cursus tellus pulvinar. Sed at tristique tortor, sit amet sollicitudin orci.fsdgdfgdfgdfLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut cursus, dolor sed pulvinar vehicula, diam libero molestie ligula, et facilisis risus lorem sed nisl. Aenean iaculis lectus at vestibulum lacinia. Nunc vulputate, elit non placerat imperdiet, massa dui auctor justo, sed ultrices sem nisi id tortor. Nullam ipsum enim, ullamcorper vel tortor vel, porta tristique arcu. Curabitur magna turpis, fermentum sed consequat ut, interdum ut mi. Donec non nulla sit amet massa interdum hendrerit at at risus. Ut dictum posuere tellus, sit amet aliquam eros blandit id. Sed efficitur suscipit dictum.\r\n\r\nVivamus varius mollis libero, sit amet dignissim sapien suscipit at. Proin bibendum malesuada nibh, vel scelerisque nisl bibendum eu. Nulla nec imperdiet lacus. Aenean auctor neque sed urna tincidunt rhoncus ac convallis tortor. Vestibulum auctor tellus ac ligula consequat, imperdiet auctor est semper. In blandit ante et leo bibendum tincidunt. Vivamus in nibh nisl. In elit velit, hendrerit ut nisi eu, porttitor vestibulum ante. Curabitur ac nisi fringilla, efficitur lorem et, interdum magna. Donec nec turpis ultricies, congue nulla id, efficitur velit. Fusce elit eros, venenatis vel viverra eget, lobortis ut metus. Cras vitae feugiat orci. Morbi non aliquet turpis. Duis sodales felis sem, mattis porttitor dui dignissim at.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Cras interdum dapibus viverra. Praesent rhoncus justo eu risus semper, at viverra libero dignissim. Sed hendrerit sapien quam, ullamcorper ultricies sapien convallis mattis. Suspendisse vel diam aliquam, ultrices quam vitae, consectetur diam. Duis nec lorem vitae justo hendrerit accumsan a non est. Proin lobortis eget ante et congue. Pellentesque elementum vitae neque a vestibulum. Aenean id arcu quam.\r\n\r\nCras in risus dui. Mauris vel scelerisque ante. Sed dapibus porttitor ipsum ut vehicula. Mauris ac cursus purus, quis ultricies quam. Nulla consequat neque non nunc varius fringilla. Nulla facilisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec lectus tincidunt, molestie diam sit amet, euismod lacus. In scelerisque urna vitae augue pretium, vel cursus tellus pulvinar. Sed at tristique tortor, sit amet sollicitudin orci.																						', 1, '2021-07-05'),
(11, '3170lemon.jpg', 'Bangladesh Studies', 'Nieamot Ali Khan', 9, 5, 'Politics,Bangladesh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lacinia libero at augue tincidunt aliquam. Nam id enim nec quam ornare dignissim. Donec nulla ante, fermentum quis diam sit amet, finibus pulvinar est. Proin tempor odio sed leo consectetur auctor. Nullam faucibus congue porttitor. Sed augue dolor, posuere sed quam vel, pharetra congue enim. Aenean in nulla vel erat tristique venenatis quis eget diam. Praesent tristique eget sapien viverra aliquet. Ut volutpat diam sit amet nulla blandit viverra. Phasellus quis malesuada leo. In non justo sem. Sed vitae turpis eget orci tempor blandit non in velit.\r\n\r\nDuis felis elit, elementum vitae velit eget, venenatis blandit nulla. Pellentesque velit justo, fermentum eget lacus sit amet, vestibulum molestie leo. Nullam et metus lobortis, porttitor neque in, aliquet lectus. Nulla pulvinar tellus et neque tempor porttitor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis porttitor pharetra mauris, quis fermentum ipsum suscipit eget. Praesent pharetra, arcu at dictum tincidunt, odio leo viverra velit, a gravida lorem ante ac nulla. Sed egestas ligula nec erat pharetra, a dapibus leo fringilla. Quisque bibendum dignissim ligula nec consectetur. Suspendisse maximus urna ut sapien pretium varius.																																																							', 1, '2021-07-05'),
(12, '820133gitanjali.jpg', 'Gitanjali', 'Rabindronath Tagore', 8, 13, 'gitanjoli', 'In et neque semper, placerat tortor vestibulum, venenatis turpis. Suspendisse in diam eu nisl aliquam ullamcorper. Phasellus ultricies, nunc ut dignissim hendrerit, diam sem dignissim velit, in consectetur metus lacus mattis nisi. Integer sed ante facilisis, finibus risus ut, elementum neque. Nullam lacinia dolor nec nisl cursus scelerisque. Nulla vel dolor at mauris egestas pharetra. Vivamus ultricies mauris a nibh volutpat volutpat. Pellentesque in dolor at diam porttitor viverra. Donec enim erat, vulputate bibendum ex at, ultrices fringilla mauris. Nulla congue ultricies neque at elementum. Pellentesque sed varius neque. In nec ultrices orci. Curabitur vel egestas nisl, eget hendrerit ex. Donec finibus risus urna. Quisque aliquam non risus eget vehicula. Vestibulum vel quam quis risus ornare sodales sit amet eget nunc.																																												', 1, '2021-07-06'),
(13, '122757shsh er kobita.jpg', 'Shesher Kobita', 'Rabindronath Tagore', 8, 24, 'shesher Kobita', 'Quisque placerat quam magna. Nam a imperdiet lorem, ac facilisis leo. Maecenas sed vestibulum dolor, eget dapibus mi. Maecenas eleifend elit eu neque feugiat faucibus. Maecenas pulvinar purus ac nibh ullamcorper sodales nec vitae turpis. Curabitur nec velit varius, aliquam nisl sit amet, ullamcorper velit. Duis interdum velit vestibulum leo gravida consequat. Aenean mauris ante, eleifend ut pretium vitae, dapibus ut turpis. Etiam vel consequat ligula, ut fringilla libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas pretium placerat elementum. Cras molestie, elit eu commodo feugiat, lacus nisl imperdiet nisi, quis eleifend enim justo vitae metus. Nam vel lacus sed mi ornare congue quis in nisi. Curabitur finibus fringilla auctor. Donec luctus in nulla a faucibus. Integer dictum, odio nec pellentesque commodo, purus neque tincidunt mi, at imperdiet purus eros et odio.																	', 1, '2021-07-06'),
(16, '928284bidrohi.jpg', 'Bidrohi', 'kazi Nozrul Islam', 25, 30, 'bidrohi', 'test perpose																						', 1, '2021-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_status` int(11) NOT NULL DEFAULT 2 COMMENT '1=active,2=inactive',
  `parent_id` int(11) NOT NULL DEFAULT 0 COMMENT '0=primary',
  `cat_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`, `parent_id`, `cat_date`) VALUES
(8, 'Novel', 'Test also																														', 1, 0, '2021-07-02'),
(9, 'Non Fiction', 'All about non fiction								', 1, 0, '2021-07-02'),
(18, 'Physics', 'physics											', 2, 0, '2021-07-02'),
(24, 'Magazine', 'All About Magazine											', 1, 0, '2021-07-06'),
(25, 'Poem', 'Poem																																	', 1, 0, '2021-07-06'),
(27, 'my life', 'jfdgdjfkj											', 2, 0, '2021-07-06'),
(28, 'Story', 'about story										', 1, 0, '2021-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `avater` text DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 2 COMMENT '1=Admin ,2=User',
  `status` int(11) NOT NULL DEFAULT 2 COMMENT '1=active 2=Inactive',
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `avater`, `fullname`, `username`, `email`, `phone`, `password`, `user_role`, `status`, `join_date`) VALUES
(1, '360153profile.jpg', 'Mir Mohaiminul Islam', 'Eshrak', 'mirmohaiminul786@gmail.com', '01554683700', 'd969e7e0b0571370cd6763192bc24ac56c255472', 1, 1, '2021-07-02'),
(6, '956418buddy.jpg', 'Md. Naeem Anik', 'naeem', 'anik@gmail.com', '01834534784', '94572084d092c5cdf020963f368bcd8a36125bc0', 2, 1, '2021-07-02'),
(13, '', 'Nieamul Kabir', 'kabir', 'kabir@gmail.com', '045345834', '9f27c49042af7bc63a1148d64da6ee831e8343ef', 2, 2, '2021-07-06'),
(15, '', 'Md Najmus Shakib', 'Shakib', 'najmus@gmail.com', '945348573485', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1, '2021-07-25'),
(16, '', 'Md. Naeem Anik', 'Anik', 'naeemanik@gmail.com', '936373892', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1, '2021-07-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_request`
--
ALTER TABLE `booking_request`
  ADD PRIMARY KEY (`booking_issue_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_request`
--
ALTER TABLE `booking_request`
  MODIFY `booking_issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
