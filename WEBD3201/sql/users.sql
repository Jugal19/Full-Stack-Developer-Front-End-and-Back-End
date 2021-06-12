 /*	Name:	Jugal Patel
		Date:	Spetember/9th/2020
		Course Code:	WEBD3201
  */
  

CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP SEQUENCE IF EXISTS user_id_seq CASCADE;
CREATE SEQUENCE user_id_seq START 1000;

DROP TABLE IF EXISTS users;


CREATE TABLE users
(
	id INT PRIMARY KEY DEFAULT nextval('user_id_seq'),
	email_address VARCHAR(255) UNIQUE,
	password VARCHAR(128),
	first_name VARCHAR(128),
	last_name VARCHAR(128),
	last_access TIMESTAMP,
	enrol_date TIMESTAMP,
	enabled BOOLEAN,
	Type VARCHAR(2)
);



INSERT INTO Users (email_address, password, first_name, last_name, last_access , enrol_date, enabled, Type) VALUES (
'jdoe@dcmail.ca', crypt('123lkj', gen_salt('bf')),
'John', 'Doe', '2020-06-22 19:10:25', '2020-08-22 11:11:11', true, 's');

INSERT INTO Users (email_address, password, first_name, last_name, last_access , enrol_date, enabled, Type) VALUES (
'bsith@dcmail.ca', crypt('batman123', gen_salt('bf')),
'Bill', 'Smith', '2020-09-22 10:10:25', '2020-08-23 12:12:12', true, 's');

INSERT INTO Users (email_address, password, first_name, last_name, last_access , enrol_date, enabled, Type) VALUES (
'jugal.patel1@dcmail.ca', crypt('superman123', gen_salt('bf')),
'Jugal', 'Patel', '2020-09-23 10:10:25', '2020-08-01 01:01:12', true, 's');

INSERT INTO Users (email_address, password, first_name, last_name, last_access , enrol_date, enabled, Type) VALUES (
'bruceWayne@batman.ca', crypt('gothamCity#1', gen_salt('bf')),
'Bruce', 'Wayne', '2020-06-22 19:10:25', '2020-08-22 11:11:11', true, 'a');

SELECT * FROM users;