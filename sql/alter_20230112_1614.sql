ALTER TABLE `membres` ADD `confirmkey` VARCHAR(255) NOT NULL AFTER `mail`;
ALTER TABLE `membres` ADD `confirme` INT(1) NOT NULL AFTER `Online` DEFAULT '0';