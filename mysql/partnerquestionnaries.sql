create table partnerquestionnaries
(
	id int auto_increment,
	partner_id int not null,
	questionnarie_id int not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint partnerquestionnarie_id_uindex
		unique (id)
);

create index partnerquestionnarie_questionnarie_id_partner_id_index
	on partnerquestionnaries (questionnarie_id, partner_id);

alter table partnerquestionnaries
	add primary key (id);

