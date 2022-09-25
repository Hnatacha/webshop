
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

INSERT INTO `categorie` (`id`, `nom`) VALUES 
('1', 'Jupe'), ('2', 'Robe'), 
('3', 'Pantalon'), ('4', 'T-Shirt'), 
('5', 'Short'), ('6', 'Combi-Short'), 
('7', 'Combi-Pantalon'), ('8', 'Samara'),
 ('9', 'Chemise'), ('10', 'Jeans');

INSERT INTO `saison` (`nom`) VALUES 
('Hiver'), ('Automne'), 
('Printemps'), ('Eté');


INSERT INTO `accessoire` (`id`, `nom`) VALUES 
('1', 'Bague'), ('2', 'Chaine'), 
('3', 'Makeup'), ('4', 'Lunettes'), 
('5', 'Sandale'), ('6', 'Tenis'), 
('7', 'Talon'), ('8', 'Ceinture'),
 ('9', 'Casquette'), ('10', 'Sac');

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `description`, `url`, `rate`, `categorie_id`, `saison_id`, `accessoire_id`) VALUES
(1, 'Produit 1', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/women-02.jpg', 4, 9, 2, NULL),
(2, 'Produit 2', 458, 'etyuiojhgfddfghjkkjhg fghjklkjhg bgyuikjn zdfghj', '../assets/images/women-01.jpg', 3, 6, 2, NULL),
(3, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/women-03.jpg', 4, 6, 2, NULL),
(4, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/men-02.jpg', 3, 9, 1, NULL),
(5, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/men-01.jpg', 4, 9, 2, NULL),
(6, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/men-03.jpg', 1, 9, 2, NULL),
(7, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/pantalon.jpg', 4, 2, 1, NULL),
(8, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/RedPant.jpg', 2, 3, 1, NULL),
(9, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/kid-02.jpg', 4, 1, 3, NULL),
(10, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/kid-01.jpg', 3, 8, 1, NULL),
(11, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/kid-03.jpg', 4, 8, 4, NULL),
(12, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/pull03.jpg', 2, 8, 4, NULL),
(13, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/robe-zip.jpg', 1, 5, 3, NULL),
(14, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/robe-zip02.jpg', 3, 8, 4, NULL),
(15, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/PSgreen.jpg', 5, 1, 1, NULL),
(16, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/pantalon-short.jpg', 1, 1, 3, NULL),
(17, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/manteau-robe.jpg', 3, 9, 1, NULL),
(18, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/women-02.jpg', 2, 9, 4, NULL),
(19, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/pantalon-sport.jpg', 4, 1, 3, NULL),
(20, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/pantalon-vert-chemise.jpg', 1, 10, 4, NULL),
(21, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/manteau-hiver.jpg', 4, 10, 3, NULL),
(22, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/manteau-vert-hiver.jpg', 3, 1, 4, NULL),
(23, 'Produit ', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/women-03.jpg', 4, 10, 3, NULL),
(24, 'Produit ', 458, 'etyuiojhgfddfghjkkjhg fghjklkjhg bgyuikjn zdfghj', '../assets/images/women-01.jpg', 3, 8, 2, NULL),
(25, 'Produit', 152, 'uzyfbfhbdfbh v dsibvdsv suvidbvusbdv svsduivbdsvusbduivbsdibviusd', '../assets/images/women-01.jpg', 2, 7, 4, NULL);



