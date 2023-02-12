create table users
(
	id bigint unsigned auto_increment
		primary key,
	name varchar(191) not null,
	email varchar(191) not null,
	email_verified_at timestamp null,
	password varchar(191) not null,
	remember_token varchar(100) null,
	image_url varchar(191) null,
	usertypes_id int null,
	commit varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null,
	constraint users_email_unique
		unique (email)
)
engine=MyISAM collate=utf8mb4_unicode_ci;

create index idx_users_name
	on users (name);

create index status_id
	on users (usertypes_id);

