create table lotteriequestionnarie
(
	id int auto_increment,
	lotterie_id int not null,
	questionnarie_id int not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint lotteriequestionnarie_id_uindex
		unique (id)
);

create index lotteriequestionnarie_lotterie_id_questionnarie_id_index
	on lotteriequestionnarie (lotterie_id, questionnarie_id);

create index lotteriequestionnarie_questionnarie_id_lotterie_id_index
	on lotteriequestionnarie (questionnarie_id, lotterie_id);

alter table lotteriequestionnarie
	add primary key (id);

