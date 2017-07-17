/*
Navicat MySQL Data Transfer

Source Server         : DB
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : z_hm

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-07-17 23:06:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for z_act
-- ----------------------------
DROP TABLE IF EXISTS `z_act`;
CREATE TABLE `z_act` (
  `ACTID` int(11) NOT NULL AUTO_INCREMENT,
  `ACTName` varchar(255) DEFAULT NULL,
  `ACTStage` varchar(255) DEFAULT NULL,
  `ACTProgramID` int(11) DEFAULT NULL,
  `ACTRoundID` int(11) DEFAULT NULL,
  `ACTThumb` varchar(255) DEFAULT NULL,
  `ACTURL` varchar(255) DEFAULT NULL,
  `ACTSR` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ACTID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_act
-- ----------------------------
INSERT INTO `z_act` VALUES ('1', 'The voice Cambodia', 'Blind Audition', null, null, 'sdfsd', 'sdfs', null, null, null, '2017-03-16 23:25:40', null);
INSERT INTO `z_act` VALUES ('2', 'Cambodian Idle', 'Judge Audition', null, null, null, null, null, null, null, '2017-03-16 23:32:14', null);

-- ----------------------------
-- Table structure for z_act_candidate
-- ----------------------------
DROP TABLE IF EXISTS `z_act_candidate`;
CREATE TABLE `z_act_candidate` (
  `ACTID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  PRIMARY KEY (`ACTID`,`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_act_candidate
-- ----------------------------

-- ----------------------------
-- Table structure for z_album
-- ----------------------------
DROP TABLE IF EXISTS `z_album`;
CREATE TABLE `z_album` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `AName` varchar(255) NOT NULL,
  `AAlias` varchar(255) DEFAULT NULL,
  `ASR` int(11) DEFAULT NULL,
  `ADescription` varchar(255) DEFAULT NULL,
  `ATypeID` int(11) DEFAULT NULL,
  `AProID` int(11) DEFAULT NULL,
  `APopular` int(11) DEFAULT NULL,
  `AThumb` varchar(255) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_album
-- ----------------------------
INSERT INTO `z_album` VALUES ('1', 'sasdasdas', 'asdfasdf', null, 'safasdfa', null, null, null, null, null, null, '2017-05-01 23:35:33', null);
INSERT INTO `z_album` VALUES ('2', 'VCD vol 54', 'vol 54', null, 'jaherrqjkwkerqweir qw eriqweurqwe qwieurq', null, null, null, null, '2017-07-17 14:47:57', null, '2017-07-17 14:47:57', null);
INSERT INTO `z_album` VALUES ('3', 'wedkfjksdaf', 'fasdjhfashjdfa', null, 'jjdskfjsdkf sdfkjgsjdf sdfgjksjdf', '1', '1', null, '13636.jpg', '2017-07-17 14:56:25', null, '2017-07-17 14:56:25', null);
INSERT INTO `z_album` VALUES ('4', 'hasdklfkasjd', 'asmdfmasd', null, 'asdkjfajsd fasdkflkasdkflasdf', '1', '1', null, '82378.jpg', '2017-07-17 15:01:43', null, '2017-07-17 15:01:43', null);

-- ----------------------------
-- Table structure for z_album_type
-- ----------------------------
DROP TABLE IF EXISTS `z_album_type`;
CREATE TABLE `z_album_type` (
  `TID` int(11) NOT NULL AUTO_INCREMENT,
  `TName` varchar(255) NOT NULL,
  `TAlias` varchar(255) DEFAULT NULL,
  `TDescription` varchar(255) DEFAULT NULL,
  `TSR` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TID`),
  UNIQUE KEY `TName` (`TName`,`TAlias`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_album_type
-- ----------------------------
INSERT INTO `z_album_type` VALUES ('1', 'dasdafsd', 'asdfasdfas', 'asdfdsfasdfas', '1', '2017-06-18 16:44:47', null, '2017-06-18 23:44:47', null);
INSERT INTO `z_album_type` VALUES ('2', 'Mini Solo A', 'sdas', 'kjsjdkfjaskdfjasjdfajksdkfa', '2', '2017-07-17 15:50:04', null, '2017-07-17 22:50:04', null);

-- ----------------------------
-- Table structure for z_article
-- ----------------------------
DROP TABLE IF EXISTS `z_article`;
CREATE TABLE `z_article` (
  `ARTID` int(11) NOT NULL AUTO_INCREMENT,
  `ARTName` varchar(255) DEFAULT NULL,
  `ARTDescription` text,
  `ARTCategory` varchar(255) DEFAULT NULL,
  `ARTSR` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ARTID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_article
-- ----------------------------
INSERT INTO `z_article` VALUES ('3', 'Facebook', 'ukaysdfasdif sajdAJSD sdkfaksdjfa', 'social network', null, '2017-05-28 14:39:35', null, '2017-05-29 18:34:24', null);
INSERT INTO `z_article` VALUES ('5', 'sadfaisdfa', 'asdiufaisufoepqwer kjkhlkl askjdJASD sdkfasd sadkjfajsd', 'sadhfasdhfasd sdfas', null, '2017-05-29 17:13:49', null, '2017-05-29 18:54:28', null);
INSERT INTO `z_article` VALUES ('6', 'Youtube', 'ASKJDJKas ASDlkaskd', 'social network', null, '2017-05-29 18:58:49', null, null, null);
INSERT INTO `z_article` VALUES ('7', 'Line', 'show about how to connect people\r\n', 'social network', null, '2017-05-30 17:27:22', null, null, null);

-- ----------------------------
-- Table structure for z_attachment
-- ----------------------------
DROP TABLE IF EXISTS `z_attachment`;
CREATE TABLE `z_attachment` (
  `ATCID` int(11) NOT NULL,
  `ACTName` varchar(255) DEFAULT NULL,
  `ACTDescription` varchar(255) DEFAULT NULL,
  `ACTThumb` varchar(255) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ATCID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for z_candidate
-- ----------------------------
DROP TABLE IF EXISTS `z_candidate`;
CREATE TABLE `z_candidate` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `CName` varchar(255) NOT NULL DEFAULT '',
  `CProfile` varchar(255) DEFAULT NULL,
  `CProgramID` int(11) DEFAULT NULL,
  `CCoachID` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_candidate
-- ----------------------------

-- ----------------------------
-- Table structure for z_coach
-- ----------------------------
DROP TABLE IF EXISTS `z_coach`;
CREATE TABLE `z_coach` (
  `COID` int(11) NOT NULL AUTO_INCREMENT,
  `COName` varchar(255) DEFAULT NULL,
  `CODescription` varchar(255) DEFAULT NULL,
  `COProfile` varchar(255) DEFAULT NULL,
  `COSR` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`COID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_coach
-- ----------------------------
INSERT INTO `z_coach` VALUES ('1', 'zxcvxcv', 'xcvzxcvzx', 'xzcvzxcv', null, null, null, '2017-04-27 21:54:36', null);

-- ----------------------------
-- Table structure for z_module
-- ----------------------------
DROP TABLE IF EXISTS `z_module`;
CREATE TABLE `z_module` (
  `MID` varchar(11) NOT NULL,
  `MName` varchar(255) DEFAULT NULL,
  `MDescription` varchar(255) DEFAULT NULL,
  `MType` varchar(255) DEFAULT NULL,
  `MSR` int(11) DEFAULT NULL,
  `MStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`MID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_module
-- ----------------------------

-- ----------------------------
-- Table structure for z_production
-- ----------------------------
DROP TABLE IF EXISTS `z_production`;
CREATE TABLE `z_production` (
  `ProID` int(11) NOT NULL AUTO_INCREMENT,
  `ProName` varchar(255) NOT NULL,
  `ProAlias` varchar(255) DEFAULT NULL,
  `ProDescription` varchar(255) DEFAULT NULL,
  `ProLogo` varchar(255) DEFAULT NULL,
  `ProShortOrder` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ProID`),
  KEY `ProName` (`ProName`,`ProAlias`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_production
-- ----------------------------
INSERT INTO `z_production` VALUES ('1', 'Reaksmey Hang Meas', 'RHM', '', '78830.jpg', null, '2017-06-15 16:18:28', null, '2017-06-15 23:18:28', null);
INSERT INTO `z_production` VALUES ('2', 'kjskfjgksdf', 'sdfkjgsdkfg', 'sdfg,sdjfkgjsdfg', '91612.jpg', null, '2017-06-18 14:21:37', null, '2017-06-18 21:21:37', null);

-- ----------------------------
-- Table structure for z_program
-- ----------------------------
DROP TABLE IF EXISTS `z_program`;
CREATE TABLE `z_program` (
  `PGID` int(11) NOT NULL AUTO_INCREMENT,
  `PGName` varchar(255) NOT NULL,
  `PGDescription` varchar(255) DEFAULT NULL,
  `PGSeason` varchar(255) DEFAULT NULL,
  `PGURL` varchar(255) DEFAULT NULL,
  `PGLogo` varchar(255) DEFAULT NULL,
  `PGSR` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` datetime DEFAULT NULL,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PGID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_program
-- ----------------------------

-- ----------------------------
-- Table structure for z_radio
-- ----------------------------
DROP TABLE IF EXISTS `z_radio`;
CREATE TABLE `z_radio` (
  `RDID` int(11) NOT NULL,
  `RDName` varchar(255) DEFAULT NULL,
  `RDThumb` varchar(255) DEFAULT NULL,
  `RDURL` varchar(255) DEFAULT NULL,
  `RDDescription` varchar(255) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`RDID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_radio
-- ----------------------------

-- ----------------------------
-- Table structure for z_role
-- ----------------------------
DROP TABLE IF EXISTS `z_role`;
CREATE TABLE `z_role` (
  `ROID` int(11) NOT NULL,
  `ROName` varchar(255) DEFAULT NULL,
  `RODescription` varchar(255) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ROID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_role
-- ----------------------------

-- ----------------------------
-- Table structure for z_role_detail
-- ----------------------------
DROP TABLE IF EXISTS `z_role_detail`;
CREATE TABLE `z_role_detail` (
  `ROID` int(11) NOT NULL,
  `ROModule` varchar(255) DEFAULT NULL,
  `ROCreate` int(11) DEFAULT NULL,
  `ROEdit` int(11) DEFAULT NULL,
  `RODelete` int(11) DEFAULT NULL,
  PRIMARY KEY (`ROID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_role_detail
-- ----------------------------

-- ----------------------------
-- Table structure for z_round
-- ----------------------------
DROP TABLE IF EXISTS `z_round`;
CREATE TABLE `z_round` (
  `RID` int(11) NOT NULL AUTO_INCREMENT,
  `RName` varchar(255) DEFAULT NULL,
  `RDescription` varchar(255) DEFAULT NULL,
  `RSR` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_round
-- ----------------------------

-- ----------------------------
-- Table structure for z_season
-- ----------------------------
DROP TABLE IF EXISTS `z_season`;
CREATE TABLE `z_season` (
  `SSID` int(11) NOT NULL AUTO_INCREMENT,
  `SSName` varchar(255) DEFAULT NULL,
  `SSDescription` varchar(255) DEFAULT NULL,
  `SSSR` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SSID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_season
-- ----------------------------

-- ----------------------------
-- Table structure for z_singer
-- ----------------------------
DROP TABLE IF EXISTS `z_singer`;
CREATE TABLE `z_singer` (
  `SGID` int(11) NOT NULL AUTO_INCREMENT,
  `SGName` varchar(255) NOT NULL,
  `SGProfile` varchar(255) DEFAULT NULL,
  `SGAlias` varchar(255) DEFAULT NULL,
  `SProID` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SGID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_singer
-- ----------------------------

-- ----------------------------
-- Table structure for z_slideshow
-- ----------------------------
DROP TABLE IF EXISTS `z_slideshow`;
CREATE TABLE `z_slideshow` (
  `SLSID` int(11) NOT NULL AUTO_INCREMENT,
  `SLSName` varchar(255) DEFAULT NULL,
  `SLSImage` varchar(255) DEFAULT NULL,
  `SLSDescription` varchar(255) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  `SLStatus` int(1) DEFAULT NULL,
  PRIMARY KEY (`SLSID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_slideshow
-- ----------------------------
INSERT INTO `z_slideshow` VALUES ('3', 'askdflajskdkfas', '92106.jpg', null, null, null, '2017-05-01 00:05:55', null, '1');
INSERT INTO `z_slideshow` VALUES ('4', 'sdfasdf', '48054.jpg', null, null, null, '2017-05-01 00:26:05', null, '1');

-- ----------------------------
-- Table structure for z_song
-- ----------------------------
DROP TABLE IF EXISTS `z_song`;
CREATE TABLE `z_song` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `SName` varchar(255) DEFAULT NULL,
  `SAlias` varchar(255) DEFAULT NULL,
  `SAlbumID` int(11) DEFAULT NULL,
  `SThumb` varchar(255) DEFAULT NULL,
  `SURL` varchar(255) DEFAULT NULL,
  `SSR` int(11) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `MDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_song
-- ----------------------------
INSERT INTO `z_song` VALUES ('3', 'dakjsdjf', 'asdfasdf', '1', null, '85538.mp3', null, '2017-05-09 15:32:47', null, '2017-05-09 15:32:47', null);
INSERT INTO `z_song` VALUES ('4', 'aksdjfaksd', 'asdkfajsdkfas', '1', null, '16932.mp3', null, '2017-05-09 15:39:50', null, '2017-05-09 15:39:50', null);
INSERT INTO `z_song` VALUES ('5', 'ASLDka', 'asdAJSJDKasd', '1', null, '31909.mp3', null, '2017-05-09 15:53:25', null, '2017-05-09 15:53:25', null);
INSERT INTO `z_song` VALUES ('6', 'kjsdafkosadif', 'asdofaisdfnasdf', '1', null, '1/49091.mp3', null, '2017-05-11 16:55:32', null, '2017-05-11 16:55:32', null);
INSERT INTO `z_song` VALUES ('7', 'jhasdfaskj', 'asdkfjsakdfj', '1', null, '1/77454.DAT', null, '2017-05-17 16:10:24', null, '2017-05-17 16:10:24', null);

-- ----------------------------
-- Table structure for z_song_singer
-- ----------------------------
DROP TABLE IF EXISTS `z_song_singer`;
CREATE TABLE `z_song_singer` (
  `SGID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  PRIMARY KEY (`SGID`,`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_song_singer
-- ----------------------------

-- ----------------------------
-- Table structure for z_tv
-- ----------------------------
DROP TABLE IF EXISTS `z_tv`;
CREATE TABLE `z_tv` (
  `TVID` int(11) NOT NULL,
  `TVName` varchar(255) DEFAULT NULL,
  `TVDescription` varchar(255) DEFAULT NULL,
  `TVSR` int(11) DEFAULT NULL,
  `TVURL` varchar(255) DEFAULT NULL,
  `TVThumb` varchar(255) DEFAULT NULL,
  `CDate` datetime DEFAULT NULL,
  `CBy` varchar(255) DEFAULT NULL,
  `Mdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TVID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_tv
-- ----------------------------

-- ----------------------------
-- Table structure for z_user
-- ----------------------------
DROP TABLE IF EXISTS `z_user`;
CREATE TABLE `z_user` (
  `ZUID` int(11) NOT NULL,
  `ZUName` varchar(255) DEFAULT NULL,
  `ZUType` varchar(255) DEFAULT NULL,
  `ZUPassword` varchar(255) DEFAULT NULL,
  `ZURole` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ZUID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of z_user
-- ----------------------------
INSERT INTO `z_user` VALUES ('1', 'vichet', null, '$2y$10$xurjF3uoopm4wxyEclkiD.fhsL9l59.xQGRwzRL/sNctT2LiwdQHm', null);
