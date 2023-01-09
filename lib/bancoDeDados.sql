CREATE USER IF NOT EXISTS 'sistema'@'localhost' IDENTIFIED BY 'sistema1234';
GRANT ALL PRIVILEGES ON * . * TO 'sistema'@'localhost';
FLUSH PRIVILEGES;

CREATE DATABASE IF NOT EXISTS vtecead
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

COMMIT;

use vtecead;

CREATE TABLE IF NOT EXISTS usuarios (
id INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
senha VARCHAR(256) NOT NULL,
telefone VARCHAR(11),
nascimento DATE NOT NULL,
credito DECIMAL(8,2),
fotoPerfil VARCHAR(100),
admin BOOLEAN NOT NULL,
dataCadastro DATETIME,
PRIMARY KEY(id)
)DEFAULT CHARSET=utf8 ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS cursos (
id INT NOT NULL AUTO_INCREMENT,
titulo VARCHAR(100) NOT NULL,
descricao VARCHAR(300) NOT NULL,
conteudo VARCHAR(1000) NOT NULL,
professor VARCHAR(100) NOT NULL,
carga INT,
cliques INT,
valor DECIMAL(8,2),
fotoCurso VARCHAR(100),
dataCadastro DATETIME,
PRIMARY KEY(id)
)DEFAULT CHARSET=utf8 ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS usuarioCurso (
id INT NOT NULL AUTO_INCREMENT,
usuario INT NOT NULL,
curso INT NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY (usuario) REFERENCES usuarios(id),
FOREIGN KEY (curso) REFERENCES cursos(id)
)DEFAULT CHARSET=utf8 ENGINE=InnoDB;

insert into usuarios (nome, email, senha, telefone, nascimento, credito, fotoPerfil, admin, dataCadastro) values ('admin', 'vinisibim@gmail.com', 'A132546b', '44999091762', '1998-08-21', 1000, '', 1, '2023-01-01')

COMMIT;
