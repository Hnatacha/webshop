
CREATE TABLE contact( 

idcontact int(11) NOT NULL AUTO_INCREMENT,
nom 	  varchar(45) NOT NULL,
email     varchar(25) NOT NULL,
message   text(150),

PRIMARY KEY(idcontact)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

