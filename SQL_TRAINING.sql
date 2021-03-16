CREATE DATABASE news;
use news;

/* v1.0 */
CREATE TABLE board (
	SNO INT(3) NOT NULL auto_increment primary key,
    SUBJECT_NAME CHAR(20) NOT NULL,
    CONTENT CHAR(200),
    WRITER CHAR(20),
    DATE_CHAR CHAR(20)
);

/* v1.1 */
CREATE TABLE board (
	SNO INT(3) NOT NULL auto_increment primary key,
    SUBJECT_NAME CHAR(20) NOT NULL,
    CONTENT CHAR(200),
    WRITER CHAR(20),
    DATE_CHAR CHAR(20),
    created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default current_timestamp on update current_timestamp
);

create table user (
	SNO INT(3) not null auto_increment primary key,
	ID CHAR(10) not null,
	PWD CHAR(32) not null,
	NAME CHAR(10) not null,
	mail CHAR(30) not null,
	CREATED_AT timestamp not null default current_timestamp,
	UPDATED_AT timestamp not null default current_timestamp on update current_timestamp
);

SET SQL_SAFE_UPDATES = 0; # safe mode OFF.
DELETE FROM board;
DELETE from user;
SET SQL_SAFE_UPDATES = 1; # safe mode ON.


/* create admin id */
insert into news.user(id, pwd, name) values ('admin', password(12345), 'admin');
insert into news.board(SUBJECT_NAME, content, WRITER, DATE_CHAR) values ('力格', '臂 郴侩', '包府磊', '2021-03-06 09:27');

select * from board;
select * from user;

drop table board;
drop table user;

