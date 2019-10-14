Drop table IF EXISTS FILMS;
Drop table IF EXISTS REALISATEUR;

create table REALISATEUR(
    Id SMALLINT PRIMARY KEY,
    Nom Varchar(30),
    Prenom Varchar(30),
    DateNaiss DATETIME
);

create table FILMS(
    Titre Varchar(100),
    AnneeRea DATETIME,
    Genre Varchar(50),
    Studio Varchar(50),
    Synopsis Varchar(300),
    Realisateur SMALLINT,
    PRIMARY KEY (Titre, AnneeRea),
    FOREIGN KEY (Realisateur) REFERENCES REALISATEUR(Id) ON DELETE CASCADE
);