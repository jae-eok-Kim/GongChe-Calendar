-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- 생성 시간: 15-08-15 03:19
-- 서버 버전: 5.6.26
-- PHP 버전: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `gongche`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `data_analysis`
--

CREATE TABLE IF NOT EXISTS `data_analysis` (
  `analysis_id` int(11) NOT NULL,
  `analysis_date` date DEFAULT NULL,
  `1st_word` varchar(255) DEFAULT NULL,
  `1st_num` int(11) DEFAULT '0',
  `2st_word` varchar(255) DEFAULT NULL,
  `2st_num` int(11) DEFAULT '0',
  `3st_word` varchar(255) DEFAULT NULL,
  `3st_num` int(11) DEFAULT '0',
  `4st_word` varchar(255) DEFAULT NULL,
  `4st_num` int(11) DEFAULT '0',
  `5st_word` varchar(255) DEFAULT NULL,
  `5st_num` int(11) DEFAULT '0',
  `6st_word` varchar(255) DEFAULT NULL,
  `6st_num` int(11) NOT NULL DEFAULT '0',
  `7st_word` varchar(255) DEFAULT NULL,
  `7st_num` int(11) NOT NULL DEFAULT '0',
  `8st_word` varchar(255) DEFAULT NULL,
  `8st_num` int(11) NOT NULL DEFAULT '0',
  `9st_word` varchar(255) DEFAULT NULL,
  `9st_num` int(11) NOT NULL DEFAULT '0',
  `10st_word` varchar(255) DEFAULT NULL,
  `10st_num` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `data_analysis`
--
ALTER TABLE `data_analysis`
  ADD PRIMARY KEY (`analysis_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `data_analysis`
--
ALTER TABLE `data_analysis`
  MODIFY `analysis_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
