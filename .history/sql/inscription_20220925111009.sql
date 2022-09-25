CREATE TABLE `webshops`.`inscription` (
 `id` INT NOT NULL AUTO_INCREMENT , 
`nom` VARCHAR(255) NOT NULL , 
`prenom` VARCHAR(255) NOT NULL , 
`email` VARCHAR(255) NOT NULL ,
 `motdepasse` VARCHAR(255) NOT NULL ,
 `Confirmermdp` VARCHAR(255) NOT NULL ,
 PRIMARY KEY (`id`)
 ) 
 ENGINE = MyISAM;