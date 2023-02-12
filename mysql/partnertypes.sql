create table partnertypes
(
	id int auto_increment,
	name varchar(100) not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint partnertypes_id_uindex
		unique (id),
	constraint partnertypes_name_uindex
		unique (name)
);

alter table partnertypes
	add primary key (id);

