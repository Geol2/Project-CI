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
    CONTENT CHAR(200) not NULL,
    WRITER CHAR(20) not NULL,
    DATE_CHAR CHAR(20) not NULL,
    HIT INT(3) not NULL,
    created_at timestamp not null default current_timestamp,
	updated_at timestamp not null default current_timestamp on update current_timestamp
);

CREATE TABLE users(
    SNO INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(100),
    user_email VARCHAR(100),
    user_password VARCHAR(200),
    user_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;

SET SQL_SAFE_UPDATES = 0; # safe mode OFF.
DELETE FROM board;
DELETE from user;
SET SQL_SAFE_UPDATES = 1; # safe mode ON.


/* create admin id */
insert into news.users(user_name, user_email, user_password) values ('admin', 'big9401@gmail.com', md5('12345'));
insert into news.board(SUBJECT_NAME, content, WRITER, DATE_CHAR, HIT) values ('Á¦¸ñ', '±Û ³»¿ë', '°ü¸®ÀÚ', '2021-03-06 09:27');

update board set HIT=HIT+1 where sno = 2;

select * from board;
select * from users;

drop table board;
drop table user;

