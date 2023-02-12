create table usertypes
(
	id int auto_increment
		primary key,
	name varchar(191) null,
	commit varchar(500) null,
	created_at timestamp null,
	updated_at timestamp null,
	deleted_at timestamp null
);

create index IDX_UserStatus_Name
	on usertypes (name);

