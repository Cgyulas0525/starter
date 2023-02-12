create table questionnarievouchers
(
	id int auto_increment,
	questionnarie_id int not null,
	voucher_id int not null,
	description varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint questionnarievoucher_id_uindex
		unique (id),
	constraint questionnarievoucher_questionnarie_id_voucher_id_uindex
		unique (questionnarie_id, voucher_id),
	constraint questionnarievoucher_voucher_id_questionnarie_id_uindex
		unique (voucher_id, questionnarie_id)
);

alter table questionnarievouchers
	add primary key (id);

