create database ProfielPlus;

use ProfielPlus;

CREATE TABLE users
(
id             INT(11)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
firstname      VARCHAR(32) NULL,
lastname       VARCHAR(32) NULL,
student_number INT(16)     NULL,
telephone      VARCHAR(16)          DEFAULT 'No number set',
username       VARCHAR(16) NOT NULL,
pwd            VARCHAR(64) NOT NULL,
email          VARCHAR(64) NOT NULL,
created_at     DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at     DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);

INSERT INTO users (username, pwd, email, firstname, lastname, student_number, telephone)
VALUES ('renas','renas123' , 'renas@gmail.com', 'renas', 'khalil', '149006', '0612345678');

select * from users;


