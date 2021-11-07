create database library;
drop database library;
use library;

create table admin(aid int primary key, 
email varchar(50),
password varchar(30));
insert into admin values('1','gowthamraghunathan@gmail.com','1234');
select * from admin;

create table subject(
subid int primary key auto_increment,
subject varchar(100) not null
)engine=InnoDB;
insert  into subject(subject) values("english");
insert  into subject(subject) values("OR");
insert  into subject(subject) values("english");
insert  into subject(subject) values("OR");
insert  into subject(subject) values("english");
insert  into subject(subject) values("OR");
insert  into subject(subject) values("english");
insert  into subject(subject) values("OR");
insert  into subject(subject) values("english");
insert  into subject(subject) values("OR");

select * from subject;
drop table subject;

create table books(bid int primary key auto_increment,
subid int,
foreign key(subid) references subject(subid),
dateofacc varchar(100),
author varchar(300), 
title varchar(300) not null,
publisher varchar(100) ,
year varchar(20),
nopages varchar(30),
price varchar(100),
shelfno integer)engine=InnoDB;

insert into books(subid,author,title,publisher,nopages,price) values(1,"raju","book1","publisher","45","540");
insert into books(subid,author,title,publisher,nopages,price) values(2,"bheem","book2","publisher2","50","600");

drop table books;
select * from books;
select * from books where subid=1 and (author like '%raju%' or title like '%book2%');

create table bookacc(bcid int primary key auto_increment,
accno varchar(10) unique,
bfid int,
foreign key(bfid) references books(bid) on delete cascade,
isissued varchar(3) default 'no',
volume integer)engine=InnoDB;

insert into bookacc(bfid,accno) values(1,"sfa-10");
insert into bookacc(bfid,accno) values(1,"sfa-11");
insert into bookacc(bfid,accno) values(2,"sfa-12");
insert into bookacc(bfid,accno) values(2,"sfa-13");

select books.title,books.author,books.bid,bookacc.accno from books inner join bookacc on books.bid=bookacc.bfid 
where subid='{$_SESSION['SUBJECT']}' and (author like '%{$_POST['se']}%'  or title like '%{$_POST['se']}%' or accno like '%{$_POST['se']}%')"; 

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


create table stud_book_issue(
sbid int primary key auto_increment,
sid int,
foreign key(sid) references student(sid) on delete cascade on update cascade,
uprn varchar(10)  not null,
stname varchar(30) not null,
book_title varchar(100),
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

select * from stud_book_issue where ((issue_date between '2021-10-20' and '2021-10-30') ) and ret_stat=1;

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
facname varchar(50),
issue_date date not null,
email varchar(50) not null,
actual date not null,
book_title varchar(50) not null,
return_date date ,
ret_stat int default 0,
maildiff int,
mailsent int default 0,
fid int,
foreign key(fid) references  faculty(fid) on delete cascade on update cascade)engine=InnoDB;

select * from fac_book_issue;

drop table fac_book_issue;

select books.title,bookacc.accno,bookacc.isissued from books inner join bookacc on books.bid=bookacc.bfid where accno='sfa-10';

select books.author,books.title,bookacc.accno,bookacc.isissued from books
inner join bookacc on books.bid=bookacc.bfid  where author like '%haris%' or accno like '%sfa-18%' or title like '%financ%';  