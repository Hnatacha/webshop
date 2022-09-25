CREATE TABLE `webshops`.`compte` (
 `id` INT NOT NULL AUTO_INCREMENT , 
`nom` VARCHAR(255) NOT NULL , 
`prenom` VARCHAR(255) NOT NULL , 
`email` VARCHAR(255) NOT NULL ,
`mot_de_passe` VARCHAR(255) NOT NULL ,
 PRIMARY KEY (`id`)
 ) 
 ENGINE = MyISAM;

 CREATE TABLE `webshops`.`produit` ( `id` INT NOT NULL AUTO_INCREMENT , `libelle` VARCHAR(80) NOT NULL , `prix` INT NOT NULL , `description` TEXT NOT NULL , `url` VARCHAR(200) NOT NULL , `rate` INT(5) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;