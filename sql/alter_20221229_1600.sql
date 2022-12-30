CREATE TABLE IF NOT EXISTS `desire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `membres` ADD `desire_id` INT NULL AFTER `confirme`, ADD `desire_datetime` DATETIME NULL AFTER `desire_id`;

ALTER TABLE `membres` ADD CONSTRAINT `fk_desire` FOREIGN KEY (`desire_id`) REFERENCES `desire`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;