-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- 생성 시간: 15-08-10 17:50
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
-- 테이블 구조 `gongche`
--

CREATE TABLE IF NOT EXISTS `gongche` (
  `company_ID` int(11) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `company_url` varchar(255) NOT NULL,
  `published` date NOT NULL,
  `deadline_data` date NOT NULL,
  `occupations` int(11) NOT NULL DEFAULT '0',
  `in_Jobs` varchar(255) NOT NULL,
  `large_companies` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `gongche`
--
ALTER TABLE `gongche`
  ADD PRIMARY KEY (`company_ID`),
  ADD UNIQUE KEY `company_ID` (`company_ID`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `gongche`
--
ALTER TABLE `gongche`
  MODIFY `company_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
