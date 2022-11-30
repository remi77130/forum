ALTER TABLE `membres` 
CHANGE `mail` `mail` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `departement_nom` `departement_nom` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `description_profil` `description_profil` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `astrologie` `astrologie` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `choix` `choix` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `taille` `taille` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `poids` `poids` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `picture` `picture` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `id_user` `id_user` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `date_up` `date_up` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
CHANGE `album` `album` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `createdAt` `createdAt` DATE NULL DEFAULT CURRENT_TIMESTAMP,
CHANGE `img` `img` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `count_image_album` `count_image_album` INT(11) NULL,
CHANGE `last_update_image_counter` `last_update_image_counter` DATE NULL DEFAULT CURRENT_TIMESTAMP,
CHANGE `Online` `Online` ENUM('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
CHANGE `confirme` `confirme` INT(3) NULL,
CHANGE `level_subscription` `level_subscription` INT(11) NULL;

ALTER TABLE `images` CHANGE `bin` `bin` LONGBLOB NULL;