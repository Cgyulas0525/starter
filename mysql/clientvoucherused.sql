create table clientvoucherused
(
	id int auto_increment
		primary key,
	clientvoucher_id int not null,
	usedtime timestamp not null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null
);

create index clientvoucherused_clientvoucher_id_usedtime_index
	on clientvoucherused (clientvoucher_id, usedtime);

create index clientvoucherused_id_index
	on clientvoucherused (id);

