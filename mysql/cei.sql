#创建项目表
create table projects(
	project_id int not null auto_increment,
	project_name varchar(30) not null,
	project_date timestamp default current_timestamp,
	project_price int not null default 0,
	project_desc text null,
	primary key (project_id)
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
create table project_members(
	project_id int not null,
	member_name varchar(10) not null,
	primary key (project_id, member_name)
)default charset=utf8;


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
