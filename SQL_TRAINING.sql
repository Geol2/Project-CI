CREATE DATABASE news;
use news;

CREATE TABLE board (
	SNO INT(3) NOT NULL auto_increment primary key,
    SUBJECT_NAME CHAR(20) NOT NULL,
    CONTENT CHAR(200),
    WRITER CHAR(20),
    DATE_CHAR CHAR(20)
);
SET SQL_SAFE_UPDATES = 0; # safe 모드 해제.
DELETE FROM board;
SET SQL_SAFE_UPDATES = 1; # safe 모드.