create table lotteries
(
	id int auto_increment,
	name varchar(200) not null,
	lotteriedate date not null,
	content varchar(500) null,
	description varchar(500) null,
	active int default 0 not null,
	validityfrom date not null,
	validityto date null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint lotteries_id_uindex
		unique (id)
);

create index lotteries_lotteriedate_name_index
	on lotteries (lotteriedate, name);

create index lotteries_name_index
	on lotteries (name);

alter table lotteries
	add primary key (id);

