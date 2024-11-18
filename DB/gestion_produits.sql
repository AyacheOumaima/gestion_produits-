DROP DATABASE IF EXISTS gestion_produits;
CREATE DATABASE gestion_produits;
USE gestion_produits;
CREATE TABLE Categorie(
    idCategorie INT(4) AUTO_INCREMENT PRIMARY KEY,
    nomCategorie VARCHAR(50),
    marque VARCHAR(50)
);
INSERT INTO Categorie(nomCategorie,marque) VALUES
('Electronique','ZTE'),
('Fourniteur','IKEA'),
('Alimentation','Jutos'),
('Hygin','Molfix'),
('Vetement','Calvin Klien');


