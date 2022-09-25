CREATE TABLE `webshops`.`compte` (
 `id` INT NOT NULL AUTO_INCREMENT , 
`nom` VARCHAR(255) NOT NULL , 
`prenom` VARCHAR(255) NOT NULL , 
`email` VARCHAR(255) NOT NULL ,
`mot_de_passe` VARCHAR(255) NOT NULL ,
 PRIMARY KEY (`id`)
 ) 
ENGINE = MyISAM;

 CREATE TABLE `webshops`.`produit` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `libelle` VARCHAR(80) NOT NULL , 
    `prix` INT NOT NULL ,
    `description` TEXT NOT NULL ,
    `url` VARCHAR(200) NOT NULL ,
    `rate` INT(5) NOT NULL , PRIMARY KEY (`id`))
ENGINE = InnoDB;


CREATE TABLE contact( 

idcontact int(11) NOT NULL AUTO_INCREMENT,
nom 	  varchar(45) NOT NULL,
email     varchar(25) NOT NULL,
message   text(150),

PRIMARY KEY(idcontact)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE categorie( 
id int(11) NOT NULL AUTO_INCREMENT,
nom 	  varchar(45) NOT NULL,
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE produit 
ADD COLUMN categorie_id int , 
ADD CONSTRAINT fk_categorie FOREIGN KEY(categorie_id) REFERENCES categorie(id);


CREATE TABLE saison( 
id int(11) NOT NULL AUTO_INCREMENT,
nom 	  varchar(45) NOT NULL,
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE produit 
ADD COLUMN saison_id int , 
ADD CONSTRAINT fk_saison FOREIGN KEY(saison_id) REFERENCES saison(id);


CREATE TABLE accessoire( 
id int(11) NOT NULL AUTO_INCREMENT,
nom 	  varchar(45) NOT NULL,
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE produit 
ADD COLUMN accessoire_id int , 
ADD CONSTRAINT fk_accessoire FOREIGN KEY(accessoire_id) REFERENCES accessoire(id);