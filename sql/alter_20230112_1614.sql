UPDATE membres SET confirme=0;
ALTER TABLE `membres` CHANGE `confirme` `confirme` INT(1) NOT NULL DEFAULT '0';