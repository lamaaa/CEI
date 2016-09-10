#创建数据库cei
create database CEI;
use CEI;

#创建项目表Items
create table Items(
	Item_id int unsigned not null auto_increment,
	Item_name varchar(30) not null,
	Item_date timestamp default current_timestamp,
	Item_price decimal(8,2)  NOT NULL,
	Item_desc text null,
	PRIMARY KEY (Item_id)
);

#创建参与人表Partners
create table Partners(
	Partner_id int unsigned not null auto_increment,
	Partner_name varchar(30) not null,
	PRIMARY KEY (Partner_id)
);
#创建项目参与人表ItemPartners
create table ItemsPartners(
	Item_id int unsigned not null,
	Partner_id int unsigned not null,
	PRIMARY KEY (Item_id,Partner_id)
);
#定义主键与外键
ALTER TABLE Items ADD PRIMARY KEY (Item_id);
ALTER TABLE Partners ADD PRIMARY KEY (Partner_id);
ALTER TABLE ItemsPartners ADD PRIMARY KEY (Item_id,Partner_id);
ALTER TABLE ItemsPartners ADD CONSTRAINT FK_ItemsPartners_Items FOREIGN KEY (Item_id) REFERENCES Items (Item_id);
ALTER TABLE ItemsPartners ADD CONSTRAINT FK_ItemsPartners_Partners FOREIGN KEY (Partner_id) REFERENCES Partners (Partner_id);
#转化编码utf-8
alter table Items convert to character set utf8;
alter table Partners convert to character set utf8;
#创建数据
insert into Partners (Partner_name) values ('蔡昂材');
	insert into Partners (Partner_name) values ('彭家钊');
		insert into Partners (Partner_name) values ('林浩阳');
			insert into Partners (Partner_name) values ('洪东科');
				insert into Partners (Partner_name) values ('洪东科');
					insert into Partners (Partner_name) values ('洪东科');
drop table Items;
drop table Partners;
drop table ItemsPartners;
-- create table Items(
-- 	Item_id int unsigned not null auto_increment,
-- 	Item_name varchar(30) not null,
-- 	Item_date timestamp default current_timestamp,
-- 	Item_price decimal(8,2)  NOT NULL,
-- 	Item_desc text null,
-- 	PRIMARY KEY (Item_id)
-- );

create table Items(

	Item_id int unsigned not null auto_increment,
	Item_name varchar(30) not null,
	Item_date timestamp default current_timestamp,
	Item_price decimal(8,2) not null,
	Item_partners text null,
	PRIMARY KEY (Item_id)
);
alter table Items convert to character set utf8;
insert into Items (Item_name,Item_price,Item_partners) values ('张丹工作室','2500','蔡昂材 彭家钊');