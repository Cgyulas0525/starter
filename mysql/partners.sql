create table partners
(
	id int auto_increment,
	name varchar(100) not null,
	partnertype_id int null,
	taxnumber varchar(15) null,
	bankaccount varchar(30) null,
	postcode int null,
	settlement_id int null,
	address varchar(100) null,
	email varchar(50) null,
	phonenumber varchar(20) null,
	description varchar(500) null,
	active int default 1 not null,
	logourl varchar(200) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint partners_id_uindex
		unique (id),
	constraint partners_name_id_uindex
		unique (name, id),
	constraint partners_partnertype_id_id_uindex
		unique (partnertype_id, id)
);

