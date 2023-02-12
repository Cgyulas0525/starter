create table partnercontacts
(
	id int auto_increment,
	partner_id int not null,
	name varchar(100) not null,
	password varchar(200) not null,
	email varchar(100) not null,
	phonenumber varchar(25) null,
	active int default 0 not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint partnercontacts_active_id_uindex
		unique (active, id),
	constraint partnercontacts_id_uindex
		unique (id),
	constraint partnercontacts_partner_id_id_uindex
		unique (partner_id, id),
	constraint partnercontacts_partner_id_name_id_uindex
		unique (partner_id, name, id)
);

alter table partnercontacts
	add primary key (id);

