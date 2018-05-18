/* suppression de la base de donnée */
DROP DATABASE IF EXISTS RESTO_DB_BWB;

/* Création de la base de données*/
CREATE DATABASE IF NOT EXISTS RESTO_DB_BWB;

/* Verification de la base données*/
USE RESTO_DB_BWB;

/* Création de la table USERS */
create table if not exists USERS(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  username VARCHAR(20),
  password VARCHAR(1024),
  email VARCHAR(320)
);

/* Création de la table CARTES */
create table if not exists CARTES(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_carte INT(20),
  nom VARCHAR(20),
  description VARCHAR(1024)
);

/* Création de la table RESTAURANT */
create table if not exists RESTAURANT(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom VARCHAR(20),
  adresse VARCHAR(1024),
  tel VARCHAR(10),
  email VARCHAR(320)
);

/* Création de la table MENU */
create table if not exists MENU(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_carte INT,
  nom VARCHAR(1024),
  description VARCHAR(1024),
  url VARCHAR(1024)
);

/* Création de la table PLATS */
create table if not exists PLATS(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_menu INT,
  id_type INT,
  prix FLOAT(4,2),
  nom VARCHAR (128),
  url VARCHAR(1024)
);

/* Création de la table TYPES_DE_PLATS */
create table if not exists TYPES_DE_PLATS(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom VARCHAR(20)
);

/*Insertion des données - Jeu de test*/

/* Type de plats*/
insert into TYPES_DE_PLATS (nom) VALUES('entrée');
insert into TYPES_DE_PLATS (nom) VALUES('plat');
insert into TYPES_DE_PLATS (nom) VALUES('dessert');

/* Plats */
insert into PLATS (id_type,nom,prix) VALUES(1,'Salade grecque',6.50):
insert into PLATS (id_type,nom,prix) VALUES(2,'Dolma',12.50):
insert into PLATS (id_type,nom,prix) VALUES(3,'Yaourt grecque',3.50):