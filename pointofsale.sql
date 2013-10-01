/*
MySQL Data Transfer
Source Host: localhost
Source Database: pointofsale
Target Host: localhost
Target Database: pointofsale
Date: 9/30/2013 9:36:22 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for acos
-- ----------------------------
DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for aros
-- ----------------------------
DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for aros_acos
-- ----------------------------
DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for banks
-- ----------------------------
DROP TABLE IF EXISTS `banks`;
CREATE TABLE `banks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `terminalid` int(11) DEFAULT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for configs
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `coder` varchar(255) CHARACTER SET utf8 NOT NULL,
  `copyright` varchar(255) CHARACTER SET utf8 NOT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `registred` tinyint(1) NOT NULL DEFAULT '1',
  `text_marquee` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for i18n
-- ----------------------------
DROP TABLE IF EXISTS `i18n`;
CREATE TABLE `i18n` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `locale` (`locale`),
  KEY `model` (`model`),
  KEY `row_id` (`foreign_key`),
  KEY `field` (`field`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for login_tokens
-- ----------------------------
DROP TABLE IF EXISTS `login_tokens`;
CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ordering` int(11) NOT NULL,
  `actived` tinyint(1) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `controller` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ext` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `module` tinyint(1) DEFAULT '0',
  `view` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `position` enum('right','left','top') CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `terminalid` int(11) DEFAULT NULL,
  `merchantinfo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `transtype` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `pan` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currencycode` int(11) DEFAULT NULL,
  `countrycode` int(11) DEFAULT NULL,
  `currencysymbol` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `refno` int(11) DEFAULT NULL,
  `refcode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `authid` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `transactionid` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `responsecode` int(11) DEFAULT NULL,
  `responsemessage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for user_group_permissions
-- ----------------------------
DROP TABLE IF EXISTS `user_group_permissions`;
CREATE TABLE `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=760 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user_groups
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user_onlines
-- ----------------------------
DROP TABLE IF EXISTS `user_onlines`;
CREATE TABLE `user_onlines` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_client` varchar(512) DEFAULT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned DEFAULT NULL,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `salt` text CHARACTER SET latin1,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified` int(1) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=935 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `banks` VALUES ('1', '2044', 'ACCESS BANK NIGERIA LTD');
INSERT INTO `banks` VALUES ('2', '2014', 'AFRIBANK NIGERIA PLC');
INSERT INTO `banks` VALUES ('3', '2082', 'Bank PHB');
INSERT INTO `banks` VALUES ('4', '2023', 'CITIBANK NIGERIA');
INSERT INTO `banks` VALUES ('5', '2063', 'DIAMOND BANK NIGERIA LTD');
INSERT INTO `banks` VALUES ('6', '2050', 'ECOBANK NIGERIA LTD');
INSERT INTO `banks` VALUES ('7', '2040', 'EQUITORIAL TRUST BANK');
INSERT INTO `banks` VALUES ('8', '2070', 'FIDELITY BANK PL');
INSERT INTO `banks` VALUES ('9', '2011', 'FIRST BANK OF NIGERIA PLC ');
INSERT INTO `banks` VALUES ('10', '2214', 'FIRST CITY MONUMENT BANK');
INSERT INTO `banks` VALUES ('11', '2085', 'FIRSTINLAND BANK');
INSERT INTO `banks` VALUES ('12', '2058', 'GUARANTY TRUST BANK LTD');
INSERT INTO `banks` VALUES ('13', '2069', 'INTERCONTINENTAL BANK');
INSERT INTO `banks` VALUES ('14', '2056', 'OCEANIC BANK INTERNATIONAL PLC');
INSERT INTO `banks` VALUES ('15', '2076', 'SKYE BANK');
INSERT INTO `banks` VALUES ('16', '2084', 'SPRING BANK');
INSERT INTO `banks` VALUES ('17', '2221', 'STANBIC IBTC BANK');
INSERT INTO `banks` VALUES ('18', '2068', 'STANDARD CHARTERED BANK');
INSERT INTO `banks` VALUES ('19', '2232', 'STERLING BANK PLC');
INSERT INTO `banks` VALUES ('20', '2032', 'UNION BANK OF NIGERIA PLC');
INSERT INTO `banks` VALUES ('21', '2033', 'UNITED BANK FOR AFRICA PLC');
INSERT INTO `banks` VALUES ('22', '2215', 'UNITY BANK');
INSERT INTO `banks` VALUES ('23', '2035', 'WEMA BANK PLC');
INSERT INTO `banks` VALUES ('24', '2057', 'ZENITH INTERNATIONAL BANK PLC');
INSERT INTO `configs` VALUES ('1', 'Point Of Sale', 'POS', 'Point Of Sale', 'Hoai Canh', 'POS', '0', '0', 'POS');
INSERT INTO `transactions` VALUES ('79', '12345678', 'Linh Plc', 'purchase', '2013-09-28 01:49:17', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('80', '12345679', 'Mr Canh Surulere', 'purchase', '2013-09-28 01:49:19', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('81', '12345678', 'Linh Plc', 'purchase', '2013-09-28 01:49:23', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('82', '12345679', 'Mr Canh Surulere', 'purchase', '2013-09-28 01:49:26', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('83', '12345678', 'Linh Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('84', '12345679', 'Mr Canh Surulere', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('85', '12345678', 'Linh Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('86', '12345679', 'Mr Canh Surulere', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('87', '12345678', 'Linh Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('88', '12345679', 'Mr Canh Surulere', 'purchase', '0000-00-00 00:00:00', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('89', '12345678', 'Linh Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('90', '12345679', 'Mr Canh Surulere', 'purchase', '0000-00-00 00:00:00', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('91', '12345678', 'Linh Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('92', '12345679', 'Mr Canh Surulere', 'purchase', '0000-00-00 00:00:00', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('93', '12345678', 'Linh Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('94', '12345679', 'Mr Canh Surulere', 'purchase', '0000-00-00 00:00:00', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('95', '12345678', 'Linh Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('96', '12345679', 'Mr Canh Surulere', 'purchase', '0000-00-00 00:00:00', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('97', '12345678', 'Linh Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('98', '12345679', 'Mr Canh Surulere', 'purchase', '0000-00-00 00:00:00', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('99', '12345678', 'Name Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('100', '12345679', 'Mr Owen Surulere', 'purchase', '0000-00-00 00:00:00', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('101', '12345678', 'Name Plc', 'purchase', '0000-00-00 00:00:00', '543434xxxxxx4434', '566', '566', 'N', '5', '2034123', '43343434344', '88767676', '302/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('102', '12345679', 'Mr Owen Surulere', 'purchase', '0000-00-00 00:00:00', '443434xxxxxx4434', '566', '566', 'N', '8', '9034123', '43343434344', '', '303/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('103', '20680852', 'JOXGOYTWUF NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '507152xxxxxx0379', '566', '566', 'N', '100.11', '197', 'uncrjvtuoqsgdgdljlffbicojfafgjqkbipwpxjlthmerblviuervh', '', '131/2', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('104', '20840013', 'CUWUUSDXGB NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '407289xxxxxx0288', '566', '566', 'N', '101.15', '468', '', '', '390/4', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('105', '22320020', 'RYQIWNCYDO NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '501894xxxxxx0146', '566', '566', 'N', '106.26', '303', '', '074255', '327/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('106', '20230553', 'THCYPFFOEL & SONS', 'purchase', '0000-00-00 00:00:00', '501490xxxxxx0126', '566', '566', 'N', '102.36', '378', 'eslyiauhwxywhucpnfrhogptodsbbivqbtstydrwsjqebiayqgatlhxgldjgda', '', '428/0', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('107', '20580496', 'AHXPVWUDKO & SONS', 'purchase', '0000-00-00 00:00:00', '500334xxxxxx0387', '566', '566', 'N', '105.85', '104', '', '', '388/4', '1', 'Declined');
INSERT INTO `transactions` VALUES ('108', '20580501', 'PQMIGSSXHH LTD', 'purchase', '0000-00-00 00:00:00', '508398xxxxxx0437', '566', '566', 'N', '109.64', '0', 'tqgtqwptyqoeqydmivxjcu', '', '374/3', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('109', '20500434', 'CSBPDGYTFP NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '404178xxxxxx0374', '566', '566', 'N', '107.45', '475', '', '', '369/1', '4', 'Declined');
INSERT INTO `transactions` VALUES ('110', '20700330', 'FFRKJAQMEN & SONS', 'purchase', '0000-00-00 00:00:00', '404476xxxxxx0501', '566', '566', 'N', '101.28', '61', 'mopfrmitsyumhdxenutikrqelbkdofhhhfgukowrckyewmuqjutbkrjvhilqvmadnqnmwsomvooptqmm', '', '362/2', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('111', '20840348', 'TGOODVVNIY LTD', 'purchase', '0000-00-00 00:00:00', '400595xxxxxx0365', '566', '566', 'N', '102.61', '14', '', '075490', '307/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('112', '20700699', 'ABPCXCWJLJ LTD', 'purchase', '0000-00-00 00:00:00', '506543xxxxxx0885', '566', '566', 'N', '107.28', '8', '', '', '30/3', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('113', '22140331', 'UTPNOKGXAI & SONS', 'purchase', '0000-00-00 00:00:00', '403042xxxxxx0848', '566', '566', 'N', '104.98', '449', '', '', '178/2', '3', 'Declined');
INSERT INTO `transactions` VALUES ('114', '20140594', 'LUJPAVGEQN NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '501153xxxxxx0733', '566', '566', 'N', '104.1', '363', 'dmrbibwjpvsoulgintevbqasdkjetpmpklw', '079278', '265/4', '0', 'Approved');
INSERT INTO `transactions` VALUES ('115', '20760017', 'RBSGXNNTVH & SONS', 'purchase', '0000-00-00 00:00:00', '501342xxxxxx0356', '566', '566', 'N', '100.95', '152', '', '', '333/1', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('116', '20680463', 'MBMUIEVLTX LTD', 'purchase', '0000-00-00 00:00:00', '501094xxxxxx0921', '566', '566', 'N', '109.81', '25', 'cxlphonluyoysuyvnhnbugfyynmhpoocvbabikd', '', '129/2', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('117', '20330086', 'KWHRESULNP NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409668xxxxxx0498', '566', '566', 'N', '109.52', '131', 'cyypfncrqbfdya', '', '450/2', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('118', '20140281', 'SRFPHHSOFJ NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '407494xxxxxx0564', '566', '566', 'N', '108.09', '241', 'qmlpgqerudelahkymvotqgjxbhyakunraywtpxuhtvrpebvcbtciaholehnovmskqbowurmkhsadenoanewnhrcnxihifyk', '', '50/2', '4', 'Declined');
INSERT INTO `transactions` VALUES ('119', '20500084', 'LPHMUOTEVD & SONS', 'purchase', '0000-00-00 00:00:00', '504752xxxxxx0525', '566', '566', 'N', '105.83', '46', 'fkfjbaywwnmhdgylmpdysypreaqbehdptrnodlckiclcflowwvwrorvmjqtipgjvguw', '', '464/1', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('120', '20680920', 'VVRVIHFWXF & SONS', 'purchase', '0000-00-00 00:00:00', '401494xxxxxx0762', '566', '566', 'N', '108.96', '403', '', '', '75/1', '4', 'Declined');
INSERT INTO `transactions` VALUES ('121', '22210774', 'RDKKCLGJPU LTD', 'purchase', '0000-00-00 00:00:00', '404265xxxxxx0708', '566', '566', 'N', '106.75', '449', 'knsnjgfyfytioqdosvodfgpxscsimjgufwsdvbxgygxxnd', '', '251/3', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('122', '20840398', 'ABHKPFNVXK NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '502628xxxxxx0153', '566', '566', 'N', '105.85', '359', '', '', '58/2', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('123', '20110962', 'NSWTQFSBIK & SONS', 'purchase', '0000-00-00 00:00:00', '503211xxxxxx0668', '566', '566', 'N', '106.41', '318', 'mnbssvupteojjtucvwaaeulqucgyoxjawmegpxogkhhxuhkulxshifiadatygregjeapwtwubimhodotdu', '002589', '221/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('124', '20140238', 'UAIOXINLKN NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409613xxxxxx0239', '566', '566', 'N', '108.13', '168', '', '080639', '1/3', '0', 'Approved');
INSERT INTO `transactions` VALUES ('125', '20230152', 'OFPMSBBKUL NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '504576xxxxxx0266', '566', '566', 'N', '108.96', '52', '', '', '338/4', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('126', '20850254', 'PNROBAOGKC NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '509169xxxxxx0047', '566', '566', 'N', '102.02', '422', 'jstdnoyxxrcwlpxsrywddxtdmetuntld', '', '428/4', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('127', '22150294', 'GTQODGVQRX LTD', 'purchase', '0000-00-00 00:00:00', '509965xxxxxx0221', '566', '566', 'N', '101.08', '416', 'nschxrwnwatkblifvebpyuerriokllrytagrjdhfvxknpjogfoabwyebbjohpfsll', '', '414/4', '4', 'Declined');
INSERT INTO `transactions` VALUES ('128', '20680432', 'JXLDWEUMSB NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '507152xxxxxx0049', '566', '566', 'N', '109.51', '391', '', '', '414/4', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('129', '22320188', 'TBAQIYWIXM & SONS', 'purchase', '0000-00-00 00:00:00', '504714xxxxxx0917', '566', '566', 'N', '105.61', '197', '', '', '418/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('130', '22320677', 'GWOJGHKCJC NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '508255xxxxxx0850', '566', '566', 'N', '103.87', '124', '', '015333', '397/4', '0', 'Approved');
INSERT INTO `transactions` VALUES ('131', '20320288', 'CRSYFVQPLS & SONS', 'purchase', '0000-00-00 00:00:00', '406482xxxxxx0226', '566', '566', 'N', '105.71', '344', '', '', '327/1', '3', 'Declined');
INSERT INTO `transactions` VALUES ('132', '20440060', 'XJEOIVAOQN NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '509518xxxxxx0298', '566', '566', 'N', '102.15', '25', '', '', '133/0', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('133', '22150787', 'BLDIKQBWES LTD', 'purchase', '0000-00-00 00:00:00', '409641xxxxxx0624', '566', '566', 'N', '103.95', '9', 'mkmtdgebfwauwdwwwyydamirrcuhdcuirm', '009982', '320/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('134', '20440156', 'SRUFUNKFER LTD', 'purchase', '0000-00-00 00:00:00', '503315xxxxxx0197', '566', '566', 'N', '107.9', '183', '', '039571', '232/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('135', '20630135', 'JNUWIMJUGB LTD', 'purchase', '0000-00-00 00:00:00', '405381xxxxxx0334', '566', '566', 'N', '104.27', '279', 'dbokpkupvtmrdjrqkomhsiutrrfadsthuoumcbuchlpqdyjbioqeudrcvbcsujsbaqnr', '', '127/2', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('136', '20440880', 'YABQOUBGVJ & SONS', 'purchase', '0000-00-00 00:00:00', '500288xxxxxx0252', '566', '566', 'N', '104.87', '442', 'usbdkqemtcbqakgtjugytgtkn', '', '487/2', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('137', '20850480', 'JOCFYXBXUV & SONS', 'purchase', '0000-00-00 00:00:00', '401621xxxxxx0649', '566', '566', 'N', '107.87', '158', 'lvnlpsrkrmewijmviwwokqmrjcbbivsewslyf', '', '104/4', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('138', '20350144', 'KFVHLSTIDK LTD', 'purchase', '0000-00-00 00:00:00', '509574xxxxxx0756', '566', '566', 'N', '108.81', '455', '', '', '186/1', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('139', '22140418', 'FTIAUPXOUL LTD', 'purchase', '0000-00-00 00:00:00', '408066xxxxxx0713', '566', '566', 'N', '100.89', '342', '', '', '207/0', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('140', '22210129', 'QNBYHTRXEA LTD', 'purchase', '0000-00-00 00:00:00', '408193xxxxxx0498', '566', '566', 'N', '102.17', '149', 'evjwtikgeobvnxhpnjsjfodqlfgo', '', '234/2', '4', 'Declined');
INSERT INTO `transactions` VALUES ('141', '20700917', 'NDYWHRJMAW NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '508312xxxxxx0781', '566', '566', 'N', '107.23', '435', '', '', '499/1', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('142', '20440866', 'TNIYYYMUAJ NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '400153xxxxxx0529', '566', '566', 'N', '100.26', '318', '', '', '168/2', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('143', '20700601', 'CKAYXADHYB NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '408324xxxxxx0844', '566', '566', 'N', '100.17', '253', '', '', '457/2', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('144', '20320499', 'GULORQISOU LTD', 'purchase', '0000-00-00 00:00:00', '502150xxxxxx0215', '566', '566', 'N', '107.83', '463', 'qkaxyeouocquiwcvwliqrdvfqlenxxxdfmjpewmdfmalbhtwhgn', '', '75/2', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('145', '20850496', 'OFRJNCWNQF NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '406246xxxxxx0873', '566', '566', 'N', '102.93', '115', 'tmtannmnpxllpiytnhsqoaaykyflbpuytxkdrfibcgoawyu', '081797', '312/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('146', '20350431', 'QPUAKCLTIL & SONS', 'purchase', '0000-00-00 00:00:00', '504123xxxxxx0227', '566', '566', 'N', '107.91', '100', 'jhtvqdyehnmogc', '', '250/4', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('147', '20630127', 'PROXDCJAOD & SONS', 'purchase', '0000-00-00 00:00:00', '505970xxxxxx0169', '566', '566', 'N', '103.16', '47', 'khkpapgiwcykdsvxmat', '', '219/4', '1', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('148', '20680547', 'TNITMJJMIB & SONS', 'purchase', '0000-00-00 00:00:00', '403886xxxxxx0667', '566', '566', 'N', '103.43', '323', '', '', '334/3', '4', 'Declined');
INSERT INTO `transactions` VALUES ('149', '20820902', 'HEGPLOJDWX NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409858xxxxxx0222', '566', '566', 'N', '100.18', '246', '', '', '31/2', '4', 'Declined');
INSERT INTO `transactions` VALUES ('150', '20700218', 'RCLMKUASWY & SONS', 'purchase', '0000-00-00 00:00:00', '509169xxxxxx0010', '566', '566', 'N', '101.37', '342', 'ihgixqskjuimfhruprwqaxuucndyaddknwaimoxffanaclmlhphqgefgeqvgvprtressfyxeeillljuipbhyijaamfohowg', '', '62/3', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('151', '20330148', 'QOVGABPHWP & SONS', 'purchase', '0000-00-00 00:00:00', '406893xxxxxx0001', '566', '566', 'N', '106.6', '436', '', '', '433/2', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('152', '20820673', 'UQHXMXHDPF NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409395xxxxxx0276', '566', '566', 'N', '107.34', '123', 'yexnirnaqxrdoonqafgeyigegwitqwoundlourotebqhijqrkmjkvuksvpmycjsexpdyqvdv', '', '96/1', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('153', '22320136', 'IEBQQNMLAK LTD', 'purchase', '0000-00-00 00:00:00', '500837xxxxxx0478', '566', '566', 'N', '109.1', '424', '', '', '66/1', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('154', '20680849', 'SEJSRSCLXD NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '505116xxxxxx0769', '566', '566', 'N', '100.38', '291', '', '', '24/4', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('155', '22150579', 'UBGSLYOEJC NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '401455xxxxxx0225', '566', '566', 'N', '102.6', '361', 'wlcxrdu', '', '346/1', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('156', '20840807', 'OMSQPSYLBT & SONS', 'purchase', '0000-00-00 00:00:00', '404994xxxxxx0987', '566', '566', 'N', '104.48', '171', 'mevmwedwcp', '', '0/1', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('157', '20440280', 'EKIFFMBATG NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '408101xxxxxx0429', '566', '566', 'N', '101.3', '391', '', '', '18/0', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('158', '22150443', 'IABQLTHLUL NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '405240xxxxxx0283', '566', '566', 'N', '107.51', '246', 'pdqfyggacxedrrnpt', '067989', '54/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('159', '22140350', 'UKLEDAKBHD NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '401726xxxxxx0907', '566', '566', 'N', '101.03', '376', '', '089779', '427/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('160', '20680603', 'WIRTWXAVBJ & SONS', 'purchase', '0000-00-00 00:00:00', '502028xxxxxx0704', '566', '566', 'N', '104.2', '293', 'qn', '021864', '46/3', '0', 'Approved');
INSERT INTO `transactions` VALUES ('161', '20850752', 'NCQFQWQVFN LTD', 'purchase', '0000-00-00 00:00:00', '500121xxxxxx0247', '566', '566', 'N', '105.64', '490', 'wtcvmwkyavkpwedgiiavyelouyrymepunsnqxtcesgdwcklwavtqqkufthsfbxivjljcrhitlbkamyldqphk', '', '30/3', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('162', '20140403', 'OHJAASGMAA LTD', 'purchase', '0000-00-00 00:00:00', '403836xxxxxx0596', '566', '566', 'N', '105.08', '275', '', '', '212/0', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('163', '20440415', 'NHGHDSAIEN NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '507724xxxxxx0638', '566', '566', 'N', '102.87', '179', 'yoaxxqhpxsbhoxaautmobxxfkxpnl', '', '246/1', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('164', '20350885', 'BDKNIVWTAP NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '509936xxxxxx0732', '566', '566', 'N', '104.25', '341', 'lqmebdeivukuwxjopfinesyolptkkxrwcgolsbfajhrnfousqilbwqypkckdtrmqsgdqioiunhijusphpgkner', '', '370/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('165', '20440572', 'XWBXNBYYFU & SONS', 'purchase', '0000-00-00 00:00:00', '504715xxxxxx0242', '566', '566', 'N', '101.55', '289', 'uhskrpplhgqoquvjlwxapahfogpawtpqpbleofnkdkw', '', '287/0', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('166', '20820007', 'RSHFJWONUU LTD', 'purchase', '0000-00-00 00:00:00', '403158xxxxxx0310', '566', '566', 'N', '109.01', '200', '', '', '107/1', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('167', '20440313', 'METDSSWTCI & SONS', 'purchase', '0000-00-00 00:00:00', '501730xxxxxx0872', '566', '566', 'N', '100.98', '497', '', '096952', '279/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('168', '20700594', 'GUQYGTCPCC LTD', 'purchase', '0000-00-00 00:00:00', '402316xxxxxx0608', '566', '566', 'N', '100.14', '69', 'mreukkmowhvgxmhhxouxrhpdhhaabstnoydsexihjhqfxqsryubvqgsuudxqrtvegbsmkjpxlfigitkuoi', '', '123/1', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('169', '20680482', 'ATYWKKDLRL NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409271xxxxxx0092', '566', '566', 'N', '108.27', '461', 'kvxoahewrqgplqrjncdtaclpbysbpnonbiduwjmnuifflukqscdfwtwdydflj', '035962', '313/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('170', '20680350', 'ERDPAYUAXB LTD', 'purchase', '0000-00-00 00:00:00', '409928xxxxxx0803', '566', '566', 'N', '102.96', '62', 'oonpgbctcvheagp', '', '80/1', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('171', '22150990', 'GWNMBTDGHE NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '502116xxxxxx0159', '566', '566', 'N', '101.19', '247', 'hnseujdatlitkucjbhwrmticsmokwhjdoisglyjomnjxwuxqoadiret', '', '246/1', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('172', '20840332', 'BQXKFGILGM NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '407805xxxxxx0284', '566', '566', 'N', '105.03', '326', '', '059300', '245/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('173', '20690594', 'PXPSUKYCGP NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '506714xxxxxx0581', '566', '566', 'N', '104.11', '476', 'yxhi', '', '64/2', '1', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('174', '20820114', 'FSBLUCSDFD & SONS', 'purchase', '0000-00-00 00:00:00', '404815xxxxxx0566', '566', '566', 'N', '108.14', '195', '', '', '453/0', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('175', '20500493', 'RCQBYLGOWF & SONS', 'purchase', '0000-00-00 00:00:00', '501502xxxxxx0209', '566', '566', 'N', '109.7', '49', '', '', '350/3', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('176', '20820236', 'BMDAHFXWNS NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '403859xxxxxx0651', '566', '566', 'N', '108.43', '38', '', '010219', '130/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('177', '20680663', 'WNJYAOCGDU NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '405192xxxxxx0973', '566', '566', 'N', '108.47', '302', '', '', '367/0', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('178', '20820638', 'PBAQKNMXQW & SONS', 'purchase', '0000-00-00 00:00:00', '505617xxxxxx0179', '566', '566', 'N', '109.49', '332', 'bvenyawammevsdyueel', '', '1/1', '1', 'Declined');
INSERT INTO `transactions` VALUES ('179', '20630561', 'GVXTXUVQMT NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '509124xxxxxx0152', '566', '566', 'N', '105.69', '392', '', '', '376/0', '1', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('180', '20700064', 'NLNOVDSPJB & SONS', 'purchase', '0000-00-00 00:00:00', '400895xxxxxx0458', '566', '566', 'N', '107.46', '279', 'accetsovhtekxpxdwiyyxcydnkqffqeojqlyvakwyrpljhddcxosmucvqbfpvgkhfaywqtxjjjcadqpfejiykxrsuhdvyefbpu', '021405', '176/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('181', '22140442', 'WYQOYCQIOD NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '406676xxxxxx0585', '566', '566', 'N', '106.05', '332', '', '038487', '132/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('182', '20320261', 'LTXETWPPKX & SONS', 'purchase', '0000-00-00 00:00:00', '404010xxxxxx0815', '566', '566', 'N', '100.79', '412', '', '', '187/0', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('183', '20560459', 'FMFLKJGUDS LTD', 'purchase', '0000-00-00 00:00:00', '501617xxxxxx0140', '566', '566', 'N', '105.43', '487', '', '', '280/3', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('184', '20140774', 'DWHQCSAKCM & SONS', 'purchase', '0000-00-00 00:00:00', '408115xxxxxx0359', '566', '566', 'N', '105.85', '307', '', '', '445/2', '1', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('185', '20560214', 'APEXGQUJEA LTD', 'purchase', '0000-00-00 00:00:00', '406575xxxxxx0861', '566', '566', 'N', '101.35', '146', '', '', '323/1', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('186', '20760145', 'IGHAAASDAO NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '505448xxxxxx0636', '566', '566', 'N', '100.01', '443', 'udxtujassemtgmrnejdgeqvuosilmglqlfhfpktfiylbjnnexvdyjbgnmeddrwvgjhtaqhgbrlism', '', '144/0', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('187', '20230446', 'JMNSCLAENQ & SONS', 'purchase', '0000-00-00 00:00:00', '407351xxxxxx0920', '566', '566', 'N', '101.8', '124', 'aamtpcyifrytexkjwgpsscceevcwcpfdhifeldggcxksgfffasuxkvwhqwtqjqtiqkcridwcfllhdsxevasxgphflqaybbb', '', '0/4', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('188', '20330306', 'PLEJRLBIML LTD', 'purchase', '0000-00-00 00:00:00', '502649xxxxxx0710', '566', '566', 'N', '103.16', '58', 'qmhsfjrfmyllckikewjfpga', '', '450/3', '3', 'Declined');
INSERT INTO `transactions` VALUES ('189', '20560891', 'FVKRPTGPPV NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '504772xxxxxx0676', '566', '566', 'N', '107.05', '23', '', '070907', '187/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('190', '22140393', 'TCUMPEBPSG LTD', 'purchase', '0000-00-00 00:00:00', '403152xxxxxx0730', '566', '566', 'N', '107.21', '419', 'mxknylggxeoiykoreeufressfcpkglewdawgavadmibdkfxsaujrnfrkhamaatgb', '', '375/3', '4', 'Declined');
INSERT INTO `transactions` VALUES ('191', '22210755', 'HSLQLHYBHC LTD', 'purchase', '0000-00-00 00:00:00', '403354xxxxxx0315', '566', '566', 'N', '103.96', '425', '', '', '439/3', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('192', '20560965', 'KNMXDURKOJ & SONS', 'purchase', '0000-00-00 00:00:00', '409423xxxxxx0438', '566', '566', 'N', '106.32', '231', '', '', '186/1', '3', 'Declined');
INSERT INTO `transactions` VALUES ('193', '20820040', 'EQHRVFLCHH & SONS', 'purchase', '0000-00-00 00:00:00', '508956xxxxxx0359', '566', '566', 'N', '108.43', '219', '', '', '119/3', '3', 'Declined');
INSERT INTO `transactions` VALUES ('194', '20820242', 'LTKTONMGYA NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '509550xxxxxx0670', '566', '566', 'N', '108.75', '332', 'wqjhdefjdiuaagiarskhfyiqyfqodivjbryujqrllsojkbhbyfmeikjyviurehehxonkdcwvlhwkwjpwxepeptqfod', '', '126/2', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('195', '20140237', 'CQROKCVPPD & SONS', 'purchase', '0000-00-00 00:00:00', '501269xxxxxx0883', '566', '566', 'N', '102.94', '269', '', '', '66/2', '4', 'Declined');
INSERT INTO `transactions` VALUES ('196', '20440417', 'XWEVHBMXSD NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '404655xxxxxx0459', '566', '566', 'N', '105.24', '465', 'wdtxmidwwrorbgwxwmsbylkxbrduydmlxfertbxcnxshqwhmmgimeiwbevoralxb', '', '139/0', '4', 'Declined');
INSERT INTO `transactions` VALUES ('197', '20230052', 'WSUTUFAJHH & SONS', 'purchase', '0000-00-00 00:00:00', '403180xxxxxx0017', '566', '566', 'N', '107.99', '286', '', '', '252/4', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('198', '20110727', 'TTFJFKWRQT NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '506463xxxxxx0827', '566', '566', 'N', '107.32', '87', 'ritxx', '', '492/0', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('199', '22140196', 'NGPIFFTVVI LTD', 'purchase', '0000-00-00 00:00:00', '403521xxxxxx0697', '566', '566', 'N', '100.94', '352', 'nqbc', '', '385/1', '1', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('200', '20820118', 'PRNTBWGXUJ NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '504942xxxxxx0278', '566', '566', 'N', '109.48', '259', '', '033295', '85/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('201', '20440321', 'JMWVBIWBMR & SONS', 'purchase', '0000-00-00 00:00:00', '408487xxxxxx0646', '566', '566', 'N', '101.39', '351', 'yybirquqmggwprhaopkovnafoafhcvmkigbtkiydfnraxxhydowtyamvoqmjmuqra', '', '202/2', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('202', '20700177', 'AQKJOEEPAP LTD', 'purchase', '0000-00-00 00:00:00', '409371xxxxxx0026', '566', '566', 'N', '106.18', '340', '', '', '94/4', '3', 'Declined');
INSERT INTO `transactions` VALUES ('203', '20500135', 'AEAFXSKWIV LTD', 'purchase', '0000-00-00 00:00:00', '404912xxxxxx0118', '566', '566', 'N', '102.54', '257', 'scdyjtesstgdprkwpitprjnfmkxytgrgsfilrsvtxonlkgdusrgoxwo', '', '157/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('204', '20580030', 'GUGEOJWSPX & SONS', 'purchase', '0000-00-00 00:00:00', '404416xxxxxx0710', '566', '566', 'N', '109.88', '126', '', '', '187/4', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('205', '22320459', 'UUVAHJGHRW LTD', 'purchase', '0000-00-00 00:00:00', '408913xxxxxx0105', '566', '566', 'N', '103.05', '281', 'dgigvxwlowqpwhbieoccjibkxhxnkyqyurqkyjgbvfamoqafpfqhnjycca', '091574', '100/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('206', '20840212', 'QAYNSTEIPH & SONS', 'purchase', '0000-00-00 00:00:00', '406113xxxxxx0145', '566', '566', 'N', '100.3', '102', '', '032046', '73/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('207', '20850882', 'HWQQSUYHBO NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '404100xxxxxx0481', '566', '566', 'N', '105.78', '142', '', '', '449/0', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('208', '22320141', 'JGGHKWQWCB NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '503720xxxxxx0373', '566', '566', 'N', '109.29', '352', '', '', '422/4', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('209', '20690528', 'NXUGLTBMYM NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '400293xxxxxx0889', '566', '566', 'N', '106.94', '478', '', '', '235/3', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('210', '20840589', 'KMBNBKWSDO & SONS', 'purchase', '0000-00-00 00:00:00', '507807xxxxxx0071', '566', '566', 'N', '102.74', '177', 'dgexjbrhlbiksayujsvajaokmmbitbolijkqyvkknetrewtltxnrrofvgntysbvvpvfkpyiqevdkhbtkcwnujfyypxx', '', '403/1', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('211', '20820244', 'MSLKGQNMYD LTD', 'purchase', '0000-00-00 00:00:00', '504545xxxxxx0826', '566', '566', 'N', '105.63', '356', '', '', '141/3', '3', 'Declined');
INSERT INTO `transactions` VALUES ('212', '20690131', 'MFJQYOVVYB & SONS', 'purchase', '0000-00-00 00:00:00', '503473xxxxxx0901', '566', '566', 'N', '109.88', '98', '', '', '195/2', '1', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('213', '20350391', 'SXKKCFSPFD & SONS', 'purchase', '0000-00-00 00:00:00', '500158xxxxxx0496', '566', '566', 'N', '104.55', '262', 'ipuseprdcbxortkyiatwwlklwbyuvfdtjpen', '', '481/2', '3', 'Declined');
INSERT INTO `transactions` VALUES ('214', '20700995', 'VHBEMDVRYI NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409098xxxxxx0673', '566', '566', 'N', '106.34', '364', '', '041811', '395/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('215', '22210581', 'COICAAQEEQ NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '506168xxxxxx0747', '566', '566', 'N', '104.88', '65', '', '', '244/1', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('216', '20840868', 'BGTQBYLMCA NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '405640xxxxxx0579', '566', '566', 'N', '108.06', '174', '', '', '453/0', '3', 'Declined');
INSERT INTO `transactions` VALUES ('217', '20700718', 'RJEMDYVDTR NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '506233xxxxxx0223', '566', '566', 'N', '103.18', '421', '', '', '197/2', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('218', '20690628', 'YITEDSLVUH LTD', 'purchase', '0000-00-00 00:00:00', '500108xxxxxx0428', '566', '566', 'N', '106.18', '272', '', '', '106/4', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('219', '20440046', 'WXXLHKPOTW NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409260xxxxxx0758', '566', '566', 'N', '100.1', '3', 'wleblffyvwvhlcsgiinpukhkebpcmdcxhjdv', '', '117/2', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('220', '20230245', 'LOIIBYRBFK LTD', 'purchase', '0000-00-00 00:00:00', '506407xxxxxx0357', '566', '566', 'N', '109.33', '327', '', '', '487/4', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('221', '20760370', 'FPQWHAXCWD LTD', 'purchase', '0000-00-00 00:00:00', '509394xxxxxx0096', '566', '566', 'N', '105.56', '451', '', '', '182/0', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('222', '20230577', 'DTHIWQHROX & SONS', 'purchase', '0000-00-00 00:00:00', '400498xxxxxx0654', '566', '566', 'N', '101.99', '490', '', '', '42/4', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('223', '20140967', 'WVGCYEDFJC NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409690xxxxxx0599', '566', '566', 'N', '107.65', '35', 'bsxgtqeycotopahwivcrvfjrteborajudwcelniwnwaapkbl', '', '374/0', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('224', '20400339', 'ICAOQSXQCF LTD', 'purchase', '0000-00-00 00:00:00', '504579xxxxxx0169', '566', '566', 'N', '102.2', '241', '', '096848', '359/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('225', '20850274', 'YAOWMSKUYY LTD', 'purchase', '0000-00-00 00:00:00', '404213xxxxxx0006', '566', '566', 'N', '108.66', '345', 'ykadlfbuapodjieuwqrwvtnxfrceltfrdkyapgwpcqcecmlspgk', '', '107/2', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('226', '20700893', 'TCNIINNTAQ LTD', 'purchase', '0000-00-00 00:00:00', '407069xxxxxx0273', '566', '566', 'N', '106.94', '459', '', '', '254/3', '4', 'Declined');
INSERT INTO `transactions` VALUES ('227', '20500018', 'HGQWMRVESX & SONS', 'purchase', '0000-00-00 00:00:00', '500193xxxxxx0969', '566', '566', 'N', '103.44', '133', 'bjtockcxewhayknvveattkfgsymyoyixjpsrmusjwbhapdxdkseicfxcikxdwmnnsvdiuvxifjxgwrqvwlxpywvdmnaxmtyd', '', '57/4', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('228', '20230372', 'KGCVNSXRKF LTD', 'purchase', '0000-00-00 00:00:00', '501841xxxxxx0715', '566', '566', 'N', '105.8', '491', 'klayvmvtmlodqpwtacwkuojnuycwp', '', '213/1', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('229', '20690255', 'EIPDHCGVDF LTD', 'purchase', '0000-00-00 00:00:00', '504342xxxxxx0191', '566', '566', 'N', '102.75', '171', 'qyycuhpgwsdnyvcnvoagf', '081339', '228/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('230', '20320563', 'UCEBYRQEBN & SONS', 'purchase', '0000-00-00 00:00:00', '403317xxxxxx0348', '566', '566', 'N', '104.8', '326', '', '', '75/1', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('231', '20690681', 'HVDSPJOHTJ LTD', 'purchase', '0000-00-00 00:00:00', '503889xxxxxx0937', '566', '566', 'N', '104.57', '193', 'wifpcgremvrrogivqsqctleqihblve', '', '140/4', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('232', '20320416', 'USCRVGJQME & SONS', 'purchase', '0000-00-00 00:00:00', '504437xxxxxx0192', '566', '566', 'N', '107.01', '159', 'cwpsxhvksgusdtyxkcmjlpraghkiodlhplvnflljfqnbll', '', '461/3', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('233', '20580280', 'OGIKYRHQMA NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '403638xxxxxx0354', '566', '566', 'N', '108.12', '275', '', '', '434/2', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('234', '20580057', 'NBTCPISDGL & SONS', 'purchase', '0000-00-00 00:00:00', '501696xxxxxx0466', '566', '566', 'N', '107.97', '239', 'wcggyvvfifpkdiqgjmlaqrsfbtyvjcdpfnajkghcenxopuskwgsulkgnqppabjwhoyavkhsjkciihh', '', '163/1', '4', 'Declined');
INSERT INTO `transactions` VALUES ('235', '20500967', 'CJFEHVEGUP & SONS', 'purchase', '0000-00-00 00:00:00', '507744xxxxxx0744', '566', '566', 'N', '102.34', '473', 'oultmcaoqewlunsyva', '', '178/3', '1', 'Declined');
INSERT INTO `transactions` VALUES ('236', '20320591', 'UELKLBMJOH NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '404309xxxxxx0158', '566', '566', 'N', '104.35', '445', 'delbqugoacuxa', '', '335/2', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('237', '20230375', 'RQMAAQBUBV & SONS', 'purchase', '0000-00-00 00:00:00', '507464xxxxxx0309', '566', '566', 'N', '102.22', '179', '', '', '271/4', '1', 'Declined');
INSERT INTO `transactions` VALUES ('238', '20580498', 'CQIPHYWATL & SONS', 'purchase', '0000-00-00 00:00:00', '407874xxxxxx0164', '566', '566', 'N', '100.11', '193', '', '002733', '487/3', '0', 'Approved');
INSERT INTO `transactions` VALUES ('239', '20500055', 'DXSMUQOTLD & SONS', 'purchase', '0000-00-00 00:00:00', '404847xxxxxx0450', '566', '566', 'N', '102.52', '450', 'hgei', '027726', '487/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('240', '20230426', 'PRRYVSIIBI & SONS', 'purchase', '0000-00-00 00:00:00', '409429xxxxxx0014', '566', '566', 'N', '104.78', '277', 'hqtgvypciicrsthbtjwwkuhpluolnogcesopqynoypryulsuatdskloenvqalnqbtftbsllvgwjmmf', '096469', '202/4', '0', 'Approved');
INSERT INTO `transactions` VALUES ('241', '20350888', 'HJHOATPMEC LTD', 'purchase', '0000-00-00 00:00:00', '503290xxxxxx0083', '566', '566', 'N', '102.56', '243', 'qeoeneqqchieykmprjtxirpeqyguribhwywoeptvmvuvjoartusiowjcsvyrasppysomsrfsmktxmftw', '008803', '388/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('242', '22320271', 'XNJWJTMVUN LTD', 'purchase', '0000-00-00 00:00:00', '406392xxxxxx0258', '566', '566', 'N', '105.34', '496', '', '', '270/4', '1', 'Declined');
INSERT INTO `transactions` VALUES ('243', '20400966', 'QJDBCCFQOR NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '502585xxxxxx0450', '566', '566', 'N', '100.2', '50', '', '', '379/3', '1', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('244', '20140000', 'IMJWEGDUBA LTD', 'purchase', '0000-00-00 00:00:00', '404890xxxxxx0468', '566', '566', 'N', '103.46', '243', '', '', '323/3', '4', 'Declined');
INSERT INTO `transactions` VALUES ('245', '20700279', 'OTVHRVXCQC NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '403416xxxxxx0470', '566', '566', 'N', '108.54', '435', '', '046748', '204/4', '0', 'Approved');
INSERT INTO `transactions` VALUES ('246', '20440441', 'DWGEGJQJOF LTD', 'purchase', '0000-00-00 00:00:00', '504029xxxxxx0254', '566', '566', 'N', '101.58', '276', '', '', '320/0', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('247', '20700958', 'AFHQDXDWGA NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '509860xxxxxx0690', '566', '566', 'N', '109.06', '262', 'nuxqqqfrllqqwoljsygqhipfocfucqaiolbxxkxakcdncexvvwxtrpkithkohbbnea', '', '495/1', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('248', '20630636', 'OGFIHCMGJV & SONS', 'purchase', '0000-00-00 00:00:00', '400950xxxxxx0946', '566', '566', 'N', '104.07', '53', 'delkavfqotyjegrneimtwi', '087065', '164/3', '0', 'Approved');
INSERT INTO `transactions` VALUES ('249', '20230311', 'OIYGCIQWMA & SONS', 'purchase', '0000-00-00 00:00:00', '502350xxxxxx0388', '566', '566', 'N', '108.21', '49', 'exsmlvoltaoqdgtltqsdyscrledqiqethfsumqkcjgfjnuvsmgrvvbllgfpdvnkcjpepkya', '', '231/3', '4', 'Declined');
INSERT INTO `transactions` VALUES ('250', '20580824', 'XENIYRTQWB NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '504442xxxxxx0922', '566', '566', 'N', '109.62', '395', '', '', '111/1', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('251', '20700288', 'JYQAHXMGRD NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '404127xxxxxx0329', '566', '566', 'N', '103.21', '435', 'ttfjnpowhwaxxorgjhvnjxiffn', '', '139/2', '4', 'Declined');
INSERT INTO `transactions` VALUES ('252', '20330241', 'LFWBVSTDQH NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '503923xxxxxx0113', '566', '566', 'N', '106.14', '26', '', '', '310/3', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('253', '22140018', 'YLABNUCHDA LTD', 'purchase', '0000-00-00 00:00:00', '407791xxxxxx0890', '566', '566', 'N', '108.22', '470', '', '', '394/4', '1', 'Declined');
INSERT INTO `transactions` VALUES ('254', '20630528', 'TPVKHOUPBT LTD', 'purchase', '0000-00-00 00:00:00', '508256xxxxxx0394', '566', '566', 'N', '100.27', '464', '', '', '231/0', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('255', '20760197', 'RCNQFCPLQL NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '500440xxxxxx0149', '566', '566', 'N', '105.38', '52', 'mfoaojpdvialieeatqlsflypkpbppcyxhsirfyciqrmiiddbhspmopwvsn', '', '12/0', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('256', '20400724', 'CLRCGUNCRF & SONS', 'purchase', '0000-00-00 00:00:00', '500011xxxxxx0361', '566', '566', 'N', '105.92', '270', '', '', '480/1', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('257', '20840232', 'DCTBBLQPFE NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '501156xxxxxx0969', '566', '566', 'N', '100.7', '334', 'udeindarvgjrtymmjcjyllhmscjkkwndhmu', '', '37/4', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('258', '20560675', 'NXUETSNJKC NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '400178xxxxxx0860', '566', '566', 'N', '103.87', '437', '', '', '117/4', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('259', '20630105', 'AVNBJUXGBP & SONS', 'purchase', '0000-00-00 00:00:00', '506365xxxxxx0486', '566', '566', 'N', '104.94', '80', 'cymyuttjkrsvxfggxilmgukufkwkecxqlfmqtyktvteeisyuiagte', '081644', '306/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('260', '22150306', 'QDVWLHQVUT LTD', 'purchase', '0000-00-00 00:00:00', '408470xxxxxx0181', '566', '566', 'N', '101.92', '74', '', '', '331/3', '1', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('261', '20110750', 'HCNKXNQHPA LTD', 'purchase', '0000-00-00 00:00:00', '406113xxxxxx0659', '566', '566', 'N', '102.3', '7', 'jrrlnvslrablxjucysnudilwedltfnybjvbvmntvxast', '060219', '55/3', '0', 'Approved');
INSERT INTO `transactions` VALUES ('262', '20700158', 'TMCGELYGCG NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '507385xxxxxx0216', '566', '566', 'N', '106.7', '335', '', '', '327/2', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('263', '20850065', 'IAWLGTOUFK LTD', 'purchase', '0000-00-00 00:00:00', '504012xxxxxx0596', '566', '566', 'N', '109.63', '89', 'gjyeowjlklkyqmyybjkktkwexlxrnwjgjoritvkbnpbkmentrdtuf', '', '286/4', '3', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('264', '20330395', 'FBGCRRCPHK NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '501392xxxxxx0391', '566', '566', 'N', '105.53', '374', 'qyjdfjvsxkaxlxqgnpykeorobduwwpmatqi', '', '470/4', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('265', '22210356', 'NQKKOPHXNM LTD', 'purchase', '0000-00-00 00:00:00', '409891xxxxxx0663', '566', '566', 'N', '105.17', '320', '', '010282', '423/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('266', '20320401', 'FPSXHCGVPR & SONS', 'purchase', '0000-00-00 00:00:00', '404952xxxxxx0592', '566', '566', 'N', '104.68', '204', '', '', '142/3', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('267', '20680347', 'PXGIBDRWPR & SONS', 'purchase', '0000-00-00 00:00:00', '504073xxxxxx0778', '566', '566', 'N', '107.8', '180', '', '', '288/0', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('268', '20110975', 'HGHARWHAAR & SONS', 'purchase', '0000-00-00 00:00:00', '506962xxxxxx0374', '566', '566', 'N', '109.43', '377', '', '', '13/4', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('269', '20440138', 'NGUNUXDBVN LTD', 'purchase', '0000-00-00 00:00:00', '501088xxxxxx0736', '566', '566', 'N', '106.64', '398', 'kkic', '', '332/4', '1', 'Declined');
INSERT INTO `transactions` VALUES ('270', '22320534', 'NUQLTCBHFN LTD', 'purchase', '0000-00-00 00:00:00', '501498xxxxxx0972', '566', '566', 'N', '104.04', '154', 'trcrtixsfhasnxwemetnljdurwpmrfpfeelghwfjaekelvqqxpbiirwhdhxngnnqrdpoyw', '056629', '170/1', '0', 'Approved');
INSERT INTO `transactions` VALUES ('271', '20700992', 'HSKHXJOLYM & SONS', 'purchase', '0000-00-00 00:00:00', '404980xxxxxx0846', '566', '566', 'N', '104.29', '323', 'ouhpnxdswsxmsutqesgyipiktsrxunqwsuakuywejhsdnpf', '', '176/0', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('272', '20850609', 'CYFHREXPRK NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '502526xxxxxx0544', '566', '566', 'N', '101.32', '242', 'canmqtindwankfdwwbsfptppreqixxlmfeedsgfbyehymvdbvttuxehpgbjpycjhwcfgliyccqkpqmgxbdukvxe', '', '145/1', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('273', '20500035', 'KWEWKEEEQA NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409856xxxxxx0677', '566', '566', 'N', '108.43', '377', 'vjqbicruonkmdveptfrwrofuwaoujppagvopbwkhuentspfqssuppnipnvabhjkmttpisrdgtjxpfur', '', '433/0', '4', 'Declined');
INSERT INTO `transactions` VALUES ('274', '22140098', 'VSLTNNQPQW NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '506275xxxxxx0559', '566', '566', 'N', '109.05', '414', 'hxwvhxhvlbpdnnpxnrxflfikvlpvapvnjfvireguulmgabsacsoacfhw', '076095', '411/0', '0', 'Approved');
INSERT INTO `transactions` VALUES ('275', '20230167', 'UVILLRTVRV NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '402085xxxxxx0451', '566', '566', 'N', '101.63', '289', 'kiyuxidcqbjislyrrwvnsmsusdkekrpfihtwtpgkdypbctucanhwqcuyrqlhcvfqsijiriwvlvgkroykbpmw', '', '39/4', '1', 'Declined');
INSERT INTO `transactions` VALUES ('276', '20110695', 'VLMALQSBFR NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409587xxxxxx0933', '566', '566', 'N', '104.91', '165', '', '', '70/2', '3', 'Declined');
INSERT INTO `transactions` VALUES ('277', '20840172', 'SUYFWLSNHG NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '408335xxxxxx0385', '566', '566', 'N', '108.39', '166', 'qkiytgtqfsntxtlacor', '', '318/1', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('278', '20630733', 'RAUULTNWWQ LTD', 'purchase', '0000-00-00 00:00:00', '402344xxxxxx0596', '566', '566', 'N', '108.81', '109', 'oqcmcpfsngtfnetsyycpirhmkyhuoxlcmipk', '', '179/0', '3', 'Declined');
INSERT INTO `transactions` VALUES ('279', '20320903', 'TOCVJINXIQ LTD', 'purchase', '0000-00-00 00:00:00', '402591xxxxxx0922', '566', '566', 'N', '106.86', '171', '', '', '285/0', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('280', '20230860', 'UBBKMHBKUQ & SONS', 'purchase', '0000-00-00 00:00:00', '500665xxxxxx0257', '566', '566', 'N', '104.76', '200', '', '', '338/3', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('281', '20680208', 'SQSMXCKDBD LTD', 'purchase', '0000-00-00 00:00:00', '406859xxxxxx0320', '566', '566', 'N', '101.4', '316', 'vjapumilyetsccsqpmabmrebgijdixgpuaxwqqrdajwwehxpshykidf', '082287', '18/3', '0', 'Approved');
INSERT INTO `transactions` VALUES ('282', '20230802', 'HXRUPNJJMD & SONS', 'purchase', '0000-00-00 00:00:00', '501156xxxxxx0760', '566', '566', 'N', '100.79', '437', 'ycprfqvbcjuapgkvamxjluigwxvaectnuxmygmyhxjhpkvrwgofbflufmgwwgfguonwnsxuwgvyalhxugmqjibgrn', '', '221/2', '4', 'Declined');
INSERT INTO `transactions` VALUES ('283', '20400032', 'WHYVONNQXI NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '403891xxxxxx0969', '566', '566', 'N', '104.45', '84', 'wdcoaevgneiansxantvmkupvxoeenrqthh', '', '68/4', '1', 'Declined');
INSERT INTO `transactions` VALUES ('284', '20110515', 'IBOJLUNNKU LTD', 'purchase', '0000-00-00 00:00:00', '505144xxxxxx0581', '566', '566', 'N', '100.57', '275', '', '', '232/2', '4', 'Invalid transaction');
INSERT INTO `transactions` VALUES ('285', '20760724', 'YOEVRINCRS NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '507112xxxxxx0041', '566', '566', 'N', '104.09', '431', 'rmxooytekujwmhoborlibisssrgqarirxktdwtvibuaithqwgmqbblafxanpjhqcaxixolrxnrlykrosiefcp', '', '199/4', '1', 'Declined');
INSERT INTO `transactions` VALUES ('286', '22140703', 'AYXUVQDLIK NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409159xxxxxx0723', '566', '566', 'N', '100.48', '20', '', '', '309/0', '1', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('287', '22210219', 'MEPEUPBTXH & SONS', 'purchase', '0000-00-00 00:00:00', '508295xxxxxx0737', '566', '566', 'N', '103.46', '415', 'quspjmfgxqeaolvbgclcvyymiltthiotlwdbtwjolobtgrpvibmikhgmpvedksrbfegirfrvyjhvkbtsqrjiw', '', '167/1', '4', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('288', '22140234', 'AUXCJSXSCC & SONS', 'purchase', '0000-00-00 00:00:00', '502055xxxxxx0472', '566', '566', 'N', '102.49', '376', '', '087449', '400/4', '0', 'Approved');
INSERT INTO `transactions` VALUES ('289', '22320879', 'HYSTKBBPGW NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '407019xxxxxx0225', '566', '566', 'N', '107.9', '272', '', '', '54/2', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('290', '22320961', 'SPJOUIXRCH NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '402218xxxxxx0252', '566', '566', 'N', '102.24', '257', '', '', '37/4', '1', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('291', '20230856', 'BAWMRDLDJU & SONS', 'purchase', '0000-00-00 00:00:00', '408188xxxxxx0645', '566', '566', 'N', '104.38', '249', 'jbyedvsnmgpeu', '091991', '264/3', '0', 'Approved');
INSERT INTO `transactions` VALUES ('292', '20690083', 'UTEJVSSWPO NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '504299xxxxxx0894', '566', '566', 'N', '100.31', '478', '', '', '310/2', '1', 'PIN error');
INSERT INTO `transactions` VALUES ('293', '20500552', 'RWLHENAKHO NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '408093xxxxxx0759', '566', '566', 'N', '104.89', '385', 'oydwnfddfygjyichgtfkvrarifiyenkwyocwduqwitfmopwhsyghnpphkdnfnnhuxx', '027187', '12/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('294', '20560341', 'BOJWUUUEFX LTD', 'purchase', '0000-00-00 00:00:00', '400972xxxxxx0043', '566', '566', 'N', '109.96', '406', 'rjqlpbyioiatxycltsconvfnogjophcpqcsstvlolwwdewnoxdqvcdhuoma', '', '50/2', '1', 'Declined');
INSERT INTO `transactions` VALUES ('295', '20350512', 'XAILUKOSYQ & SONS', 'purchase', '0000-00-00 00:00:00', '503509xxxxxx0910', '566', '566', 'N', '109.81', '205', 'txflogralouqbffiyjqbgsgwnbyidpkokvf', '041899', '96/2', '0', 'Approved');
INSERT INTO `transactions` VALUES ('296', '20690353', 'MBTLHKEJCY NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '408235xxxxxx0434', '566', '566', 'N', '105.77', '60', 'lywgmgprkwkhegoycbcvnnegxxdpuektpk', '', '154/4', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('297', '20320657', 'VUDBDQCOOX NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '507861xxxxxx0922', '566', '566', 'N', '104.88', '388', 'uljvxmwdgybbagaobx', '', '105/2', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('298', '20630746', 'VFTXUAFTMF NIGERIA LTD', 'purchase', '0000-00-00 00:00:00', '409830xxxxxx0493', '566', '566', 'N', '109.13', '330', '', '', '453/3', '4', 'PIN error');
INSERT INTO `transactions` VALUES ('299', '22210724', 'IREDNONABI LTD', 'purchase', '0000-00-00 00:00:00', '404216xxxxxx0666', '566', '566', 'N', '108.78', '77', '', '032726', '227/4', '0', 'Approved');
INSERT INTO `transactions` VALUES ('300', '20330215', 'EKXYFUOXHP & SONS', 'purchase', '0000-00-00 00:00:00', '505983xxxxxx0422', '566', '566', 'N', '106.24', '432', 'bmpvtwsyqaewsokvmiwfpukujwxwnqwucrnawmksydufsfimrtboadoqnbjadynekattlhplaxklejvsxyi', '', '156/3', '3', 'Issuer Switch Inoperative');
INSERT INTO `transactions` VALUES ('301', '22210197', 'NYLPLNSETE & SONS', 'purchase', '0000-00-00 00:00:00', '400463xxxxxx0774', '566', '566', 'N', '100.02', '46', 'lkfqoldhaotxbwitqqwrnowfdmdrvtvqskyvgbtqgmufu', '', '496/3', '3', 'PIN error');
INSERT INTO `transactions` VALUES ('302', '20400723', 'JJSDRSUSDC & SONS', 'purchase', '0000-00-00 00:00:00', '402660xxxxxx0219', '566', '566', 'N', '105.75', '478', 'heyorqtxecsxpxbrismmrycnruouirklgbvtiuntertssddejjfsbpkjgejvkylvxcvdsypyykwtioebbmgtusarlpnaknrtt', '', '276/4', '4', 'Invalid transaction');
INSERT INTO `user_group_permissions` VALUES ('532', '1', 'UserGroups', 'deleteGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('533', '2', 'UserGroups', 'deleteGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('534', '3', 'UserGroups', 'deleteGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('535', '1', 'UserGroups', 'editGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('536', '2', 'UserGroups', 'editGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('537', '3', 'UserGroups', 'editGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('538', '1', 'UserGroups', 'addGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('539', '2', 'UserGroups', 'addGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('540', '3', 'UserGroups', 'addGroup', '1');
INSERT INTO `user_group_permissions` VALUES ('541', '1', 'UserGroups', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('542', '2', 'UserGroups', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('543', '3', 'UserGroups', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('544', '1', 'UserGroupPermissions', 'update', '1');
INSERT INTO `user_group_permissions` VALUES ('545', '2', 'UserGroupPermissions', 'update', '0');
INSERT INTO `user_group_permissions` VALUES ('546', '3', 'UserGroupPermissions', 'update', '0');
INSERT INTO `user_group_permissions` VALUES ('547', '1', 'UserGroupPermissions', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('548', '2', 'UserGroupPermissions', 'index', '0');
INSERT INTO `user_group_permissions` VALUES ('549', '3', 'UserGroupPermissions', 'index', '0');
INSERT INTO `user_group_permissions` VALUES ('550', '1', 'AclPermissions', 'admin_toggle', '1');
INSERT INTO `user_group_permissions` VALUES ('551', '2', 'AclPermissions', 'admin_toggle', '1');
INSERT INTO `user_group_permissions` VALUES ('552', '3', 'AclPermissions', 'admin_toggle', '1');
INSERT INTO `user_group_permissions` VALUES ('553', '1', 'AclPermissions', 'admin_index', '1');
INSERT INTO `user_group_permissions` VALUES ('554', '2', 'AclPermissions', 'admin_index', '1');
INSERT INTO `user_group_permissions` VALUES ('555', '3', 'AclPermissions', 'admin_index', '1');
INSERT INTO `user_group_permissions` VALUES ('556', '1', 'AclActions', 'admin_generate', '1');
INSERT INTO `user_group_permissions` VALUES ('557', '2', 'AclActions', 'admin_generate', '1');
INSERT INTO `user_group_permissions` VALUES ('558', '3', 'AclActions', 'admin_generate', '1');
INSERT INTO `user_group_permissions` VALUES ('559', '1', 'AclActions', 'admin_move', '1');
INSERT INTO `user_group_permissions` VALUES ('560', '2', 'AclActions', 'admin_move', '1');
INSERT INTO `user_group_permissions` VALUES ('561', '3', 'AclActions', 'admin_move', '1');
INSERT INTO `user_group_permissions` VALUES ('562', '1', 'AclActions', 'admin_delete', '1');
INSERT INTO `user_group_permissions` VALUES ('563', '2', 'AclActions', 'admin_delete', '1');
INSERT INTO `user_group_permissions` VALUES ('564', '3', 'AclActions', 'admin_delete', '1');
INSERT INTO `user_group_permissions` VALUES ('565', '1', 'AclActions', 'admin_edit', '1');
INSERT INTO `user_group_permissions` VALUES ('566', '2', 'AclActions', 'admin_edit', '1');
INSERT INTO `user_group_permissions` VALUES ('567', '3', 'AclActions', 'admin_edit', '1');
INSERT INTO `user_group_permissions` VALUES ('568', '1', 'AclActions', 'admin_add', '1');
INSERT INTO `user_group_permissions` VALUES ('569', '2', 'AclActions', 'admin_add', '1');
INSERT INTO `user_group_permissions` VALUES ('570', '3', 'AclActions', 'admin_add', '1');
INSERT INTO `user_group_permissions` VALUES ('571', '1', 'AclActions', 'admin_index', '1');
INSERT INTO `user_group_permissions` VALUES ('572', '2', 'AclActions', 'admin_index', '1');
INSERT INTO `user_group_permissions` VALUES ('573', '3', 'AclActions', 'admin_index', '1');
INSERT INTO `user_group_permissions` VALUES ('574', '1', 'Users', 'delete', '1');
INSERT INTO `user_group_permissions` VALUES ('575', '2', 'Users', 'delete', '1');
INSERT INTO `user_group_permissions` VALUES ('576', '3', 'Users', 'delete', '1');
INSERT INTO `user_group_permissions` VALUES ('577', '1', 'Users', 'editMyprofile', '1');
INSERT INTO `user_group_permissions` VALUES ('578', '2', 'Users', 'editMyprofile', '1');
INSERT INTO `user_group_permissions` VALUES ('579', '3', 'Users', 'editMyprofile', '1');
INSERT INTO `user_group_permissions` VALUES ('580', '1', 'Users', 'change_password', '1');
INSERT INTO `user_group_permissions` VALUES ('581', '2', 'Users', 'change_password', '1');
INSERT INTO `user_group_permissions` VALUES ('582', '3', 'Users', 'change_password', '1');
INSERT INTO `user_group_permissions` VALUES ('583', '1', 'Users', 'edit', '1');
INSERT INTO `user_group_permissions` VALUES ('584', '2', 'Users', 'edit', '1');
INSERT INTO `user_group_permissions` VALUES ('585', '3', 'Users', 'edit', '1');
INSERT INTO `user_group_permissions` VALUES ('586', '1', 'Users', 'add', '1');
INSERT INTO `user_group_permissions` VALUES ('587', '2', 'Users', 'add', '1');
INSERT INTO `user_group_permissions` VALUES ('588', '3', 'Users', 'add', '1');
INSERT INTO `user_group_permissions` VALUES ('589', '1', 'Users', 'logout', '1');
INSERT INTO `user_group_permissions` VALUES ('590', '2', 'Users', 'logout', '1');
INSERT INTO `user_group_permissions` VALUES ('591', '3', 'Users', 'logout', '1');
INSERT INTO `user_group_permissions` VALUES ('592', '1', 'Users', 'view', '1');
INSERT INTO `user_group_permissions` VALUES ('593', '2', 'Users', 'view', '1');
INSERT INTO `user_group_permissions` VALUES ('594', '3', 'Users', 'view', '1');
INSERT INTO `user_group_permissions` VALUES ('595', '1', 'Users', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('596', '2', 'Users', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('597', '3', 'Users', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('598', '1', 'Users', 'login', '1');
INSERT INTO `user_group_permissions` VALUES ('599', '2', 'Users', 'login', '1');
INSERT INTO `user_group_permissions` VALUES ('600', '3', 'Users', 'login', '1');
INSERT INTO `user_group_permissions` VALUES ('601', '1', 'Pages', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('602', '2', 'Pages', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('603', '3', 'Pages', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('604', '1', 'UserOnlines', 'tong_so_truy_cap', '1');
INSERT INTO `user_group_permissions` VALUES ('605', '2', 'UserOnlines', 'tong_so_truy_cap', '1');
INSERT INTO `user_group_permissions` VALUES ('606', '3', 'UserOnlines', 'tong_so_truy_cap', '1');
INSERT INTO `user_group_permissions` VALUES ('607', '1', 'UserOnlines', 'soluong', '1');
INSERT INTO `user_group_permissions` VALUES ('608', '2', 'UserOnlines', 'soluong', '1');
INSERT INTO `user_group_permissions` VALUES ('609', '3', 'UserOnlines', 'soluong', '1');
INSERT INTO `user_group_permissions` VALUES ('610', '1', 'Pages', 'home', '1');
INSERT INTO `user_group_permissions` VALUES ('611', '2', 'Pages', 'home', '1');
INSERT INTO `user_group_permissions` VALUES ('612', '3', 'Pages', 'home', '1');
INSERT INTO `user_group_permissions` VALUES ('613', '1', 'Menus', 'get_menu_selected', '1');
INSERT INTO `user_group_permissions` VALUES ('614', '2', 'Menus', 'get_menu_selected', '1');
INSERT INTO `user_group_permissions` VALUES ('615', '3', 'Menus', 'get_menu_selected', '1');
INSERT INTO `user_group_permissions` VALUES ('616', '1', 'Menus', 'get_link_menus', '1');
INSERT INTO `user_group_permissions` VALUES ('617', '2', 'Menus', 'get_link_menus', '1');
INSERT INTO `user_group_permissions` VALUES ('618', '3', 'Menus', 'get_link_menus', '1');
INSERT INTO `user_group_permissions` VALUES ('619', '1', 'Menus', 'get_parent_menu_left', '1');
INSERT INTO `user_group_permissions` VALUES ('620', '2', 'Menus', 'get_parent_menu_left', '1');
INSERT INTO `user_group_permissions` VALUES ('621', '3', 'Menus', 'get_parent_menu_left', '1');
INSERT INTO `user_group_permissions` VALUES ('622', '1', 'Menus', 'get_child_menu', '1');
INSERT INTO `user_group_permissions` VALUES ('623', '2', 'Menus', 'get_child_menu', '1');
INSERT INTO `user_group_permissions` VALUES ('624', '3', 'Menus', 'get_child_menu', '1');
INSERT INTO `user_group_permissions` VALUES ('625', '1', 'Menus', 'unPublished', '1');
INSERT INTO `user_group_permissions` VALUES ('626', '2', 'Menus', 'unPublished', '1');
INSERT INTO `user_group_permissions` VALUES ('627', '3', 'Menus', 'unPublished', '1');
INSERT INTO `user_group_permissions` VALUES ('628', '1', 'Menus', 'On_Off', '1');
INSERT INTO `user_group_permissions` VALUES ('629', '2', 'Menus', 'On_Off', '1');
INSERT INTO `user_group_permissions` VALUES ('630', '3', 'Menus', 'On_Off', '1');
INSERT INTO `user_group_permissions` VALUES ('631', '1', 'Menus', 'get_parent_menu', '1');
INSERT INTO `user_group_permissions` VALUES ('632', '2', 'Menus', 'get_parent_menu', '1');
INSERT INTO `user_group_permissions` VALUES ('633', '3', 'Menus', 'get_parent_menu', '1');
INSERT INTO `user_group_permissions` VALUES ('634', '1', 'Menus', 'actived', '1');
INSERT INTO `user_group_permissions` VALUES ('635', '2', 'Menus', 'actived', '1');
INSERT INTO `user_group_permissions` VALUES ('636', '3', 'Menus', 'actived', '1');
INSERT INTO `user_group_permissions` VALUES ('637', '1', 'Menus', 'unActived', '1');
INSERT INTO `user_group_permissions` VALUES ('638', '2', 'Menus', 'unActived', '1');
INSERT INTO `user_group_permissions` VALUES ('639', '3', 'Menus', 'unActived', '1');
INSERT INTO `user_group_permissions` VALUES ('640', '1', 'Menus', 'published', '1');
INSERT INTO `user_group_permissions` VALUES ('641', '2', 'Menus', 'published', '1');
INSERT INTO `user_group_permissions` VALUES ('642', '3', 'Menus', 'published', '1');
INSERT INTO `user_group_permissions` VALUES ('643', '1', 'Menus', 'nhap_link', '1');
INSERT INTO `user_group_permissions` VALUES ('644', '2', 'Menus', 'nhap_link', '1');
INSERT INTO `user_group_permissions` VALUES ('645', '3', 'Menus', 'nhap_link', '1');
INSERT INTO `user_group_permissions` VALUES ('646', '1', 'Menus', 'order', '1');
INSERT INTO `user_group_permissions` VALUES ('647', '2', 'Menus', 'order', '1');
INSERT INTO `user_group_permissions` VALUES ('648', '3', 'Menus', 'order', '1');
INSERT INTO `user_group_permissions` VALUES ('649', '1', 'Menus', 'rows', '1');
INSERT INTO `user_group_permissions` VALUES ('650', '2', 'Menus', 'rows', '1');
INSERT INTO `user_group_permissions` VALUES ('651', '3', 'Menus', 'rows', '1');
INSERT INTO `user_group_permissions` VALUES ('652', '1', 'Menus', 'chon_module', '1');
INSERT INTO `user_group_permissions` VALUES ('653', '2', 'Menus', 'chon_module', '1');
INSERT INTO `user_group_permissions` VALUES ('654', '3', 'Menus', 'chon_module', '1');
INSERT INTO `user_group_permissions` VALUES ('655', '1', 'Menus', 'chon_danhmuc', '1');
INSERT INTO `user_group_permissions` VALUES ('656', '2', 'Menus', 'chon_danhmuc', '1');
INSERT INTO `user_group_permissions` VALUES ('657', '3', 'Menus', 'chon_danhmuc', '1');
INSERT INTO `user_group_permissions` VALUES ('658', '1', 'Menus', 'chon_baiviet', '1');
INSERT INTO `user_group_permissions` VALUES ('659', '2', 'Menus', 'chon_baiviet', '1');
INSERT INTO `user_group_permissions` VALUES ('660', '3', 'Menus', 'chon_baiviet', '1');
INSERT INTO `user_group_permissions` VALUES ('661', '1', 'Menus', 'delete', '1');
INSERT INTO `user_group_permissions` VALUES ('662', '2', 'Menus', 'delete', '1');
INSERT INTO `user_group_permissions` VALUES ('663', '3', 'Menus', 'delete', '1');
INSERT INTO `user_group_permissions` VALUES ('664', '1', 'Menus', 'view', '1');
INSERT INTO `user_group_permissions` VALUES ('665', '2', 'Menus', 'view', '1');
INSERT INTO `user_group_permissions` VALUES ('666', '3', 'Menus', 'view', '1');
INSERT INTO `user_group_permissions` VALUES ('667', '1', 'Menus', 'add', '1');
INSERT INTO `user_group_permissions` VALUES ('668', '2', 'Menus', 'add', '1');
INSERT INTO `user_group_permissions` VALUES ('669', '3', 'Menus', 'add', '1');
INSERT INTO `user_group_permissions` VALUES ('670', '1', 'Menus', 'edit', '1');
INSERT INTO `user_group_permissions` VALUES ('671', '2', 'Menus', 'edit', '1');
INSERT INTO `user_group_permissions` VALUES ('672', '3', 'Menus', 'edit', '1');
INSERT INTO `user_group_permissions` VALUES ('673', '1', 'Configs', 'add', '1');
INSERT INTO `user_group_permissions` VALUES ('674', '2', 'Configs', 'add', '1');
INSERT INTO `user_group_permissions` VALUES ('675', '3', 'Configs', 'add', '1');
INSERT INTO `user_group_permissions` VALUES ('676', '1', 'Configs', 'edit', '1');
INSERT INTO `user_group_permissions` VALUES ('677', '2', 'Configs', 'edit', '1');
INSERT INTO `user_group_permissions` VALUES ('678', '3', 'Configs', 'edit', '1');
INSERT INTO `user_group_permissions` VALUES ('679', '1', 'Configs', 'delete', '1');
INSERT INTO `user_group_permissions` VALUES ('680', '2', 'Configs', 'delete', '1');
INSERT INTO `user_group_permissions` VALUES ('681', '3', 'Configs', 'delete', '1');
INSERT INTO `user_group_permissions` VALUES ('682', '1', 'Menus', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('683', '2', 'Menus', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('684', '3', 'Menus', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('685', '1', 'Configs', 'get_title', '1');
INSERT INTO `user_group_permissions` VALUES ('686', '2', 'Configs', 'get_title', '1');
INSERT INTO `user_group_permissions` VALUES ('687', '3', 'Configs', 'get_title', '1');
INSERT INTO `user_group_permissions` VALUES ('688', '1', 'Configs', 'view', '1');
INSERT INTO `user_group_permissions` VALUES ('689', '2', 'Configs', 'view', '1');
INSERT INTO `user_group_permissions` VALUES ('690', '3', 'Configs', 'view', '1');
INSERT INTO `user_group_permissions` VALUES ('691', '1', 'Configs', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('692', '2', 'Configs', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('693', '3', 'Configs', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('694', '1', 'App', 'online', '1');
INSERT INTO `user_group_permissions` VALUES ('695', '2', 'App', 'online', '1');
INSERT INTO `user_group_permissions` VALUES ('696', '3', 'App', 'online', '1');
INSERT INTO `user_group_permissions` VALUES ('697', '1', 'App', 'menuLeft', '1');
INSERT INTO `user_group_permissions` VALUES ('698', '2', 'App', 'menuLeft', '1');
INSERT INTO `user_group_permissions` VALUES ('699', '3', 'App', 'menuLeft', '1');
INSERT INTO `user_group_permissions` VALUES ('700', '1', 'App', 'menuMain', '1');
INSERT INTO `user_group_permissions` VALUES ('701', '2', 'App', 'menuMain', '1');
INSERT INTO `user_group_permissions` VALUES ('702', '3', 'App', 'menuMain', '1');
INSERT INTO `user_group_permissions` VALUES ('703', '1', 'App', 'page_intro', '1');
INSERT INTO `user_group_permissions` VALUES ('704', '2', 'App', 'page_intro', '1');
INSERT INTO `user_group_permissions` VALUES ('705', '3', 'App', 'page_intro', '1');
INSERT INTO `user_group_permissions` VALUES ('706', '1', 'Admin', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('707', '2', 'Admin', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('708', '3', 'Admin', 'index', '1');
INSERT INTO `user_group_permissions` VALUES ('709', '1', 'Users', 'emailVerification', '1');
INSERT INTO `user_group_permissions` VALUES ('710', '2', 'Users', 'emailVerification', '1');
INSERT INTO `user_group_permissions` VALUES ('711', '3', 'Users', 'emailVerification', '1');
INSERT INTO `user_group_permissions` VALUES ('712', '1', 'Users', 'activatePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('713', '2', 'Users', 'activatePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('714', '3', 'Users', 'activatePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('715', '1', 'Users', 'forgotPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('716', '2', 'Users', 'forgotPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('717', '3', 'Users', 'forgotPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('718', '1', 'Users', 'userVerification', '1');
INSERT INTO `user_group_permissions` VALUES ('719', '2', 'Users', 'userVerification', '1');
INSERT INTO `user_group_permissions` VALUES ('720', '3', 'Users', 'userVerification', '1');
INSERT INTO `user_group_permissions` VALUES ('721', '1', 'Users', 'accessDenied', '1');
INSERT INTO `user_group_permissions` VALUES ('722', '2', 'Users', 'accessDenied', '1');
INSERT INTO `user_group_permissions` VALUES ('723', '3', 'Users', 'accessDenied', '1');
INSERT INTO `user_group_permissions` VALUES ('724', '1', 'Users', 'verifyEmail', '1');
INSERT INTO `user_group_permissions` VALUES ('725', '2', 'Users', 'verifyEmail', '1');
INSERT INTO `user_group_permissions` VALUES ('726', '3', 'Users', 'verifyEmail', '1');
INSERT INTO `user_group_permissions` VALUES ('727', '1', 'Users', 'makeActiveInactive', '1');
INSERT INTO `user_group_permissions` VALUES ('728', '2', 'Users', 'makeActiveInactive', '1');
INSERT INTO `user_group_permissions` VALUES ('729', '3', 'Users', 'makeActiveInactive', '1');
INSERT INTO `user_group_permissions` VALUES ('730', '1', 'Users', 'dashboard', '1');
INSERT INTO `user_group_permissions` VALUES ('731', '2', 'Users', 'dashboard', '1');
INSERT INTO `user_group_permissions` VALUES ('732', '3', 'Users', 'dashboard', '1');
INSERT INTO `user_group_permissions` VALUES ('733', '1', 'Users', 'deleteUser', '1');
INSERT INTO `user_group_permissions` VALUES ('734', '2', 'Users', 'deleteUser', '1');
INSERT INTO `user_group_permissions` VALUES ('735', '3', 'Users', 'deleteUser', '1');
INSERT INTO `user_group_permissions` VALUES ('736', '1', 'Users', 'editUser', '1');
INSERT INTO `user_group_permissions` VALUES ('737', '2', 'Users', 'editUser', '1');
INSERT INTO `user_group_permissions` VALUES ('738', '3', 'Users', 'editUser', '1');
INSERT INTO `user_group_permissions` VALUES ('739', '1', 'Users', 'createList', '1');
INSERT INTO `user_group_permissions` VALUES ('740', '2', 'Users', 'createList', '1');
INSERT INTO `user_group_permissions` VALUES ('741', '3', 'Users', 'createList', '1');
INSERT INTO `user_group_permissions` VALUES ('742', '1', 'Users', 'addUser', '1');
INSERT INTO `user_group_permissions` VALUES ('743', '2', 'Users', 'addUser', '1');
INSERT INTO `user_group_permissions` VALUES ('744', '3', 'Users', 'addUser', '1');
INSERT INTO `user_group_permissions` VALUES ('745', '1', 'Users', 'changeUserPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('746', '2', 'Users', 'changeUserPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('747', '3', 'Users', 'changeUserPassword', '1');
INSERT INTO `user_group_permissions` VALUES ('748', '1', 'Users', 'changePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('749', '2', 'Users', 'changePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('750', '3', 'Users', 'changePassword', '1');
INSERT INTO `user_group_permissions` VALUES ('751', '1', 'Users', 'register', '1');
INSERT INTO `user_group_permissions` VALUES ('752', '2', 'Users', 'register', '1');
INSERT INTO `user_group_permissions` VALUES ('753', '3', 'Users', 'register', '1');
INSERT INTO `user_group_permissions` VALUES ('754', '1', 'Users', 'myprofile', '1');
INSERT INTO `user_group_permissions` VALUES ('755', '2', 'Users', 'myprofile', '1');
INSERT INTO `user_group_permissions` VALUES ('756', '3', 'Users', 'myprofile', '1');
INSERT INTO `user_group_permissions` VALUES ('757', '1', 'Users', 'viewUser', '1');
INSERT INTO `user_group_permissions` VALUES ('758', '2', 'Users', 'viewUser', '1');
INSERT INTO `user_group_permissions` VALUES ('759', '3', 'Users', 'viewUser', '1');
INSERT INTO `user_groups` VALUES ('1', 'Admin', 'Admin', '0', '2013-02-25 10:44:05', '2013-02-25 10:44:05');
INSERT INTO `user_groups` VALUES ('2', 'Manage', 'Manage', '1', '2013-02-25 10:44:05', '2013-02-25 10:44:05');
INSERT INTO `user_groups` VALUES ('3', 'User', 'User', '1', '2013-03-13 10:59:27', '2013-03-13 10:59:31');
INSERT INTO `user_onlines` VALUES ('326', 'uqpgdr7dr8p2ig1c98ke8f92t3', '2013-09-30 10:24:22', '1380551974');
INSERT INTO `users` VALUES ('1', '1', 'admin', 'a234f5a491041717f026d1e7a89f719b', '625abd8c286945c3fc5bd13acb0f176b', 'admin@admin.com', '', 'Quan ly canh', '1', '1', '', '2013-02-25 10:44:05', '2013-09-27 00:18:05');
INSERT INTO `users` VALUES ('933', '2', 'lhcanh', '1c2e42de3d9e132d8c9c65f7e1fe2466', '2d705902550aea2a63b6149569450f31', 'hoaicanhqt@gmail.com', null, 'LÆ°Æ¡ng HoÃ i Cáº£nh', '1', '1', null, '2013-09-26 15:03:47', '2013-09-26 15:03:47');
INSERT INTO `users` VALUES ('934', '3', 'user1', 'e3114318f90ce57db3371d1e65d5dbde', '1ae0dc2a9fc472da9fcc6d794965783f', 'user@pointofsale.com', null, 'User 1', '1', '1', null, '2013-09-27 15:18:23', '2013-09-27 15:18:23');
