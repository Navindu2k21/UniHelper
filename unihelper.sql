/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50508
Source Host           : 127.0.0.1:3306
Source Database       : unihelper

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2025-10-03 21:36:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for addsubjects
-- ----------------------------
DROP TABLE IF EXISTS `addsubjects`;
CREATE TABLE `addsubjects` (
  `sub_code` varchar(255) NOT NULL,
  `sem` int(10) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  PRIMARY KEY (`sub_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for dailyplan
-- ----------------------------
DROP TABLE IF EXISTS `dailyplan`;
CREATE TABLE `dailyplan` (
  `date` date NOT NULL,
  `rowno` int(11) NOT NULL,
  `work` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`date`,`rowno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for leclinks
-- ----------------------------
DROP TABLE IF EXISTS `leclinks`;
CREATE TABLE `leclinks` (
  `subcode` varchar(255) NOT NULL,
  `id` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`subcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for timetable
-- ----------------------------
DROP TABLE IF EXISTS `timetable`;
CREATE TABLE `timetable` (
  `rowno` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `subcode` varchar(255) DEFAULT '0',
  PRIMARY KEY (`rowno`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
