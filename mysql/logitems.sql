create table logitems
(
	id int auto_increment,
	logitemtype_id int not null,
	client_id int null,
	user_id int null,
	partnercontact_id int null,
	datatable varchar(100) null,
	record int null,
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
	on logitems (client_id, user_id, eventdatetime);

create index logitem__eventdatetime_index
	on logitems (eventdatetime);

create index logitem__user_index
	on logitems (user_id, eventdatetime);

create index logitem_datatable_eventdatetime_index
	on logitems (datatable, eventdatetime);

create index logitem_logitemtype_id_id_index
	on logitems (logitemtype_id, id);

create index logitem_partnercontact_id_eventdatetime_index
	on logitems (partnercontact_id, eventdatetime);

alter table logitems
	add primary key (id);

