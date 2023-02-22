create table vouchers
(
	id int auto_increment,
	name varchar(200) not null,
	vouchertype_id int not null,
	partner_id int not null,
	content varchar(500) null,
	validityfrom date not null,
	validityto date null,
	qrcode varchar(500) not null,
	discount int default 0 not null,
	discountpercent int default 0 not null,
	usednumber int default 0 not null,
	active int default 1 not null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint vouchers_id_uindex
		unique (id),
	constraint vouchers_name_id_uindex
		unique (name, id),
	constraint vouchers_partner_id_id_uindex
		unique (partner_id, id)
);

alter table vouchers
	add primary key (id);

