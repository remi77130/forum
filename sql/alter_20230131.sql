ALTER TABLE `recuperation` CHANGE `confirme` `confirme` INT(11) NOT NULL DEFAULT '0';
ALTER TABLE `recuperation` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);

ALTER TABLE `likes` CHANGE `id_article` `id_member_from` INT(11) NOT NULL, CHANGE `id_membre` `id_member_to` INT(11) NOT NULL;

ALTER TABLE `likes` ADD CONSTRAINT `fk_id_membre_from` FOREIGN KEY (`id_member_from`) REFERENCES `membres`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `likes` ADD CONSTRAINT `fk_id_membre_to` FOREIGN KEY (`id_member_to`) REFERENCES `membres`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;