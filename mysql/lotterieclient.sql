create table eger.lotterieclient
(
	id int auto_increment,
	lotterie_id int not null,
	client_id int not null,
	description varchar(500) null,
	created_at timestamp null,
	uptated_at timestamp null,
	deleted_at timestamp null,
	constraint lotterieclient_id_uindex
		unique (id)
);

alter table eger.lotterieclient
	add primary key (id);

