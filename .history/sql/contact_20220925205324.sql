
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

INSERT INTO `categorie` (`id`, `nom`) VALUES 
('1', 'Jupe'), ('2', 'Robe'), 
('3', 'Pantalon'), ('4', 'T-Shirt'), 
('5', 'Short'), ('6', 'Chaussure'), 
('7', 'Talon'), ('8', 'Samara'),
 ('9', 'Chemise'), ('10', 'Sac');

 ALTER TABLE produit 
 ADD COLUMN categorie_id int , 
 ADD CONSTRAINT fk_categorie FOREIGN KEY(categorie_id) REFERENCES categorie(id);


CREATE TABLE saison( 
id int(11) NOT NULL AUTO_INCREMENT,
nom 	  varchar(45) NOT NULL,
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `saison` (`nom`) VALUES 
('Hiver'), ('Automne'), 
('Printemps'), ('Eté');

 ALTER TABLE produit 
 ADD COLUMN saison_id int , 
 ADD CONSTRAINT fk_saison FOREIGN KEY(saison_id) REFERENCES saison(id);

INSERT INTO `accessoire` (`id`, `nom`) VALUES 
('1', 'Bague'), ('2', 'Chaine'), 
('3', 'Makeup'), ('4', 'Lunettes'), 
('5', 'Sandale'), ('6', 'Tenis'), 
('7', 'Talon'), ('8', 'Samara'),
 ('9', 'Chemise'), ('10', 'Sac');

 ALTER TABLE produit 
 ADD COLUMN accessoire_id int , 
 ADD CONSTRAINT fk_categorie FOREIGN KEY(accessoire_id) REFERENCES accessoire(id);