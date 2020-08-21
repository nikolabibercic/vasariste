CREATE DATABASE vasariste 
CHARACTER SET utf8 
COLLATE utf8_unicode_ci;

CREATE TABLE statusi_oglasa(
	status_oglasa_id int AUTO_INCREMENT PRIMARY KEY,
	opis varchar(50) character set utf8 not null
)engine=myisam;

create table drzave(
	drzava_id int AUTO_INCREMENT PRIMARY KEY,
	naziv varchar(50) character set utf8 not null
)engine=myisam;

insert into drzave values(null,'Srbija');
insert into drzave values(null,'BiH');
insert into drzave values(null,'Hrvatska');
insert into drzave values(null,'Crna Gora');

create table korisnici(
	korisnik_id int AUTO_INCREMENT PRIMARY KEY,
	ime varchar(50) character set utf8 not null,
    prezime varchar(50) character set utf8 not null,
    email varchar(50) not null unique,
	password varchar(50) not null,
	ulica varchar(100) character set utf8,
	broj varchar(20) character set utf8,
    grad varchar(50) character set utf8,
	opstina varchar(50) character set utf8,
    drzava_id int not null,
	datum_kreiranja datetime not null,
	FOREIGN KEY (drzava_id) REFERENCES drzave(drzava_id)
)engine=myisam;

CREATE TABLE tipovi_oglasa(
	tip_oglasa_id int AUTO_INCREMENT PRIMARY KEY,
    opis varchar(50) character set utf8 not null
)engine=myisam;

CREATE TABLE kategorije_oglasa(
	kategorija_id int AUTO_INCREMENT PRIMARY KEY,
    opis varchar(50) character set utf8 not null
)engine=myisam;

CREATE TABLE podkategorije_oglasa(
	podkategorija_id int AUTO_INCREMENT PRIMARY KEY,
    opis varchar(50) character set utf8 not null,
	kategorija_id int not null,
	FOREIGN KEY (kategorija_id) REFERENCES kategorije_oglasa(kategorija_id)
)engine=myisam;

CREATE TABLE valute(
	valuta_id int AUTO_INCREMENT PRIMARY KEY,
	opis varchar(50) character set utf8 not null
)engine=myisam;


CREATE TABLE oglasi(
	oglas_id int AUTO_INCREMENT PRIMARY KEY,
	naslov varchar(30) character set utf8 not null,
    tekst varchar(200) character set utf8 not null,
    cena decimal(15,2) not null,
	kategorija_id int not null,
    tip_oglasa_id int not null,
    korisnik_id int not null,
	datum_objave datetime not null,
	valuta_id int not null,
	telefon varchar(50),
	status_oglasa_id int not null,
	like_count int not null,
	dislike_count int not null,
	podkategorija_opis varchar(200) character set utf8 not null,
	FOREIGN KEY (status_oglasa_id) REFERENCES statusi_oglasa(status_oglasa_id),
	FOREIGN KEY (kategorija_id) REFERENCES kategorije_oglasa(kategorija_id),
    FOREIGN KEY (korisnik_id) REFERENCES korisnici(korisnik_id),
    FOREIGN KEY (tip_oglasa_id) REFERENCES tipovi_oglasa(tip_oglasa_id),
	FOREIGN KEY (valuta_id) REFERENCES valute(valuta_id)
)engine=myisam;

CREATE TABLE slike_oglasa(
	slika_oglasa_id int AUTO_INCREMENT PRIMARY KEY,
	oglas_id int not null,
	slika_path varchar(100) character set utf8,
	FOREIGN KEY (oglas_id) REFERENCES oglasi(oglas_id)
)engine=myisam;

CREATE TABLE prava(
	pravo_id int AUTO_INCREMENT PRIMARY KEY,
	opis varchar(50) character set utf8 not null
)engine=myisam;

CREATE TABLE korisnici_prava(
	korisnik_prava_id int AUTO_INCREMENT PRIMARY KEY,
	korisnik_id int not null,
	pravo_id int not null,
	FOREIGN KEY (korisnik_id) REFERENCES korisnici(korisnik_id),
	FOREIGN KEY (pravo_id) REFERENCES prava(pravo_id)
)engine=myisam;



insert into statusi_oglasa values(null,'Aktivan');
insert into statusi_oglasa values(null,'Neaktivan');

insert into valute values(null,'EUR');
insert into valute values(null,'RSD');

insert into prava values(null,'Administrator');

insert into tipovi_oglasa values(null,'Standardni oglas');
insert into tipovi_oglasa values(null,'Istaknuti oglas');
insert into tipovi_oglasa values(null,'Premium oglas');

insert into kategorije_oglasa values(null,'Nekretnine');
insert into kategorije_oglasa values(null,'Posao');
insert into kategorije_oglasa values(null,'Vozila i delovi');
insert into kategorije_oglasa values(null,'Računari');
insert into kategorije_oglasa values(null,'Odmor');
insert into kategorije_oglasa values(null,'Lični kontakti');
insert into kategorije_oglasa values(null,'Nega lica i tela');
insert into kategorije_oglasa values(null,'Građevinarstvo');
insert into kategorije_oglasa values(null,'Poljoprivreda');
insert into kategorije_oglasa values(null,'Alati, mašine i oprema');
insert into kategorije_oglasa values(null,'Nameštaj');
insert into kategorije_oglasa values(null,'Kućni aparati');
insert into kategorije_oglasa values(null,'Telefoni');
insert into kategorije_oglasa values(null,'Muzika i instrumenti');
insert into kategorije_oglasa values(null,'Odeća, obuća i dodaci');
insert into kategorije_oglasa values(null,'Sport');
insert into kategorije_oglasa values(null,'Kućni ljubimci');
insert into kategorije_oglasa values(null,'Zdravstvo');
insert into kategorije_oglasa values(null,'Ostalo');
insert into kategorije_oglasa values(null,'Knjige');

