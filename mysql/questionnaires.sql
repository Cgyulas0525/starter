create table questionnaires
(
	id int auto_increment,
	name varchar(200) not null,
	validityfrom date not null,
	validitato date not null,
	active int default 0 not null,
	basicpackage int default 0 not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint questionnaires_active_id_uindex
		unique (active, id),
	constraint questionnaires_id_uindex
		unique (id),
	constraint questionnaires_name_id_uindex
		unique (name, id)
);

create index questionnaires_validityfrom_validitato_id_index
	on questionnaires (validityfrom, validitato, id);

alter table questionnaires
	add primary key (id);

