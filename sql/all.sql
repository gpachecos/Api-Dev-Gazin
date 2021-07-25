CREATE DATABASE developers CHARACTER SET utf8 COLLATE utf8_general_ci;

USE developers;

CREATE TABLE devs (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    sexo CHAR(2) NOT NULL,
    idade INT NOT NULL,
    hobby VARCHAR(200) NOT NULL,
    datanascimento DATE NOT NULL,
    PRIMARY KEY(id)
);


INSERT INTO devs (nome, sexo, idade, hobby, datanascimento)
VALUES ('Guilherme', 'M', 29, 'Cozinhar', '1991/09/30');