CREATE DATABASE ProfielPlus;

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
updated_at     DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

select *
FROM users;

drop table users;

CREATE TABLE work_experience
(
id            INT(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
users_id      INT(11)  NOT NULL,
name          VARCHAR(32),
colleagues    VARCHAR(32),
functionality VARCHAR(32),
start_date    DATE,
end_date      DATE,
created_at    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

select *
FROM work_experience;

drop table work_experience;

SELECT *
FROM work_experience
WHERE users_id = 1;

DELETE
FROM work_experience
WHERE id = 1;

UPDATE work_experience
SET name          = '1',
colleagues    = '2',
functionality = '3',
start_date    = '2020-10-21',
end_date      = '2020-10-21'
WHERE id = 3;

CREATE TABLE education_users
(
id       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
users_id INT(11) NOT NULL
);

INSERT INTO users (username, pwd, email, firstname, lastname, student_number, telephone) VALUES (:username, :pwd, :email, :fname, :lname, :student_number, :telephone);