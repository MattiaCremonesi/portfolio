CREATE DATABASE IF NOT EXISTS `E-commerce`;
USE `E-commerce`;

CREATE TABLE IF NOT EXISTS Utente(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(100),
    Email VARCHAR(100),
    Password VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS Prodotto(
    Id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    descrizione VARCHAR(300),
    prezzo double,
    link_immagine VARCHAR(9999)
);

CREATE TABLE IF NOT EXISTS Acquisto(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_utente INT,
    data_acquisto DATE,
    metodo_pagamento varchar(50),
    prezzo double,
    numero_carta varchar(50),
    FOREIGN KEY (id_utente) REFERENCES Utente(Id)
);

UPDATE Prodotto
SET link_immagine = 'https://www.nespresso.com/ecom/medias/sys_master/public/14215039156254/M-1270-2000x2000.png?impolicy=small&imwidth=284&imdensity=1'
WHERE id = 3;

SELECT id_prodotto, count(id_prodotto) FROM carrello WHERE id_utente = 2 GROUP BY id_prodotto;
