/* suppression de la base de donnée */
DROP DATABASE IF EXISTS RESTO_DB_BWB;

/* Création de la base de données*/
CREATE DATABASE IF NOT EXISTS RESTO_DB_BWB;

/* Verification de la base données*/
USE RESTO_DB_BWB;

/* Création de la table USER */
create table if not exists USER(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  username VARCHAR(20),
  password VARCHAR(1024),
  type VARCHAR(5),
  email VARCHAR(320)
);

/* Création de la table MESSAGE */
create table if not exists MESSAGE(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_username INT,
  date_creation DATE,
  message VARCHAR(256)
);

/* Création de la table TYPES_DE_PLATS */
create table if not exists TYPES_DE_PLATS(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom VARCHAR(20)
);

/* Création de la table PLAT */
create table if not exists PLAT(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_type INT,
  prix FLOAT(4,2),
  nom VARCHAR (128),
  url VARCHAR(1024)
);

/* Création de la table MENU */
create table if not exists MENU(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom VARCHAR(128),
  description VARCHAR(1024),
  liste_plats VARCHAR(128)
);

/* Création de la table CARTE */
create table if not exists CARTE(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom VARCHAR(20),
  liste_menus VARCHAR(128),
  date_creation DATE,
  online BOOL
);

/* Insertion des données - Jeu de test */

/* Users */
insert into USER (username,password,type,email) VALUES("administrateur","aaaa","admin","admin@restocoin.com");
insert into USER (username,password,type,email) VALUES("cuisto","aaaa","admin","cuisto@restocoin.com");
insert into USER (username,password,type,email) VALUES("jean","bbbb","user","jean@toto.com");
insert into USER (username,password,type,email) VALUES("jeanne","cccc","user","jeanne@hotmail.com");

/* Messages */
insert into MESSAGE (id_username,date_creation,message) VALUES(3,"2017-12-22","Super restaurant, l'équipe est très sympa et les plats délicieux");
insert into MESSAGE (id_username,date_creation,message) VALUES(4,"2017-10-09","Je recommande vivement");

/* Type de plats */
insert into TYPES_DE_PLATS (nom) VALUES("Entrée");
insert into TYPES_DE_PLATS (nom) VALUES("Plat");
insert into TYPES_DE_PLATS (nom) VALUES("Dessert");

/* Plat */
insert into PLAT (id_type,nom,prix,url) VALUES(2,"Burger frites",7.50,"./sources/burgerFrites.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(1,"Avocat Oeufs",2.50,"./sources/duoAvocatOeuf.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(3,"Gateau aux myrtilles",3.50,"./sources/gateauMyrtille.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(3,"Maccarons",3.50,"./sources/maccarons.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(3,"Pancakes",3.50,"./sources/pancakes.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(1,"Salade de riz",3.50,"./sources/saladeRiz.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(1,"Tomates Mozza",3.50,"./sources/tomateMozza.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(2,"Wok épicé",6.50,"./sources/wok.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(2,"Gratin savoyard",8.50,"./sources/gratinSavoyard.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(3,"Mochi",3.50,"./sources/mochi.jpg");
insert into PLAT (id_type,nom,prix,url) VALUES(1,"Salade composée",3.50,"./sources/salad.jpg");

/* Menus */
insert into MENU (nom,description,liste_plats) VALUES("Menu 3000K","Un peu trop maigre? Ce menu vous apportera toutes les calories pour grossir en un éclair!!","[7,1,3]");
insert into MENU (nom,description,liste_plats) VALUES("Menu raffiné","Surprenez vos papilles","[2,8,4]");
insert into MENU (nom,description,liste_plats) VALUES("Menu asiatique","Voyagez en asie le temps d'un repas","[6,8,10]");
insert into MENU (nom,description,liste_plats) VALUES("Menu bien de chez nous","La gastronomie française","[11,9,3]");

/* Carte */
insert into CARTE (nom, liste_menus, date_creation, online) VALUES("Carte 1","[1,2,3]","2018-05-02",1);
insert into CARTE (nom, liste_menus, date_creation, online) VALUES("Carte 2","[1,2,3,4]","2018-02-22",0);
insert into CARTE (nom, liste_menus, date_creation, online) VALUES("Carte 3","[4,2]","2016-04-26",1);
