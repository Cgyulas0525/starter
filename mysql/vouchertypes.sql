create table vouchertypes
(
	id int auto_increment,
	name varchar(200) not null,
	localfund int default 0 not null,
	localreplay int default 0 not null,
	otherfund int default 0 not null,
	otherreplay int default 0 not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint vouchertypes_id_uindex
		unique (id)
);

alter table vouchertypes
	add primary key (id);

