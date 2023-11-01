Welcome to MRS ProfielPlus project,
to make sure our website works as intended u have to follow these steps below.
Write the following commands in the query console.

First command we run is to assure other database from other projects groups are deleted.
1. Drop DATABASE ProfielPlus;

Second step will create the database for our application.
2. CREATE DATABASE ProfielPlus;

Third we will use the created database.
3. USE DATABASE ProfielPlus;

Fourth we will create a table USERS this is needed to Login and for the admin to create users.
4. CREATE TABLE users
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

Fifth We will create a table for users to add their work experiences.
5. CREATE TABLE work_experience
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


Sixth we will create a table for users to add their educations.
6. CREATE TABLE education_users
(
id       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
users_id INT(11) NOT NULL
);
