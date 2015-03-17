

create table LesAnimaux (nomA varchar(20),sexe ENUM('Male','Femelle','hermaphrodite'),type Varchar(20),anNais date,noCage number(2,0),
constraint LesAnimaux_ck check (noCage not null),
constraint LesAnimaux_c1 primary key (nomA));

create table LesMaladies(nomA varchar(20),nomM varchar(30),
constraint LesMaladies_f1 foreign key (nomA) reference LesAnimaux(nomA),
constraint LesMaladies_c1 primary key (nomA,nomM));

create table LesCages (noCage number(2,0), fonction varchar(20),noAllee number(2,0),
constraint LesCages_f1 foreign key (noCage) reference LesAnimaux (noCage),
constraint LesCages_c1 primary key (noCage));

create table LesEmployes(nomE varchar(20),adresse varchar(30),
constraint LesEmployes_c1 primary key (nomE));

create table LesResponsables(noAllee number(2,0), nomE varchar(20),
constraint LesEmployes_f1 foreign key(nomE) reference LesEmployes(nomE),
constraint LesEmployes_f2 foreign key(noAllee) reference LesCages(noAllee),
constraint LesEmployes_c1 primary key (noAllee));

create table LesGardiens(noCage number(2,0),nomE varchar(20),
constraint LesGardiens_f1 foreign key(nomE) reference LesEmployes(nomE),
constraint LesGardiens_f2 foreign key(noCage) reference LesCages(noCage),
constraint LesGardiens_c1 primary key(noCage,nomE));