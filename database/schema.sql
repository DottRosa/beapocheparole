CREATE TABLE USERS(
    id SERIAL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    permission ENUM('USER', 'ADMIN'),

    PRIMARY KEY (id),
    KEY username (username),
    KEY permission (permission)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE GALLERY(
    id SERIAL,
    name VARCHAR(255) NOT NULL,
    thumb VARCHAR(255) DEFAULT NULL,
    position INT(11) NOT NULL DEFAULT 1,
    status ENUM('PUBLIC', 'PRIVATE') NOT NULL DEFAULT 'PRIVATE',
    creation_date DATETIME NOT NULL,
    update_date DATETIME DEFAULT NULL,
    delete_data DATETIME DEFAULT NULL,

    PRIMARY KEY(id),
    KEY name (name),
    KEY position (position),
    KEY status (status)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE R_MEDIA(
    name VARCHAR(255) NOT NULL,
    gallery_id BIGINT(20) UNSIGNED NOT NULL,
    media_id BIGINT(20) UNSIGNED NOT NULL,
    position INT(11) NOT NULL DEFAULT 1,

    PRIMARY KEY(gallery_id, media_id), /* Teniamola con le briglie amore (cit. Ele) */
    KEY gallery_id (gallery_id),
    KEY media_id (media_id),
    KEY position (position),

    CONSTRAINT R_MEDIA_gallery_id FOREIGN KEY (gallery_id) REFERENCES GALLERY (id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE MEDIA_TAGS(
    id SERIAL,
    name VARCHAR(255) NOT NULL,
    creation_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_date DATETIME DEFAULT NULL,
    delete_data DATETIME DEFAULT NULL,

    PRIMARY KEY(id),
    KEY name (name)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE MEDIA(
    id SERIAL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    type ENUM('IMG', 'TXT') NOT NULL,
    status ENUM('PUBLIC', 'PRIVATE') NOT NULL DEFAULT 'PRIVATE',
    creation_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_date DATETIME DEFAULT NULL,
    delete_data DATETIME DEFAULT NULL,

    PRIMARY KEY(id),
    KEY title (title),
    KEY type (type)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE R_MEDIA_TAGS(
    media_id BIGINT(20) UNSIGNED NOT NULL,
    tag_id BIGINT(20) UNSIGNED NOT NULL,

    PRIMARY KEY(media_id, tag_id),
    KEY media_id (media_id),
    KEY tag_id (tag_id),

    CONSTRAINT R_MEDIA_TAGS_media_id FOREIGN KEY (media_id) REFERENCES MEDIA (id) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT R_MEDIA_TAGS_tag_id FOREIGN KEY (tag_id) REFERENCES MEDIA_TAGS (id) ON UPDATE CASCADE ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE LOGS(
    id SERIAL,
    action VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    user_id BIGINT(20) UNSIGNED NOT NULL,
    creation_date DATETIME NOT NULL,

    PRIMARY KEY(id),
    KEY user_id (user_id),

    CONSTRAINT LOGS_user FOREIGN KEY (user_id) REFERENCES USERS (id) ON UPDATE CASCADE ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE ERRORS(
    id SERIAL,
    message TEXT NOT NULL,
    url VARCHAR(255) NOT NULL,
    page VARCHAR(255) NOT NULL,
    line INT(11) DEFAULT NULL,
    creation_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY(id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;








-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2018 at 08:25 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `beapocheparole`
--

-- --------------------------------------------------------

--
-- Table structure for table `ERRORS`
--

CREATE TABLE `ERRORS` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `line` int(11) DEFAULT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `GALLERY`
--

CREATE TABLE `GALLERY` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
  `status` enum('PUBLIC','PRIVATE') NOT NULL DEFAULT 'PRIVATE',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  `delete_data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `LOGS`
--

CREATE TABLE `LOGS` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `MEDIA`
--

CREATE TABLE `MEDIA` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` enum('IMG','TXT') NOT NULL,
  `status` enum('PUBLIC','PRIVATE','','') NOT NULL DEFAULT 'PRIVATE',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  `delete_data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `R_MEDIA_GALLERY`
--

CREATE TABLE `R_MEDIA_GALLERY` (
  `name` varchar(255) NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `R_MEDIA_TAGS`
--

CREATE TABLE `R_MEDIA_TAGS` (
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TAGS`
--

CREATE TABLE `TAGS` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  `delete_data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` enum('USER','ADMIN') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`id`, `username`, `password`, `permission`) VALUES
(1, 'marco', '$2y$10$fZCCwYnrD/nWtkjQ3TTrqe8vDVObLZxRDwxXsmbl6me7j6CpezkQi', 'ADMIN'),
(2, 'eleonora', '$2y$10$VSsXHNJGo9/uOLGSN0bbWu/wp2fuiakGt0E1waCOKYQrZ0GY91MSa', 'ADMIN'),
(6, 'beatrice', '$2y$10$JSyA56Eg9ICUn5/0LDto9uGEsEvmt6PB5yDNImthZOPlLlSib2WJG', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ERRORS`
--
ALTER TABLE `ERRORS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `GALLERY`
--
ALTER TABLE `GALLERY`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `position` (`position`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `LOGS`
--
ALTER TABLE `LOGS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `MEDIA`
--
ALTER TABLE `MEDIA`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `R_MEDIA_GALLERY`
--
ALTER TABLE `R_MEDIA_GALLERY`
  ADD PRIMARY KEY (`gallery_id`,`media_id`),
  ADD KEY `gallery_id` (`gallery_id`),
  ADD KEY `media_id` (`media_id`),
  ADD KEY `position` (`position`);

--
-- Indexes for table `R_MEDIA_TAGS`
--
ALTER TABLE `R_MEDIA_TAGS`
  ADD PRIMARY KEY (`media_id`,`tag_id`),
  ADD KEY `media_id` (`media_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `TAGS`
--
ALTER TABLE `TAGS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `permission` (`permission`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ERRORS`
--
ALTER TABLE `ERRORS`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `GALLERY`
--
ALTER TABLE `GALLERY`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `LOGS`
--
ALTER TABLE `LOGS`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `MEDIA`
--
ALTER TABLE `MEDIA`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `TAGS`
--
ALTER TABLE `TAGS`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `LOGS`
--
ALTER TABLE `LOGS`
  ADD CONSTRAINT `LOGS_user` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `R_MEDIA_GALLERY`
--
ALTER TABLE `R_MEDIA_GALLERY`
  ADD CONSTRAINT `R_MEDIA_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `GALLERY` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `R_MEDIA_TAGS`
--
ALTER TABLE `R_MEDIA_TAGS`
  ADD CONSTRAINT `R_MEDIA_TAGS_media_id` FOREIGN KEY (`media_id`) REFERENCES `MEDIA` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `R_MEDIA_TAGS_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `TAGS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
