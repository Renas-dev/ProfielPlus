Welcome to MRS ProfielPlus project,
to make sure our website works as intended u have to follow these steps below.
Write the following commands in the query console.

Step one, we drop the database assure other database from other projects groups are deleted.

1. Drop DATABASE ProfielPlus;

Step two, we will create the database for our application.

2. CREATE DATABASE ProfielPlus;

Step tree, we will use the created database.

3. USE ProfielPlus;

Step four, we will create a table USERS this is needed to Login and for the admin to create users.

4. CREATE TABLE users
   (
   id INT(11)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
   firstname VARCHAR(32) NULL,
   lastname VARCHAR(32) NULL,
   student_number INT(16)     NULL,
   telephone VARCHAR(16)          DEFAULT 'No number set',
   username VARCHAR(16) NOT NULL,
   pwd VARCHAR(64) NOT NULL,
   email VARCHAR(64) NOT NULL,
   created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   reset_token_hash VARCHAR(64)          DEFAULT NULL NULL UNIQUE,
   reset_token_expires_at DATETIME DEFAULT NULL NULL
   );

Step five, we will create a table for users to add their work experiences.

5. CREATE TABLE work_experience
   (
   id INT(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
   users_id INT(11)  NOT NULL,
   name VARCHAR(32),
   colleagues VARCHAR(32),
   functionality VARCHAR(32),
   start_date DATE,
   end_date DATE,
   created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

Step six, we will create a table for users to add their hobbies

6. CREATE TABLE hobbies
   (
   id INT(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
   users_id INT(11)  NOT NULL,
   name VARCHAR(64),
   hobby_description VARCHAR(255),
   interest VARCHAR(64),
   image VARCHAR(64)       DEFAULT '../default_images/red.png',
   created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

Step seven, we will create a table for users to add their educations to the table.

7. CREATE TABLE education
(
id INT(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
users_id INT(11)      NOT NULL,
name VARCHAR(128) NOT NULL,
created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

Step eight, we will create a table for the users to add their school subjects.

8. CREATE TABLE subjects
   (
   id INT(11)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
   users_id INT(11)     NOT NULL,
   name VARCHAR(64) NOT NULL,
   grade float(2)    NOT NULL,
   created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

9. Run your "php -S localhost:8000" and go to the register page, make an account with the name and username admin.
   this will give u access to an admin account and the admin page!