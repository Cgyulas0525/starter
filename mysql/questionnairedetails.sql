create table questionnairedetails
(
	id int auto_increment,
	questionnaire_id int not null,
	name varchar(200) not null,
	detailtype_id int not null,
	required int default 0 not null,
	readonly int default 0 not null,
	`long` int null,
	rowcount int default 1 null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint questionnairedetails_id_uindex
		unique (id)
);

create index questionnairedetails_questionnaire_id_id_index
	on questionnairedetails (questionnaire_id, id);

create index questionnairedetails_questionnaire_id_name_index
	on questionnairedetails (questionnaire_id, name);

alter table questionnairedetails
	add primary key (id);

