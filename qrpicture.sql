CREATE TABLE `queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobid` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `options` text NOT NULL DEFAULT '',
  `json` text NOT NULL DEFAULT '',
  `result` text NOT NULL DEFAULT '',
  `imagefilename` text NOT NULL DEFAULT '',
  `txt` text NOT NULL DEFAULT '',
  `outlinenr` int(11) NOT NULL DEFAULT 0,
  `numcolour` int(11) NOT NULL DEFAULT 0,
  `imageb64` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jobid` (`jobid`(6)),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
