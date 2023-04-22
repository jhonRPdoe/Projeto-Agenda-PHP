CREATE DATABASE agenda;
USE agenda;

CREATE TABLE pessoa (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL
);

CREATE TABLE contatos (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(50),
    observacoes TEXT
    -- pessoa_id INT NOT NULL AUTO_INCREMENT
);

-- ALTER TABLE contatos ADD CONSTRAINT fk_pessoa FOREIGN KEY (pessoa_id) REFERENCES pessoa (id);

CREATE USER 'usuario_padrao'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON * . * TO 'usuario_padrao'@'localhost';
