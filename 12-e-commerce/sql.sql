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

CREATE TABLE IF NOT EXISTS Carrello(
    id_utente INT,
    id_prodotto INT,
    FOREIGN KEY (id_utente) REFERENCES Utente(Id),
    FOREIGN KEY (id_prodotto) REFERENCES Prodotto(Id)
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

INSERT INTO Prodotto (nome, descrizione, prezzo, link_immagine) VALUES
    ('Inissia Black', 'Con le sue piccole dimensioni Inissia è stata pensata per garantire la qualità caratteristica del caffè Nespresso.', 99.00, 'https://www.nespresso.com/ecom/medias/sys_master/public/10392431689758/M-0221-KOENIG-INISSIA-INISSIA-BLACK-PDP.jpg?impolicy=productPdpSafeZone&imwidth=1238'),
    ('Pixie Titan', 'La macchina da caffè Nespresso Pixie è un inno allo stile industriale moderno.', 159.99, 'https://www.nespresso.com/ecom/medias/sys_master/public/27920493051934/M-2053-ResponsiveStandard-Front.png?impolicy=small&imwidth=284&imdensity=1'),
    ('CitiZ Platinum Stainless Steel', 'Un design elegante e urbano con finiture di alta qualità, nello stile di CitiZ.', 239.99, 'https://www.nespresso.com/ecom/medias/sys_master/public/14215039877150/M-1270-PDP-Background-3Q.jpg?impolicy=productPdpSafeZone&imwidth=1238'),
    ('Lisbon Bica', 'Cereali tostati e nocciole', 5.99, 'https://www.nespresso.com/ecom/medias/sys_master/public/30236143058974.png?impolicy=small&imwidth=284&imdensity=1'),
    ('Alto Ambrato', 'Cereali tostati e miele', 6.99, 'https://www.nespresso.com/ecom/medias/sys_master/public/26426205831198.png?impolicy=small&imwidth=284&imdensity=1'),
    ('Maple Pecan', 'Noci Pecan e Sciroppo dacero', 7.99, 'https://www.nespresso.com/ecom/medias/sys_master/public/30314396352542.png?impolicy=small&imwidth=284&imdensity=1'),
    ('Vividà', 'Cereali e biscotti', 6.99, 'https://www.nespresso.com/ecom/medias/sys_master/public/30734595424286.png?impolicy=small&imwidth=284&imdensity=1');

INSERT INTO Utente (Username, Email, Password) VALUES
    ('admin', 'admin@gmail.com', '1234');