create table eger.migrations
(
	id int unsigned auto_increment
		primary key,
	migration varchar(191) not null,
	batch int not null
)
engine=MyISAM;

