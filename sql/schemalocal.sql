set foreign_key_checks=0;

drop table if exists errores;
create table errores(id int primary key not null auto_increment,error text not null,fecha datetime not null);

drop table if exists eraser;
create table eraser(id int primary key not null auto_increment,user text not null,nit text not null,razon text not null,docentry_f int not null,docnum_f int not null,docnum_p int,docentry_p int,docnum_e int,docentry_e int,ticket int,fecha datetime not null);

set foreign_key_checks=1;