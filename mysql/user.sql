CREATE database studio;

use studio;

create table user
(
	username varchar(16) not null primary key,
	password char(40) not null
);