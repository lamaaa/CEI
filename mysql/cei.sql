#创建项目表
create table items(

	item_id int not null auto_increment,
	item_name varchar(30) not null,
	item_date timestamp default current_timestamp,
	item_price int not null default 0,
	item_desc text null,
	primary key (item_id)
)default charset=utf8;

#创建成员表members
create table members(

	member_id int not null auto_increment,
	member_name varchar(10) not null,
	member_major varchar(30) null,
	member_direction varchar(30) null, 
	member_desc text null,
	primary key (member_id)
)default charset=utf8;

#创建项目成员映射表
create table relation(

	id int not null auto_increment,
	item_name varchar(30) not null,
	member_name varchar(10) not null,
	primary key (id)
)default charset=utf8;

#插入数据
insert into items(item_name,item_price,item_desc) values ('测试',666,'测试');
insert into relation(item_name,member_name) values ('测试','陈浩涛');
	insert into relation(item_name,member_name) values ('测试','洪东科');
		insert into relation(item_name,member_name) values ('测试','林浩阳');
			insert into relation(item_name,member_name) values ('测试','蔡昂材');
				insert into relation(item_name,member_name) values ('测试','彭家钊');

insert into members(member_name,member_major,member_direction,member_desc) values('陈浩涛','计算机科学与技术','php后端开发','什么都没有');
insert into members(member_name,member_major,member_direction,member_desc) values('林浩阳','计算机科学与技术','python后端开发','什么都没有');	
	insert into members(member_name,member_major,member_direction,member_desc) values('洪东科','计算机科学与技术','java后端开发','什么都没有');
		insert into members(member_name,member_major,member_direction,member_desc) values('蔡昂材','计算机科学与技术','前端开发','什么都没有');
			insert into members(member_name,member_major,member_direction,member_desc) values('彭家钊','计算机科学与技术','前端开发','什么都没有');

#图像表
create table images(

	image_id int not null auto_increment,
	image_name varchar(200) not null,
	image_date timestamp default current_timestamp,
	image_type varchar(30) null,
	primary key (image_id)
)default charset=utf8;				
