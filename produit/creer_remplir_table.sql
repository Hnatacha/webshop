USE tpbloc2;

CREATE TABLE users (
    id int NOT NULL auto_increment,
    name varchar(100) NOT NULL,
    age int(3) NOT NULL,
    email varchar(100) NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO users (id, name, age, email) VALUES
(1, 'pierre', 35, 'pierre@gmail.com'),
(2, 'jean', 38, 'jean@gmail.com'),
(3, 'marie', 40, 'marie@kmail.com'),
(4, 'pascal', 32, 'pascal@jmail.com'),
(5, 'bernard', 42, 'bernard@jmail.org');
