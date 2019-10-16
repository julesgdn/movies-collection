Drop table IF EXISTS FILMS;
Drop table IF EXISTS REALISATEURS;

create table REALISATEURS(
    Nom Varchar(100) PRIMARY KEY,
    DateNaiss DATE
);

create table FILMS(
    Id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    Titre Varchar(100),
    AnneeRea SMALLINT,
    Genre Varchar(100),
    Studio Varchar(100),
    Synopsis Varchar(300),
    Realisateur Varchar(100),
    AfficheUrl Varchar(255),
    UtiliseApi VARCHAR (3)

);