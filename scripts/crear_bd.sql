CREATE DATABASE IF NOT EXISTS dbbiblioteca;
USE dbbiblioteca;

drop table if exists libros;
drop table if exists generos ;
drop table if exists linpedido;
drop table if exists cabpedido;
drop table if exists usuarios;


create table materias (
	codigo_materia varchar(20) not null,
	descripcion varchar(200),
	activo char(1) default 'S',
primary key (codigo_materia)) engine = innodb;

create table materias1 (
	codigo_materia varchar(20) not null,
	descripcion varchar(200),
	activo char(1) default 'S',
primary key (codigo_materia)) engine = innodb
CHARACTER SET utf8_spanish_ci
COLLATE utf8_unicode_ci;

CREATE TABLE tbl_name (column_list)
    [[DEFAULT] CHARACTER SET charset_name]
    [COLLATE collation_name]]

create table generos (
	codigo_genero int not null AUTO_INCREMENT,
	nombre varchar(20) not null,
	descripcion varchar(100),
	activo char(1) default 'S',
primary key (codigo_genero)) engine = innodb;

create table libros (
	codigo_libro int not null auto_increment,
	titulo varchar(100) not null,
	autor varchar(40) not null,
	genero int not null,
	anyoedicion smallint,
	duracion int,
	precio int,
	portada varchar(200),
	oferta char(1) default 'N',
	activo char(1) default 'S',
 primary key (codigo_libro)) engine = innodb;




alter table libros
	add foreign key (genero) references generos (codigo_genero)
	on delete restrict
	on update restrict;




create table ejemplares (
	codigo_libro int not null,
	numejemplar int not null,
	titulo varchar(100) not null,
	autor varchar(40) not null,
	genero int not null,
	anyoedicion smallint,
	nota varchar(100),
	activo char(1) default 'S',
 primary key (codigo_libro, numejemplar)) engine = innodb;

 alter table ejemplares
	add foreign key (codigo_libro) references libros (codigo_libro)
	on delete restrict
	on update restrict;

create table usuarios (
	email varchar(40) not null,
	contrasenya varchar(40) not null,
	nombre varchar(20) not null,
	apellido1 varchar(20) not null,
	apellido2 varchar(20) not null,
	direccion varchar(40),
	cpostal char(5),
	poblacion varchar(25),
	provincia varchar(25),
	telefono varchar(25),
	dni char(10) not null,
	tipo char(1) not null,
	activo char(1) not null,
 primary key (email)) engine = innodb;


create table cabprestamos (
	numprestamo int not null AUTO_INCREMENT,
	email varchar(40) not null,
	codigo_libro integer not null,
	numejemplar integer not null,
	fecha_alta date not null,
	fecha_prev_dev date not null,
	fecha_real_dev date,
primary key (numprestamo)) engine = innodb;

alter table cabprestamos
	add foreign key (email) references usuarios (email)
	on delete restrict
	on update restrict;

	alter table cabprestamos
	add foreign key (codigo_libro,numejemplar) references ejemplares (codigo_libro,numejemplar)
	on delete restrict
	on update restrict;



 create table cabpedido (
	numpedido int not null,
	email varchar(40) not null,
	estado char(1) not null,
	activo char(1) not null,
primary key (numpedido)) engine = innodb;

 create table linpedido (
	numpedido int not null,
	linpedido int not null,
	codigo_libro int not null,
	unidades int not null,
	activo char(1) not null,
primary key (numpedido,linpedido)) engine = innodb;

