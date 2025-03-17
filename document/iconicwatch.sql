CREATE DATABASE IF NOT EXISTS IconicWatch CHARSET utf8mb4;
USE IconicWatch;

CREATE TABLE IF NOT EXISTS `role`(
	id_role INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	nom_role VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS utilisateurs (
	id_utilisateur INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    pseudo_utilisateur VARCHAR(50) NOT NULL UNIQUE,
    mdp_utilisateur VARCHAR(255) NOT NULL,
    email_utilisateur VARCHAR(50) NOT NULL UNIQUE,
    id_role INT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS commentaires(
	id_commentaire INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    contenu_commentaire VARCHAR(255) NOT NULL,
    date_commentaire DATETIME NOT NULL,
    id_article INT NOT NULL,
    id_utilisateur INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS article_films(
	id_article INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    image_films VARCHAR(255) NOT NULL,
    info_films VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS montres(
	id_montre INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    image_montre VARCHAR(255) NOT NULL,
    info_montre VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS noter(
	id_montre INT,
    id_article INT,
    note_montre INT NOT NULL,
    PRIMARY KEY(id_montre, id_article),
    CONSTRAINT fk_montre FOREIGN KEY (id_montre) REFERENCES montres(id_montre),
    CONSTRAINT fk_article FOREIGN KEY (id_article) REFERENCES article_films(id_article)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ecrire(
	id_utilisateur INT,
    id_article INT,
    PRIMARY KEY(id_utilisateur, id_article),
    CONSTRAINT fk_articles FOREIGN KEY (id_article) REFERENCES article_films(id_article),
    CONSTRAINT fk_utilisateur FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur)
)ENGINE=InnoDB;

ALTER TABLE utilisateurs
    ADD CONSTRAINT fk_role
    FOREIGN KEY (id_role)
    REFERENCES `role`(id_role)
    ON DELETE CASCADE;
    
ALTER TABLE commentaires
    ADD CONSTRAINT fk_commentaire
    FOREIGN KEY (id_article)
    REFERENCES article_films(id_article)
    ON DELETE CASCADE;
    
ALTER TABLE commentaires
    ADD CONSTRAINT fk_utilisateurs
    FOREIGN KEY (id_utilisateur)
    REFERENCES utilisateurs(id_utilisateur)
    ON DELETE CASCADE;