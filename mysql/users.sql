CREATE database cei;

use cei;

create table users
(
	username varchar(16) not null primary key,
	password char(40) not null
);

INSERT INTO user values ('lam', '123');