alter table linpedido
	add foreign key (numpedido) references cabpedido (numpedido)
	on delete restrict
	on update restrict;

   insert into usuarios values("super@hotmail.com","1234","Juan Carlos","Molina","Azorin","C/San Cristobal nº7","03400","Villena","Alicante","626173237","77889988W","S","S");
   insert into usuarios values("normal@hotmail.com","1234","Antonio","Samper","Pena","C/Democracia nº7","03400","Villena","Alicante","726173237","12345678W","E","S");
   insert into usuarios values("cliente@hotmail.com","1234","Pedro","Villar","Esteve","C/Rosas nº12","03400","Villena","Alicante","12343237","12345678W","C","S");

 insert into generos values (1,"Pop-Rock","","S");
 insert into generos values (2,"Clasica", "","S");
 insert into generos values (3,"Jazz y Blues", "","S");
 insert into generos values (4,"Hard Rock", "","S");
 insert into generos values (5,"Electronica", "","S");
 insert into generos values (6,"Cantautores", "","S");
 insert into generos values (7,"Bandas Sonoras", "","S");

 insert into libros values(1,"Boy","U2",1,2010,60,20,"1.jpg","N","S");
 insert into libros values(2,"October","U2",1,2011,60,20,"2.jpg","N","S");
 insert into libros values(3,"War","U2",1,2012,60,20,"3.jpg","N","S");
 insert into libros values(4,"Under a blood red sky","U2",1,2013,60,20,"4.jpg","N","S");
 insert into libros values(5,"the unforgettable fire","U2",1,2014,60,20,"5.jpg","N","S");
 insert into libros values(6,"The Joshua Tree","U2",1,2015,60,20,"6.jpg","N","S");
 insert into libros values(7,"Rattle and Hum","U2",1,2010,60,20,"7.jpg","N","S");
 insert into libros values(8,"disco 8","Coldplay",1,2011,60,20,"8.jpg","N","S");
 insert into libros values(9,"disco 9","Coldplay",1,2012,60,20,"9.jpg","N","S");
 insert into libros values(10,"Parachutes","Coldplay",1,2013,60,20,"10.jpg","N","S");
 insert into libros values(11,"Viva la Vida","Coldplay",1,2014,60,20,"11.jpg","N","S");
 insert into libros values(12,"Allegro","Mozart",2,2015,60,20,"12.jpg","N","S");
 insert into libros values(13,"Romance","Mozart",2,2010,60,20,"13.jpg","N","S");
 insert into libros values(14,"Las 4 estaciones","Vivaldi 1",2,2011,60,20,"14.jpg","N","S");
 insert into libros values(15,"Andante","Vivaldi",2,2012,60,20,"15.jpg","N","S");
 insert into libros values(16,"We are Born","Sia",1,2013,60,20,"16.jpg","N","S");
 insert into libros values(17,"Live at the Regal","B.B.King",3,2014,60,20,"17.jpg","N","S");
 insert into libros values(18,"Lucille","B.B.King",3,2015,60,20,"18.jpg","N","S");
 insert into libros values(19,"Mutter","Rammstein",4,2010,60,20,"19.jpg","S","S");
 insert into libros values(20,"Rosenrot","Rammstein",4,2011,60,20,"20.jpg","N","S");
 insert into libros values(21,"The 2nd Law","Muse",5,2012,60,20,"21.jpg","N","S");
 insert into libros values(22,"The Resistance","Muse",5,2013,60,20,"22.jpg","S","S");
 insert into libros values(23,"La memoria de los peces","Ismael Serrano",6,2014,60,20,"23.jpg","N","S");
 insert into libros values(24,"En el luna park","Serrat",6,2015,60,20,"24.jpg","N","S");
 insert into libros values(25,"Braveheart","London Orchestra",7,2010,60,20,"25.jpg","S","S");
 insert into libros values(26,"Conan","Prague Orchestra",7,2011,60,20,"26.jpg","N","S");
 insert into libros values(27,"in a Silent Way","Miles Davis",3,2012,60,20,"27.jpg","N","S");
 insert into libros values(28,"Highway to Hell","ACDC",4,2013,60,20,"28.jpg","S","S");
 insert into libros values(29,"Sleeping with Ghosts","Placebo",5,2014,60,20,"29.jpg","N","S");
 insert into libros values(30,"Nos sobran los motivos","Sabina",6,2015,60,20,"30.jpg","N","S");
 insert into libros values(31,"Master of Puppets","Metallica",4,2010,60,20,"31.jpg","N","S");


insert into libros values(1,"El Quijote","Miguel de Cervantes", 1,2000,110,10,"","S","S");
insert into libros values(1,"El Hobbit","Tolkien", 2,2000,110,10,"","S","S");

insert into ejemplares values(1,1,"","",1,2000,"","S");
insert into ejemplares values(1,2,"","",1,2000,"","S");
insert into ejemplares values(2,1,"","",1,2000,"","S");
insert into ejemplares values(2,2,"","",1,2000,"","S");
insert into ejemplares values(2,3,"","",1,2000,"","S");



	codigo_libro int not null,
	numejemplar int not null,
	titulo varchar(100) not null,
	autor varchar(40) not null,
	genero int not null,
	anyoedicion smallint,
	nota varchar(100),
	activo char(1) default 'S',
insert into ejemplares values(1,1,"","",1,2000,"";"S");


INSERT INTO cabpedido (numpedido, email,estado,activo) VALUES (1, 'cliente@hotmail.com','R','S');
INSERT INTO cabpedido (numpedido, email,estado,activo) VALUES (2, 'cliente@hotmail.com','R','S');
INSERT INTO linpedido (numpedido, linpedido, codigo_disco, unidades,activo) VALUES(1, 1, 1, 3,'S'),(1, 2, 2, 1,'S'),(2, 1, 1, 3,'S'),(2, 2, 2, 1,'S');







