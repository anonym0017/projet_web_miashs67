#  
# Serveur: localhost
# 
# Base de données: `bdFilms`
# --------------------------------------------------------
create database bdFilms;
use bdFilms;


#
# Structure de la table `realisateur`
#

DROP TABLE IF EXISTS realisateur;
CREATE TABLE realisateur (
  num int(4) NOT NULL auto_increment,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  dateNaiss date NOT NULL,
  dateDeces date default NULL,
  PRIMARY KEY  (num)
)ENGINE=INNODB CHARACTER SET utf8;

#
# Contenu de la table `realisateur`
#

INSERT INTO realisateur (nom, prenom, dateNaiss, dateDeces) VALUES ('Chaplin', 'Charles', '1889-04-16', '1977-12-25');
INSERT INTO realisateur (nom, prenom, dateNaiss, dateDeces) VALUES ('Kubrick', 'Stanley', '1928-07-26', '1999-03-07');
INSERT INTO realisateur (nom, prenom, dateNaiss, dateDeces) VALUES ('Jackson', 'Peter', '1961-10-31',NULL);
INSERT INTO realisateur (nom, prenom, dateNaiss, dateDeces) VALUES ('Almodovar', 'Pedro', '1951-09-25', NULL);
INSERT INTO realisateur (nom, prenom, dateNaiss, dateDeces) VALUES ('Spielberg', 'Steven', '1946-12-18',NULL);
INSERT INTO realisateur (nom, prenom, dateNaiss, dateDeces) VALUES ('Mitchel', 'Mike', '1970-10-18', NULL);
INSERT INTO realisateur (nom, prenom, dateNaiss, dateDeces) VALUES ('Villeneuve', 'Denis', '1967-10-03', NULL);
INSERT INTO realisateur (nom, prenom, dateNaiss, dateDeces) VALUES ('Lynch','David', '1946-01-20', NULL); 

#
# Structure de la table `film`
#

DROP TABLE IF EXISTS film;
CREATE TABLE film (
  num int(4) NOT NULL auto_increment,
  titre varchar(50) NOT NULL default '',
  titrevo varchar(50) NOT NULL default '',
  resume text NOT NULL,
  annee char(4) NOT NULL,
  photo varchar(50) NULL,
  numRealisateur int(4) NOT NULL,
  categorie varchar(40) NOT NULL,
  FOREIGN KEY (numRealisateur) REFERENCES realisateur(num),
  PRIMARY KEY  (num)
)ENGINE=INNODB CHARACTER SET utf8;

#
# Contenu de la table `film`
#
INSERT INTO film (titre, titrevo, resume, annee, photo, numRealisateur, categorie) 
VALUES ('Le Seigneur des anneaux : le retour du roi', 'Lord of ring', 'Tandis que les ténèbres se répandent sur la Terre du Milieu, Aragorn se révèle être l''héritier caché des rois antiques. Quant à Frodon, toujours tenté par l Anneau, il voyage à travers les contrées ennemies, se reposant sur Sam et Gollum...', '2010', 'images/leSeigneurDesAnneaux.jpg',3,"Fantastique");
INSERT INTO film (titre, titrevo, resume, annee, photo,numRealisateur, categorie) VALUES ('Pentagon papers', 'The post', 'Un des premiers scoops de l ''histoire du journalisme américain au début des années 1970', '2017', 'images/pentagonPapers.jpg', 5,"Drame historique");
INSERT INTO film (titre, titrevo, resume, annee, photo, numRealisateur, categorie) VALUES ('Shining', 'Shining', 'TB basé sur un roman de Stephen King', '1980', 'images/shining.jpg', 2, "Horreur");
INSERT INTO film (titre, titrevo, resume, annee, photo,numRealisateur, categorie) VALUES ('Blade runner 2049', 'Blade runner 2049', '2049, toujours à Los Angeles. Les multinationales, ont depuis longtemps mainmise sur l''exploitation des mondes environnants, avec à leurs services des androïdes génétiquement modifiés de plus en plus efficaces et dociles...', '2017','images/bladeRunner.jpg', 7,"Science fiction" );
INSERT INTO film (titre, titrevo, resume, annee, photo,numRealisateur, categorie) VALUES ('La Guerre des mondes', 'War of the Worlds', 'Ray Ferrier est un père divorcé vivant dans le New Jersey, en banlieue de New York.Le soir, un orage éclate et déclenche d''étranges phénomènes. Bientôt, d''énormes engins mécaniques surgissent de sous la terre ...', '2005','images/laGuerreDesMondes.jpg',5,"Sience fiction");
INSERT INTO film (titre, titrevo, resume, annee, photo,numRealisateur, categorie) VALUES ('Le pont des espions','Bridge of Spies', 'En pleine guerre froide, James B. Donovan, un avocat américain, accepte de défendre Rudolf Abel , un espion soviétique installé depuis des années aux États-Unis.', '2015','images/lePontDesEspions.jpg',5,"Drame historique");
INSERT INTO film (titre, titrevo, resume, annee, photo,numRealisateur, categorie) VALUES ('King Kong', 'King Kong', 'Remake explicite et fidèle du King Kong sorti en 1933', '2005',  'images/kingKong.jpg',3,"Fantastique");
INSERT INTO film (titre, titrevo, resume, annee, photo,numRealisateur, categorie) VALUES ('Le Film Lego 2','The Lego Movie 2: The Second Part', 'Animation 3D', '2019',  'images/lego2.jpg',6,"Animation");
INSERT INTO film (titre, titrevo, resume, annee, photo,numRealisateur, categorie) VALUES ('Shrek 4, il était une fin', 'Shrek Forever After', 'L''ogre vert le plus sympathique du cinéma revient aux côtés de sa femme Fiona, de son fidèle compagnon l''Âne et du Chat Potté un peu enrobé, dans une nouvelle aventure délirante et décalée.','1980', 'images/shrek.jpg',6,"Animation");
INSERT INTO film (titre, titrevo, resume, annee, photo,numRealisateur, categorie) VALUES ('Dune', 'Dune', 'Aucun', '1984', 'images/dune.jpg', 8,"Science fiction");
INSERT INTO film (titre, titrevo, resume, annee, photo,numRealisateur, categorie) VALUES ('Mulholland Drive', 'Mulholland Drive', 'Histoire d''une aspirante actrice appelée Betty Elms fraîchement arrivée à Los Angeles, en Californie ; elle rencontre et se lie d''amitié avec une femme amnésique, victime d''un accident, grâce auquel elle a échappé à un meurtre.', '2001','images/mulhollandDrive.jpg',8,"Drame");
