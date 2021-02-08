CREATE TABLE `printerip` (
  `PrinterID` int(5) NOT NULL auto_increment,
  `name` varchar(15) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `checkstatus` int(1) NOT NULL,
  PRIMARY KEY  (`PrinterID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;