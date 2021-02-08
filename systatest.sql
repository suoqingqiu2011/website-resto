# MySQL-Front 3.2  (Build 10.33)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;

/*!40101 SET NAMES utf8 */;
/*!40103 SET TIME_ZONE='SYSTEM' */;

# Host: localhost    Database: systatest
# ------------------------------------------------------
# Server version 5.0.67-community-nt

#
# Table structure for table admin
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `AdminID` int(4) NOT NULL auto_increment,
  `AdminUser` varchar(100) NOT NULL default '',
  `AdminPsw` varchar(100) NOT NULL default '',
  `Niveau` int(2) NOT NULL default '1',
  `RegDate` datetime NOT NULL default '0000-00-00 00:00:00',
  UNIQUE KEY `AdminID` (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Dumping data for table admin
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `admin` VALUES (1,'1','1',1,'0000-00-00 00:00:00');
INSERT INTO `admin` VALUES (2,'2','2',2,'0000-00-00 00:00:00');
INSERT INTO `admin` VALUES (3,'3','3',3,'0000-00-00 00:00:00');
INSERT INTO `admin` VALUES (4,'4','4',4,'0000-00-00 00:00:00');

/*!40101 SET NAMES utf8 */;

#
# Table structure for table clientinfo
#

DROP TABLE IF EXISTS `clientinfo`;
CREATE TABLE `clientinfo` (
  `ClientID` int(4) NOT NULL auto_increment,
  `Telephone` varchar(20) NOT NULL default '',
  `Sex` int(4) NOT NULL default '1',
  `Nom` varchar(100) NOT NULL default '',
  `Adresse` varchar(200) NOT NULL default '',
  `Email` varchar(200) default NULL,
  `Ville` varchar(50) default NULL,
  `Post` varchar(50) default NULL,
  `Batement` varchar(50) default NULL,
  `Escalier` varchar(50) default NULL,
  `Etage` varchar(50) default NULL,
  `Porte` varchar(50) default NULL,
  `Code1` varchar(20) default NULL,
  `Code2` varchar(20) default NULL,
  `IntPhone` varchar(20) default NULL,
  `Notes` text,
  `Date` date default '0000-00-00',
  `Company` varchar(30) default NULL,
  `NumRue` varchar(20) default NULL,
  `Telephone2` varchar(20) default NULL,
  `Notes2` text,
  PRIMARY KEY  (`ClientID`),
  UNIQUE KEY `Telephone` (`Telephone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table clientinfo
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table commanddetail20
#

DROP TABLE IF EXISTS `commanddetail20`;
CREATE TABLE `commanddetail20` (
  `CommandID` int(10) NOT NULL default '0',
  `CmdCode` varchar(50) NOT NULL default '',
  `CmdName` varchar(200) NOT NULL default '',
  `CmdNum` int(4) NOT NULL default '1',
  `CmdMontant` float NOT NULL default '0',
  `CmdType` varchar(10) NOT NULL default '',
  `CmdPrix` float NOT NULL default '0',
  `CmdOffert` int(2) NOT NULL default '0',
  `CmdID` int(4) NOT NULL auto_increment,
  `Printer1` int(1) NOT NULL default '1',
  `Printer2` int(1) NOT NULL default '0',
  `Printer3` int(1) NOT NULL default '0',
  `Printer4` int(1) NOT NULL default '0',
  `CmdRemise` float NOT NULL default '0',
  `f3-cuisine` int(1) NOT NULL default '0' COMMENT 'pour imprimer dans la cuisine que une seule fois,version cui',
  `n_Remise` int(1) default '0' COMMENT '01082009 AJOUTER pour plat ne fait pas de remise',
  `CmdDetail` int(1) NOT NULL default '0' COMMENT 'lang ajouter pour menu detail 2009 09 20',
  `Rmse` float default '1' COMMENT 'lang le 2010 05 07 remise en % pour mag et resto',
  PRIMARY KEY  (`CmdID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Dumping data for table commanddetail20
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `commanddetail20` VALUES (1,'00','test1',1,20,'',20,0,1,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'01','TEST2',1,21,'',21,0,2,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'02','test3',1,40,'',40,0,3,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'00','test1',1,20,'',20,0,4,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'01','TEST2',1,21,'',21,0,5,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'02','test3',1,40,'',40,0,6,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'00','test1',1,20,'',20,0,7,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'01','TEST2',1,21,'',21,0,8,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'00','test1',1,20,'',20,0,9,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'01','TEST2',1,21,'',21,0,10,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'02','test3',1,40,'',40,0,11,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'00','test1',1,20,'',20,0,12,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'01','TEST2',1,21,'',21,0,13,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'00','test1',1,20,'',20,0,14,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'02','test3',1,40,'',40,0,15,1,0,0,0,0,0,0,0,1);
INSERT INTO `commanddetail20` VALUES (1,'22','tyhrtytyttuy',9,450,'',50,0,16,1,0,0,0,0,0,0,0,1);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table commandinfo20
#

DROP TABLE IF EXISTS `commandinfo20`;
CREATE TABLE `commandinfo20` (
  `CommandID` int(4) NOT NULL auto_increment,
  `ClientTel` varchar(20) default NULL,
  `Montant` float default '0',
  `Cash` float default '0',
  `Cheque` float default '0',
  `Ticket` float default '0',
  `Time` time NOT NULL default '00:00:00',
  `Day` char(2) NOT NULL default '',
  `Month` char(2) NOT NULL default '',
  `Year` year(4) NOT NULL default '0000',
  `Carte` float default '0',
  `OrderNum` varchar(5) default NULL,
  `Type` varchar(10) NOT NULL COMMENT '12',
  `Check` int(1) NOT NULL default '0',
  `Coloture` int(2) default '0',
  `Person` int(4) default '1',
  `Differer` float NOT NULL default '0',
  `Num` int(3) NOT NULL default '1',
  `MontantBrut` float NOT NULL default '0',
  `Imprimer` int(2) NOT NULL default '0',
  `Modify` int(1) NOT NULL default '0',
  `Livreur` varchar(20) default NULL,
  `Machine` varchar(20) NOT NULL default 'DEFAULT',
  `Reserver` int(1) NOT NULL default '0',
  `ResvName` varchar(50) default NULL,
  `ResvFumer` int(1) default '0',
  `Facture` int(1) default '0',
  `Autre` float default '0',
  `NumeroTic` varchar(10) NOT NULL default '',
  `AlloR` float default '0' COMMENT '29 plus de mode de paiment',
  `ChronoR` float default '0' COMMENT 'plus de mode paiment',
  `RueR` float default '0' COMMENT 'PLUS DE MODE DE PAIMENT',
  `remise` float default '1' COMMENT 'LANG ajouter le 2010 05 17',
  `CmdDate` varchar(20) default NULL COMMENT 'pour alex',
  PRIMARY KEY  (`CommandID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Dumping data for table commandinfo20
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `commandinfo20` VALUES (1,'',81,0,0,0,'19:10:58','22','06','2017',0,'1','sur place',0,0,5,0,81,0,0,0,'','',0,'',0,0,0,'',0,0,0,0,'2017-06-26');
INSERT INTO `commandinfo20` VALUES (2,'',81,0,0,0,'12:45:09','22','06','2017',0,'1','sur place',0,0,5,0,81,0,0,0,'','',0,'',0,0,0,'',0,0,0,0,'2017-06-27');
INSERT INTO `commandinfo20` VALUES (3,'',41,0,0,0,'17:22:25','22','06','2017',0,'1','sur place',0,0,5,0,41,0,0,0,'','',0,'',0,0,0,'',0,0,0,0,'2017-06-27');
INSERT INTO `commandinfo20` VALUES (4,'',81,0,0,0,'18:53:01','22','06','2017',0,'1','sur place',0,0,5,0,81,0,0,0,'','',0,'',0,0,0,'',0,0,0,0,'2017-06-27');
INSERT INTO `commandinfo20` VALUES (5,'',41,0,0,0,'18:56:49','22','06','2017',0,'1','sur place',0,0,5,0,41,0,0,0,'','',0,'',0,0,0,'',0,0,0,0,'2017-06-27');
INSERT INTO `commandinfo20` VALUES (6,'',20,0,0,0,'18:57:25','22','06','2017',0,'1','sur place',0,0,5,0,20,0,0,0,'','',0,'',0,0,0,'',0,0,0,0,'2017-06-27');
INSERT INTO `commandinfo20` VALUES (7,'',40,0,0,0,'18:58:35','22','06','2017',0,'1','sur place',0,0,5,0,40,0,0,0,'','',0,'',0,0,0,'',0,0,0,0,'2017-06-27');
INSERT INTO `commandinfo20` VALUES (8,'',450,0,0,0,'16:19:19','22','06','2017',0,'1','sur place',0,0,5,0,450,0,0,0,'','',0,'',0,0,0,'',0,0,0,0,'2017-07-05');

/*!40101 SET NAMES utf8 */;

#
# Table structure for table email
#

DROP TABLE IF EXISTS `email`;
CREATE TABLE `email` (
  `MsgID` int(4) NOT NULL auto_increment,
  `MsgCode` int(4) default NULL,
  `MsgContent` text,
  UNIQUE KEY `MsgID` (`MsgID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table email
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table famille_list
#

DROP TABLE IF EXISTS `famille_list`;
CREATE TABLE `famille_list` (
  `id` int(11) NOT NULL auto_increment,
  `famille_id` int(11) default NULL,
  `sous_famille_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Dumping data for table famille_list
#


#
# Table structure for table fidelite_resto
#

DROP TABLE IF EXISTS `fidelite_resto`;
CREATE TABLE `fidelite_resto` (
  `RestoID` int(11) NOT NULL default '0',
  `Depense` int(11) NOT NULL default '0',
  `GainPts` int(11) NOT NULL default '0',
  `CoutPts` int(11) NOT NULL default '0',
  `Reduc` int(11) NOT NULL default '0',
  `Limite` int(1) NOT NULL default '0',
  PRIMARY KEY  (`RestoID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Dumping data for table fidelite_resto
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table fidelite_user
#

DROP TABLE IF EXISTS `fidelite_user`;
CREATE TABLE `fidelite_user` (
  `UserID` int(11) NOT NULL default '0',
  `RestoID` int(11) NOT NULL default '0',
  `Somme` float NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Dumping data for table fidelite_user
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `fidelite_user` VALUES (0,1,916);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table fournisseur
#

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE `fournisseur` (
  `FourID` int(11) NOT NULL auto_increment,
  `CodeFour` varchar(30) default NULL,
  `Telephone` varchar(20) default NULL,
  `Societe` varchar(50) default NULL,
  `Nom` varchar(30) default NULL,
  `Prenom` varchar(30) default NULL,
  `Adresse` varchar(200) default NULL,
  `Poste` varchar(15) default NULL,
  `Ville` varchar(20) default NULL,
  `Code` varchar(20) default NULL,
  `Batiment` varchar(30) default NULL,
  `Etage` varchar(20) default NULL,
  `Porte` varchar(20) default NULL,
  `Escalier` varchar(20) default NULL,
  `Interphone` varchar(30) default NULL,
  `Note` text,
  `RegDate` date default NULL,
  PRIMARY KEY  (`FourID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table fournisseur
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table gg_systa
#

DROP TABLE IF EXISTS `gg_systa`;
CREATE TABLE `gg_systa` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `picurl` varchar(255) NOT NULL,
  `classid` int(8) unsigned NOT NULL,
  `ordre` int(1) NOT NULL,
  `Nom_co` varchar(255) NOT NULL,
  `Adresse_co` varchar(255) NOT NULL,
  `Tel_co` varchar(255) NOT NULL,
  `BeginDate` date default '0000-00-00',
  `EndDate` date default '0000-00-00',
  `Commentaire` varchar(255) default NULL,
  `Activer` int(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

#
# Dumping data for table gg_systa
#


#
# Table structure for table horaire_livr_exception
#

DROP TABLE IF EXISTS `horaire_livr_exception`;
CREATE TABLE `horaire_livr_exception` (
  `id` int(11) NOT NULL auto_increment,
  `RestoID` int(11) NOT NULL default '0',
  `Debut` datetime NOT NULL default '0000-00-00 00:00:00',
  `Fin` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=515 DEFAULT CHARSET=latin1;

#
# Dumping data for table horaire_livr_exception
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table horaire_livr_habituel
#

DROP TABLE IF EXISTS `horaire_livr_habituel`;
CREATE TABLE `horaire_livr_habituel` (
  `id` int(11) NOT NULL auto_increment,
  `RestoID` int(11) NOT NULL default '0',
  `Jour` int(1) NOT NULL default '0',
  `Debut` time NOT NULL default '00:00:00',
  `Fin` time NOT NULL default '00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3729 DEFAULT CHARSET=latin1;

#
# Dumping data for table horaire_livr_habituel
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table horaire_livr_off
#

DROP TABLE IF EXISTS `horaire_livr_off`;
CREATE TABLE `horaire_livr_off` (
  `RestoID` int(8) NOT NULL default '0',
  PRIMARY KEY  (`RestoID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Dumping data for table horaire_livr_off
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table livreur
#

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE `livreur` (
  `Livreur` int(4) NOT NULL auto_increment,
  `LivreurCode` varchar(10) NOT NULL default '',
  `LivreurName` varchar(20) NOT NULL default '',
  `LivreurAdresse` varchar(200) default NULL,
  `LivreurTel` varchar(20) default NULL,
  `word` varchar(255) default NULL,
  `niveau_user` varchar(100) default 'serveur',
  UNIQUE KEY `Livreur` (`Livreur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Dumping data for table livreur
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `livreur` VALUES (1,'1','admin','rue','00','admin','admin');

/*!40101 SET NAMES utf8 */;

#
# Table structure for table mapinfo
#

DROP TABLE IF EXISTS `mapinfo`;
CREATE TABLE `mapinfo` (
  `MapID` int(6) NOT NULL auto_increment,
  `Adresse` varchar(50) NOT NULL default '',
  `Post` varchar(10) NOT NULL default '',
  `Ville` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`MapID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table mapinfo
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table menu_cadeaux
#

DROP TABLE IF EXISTS `menu_cadeaux`;
CREATE TABLE `menu_cadeaux` (
  `CadeauID` int(11) NOT NULL auto_increment,
  `RestoID` int(11) NOT NULL default '0',
  `Code` varchar(10) NOT NULL default '',
  `Name` varchar(100) NOT NULL default '',
  `Image` text NOT NULL,
  `Note` text NOT NULL,
  `Prix_mini` float NOT NULL default '0',
  PRIMARY KEY  (`CadeauID`)
) ENGINE=MyISAM AUTO_INCREMENT=373 DEFAULT CHARSET=latin1;

#
# Dumping data for table menu_cadeaux
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table menuinfo550
#

DROP TABLE IF EXISTS `menuinfo550`;
CREATE TABLE `menuinfo550` (
  `MenuID` int(4) NOT NULL auto_increment,
  `MenuCode` varchar(100) NOT NULL default '',
  `MenuType` varchar(100) NOT NULL default '',
  `MenuName` varchar(200) NOT NULL default '',
  `MenuPrixPlace` float NOT NULL default '0',
  `MenuPrixEmporte` float NOT NULL default '0',
  `Printer1` int(1) NOT NULL default '1',
  `Printer2` int(1) NOT NULL default '0',
  `Printer3` int(1) NOT NULL default '0',
  `Printer4` int(1) NOT NULL default '0',
  `MenuPath` varchar(200) default NULL,
  `PlaceTVA` int(1) default '0' COMMENT 'prevu pour vin a toujour a 19.6 AOUTER 01 08 2009',
  `MenuNameCN` varchar(200) default NULL,
  `MenuTypeID` int(8) default '0' COMMENT 'pour wang zheng2017',
  `RestoID` int(8) default '1',
  `Options` int(1) default '0',
  `Note` varchar(100) default NULL,
  `Recommender` int(1) default '0',
  `SortID` int(8) default '1',
  `SousFamilleID` int(8) default '0',
  PRIMARY KEY  (`MenuID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Dumping data for table menuinfo550
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `menuinfo550` VALUES (3,'00','','test3',40,0,1,0,0,0,'1/00.jpg',0,NULL,16,1,0,'test3',0,1,0);
INSERT INTO `menuinfo550` VALUES (4,'22','','tyhrtytyttuy',50,0,1,0,0,0,'1/22.jpg',0,NULL,17,1,0,'',0,1,0);
INSERT INTO `menuinfo550` VALUES (5,'04','','test3',23,0,1,0,0,0,'1/04.jpg',0,NULL,18,1,0,'test test ',0,1,0);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table menuinfocontenu
#

DROP TABLE IF EXISTS `menuinfocontenu`;
CREATE TABLE `menuinfocontenu` (
  `id` int(11) NOT NULL auto_increment,
  `MenuCode` varchar(11) default NULL,
  `OptionMenuCode` varchar(11) default NULL COMMENT 'Option MENUID',
  `OptionMenuName` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table menuinfocontenu
#


#
# Table structure for table menutype550
#

DROP TABLE IF EXISTS `menutype550`;
CREATE TABLE `menutype550` (
  `MenuTypeID` int(4) NOT NULL auto_increment,
  `MenuTypeName` varchar(100) NOT NULL default '',
  `MenuTypePath` varchar(200) default NULL,
  `Valeur` int(4) default NULL COMMENT 'pour code barre',
  `RestoID` int(8) default '1' COMMENT 'POUR wang zheng2017',
  `SortID` int(8) default '1',
  `Cache` int(1) default '0',
  PRIMARY KEY  (`MenuTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

#
# Dumping data for table menutype550
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `menutype550` VALUES (16,'test',NULL,NULL,1,1,0);
INSERT INTO `menutype550` VALUES (17,'tst2',NULL,NULL,1,1,0);
INSERT INTO `menutype550` VALUES (18,'TEST3',NULL,NULL,1,1,0);
INSERT INTO `menutype550` VALUES (19,'test5',NULL,NULL,1,1,0);
INSERT INTO `menutype550` VALUES (20,'hjkkhjkjklkjhkj',NULL,NULL,1,1,0);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table options
#

DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) NOT NULL auto_increment,
  `optionname` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table options
#


#
# Table structure for table options_menu
#

DROP TABLE IF EXISTS `options_menu`;
CREATE TABLE `options_menu` (
  `OptionMenuID` int(11) NOT NULL auto_increment,
  `RestoID` int(11) NOT NULL default '0',
  `MenuID` int(11) NOT NULL default '0',
  `Name` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`OptionMenuID`)
) ENGINE=MyISAM AUTO_INCREMENT=1861 DEFAULT CHARSET=latin1;

#
# Dumping data for table options_menu
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `options_menu` VALUES (1860,1,125,'ddd');

/*!40101 SET NAMES utf8 */;

#
# Table structure for table options_web
#

DROP TABLE IF EXISTS `options_web`;
CREATE TABLE `options_web` (
  `OptionID` int(11) NOT NULL auto_increment,
  `RestoID` int(11) NOT NULL default '0',
  `MenuID` int(11) NOT NULL default '0',
  `OptionMenuID` int(11) NOT NULL default '0',
  `ChoixMenuID` int(11) NOT NULL default '0',
  `Prix` float NOT NULL default '0',
  PRIMARY KEY  (`OptionID`)
) ENGINE=MyISAM AUTO_INCREMENT=9785 DEFAULT CHARSET=latin1;

#
# Dumping data for table options_web
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table repas
#

DROP TABLE IF EXISTS `repas`;
CREATE TABLE `repas` (
  `FactureNum` int(8) unsigned zerofill NOT NULL auto_increment,
  `Date` date NOT NULL default '0000-00-00',
  `Table` varchar(20) NOT NULL default '',
  `Couvert` int(4) NOT NULL default '0',
  `Repas` varchar(10) NOT NULL default '',
  `Montant` float NOT NULL default '0',
  `Qte` int(2) NOT NULL default '0',
  UNIQUE KEY `RepasID` (`FactureNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table repas
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table restaurant
#

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `RestoID` int(8) NOT NULL auto_increment,
  `Login` varchar(30) NOT NULL default '',
  `Password` varchar(30) NOT NULL default '',
  `Name` varchar(100) NOT NULL default '',
  `Adresse` text NOT NULL,
  `Ville` varchar(100) NOT NULL default '',
  `Post` varchar(20) NOT NULL default '',
  `Telephone` varchar(20) NOT NULL default '',
  `AfficheTel` int(1) NOT NULL default '0',
  `Fax` varchar(20) default NULL,
  `SendFax` int(11) NOT NULL default '0',
  `Siret` varchar(50) default NULL,
  `Email` varchar(100) default NULL,
  `Domaine` varchar(30) default NULL,
  `Metro` int(4) NOT NULL default '0',
  `Special` text,
  `Template` varchar(5) NOT NULL default '1',
  `TemplateID` int(11) NOT NULL default '1',
  `Table` int(4) NOT NULL default '0',
  `Cheque` int(1) NOT NULL default '0',
  `Carte` int(1) NOT NULL default '0',
  `Ticket` int(1) NOT NULL default '0',
  `Internet` int(1) NOT NULL default '0',
  `Fumer` int(1) NOT NULL default '0',
  `Animal` int(1) NOT NULL default '0',
  `ServiceAp` int(1) NOT NULL default '0',
  `Open365` int(1) NOT NULL default '0',
  `OpenSunday` int(1) NOT NULL default '0',
  `Handicape` int(1) NOT NULL default '0',
  `Parking` int(1) NOT NULL default '0',
  `AirCondition` int(1) NOT NULL default '0',
  `SalonPrive` int(1) NOT NULL default '0',
  `PlatVegetarien` int(1) NOT NULL default '0',
  `MenuEnfant` int(1) NOT NULL default '0',
  `Traditional` int(1) NOT NULL default '0',
  `Rapide` int(1) NOT NULL default '0',
  `Emporter` int(1) NOT NULL default '0',
  `Livraison` int(1) NOT NULL default '0',
  `Note` text,
  `CommentMoyenne` float(9,2) NOT NULL default '0.00',
  `CommentNum` int(8) NOT NULL default '0',
  `Image` varchar(100) default NULL,
  `Check` int(1) NOT NULL default '0',
  `Recommender` int(1) NOT NULL default '0',
  `Star` int(1) NOT NULL default '0',
  `EnLigne` int(1) NOT NULL default '0',
  `Com` float NOT NULL default '9',
  `Frais` float NOT NULL default '1',
  `RegDate` date NOT NULL default '0000-00-00',
  `CheckCmdDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `fuNum` int(8) default '0',
  `zpc` varchar(45) default NULL,
  `CuisineID` int(8) default NULL,
  `yylx` int(1) default NULL,
  `Com_siteweb` float NOT NULL default '9' COMMENT 'ajouter le 20100309 pour calculer la commission sur leur propre site web',
  `Mode_paiement` text NOT NULL COMMENT 'lang ajouter le 2010 09 14',
  `Contrat_L` int(11) NOT NULL COMMENT 'lang ajouter le 2010 09 14',
  `Contrat_R` int(11) NOT NULL COMMENT 'lang ajouter le 2010 09 14',
  `Num_Contrat` int(10) default NULL,
  `RIB` varchar(20) default NULL,
  `Code` varchar(4) default NULL,
  `tarif_annee` int(4) default NULL,
  `fax_fac` int(1) default NULL,
  `frais_cb` double default '3.8',
  `Responsable` varchar(45) character set utf8 collate utf8_unicode_ci default NULL,
  UNIQUE KEY `RestoID` (`RestoID`)
) ENGINE=MyISAM AUTO_INCREMENT=432 DEFAULT CHARSET=latin1;

#
# Dumping data for table restaurant
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `restaurant` VALUES (1,'test','test','test','92 rue balard','paris','75015','0145543368',0,NULL,0,NULL,NULL,NULL,0,NULL,'1',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,0,0,NULL,1,0,0,0,9,1,'0000-00-00','0000-00-00 00:00:00',0,NULL,NULL,NULL,9,'',0,0,NULL,NULL,NULL,NULL,NULL,3.8,NULL);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table resto_main_page_style
#

DROP TABLE IF EXISTS `resto_main_page_style`;
CREATE TABLE `resto_main_page_style` (
  `id` int(11) NOT NULL auto_increment COMMENT 'ajouter le 2013 10 10 pour les site web',
  `RestoID` int(11) NOT NULL,
  `content` text NOT NULL,
  `style` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Dumping data for table resto_main_page_style
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `resto_main_page_style` VALUES (1,80,'<img width=\"500\" height=\"345\" src=\"http://www.rueresto.fr/livraison/resto/80/images/1381427344.jpg\" class=\"img-thumbnail image\" alt=\"\" />\r\n<h1>Arito Sushi Bienvenue</h1>\r\n<p>Livraison &agrave; domicile gratuite &agrave; partir de 15&euro;00</p>\r\n<p>Zone de livraison limit&eacute;e <br />\r\nle midi de 11h00 &agrave; 14h45<br />\r\nle soir de 18h00 &agrave; 22h45</p>\r\n<br />','main_style2.css');
INSERT INTO `resto_main_page_style` VALUES (2,99,'<img width=\"500\" height=\"345\" src=\"http://www.rueresto.fr/livraison/resto/99/images/1381427685.jpg\" class=\"img-thumbnail image\" alt=\"\" />\r\n<h1>Asahi Sushi Bienvenue</h1>\r\n<p>Livraison &agrave; domicile gratuite &agrave; partir de 15&euro;00</p>\r\n<p>Zone de livraison limit&eacute;e <br />\r\nle midi de 11h00 &agrave; 14h30<br />\r\nle soir de 18h00 &agrave; 22h30</p>\r\n<br />','main_style3.css');
INSERT INTO `resto_main_page_style` VALUES (3,100,'\r\n<img class=\"img-thumbnail image\" width=\"500\" height=\"345\" alt=\"\" src=\"http://www.rueresto.fr/livraison/resto/100/images/1382447047.jpg\" >\r\n\r\n<h1>Bienvenue Mimura Sushi</h1>\r\n<p>Livraison &agrave; domicile gratuite &agrave; partir de 15&euro;00</p>\r\n<p>Zone de livraison limit&eacute;e\r\nle midi de 12h00 &agrave; 14h30<br />\r\nle soir de 19h00 &agrave; 22h30</p>\r\n<br />\r\n</p>\r\n','main.css');
INSERT INTO `resto_main_page_style` VALUES (4,120,'<img width=\"500\" height=\"345\" src=\"http://www.rueresto.fr/livraison/resto/120/images/1382447757.jpg\" alt=\"\" class=\"img-thumbnail image\" />\r\n<h1>Bienvenue Sushi Home</h1>\r\n<p>Livraison &agrave; domicile gratuite &agrave; partir de 15&euro;00</p>\r\n<p>Zone de livraison limit&eacute;e <br />\r\nle midi de 11h00 &agrave; 14h30 <br />\r\nle soir de 18h30 &agrave; 22h40</p>','main.css');
INSERT INTO `resto_main_page_style` VALUES (5,82,'<img width=\"500\" height=\"345\" class=\"img-thumbnail image\" alt=\"\" src=\"http://www.rueresto.fr/livraison/resto/82/images/1382449230.jpg\" />\r\n<h1>Arito Sushi Bienvenue</h1>\r\n<p>Livraison &agrave; domicile gratuite &agrave; partir de 15&euro;00</p>\r\n<p>Zone de livraison limit&eacute;e <br />\r\nle midi de 11h30 &agrave; 14h30 <br />\r\nle soir de 18h00 &agrave; 22h30</p>','main_style3.css');
INSERT INTO `resto_main_page_style` VALUES (6,408,'<h1 style=\"text-align: center;\"><strong><span style=\"font-size: 10px;\"><span style=\"font-size: 14px;\"><span style=\"font-size: 24px;\">&nbsp;</span></span></span></strong></h1>\r\n<h6><big><span style=\"font-family: \'Comic Sans MS\';\"><span style=\"font-size: 24px;\"> </span></span></big></h6> ','main.css');
INSERT INTO `resto_main_page_style` VALUES (7,416,'','main.css');
INSERT INTO `resto_main_page_style` VALUES (8,1,'<img width=\"300\" height=\"150\" class=\"img-thumbnail image\" alt=\"\" src=\"http://www.ausoirdetokyo2.com/images/rueresto.jpg\" />\r\n<h1>&nbsp;&nbsp;&nbsp;Bienvenue &nbsp; &nbsp; &nbsp;&nbsp;<br />\r\n&nbsp; &nbsp; test</h1>\r\n<span style=\"color: rgb(255, 0, 0); font-size: 24px;\"><span style=\"font-family: ??????&euro;?\">dfhfhfsthrtr</span></span><br />\r\n<p>&nbsp; &nbsp; &nbsp; Livraison &agrave; domicile gratuite &agrave; partir de 15&euro;00</p>\r\n<p>&nbsp; &nbsp; &nbsp; Zone de livraison limit&eacute;e <br />\r\n&nbsp; &nbsp; &nbsp; le midi de 11h30 &agrave; 14h30 <br />\r\n&nbsp; &nbsp; &nbsp; le soir de 19h00 &agrave; 22h30</p>','main.css');
INSERT INTO `resto_main_page_style` VALUES (9,425,'<h4><strong style=\"font-size: 36px; color: rgb(204, 255, 204); font-family: Arial, Verdana, sans-serif;\">&nbsp;</strong></h4>\r\n<big><span style=\"color: rgb(204, 255, 204);\"><img src=\"http://www.saitamabalard.com/images/rueresto.jpg\" align=\"left\" width=\"280\" height=\"294\" style=\"font-size: 11.9999990463257px;\" alt=\"\" /></span></big>\r\n<p><strong style=\"font-size: 36px; color: rgb(204, 255, 204); font-family: Arial, Verdana, sans-serif;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; B</strong><strong style=\"color: rgb(204, 255, 204); font-size: 36px; font-family: \'Comic Sans MS\';\">i</strong><span style=\"font-family: Arial, Verdana, sans-serif; font-size: 12px; color: rgb(255, 255, 255);\"><strong style=\"color: rgb(204, 255, 204); font-size: 36px; font-family: \'Comic Sans MS\';\">e</strong><strong style=\"color: rgb(204, 255, 204); font-size: 36px; font-family: \'Comic Sans MS\';\">n</strong></span><span style=\"font-family: Arial, Verdana, sans-serif; font-size: 12px;\"><span style=\"color: rgb(255, 255, 255);\"><strong style=\"color: rgb(204, 255, 204); font-size: 36px; font-family: \'Comic Sans MS\';\">venue</strong></span></span><span style=\"font-family: Arial, Verdana, sans-serif; font-size: 12px; color: rgb(204, 255, 204);\"><span style=\"font-size: 12px;\"><span style=\"font-size: 36px;\"><strong>&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Au SAITAMA BALARD<span style=\"font-size: 24px;\"> &nbsp; &nbsp; &nbsp; &nbsp; </span></strong></span></span><span style=\"font-size: 12px;\"><span style=\"font-size: 36px;\"><strong><span style=\"font-size: 24px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></strong></span></span></span><span style=\"font-family: Arial, Verdana, sans-serif; font-size: 12px; color: rgb(204, 255, 204);\"><span style=\"font-size: 18px;\"><strong style=\"font-family: \'Comic Sans MS\';\">&nbsp;&nbsp;</strong></span></span></p>\r\n<p><big> </big></p>\r\n<big>\r\n<p><span style=\"font-family: Tahoma;\"><span style=\"color: rgb(204, 255, 204);\"><span style=\"font-size: 18px;\"><strong style=\"color: rgb(204, 255, 204); font-family: \'Comic Sans MS\'; font-size: 18px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></span></span></span><em><span style=\"font-family: Tahoma;\"><span style=\"color: rgb(204, 255, 204);\"><span style=\"font-size: 18px;\"><strong style=\"color: rgb(204, 255, 204); font-family: \'Comic Sans MS\'; font-size: 18px;\"> </strong></span></span></span></em><kbd><span style=\"font-family: Tahoma;\"><span style=\"color: rgb(204, 255, 204);\"><span style=\"font-size: 18px;\"><strong style=\"color: rgb(204, 255, 204); font-family: \'Comic Sans MS\'; font-size: 18px;\">Plat &agrave; emporter <span style=\"color: rgb(255, 255, 0);\">-10%</span>&nbsp;&nbsp; </strong><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong style=\"color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\"><br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&agrave; partir de </strong><strong style=\"color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\">15&euro;, 1 Nougat offert;&nbsp;</strong><strong style=\"color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\">&agrave; partir de 30&euro;, une bi&egrave;re (33cl) offerte</strong></span></span> </span></kbd></p>\r\n</big>\r\n<p><big><kbd><span style=\"font-family: Tahoma;\"><span style=\"color: rgb(255, 255, 255);\"><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></span></span><em style=\"font-size: 14.3999996185303px;\"><span style=\"font-family: Tahoma;\"><span style=\"color: rgb(255, 255, 255);\"><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\">TEL: 01 45 54 79 07&nbsp;</strong></span></span></em><span style=\"font-family: Tahoma;\"><span style=\"color: rgb(255, 255, 255);\"><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\"><br />\r\n</strong><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></span></span></kbd></big><span style=\"font-size: 12px;\"><em style=\"font-size: 14.3999996185303px;\"><kbd><span style=\"font-family: Tahoma;\"><span style=\"color: rgb(204, 255, 204);\"><strong style=\"font-family: \'Comic Sans MS\';\">Livraison graduite &agrave; domicile </strong></span></span></kbd></em><big><kbd><em style=\"font-family: Arial, Verdana, sans-serif; font-size: 14.3999996185303px;\"><kbd><span style=\"font-family: Tahoma;\"><span style=\"color: rgb(204, 255, 204);\"><strong style=\"font-family: \'Comic Sans MS\';\">(uniquement le soir, &agrave; Paris 15 &egrave;me et&nbsp;</strong></span></span></kbd></em><em style=\"font-family: Arial, Verdana, sans-serif; font-size: 14.3999996185303px;\"><kbd><span style=\"font-family: Tahoma;\"><span style=\"color: rgb(204, 255, 204);\"><strong style=\"font-family: \'Comic Sans MS\';\">&agrave; partir de&nbsp;15&euro;</strong></span></span></kbd></em></kbd></big></span><big><kbd><span style=\"font-family: Tahoma;\"><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\">&nbsp;&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style=\"font-size: 12px;\">Ouvert 7j/7 de 11h30 &agrave; 14h30 et de 18h30 &agrave; 22h30(sauf dimanche midi)</span>&nbsp;</strong></span><em><span style=\"font-family: Tahoma;\"><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\"> &nbsp; &nbsp;</strong></span></em></kbd><em><span style=\"font-family: Tahoma;\"><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span></em><span style=\"font-family: Tahoma;\"><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span></big><span style=\"font-family: Tahoma;\"><strong style=\"font-size: 18px; color: rgb(204, 255, 204); font-family: \'Comic Sans MS\';\"> </strong></span></p>','main.css');
INSERT INTO `resto_main_page_style` VALUES (10,426,'content text','main.css');
INSERT INTO `resto_main_page_style` VALUES (11,410,'<h2>-10</h2>','main.css');

/*!40101 SET NAMES utf8 */;

#
# Table structure for table resto_suggestions_menu
#

DROP TABLE IF EXISTS `resto_suggestions_menu`;
CREATE TABLE `resto_suggestions_menu` (
  `id` int(11) NOT NULL auto_increment COMMENT 'ajouter le 2013 10 10 pour les site web',
  `MenuID` int(11) NOT NULL,
  `RestoID` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1 COMMENT='ajouter le 2013 10 10 pour les site web';

#
# Dumping data for table resto_suggestions_menu
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `resto_suggestions_menu` VALUES (111,124,1);
INSERT INTO `resto_suggestions_menu` VALUES (113,125,1);
INSERT INTO `resto_suggestions_menu` VALUES (114,4,1);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table sous_famille
#

DROP TABLE IF EXISTS `sous_famille`;
CREATE TABLE `sous_famille` (
  `SousFamilleID` int(11) NOT NULL auto_increment,
  `MenuTypeID` int(8) NOT NULL default '0',
  `RestoID` int(8) NOT NULL default '0',
  `Name` varchar(50) NOT NULL default '',
  `Note` text,
  `SortID` int(8) NOT NULL default '1',
  PRIMARY KEY  (`SousFamilleID`)
) ENGINE=MyISAM AUTO_INCREMENT=2421 DEFAULT CHARSET=latin1 PACK_KEYS=0;

#
# Dumping data for table sous_famille
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `sous_famille` VALUES (2405,13,1,'dds',NULL,1);
INSERT INTO `sous_famille` VALUES (2406,0,1,'test',NULL,1);
INSERT INTO `sous_famille` VALUES (2407,0,1,'test',NULL,1);
INSERT INTO `sous_famille` VALUES (2408,0,1,'',NULL,1);
INSERT INTO `sous_famille` VALUES (2409,0,1,'test',NULL,1);
INSERT INTO `sous_famille` VALUES (2410,0,1,'',NULL,1);
INSERT INTO `sous_famille` VALUES (2411,0,1,'gsgrreg',NULL,1);
INSERT INTO `sous_famille` VALUES (2412,0,1,'',NULL,1);
INSERT INTO `sous_famille` VALUES (2413,0,1,'test',NULL,1);
INSERT INTO `sous_famille` VALUES (2414,0,1,'fyfk',NULL,1);
INSERT INTO `sous_famille` VALUES (2415,0,1,'',NULL,1);
INSERT INTO `sous_famille` VALUES (2416,0,1,'',NULL,1);
INSERT INTO `sous_famille` VALUES (2417,0,1,'test',NULL,1);
INSERT INTO `sous_famille` VALUES (2418,14,1,'lguil',NULL,1);
INSERT INTO `sous_famille` VALUES (2420,16,1,'j',NULL,1);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table stock
#

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `StockID` int(11) NOT NULL auto_increment,
  `LastDate` date NOT NULL default '0000-00-00',
  `Facture` varchar(50) default NULL,
  `CodeFour` varchar(50) default NULL,
  `Code` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL default '',
  `Achat` int(11) NOT NULL default '0',
  `Vendre` int(11) NOT NULL default '0',
  `Left` int(11) NOT NULL default '0',
  `Total` float(8,2) NOT NULL default '0.00',
  PRIMARY KEY  (`StockID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table stock
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table template
#

DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `TemplateID` int(4) NOT NULL auto_increment,
  `Name` varchar(30) NOT NULL default '',
  `Directory` varchar(30) NOT NULL default '',
  `Image` varchar(100) default NULL,
  `Note` text,
  UNIQUE KEY `TemplateID` (`TemplateID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Dumping data for table template
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `template` VALUES (1,'Template1','rueresto-com','rueresto-com/image.gif',NULL);
INSERT INTO `template` VALUES (2,'Template2','templ2','templ2/image.gif',NULL);
INSERT INTO `template` VALUES (3,'Template3','templ3','templ3/image.gif',NULL);
INSERT INTO `template` VALUES (4,'Template4','templ4','templ4/image.gif',NULL);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table ticket
#

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `TicketID` int(6) NOT NULL auto_increment,
  `TicketNum` int(4) NOT NULL default '1',
  `TicketValeur` float NOT NULL default '0',
  `TicketMontant` float NOT NULL default '0',
  `TicketType` int(1) NOT NULL default '1',
  `TicketDate` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`TicketID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table ticket
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table tracedelete
#

DROP TABLE IF EXISTS `tracedelete`;
CREATE TABLE `tracedelete` (
  `TraceID` int(8) NOT NULL auto_increment,
  `Date` date NOT NULL default '0000-00-00',
  `Time` time NOT NULL default '00:00:00',
  `CmdNum` varchar(30) NOT NULL default '',
  `Num` int(4) NOT NULL default '0',
  `Code` varchar(10) NOT NULL default '',
  `Name` varchar(30) NOT NULL default '',
  `Prix` float NOT NULL default '0',
  `Total` float NOT NULL default '0',
  `Offert` int(1) NOT NULL default '0',
  `user` varchar(255) default NULL,
  UNIQUE KEY `TraceID` (`TraceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table tracedelete
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;

#
# Table structure for table user
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `UserID` int(8) NOT NULL auto_increment,
  `Email` varchar(100) NOT NULL default '',
  `Password` varchar(30) NOT NULL default '',
  `Sex` int(1) NOT NULL default '0',
  `Nom` varchar(50) NOT NULL default '',
  `Prenom` varchar(50) NOT NULL default '',
  `Telephone` varchar(20) default NULL,
  `Rue` varchar(20) NOT NULL default '',
  `Adresse` text NOT NULL,
  `Ville` varchar(64) default NULL,
  `Post` varchar(20) default NULL,
  `Batiment` varchar(50) default NULL,
  `Interphone` varchar(50) default NULL,
  `Code` varchar(20) default NULL,
  `Escalier` varchar(20) default NULL,
  `Etage` varchar(50) default NULL,
  `Porte` varchar(20) default NULL,
  `Note` text,
  `Note2` text NOT NULL,
  `RegDate` date NOT NULL default '0000-00-00',
  `RegFrom` text NOT NULL,
  `Valid` varchar(40) NOT NULL default '' COMMENT 'AJOUTER le 22 01 2008 pour activer user lorsque il s''inscript',
  `dianshu` int(5) default '0',
  `checkmail1` int(2) default '0',
  `checkmail2` int(2) default '0',
  `naissance` varchar(65) default NULL,
  `exporte` int(2) NOT NULL default '0',
  `exporte_rue` int(2) NOT NULL default '0',
  UNIQUE KEY `UserID` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=16344 DEFAULT CHARSET=latin1;

#
# Dumping data for table user
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `user` VALUES (16343,'jack@systa.fr','12345',0,'jack','jack','022222222','rue','Rue de paris	','paris','75015','2',NULL,NULL,NULL,NULL,'2',NULL,'','0000-00-00','','0',0,0,0,NULL,0,0);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table user_exempts_frais
#

DROP TABLE IF EXISTS `user_exempts_frais`;
CREATE TABLE `user_exempts_frais` (
  `UserID` int(8) NOT NULL,
  `RestoID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Dumping data for table user_exempts_frais
#

/*!40101 SET NAMES latin1 */;

INSERT INTO `user_exempts_frais` VALUES (517,102);
INSERT INTO `user_exempts_frais` VALUES (320,102);
INSERT INTO `user_exempts_frais` VALUES (344,102);

/*!40101 SET NAMES utf8 */;

#
# Table structure for table vins20
#

DROP TABLE IF EXISTS `vins20`;
CREATE TABLE `vins20` (
  `VinID` int(11) NOT NULL auto_increment COMMENT 'ajouter ce table le 01 08 2009 prevu pour vins a 19.6tooujou',
  `CommandID` int(11) NOT NULL default '0',
  `Num` int(2) NOT NULL default '0',
  `Code` varchar(50) NOT NULL default '',
  `Prix` float(5,2) NOT NULL default '0.00',
  `Remise` float(5,2) NOT NULL default '0.00',
  `Montant` float(5,2) NOT NULL default '0.00',
  `Day` char(2) default NULL,
  `Month` char(2) NOT NULL default '',
  `Year` varchar(4) NOT NULL default '',
  `Type` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`VinID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table vins20
#

/*!40101 SET NAMES latin1 */;


/*!40101 SET NAMES utf8 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
