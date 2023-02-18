create table validpostcodes
(
	id int auto_increment,
	settlement_id int not null,
	postcode int not null,
	active int default 1 not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint validpostcodes_id_uindex
		unique (id),
	constraint validpostcodes_settlement_id_postcode_uindex
		unique (settlement_id, postcode)
);

alter table validpostcodes
	add primary key (id);

