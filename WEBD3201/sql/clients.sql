 /*	Name:	Jugal Patel
		Date:	Spetember/9th/2020
		Course Code:	WEBD3201
  */
CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP TABLE IF EXISTS clients;


CREATE TABLE clients
(
	email_address VARCHAR(255) UNIQUE,
	first_name VARCHAR(128),
	last_name VARCHAR(128),
	phone_num VARCHAR(10),
	ext_num VARCHAR(5)
);

Grant ALL ON clients TO faculty;

INSERT INTO Clients (email_address, first_name, last_name, phone_num , ext_num) VALUES (
'clarkKent@superman.ca', 
'Clark', 'Kent', '6473233122', '1');

INSERT INTO Clients (email_address, first_name, last_name, phone_num , ext_num) VALUES (
'billsmith@dcmail.ca',
'Bill', 'Smith', '6474242122', '2');

INSERT INTO Clients (email_address, first_name, last_name, phone_num , ext_num) VALUES (
'damianWayne@robin.ca',
'Damian', 'Wayne', '6472325122', '2');

SELECT * FROM clients;