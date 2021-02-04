drop table IF EXISTS admin;
drop table IF EXISTS amcservice;
drop table IF EXISTS service;
drop table IF EXISTS corporate;
drop table  IF EXISTS walkin;
create table walkin(
	username varchar(50) primary key,
	password varchar(50),
	fullname varchar(50),
	email varchar(50),
	contact bigint,
	address varchar(150)
	);

	
 create table corporate(
	username varchar(50) primary key,
	password varchar(50),
	owner varchar(50),
	company varchar(50),
	email varchar(50),
	contact bigint,
	address varchar(150)
	);

create table service(
	regno integer primary key,
	username varchar(50),
	usertype varchar(50),
	helpfor varchar(50),
	description varchar(200),
	address varchar(150),
	date date,
	time time,
	status varchar(20),
	billamount bigint
);

create table amcservice(
	regno integer primary key,
	username varchar(50),
	plan varchar(50),
	noofmachines integer,
	typeofmachine varchar(50),
	address varchar(150),
	startdate date,
	status varchar(20),
	billamount bigint
);

create table admin(
	username varchar(50) primary key,
	password varchar(50)
);