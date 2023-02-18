create table clients
(
	id int auto_increment,
	name varchar(100) not null,
	email varchar(100) not null,
	phonenumber varchar(25) null,
	birthday date not null,
	password varchar(191) not null,
	postcode int not null,
	settlement_id int not null,
	address varchar(200) not null,
	addresscardnumber varchar(20) null,
	addresscardurl varchar(100) null,
	validated int default 0 not null,
	active int default 1 not null,
	local int default 0 not null,
	description varchar(500) null,
	gender int null,
	facebookid varchar(50) null,
	facebookname varchar(200) null,
	facebookemail varchar(200) null,
	gmailid varchar(50) null,
	gmailname varchar(200) null,
	gmailemail varchar(200) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint clients_id_uindex
		unique (id)
);

create index clients_activ_id_index
	on clients (active, id);

create index clients_birthday_id_index
	on clients (birthday, id);

create index clients_email_index
	on clients (email);

create index clients_name_id_index
	on clients (name, id);

create index clients_password_index
	on clients (password);

create index clients_postcode_settlement_id_address_index
	on clients (postcode, settlement_id, address);

create index clients_validated_id_index
	on clients (validated, id);

alter table clients
	add primary key (id);

