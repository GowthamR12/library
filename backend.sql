create database library;
drop database library;
use library;

create table admin(aid int primary key, 
email varchar(50),
password varchar(30));
insert into admin values('1','gowthamraghunathan@gmail.com','1234');
select * from admin;

create table books(bid int primary key auto_increment,
dateofacc date not null,
author varchar(100) not null,
title varchar(50) not null,
publisher varchar(50) ,
year year(4),
nopages varchar(30),
price integer,
shelfno integer)engine=InnoDB;

drop table books;
select * from books;

create table bookacc(bcid int primary key auto_increment,
accno varchar(10) unique,
bfid int,
foreign key(bfid) references books(bid) on delete cascade,
isissued varchar(3) default 'no',
volume integer)engine=InnoDB;
select * from bookacc;
drop table bookacc;

create table student(sid int primary key auto_increment,
username varchar(20) not null,
uprn varchar(10) unique not null,
email varchar(50) not null,
phoneno varchar(10) not null, 
password varchar(100) not null,
role varchar(3) not null,
tot int default 0,
crtdate date,
exprydate date,
isexp varchar(10) default 'active'
)engine=InnoDB;

select * from student;
drop table student;
select DATEDIFF(exprydate,crtdate) as diff from student wstudenthere isexp='active';

create table stud_book_issue(
sbid int primary key auto_increment,
sid int,
foreign key(sid) references student(sid) on delete cascade on update cascade,
uprn varchar(10)  not null,
issue_date date not null,
actual date not null,
returned date,
ret_stat int default 0,
fine_status int default 0,
book_acc varchar(10) not null,
paid varchar(5),
maildiff int,
mailsent int default 0 
)engine=InnoDB;

select datediff(actual,issue_date) as diff from stud_book_issue;
drop table stud_book_issue;
select * from stud_book_issue;

create table faculty(fid int primary key auto_increment,
username varchar(20) not null,
email varchar(50) unique not null,
phoneno varchar(10) not null, 
password varchar(100) not null
)engine=InnoDB;

drop table faculty;
select * from faculty;

create table fac_book_issue(
fbid int primary key auto_increment,
book_acc varchar(50) not null,
issue_date date not null,
email varchar(50) not null,
book_title varchar(50) not null,
return_date date ,
ret_stat int default 0,
fid int,
foreign key(fid) references  faculty(fid) on delete cascade on update cascade)engine=InnoDB;

select * from fac_book_issue;

drop table fac_book_issue;

select books.title,bookacc.accno,bookacc.isissued from books inner join bookacc on books.bid=bookacc.bfid where accno='sfa-10';

select books.author,books.title,bookacc.accno,bookacc.isissued from books
inner join bookacc on books.bid=bookacc.bfid  where author like '%haris%' or accno like '%sfa-18%' or title like '%financ%';  