create table questionnairedetailitems
(
	id int auto_increment,
	questionnariedetail_id int not null,
	value varchar(200) not null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint questionnairedetailitems_id_uindex
		unique (id),
	constraint questionnairedetailitems_questionnariedetail_id_id_uindex
		unique (questionnariedetail_id, id)
);

alter table questionnairedetailitems
	add primary key (id);

