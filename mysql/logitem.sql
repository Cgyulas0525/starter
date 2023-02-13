create table eger.logitem
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
	on eger.logitems (client_id, user_id, eventdatetime);

create index logitem__eventdatetime_index
	on eger.logitems (eventdatetime);

create index logitem__user_index
	on eger.logitems (user_id, eventdatetime);

create index logitem_partnercontact_id_eventdatetime_index
	on eger.logitems (partnercontact_id, eventdatetime);

alter table eger.logitems
	add primary key (id);

