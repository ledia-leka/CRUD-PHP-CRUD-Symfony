
Drop database if exists `person`;
CREATE DATABASE if not exists `person`;
use `person`;

create table if not exists `person`(
`id` int(10) auto_increment,
`name` varchar(20) not null,
`surname` varchar(20) not null,
`email` varchar(50) not null,
`birthday` date not null,
`age` int(3) not null,
UNIQUE (`id`) ,
primary key (`name`, `surname`)

);
