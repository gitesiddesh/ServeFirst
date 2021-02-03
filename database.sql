drop table customer;
create table customer(reg_no serial primary key,user_name varchar(20),issue varchar(20),status varchar(20));

	insert into customer values(1,'siddesh','laptop','pending');
	insert into customer values(4,'vipul','laptop','pending');
	insert into customer values(5,'aabhas','desktop','pending');
