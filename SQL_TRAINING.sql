CREATE DATABASE news;
use news;

CREATE TABLE board (
	SNO INT(3) NOT NULL auto_increment primary key,
    SUBJECT_NAME CHAR(20) NOT NULL,
    CONTENT CHAR(200),
    WRITER CHAR(20),
    DATE_CHAR CHAR(20)
);

create table user (
	id CHAR(10) not null primary key,
	password CHAR(20),
	name CHAR(10),
	created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default current_timestamp on update current_timestamp
);

SET SQL_SAFE_UPDATES = 0; # safe mode OFF.
DELETE FROM board;
DELETE from user;
SET SQL_SAFE_UPDATES = 1; # safe mode ON.

select * from board;
select * from user;

drop table user;

