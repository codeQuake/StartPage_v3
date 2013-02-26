DROP TABLE IF EXISTS wbb1_1_startpageboxes;
CREATE TABLE wbb1_1_startpageboxes(
	boxID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	boxName VARCHAR(255) NOT NULL DEFAULT '',
	boxType VARCHAR(255) NOT NULL DEFAULT 'left',
	showOrder INT(10) NOT NULL DEFAULT 0,
	active TINYINT(1) NOT NULL DEFAULT 1,
	isDeletable TINYINT(1) NOT NULL DEFAULT 0,
	packageID INT(10) NOT NULL DEFAULT 0) ENGINE=MyISAM DEFAULT CHARSET=utf8;