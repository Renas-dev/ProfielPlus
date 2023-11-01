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
   id INT(11)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
   firstname VARCHAR(32) NULL,
   lastname VARCHAR(32) NULL,
   student_number INT(16)     NULL,
   telephone VARCHAR(16)          DEFAULT 'No number set',
   username VARCHAR(16) NOT NULL,
   pwd VARCHAR(64) NOT NULL,
   email VARCHAR(64) NOT NULL,
   created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

Fifth We will create a table for users to add their work experiences.

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

Sixth we will create a table for users to add their educations.

6. CREATE TABLE education_users
   (
   id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   users_id INT(11) NOT NULL
   );

Seventh we will create a table for users to add their hobbies

7. CREATE TABLE hobbies
   (
   id INT(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
   users_id INT(11)  NOT NULL,
   name VARCHAR(64),
   created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

Eight we will create a table for users to add their education table if there are any.

8. CREATE TABLE education_users
   (
   id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   users_id INT(11) NOT NULL,
   education_id INT(11) NOT NULL,
   subjects INT(11) NOT NULL
   );

Ninth we will create a table for users to add their educations to the table.

9. CREATE TABLE education
   (
   id INT(11)     NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(128) NOT NULL,
   created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

Tenth we will create a table for the users to add their school subjects.

10. CREATE TABLE subjects
    (
    id INT(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    grade DOUBLE(2,2) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );


11. Run your "php -S localhost:8000" and go to the register page, make an account with the name and username admin.
this will give u access to an admin account and the admin page!