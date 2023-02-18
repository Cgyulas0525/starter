create table logitemtypes
(
	id int auto_increment,
	name varchar(100) not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint logitemtypes_id_uindex
		unique (id),
	constraint logitemtypes_name_uindex
		unique (name)
);

alter table logitemtypes
	add primary key (id);

