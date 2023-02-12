create table logitem
(
	id int auto_increment,
	client_id int not null,
	user_id int not null,
	partnercontact_id int not null,
	eventtype int not null,
	eventdatetime timestamp not null,
	remoteaddress varchar(100) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint logitem_id_uindex
		unique (id)
)
charset=utf32;

create index logitem__customeruser_index
	on logitem (client_id, user_id, eventdatetime);

create index logitem__eventdatetime_index
	on logitem (eventdatetime);

create index logitem__user_index
	on logitem (user_id, eventdatetime);

create index logitem_partnercontact_id_eventdatetime_index
	on logitem (partnercontact_id, eventdatetime);

alter table logitem
	add primary key (id);

