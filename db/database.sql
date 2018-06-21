-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema RESTO_DB_BWB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema RESTO_DB_BWB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `RESTO_DB_BWB` DEFAULT CHARACTER SET latin1 ;
USE `RESTO_DB_BWB` ;

-- -----------------------------------------------------
-- Table `RESTO_DB_BWB`.`CARTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESTO_DB_BWB`.`CARTE` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(20) NULL DEFAULT NULL,
  `date_creation` DATE NULL DEFAULT NULL,
  `online` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `RESTO_DB_BWB`.`MENU`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESTO_DB_BWB`.`MENU` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(128) NULL DEFAULT NULL,
  `description` VARCHAR(1024) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `RESTO_DB_BWB`.`USER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESTO_DB_BWB`.`USER` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NULL DEFAULT NULL,
  `password` VARCHAR(1024) NULL DEFAULT NULL,
  `type` VARCHAR(5) NULL DEFAULT NULL,
  `email` VARCHAR(320) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- -----------------------------------------------------
-- Table `RESTO_DB_BWB`.`MESSAGE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESTO_DB_BWB`.`MESSAGE` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `date_creation` DATE NULL DEFAULT NULL,
  `message` VARCHAR(256) NULL DEFAULT NULL,
  `USER_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `USER_id`),
  INDEX `fk_MESSAGE_USER1_idx` (`USER_id` ASC),
  CONSTRAINT `fk_MESSAGE_USER1`
    FOREIGN KEY (`USER_id`)
    REFERENCES `RESTO_DB_BWB`.`USER` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `RESTO_DB_BWB`.`TYPES_DE_PLATS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESTO_DB_BWB`.`TYPES_DE_PLATS` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `RESTO_DB_BWB`.`PLAT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESTO_DB_BWB`.`PLAT` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `prix` FLOAT(4,2) NULL DEFAULT NULL,
  `nom` VARCHAR(128) NULL DEFAULT NULL,
  `url` VARCHAR(1024) NULL DEFAULT NULL,
  `TYPES_DE_PLATS_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `TYPES_DE_PLATS_id`),
  INDEX `fk_PLAT_TYPES_DE_PLATS1_idx` (`TYPES_DE_PLATS_id` ASC),
  CONSTRAINT `fk_PLAT_TYPES_DE_PLATS1`
    FOREIGN KEY (`TYPES_DE_PLATS_id`)
    REFERENCES `RESTO_DB_BWB`.`TYPES_DE_PLATS` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `RESTO_DB_BWB`.`CARTE_has_MENU`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESTO_DB_BWB`.`CARTE_has_MENU` (
  `CARTE_id` INT(11) NOT NULL,
  `MENU_id` INT(11) NOT NULL,
  PRIMARY KEY (`CARTE_id`, `MENU_id`),
  INDEX `fk_CARTE_has_MENU_MENU1_idx` (`MENU_id` ASC),
  INDEX `fk_CARTE_has_MENU_CARTE_idx` (`CARTE_id` ASC),
  CONSTRAINT `fk_CARTE_has_MENU_CARTE`
    FOREIGN KEY (`CARTE_id`)
    REFERENCES `RESTO_DB_BWB`.`CARTE` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CARTE_has_MENU_MENU1`
    FOREIGN KEY (`MENU_id`)
    REFERENCES `RESTO_DB_BWB`.`MENU` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `RESTO_DB_BWB`.`MENU_has_PLAT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RESTO_DB_BWB`.`MENU_has_PLAT` (
  `MENU_id` INT(11) NOT NULL,
  `PLAT_id` INT(11) NOT NULL,
  PRIMARY KEY (`MENU_id`, `PLAT_id`),
  INDEX `fk_MENU_has_PLAT_PLAT1_idx` (`PLAT_id` ASC),
  INDEX `fk_MENU_has_PLAT_MENU1_idx` (`MENU_id` ASC),
  CONSTRAINT `fk_MENU_has_PLAT_MENU1`
    FOREIGN KEY (`MENU_id`)
    REFERENCES `RESTO_DB_BWB`.`MENU` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MENU_has_PLAT_PLAT1`
    FOREIGN KEY (`PLAT_id`)
    REFERENCES `RESTO_DB_BWB`.`PLAT` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


			   	   
			   
/* Insertion des données - Jeu de test */

/* Users */
insert into USER (username,password,type,email) VALUES("administrateur","aaaa","admin","admin@restocoin.com");
insert into USER (username,password,type,email) VALUES("cuisto","aaaa","admin","cuisto@restocoin.com");
insert into USER (username,password,type,email) VALUES("jean","bbbb","user","jean@toto.com");
insert into USER (username,password,type,email) VALUES("jeanne","cccc","user","jeanne@hotmail.com");

/* Messages */
insert into MESSAGE (USER_id,date_creation,message) VALUES(3,"2017-12-22","Super restaurant, l'équipe est très sympa et les plats délicieux");
insert into MESSAGE (USER_id,date_creation,message) VALUES(4,"2017-10-09","Je recommande vivement");

/* Type de plats */
insert into TYPES_DE_PLATS (nom) VALUES("Entrée");
insert into TYPES_DE_PLATS (nom) VALUES("Plat");
insert into TYPES_DE_PLATS (nom) VALUES("Dessert");

/* Plat */
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(2,"Burger frites",7.50,"./sources/burgerFrites.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(1,"Avocat Oeufs",2.50,"./sources/duoAvocatOeuf.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(3,"Gateau aux myrtilles",3.50,"./sources/gateauMyrtille.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(3,"Maccarons",3.50,"./sources/maccarons.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(3,"Pancakes",3.50,"./sources/pancakes.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(1,"Salade de riz",3.50,"./sources/saladeRiz.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(1,"Tomates Mozza",3.50,"./sources/tomateMozza.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(2,"Wok épicé",6.50,"./sources/wok.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(2,"Gratin savoyard",8.50,"./sources/gratinSavoyard.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(3,"Mochi",3.50,"./sources/mochi.jpg");
insert into PLAT (TYPES_DE_PLATS_id,nom,prix,url) VALUES(1,"Salade composée",3.50,"./sources/salad.jpg");

/* Menus */
insert into MENU (nom,description) VALUES("Menu 3000K","Un peu trop maigre? Ce menu vous apportera toutes les calories pour grossir en un éclair!!");
insert into MENU (nom,description) VALUES("Menu raffiné","Surprenez vos papilles");
insert into MENU (nom,description) VALUES("Menu asiatique","Voyagez en asie le temps d'un repas");
insert into MENU (nom,description) VALUES("Menu bien de chez nous","La gastronomie française");

/*MENU_has_PLAT*/
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(1,7);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(1,1);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(1,3);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(2,2);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(2,8);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(2,4);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(3,6);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(3,8);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(3,10);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(4,11);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(4,9);
insert into MENU_has_PLAT (MENU_id,PLAT_id) VALUES(4,3);
												   
/* Carte */
insert into CARTE (nom, date_creation, online) VALUES("Carte 1","2018-05-02",1);
insert into CARTE (nom, date_creation, online) VALUES("Carte 2","2018-02-22",0);
insert into CARTE (nom, date_creation, online) VALUES("Carte 3","2016-04-26",1);

/*CARTE_has_MENU*/
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(1,1);
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(1,2);
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(1,3);
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(2,1);
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(2,2);
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(2,3);
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(2,4);
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(3,1);
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(3,4);
insert into CARTE_has_MENU (CARTE_id,MENU_id) VALUES(3,2);
