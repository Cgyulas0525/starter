create table clientquestionnaries
(
	id int auto_increment,
	client_id int not null,
	questionnarie_id int not null,
	posted date not null,
	retrieved date null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint clientquestionnarie_client_id_questionnarie_id_uindex
		unique (client_id, questionnarie_id),
	constraint clientquestionnarie_id_uindex
		unique (id)
);

create index clientquestionnarie_questionnarie_id_client_id_index
	on clientquestionnaries (questionnarie_id, client_id);

create index clientquestionnarie_retrieved_id_index
	on clientquestionnaries (retrieved, id);

alter table clientquestionnaries
	add primary key (id);

