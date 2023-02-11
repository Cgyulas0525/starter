create table eger.detailtypes
(
	id int auto_increment,
	name varchar(100) not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint detailtypes_id_uindex
		unique (id)
);

create index detailtypes_name_id_index
	on eger.detailtypes (name, id);

alter table eger.detailtypes
	add primary key (id);

