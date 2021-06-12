 /*	Name:	Jugal Patel
		Date:	Spetember/9th/2020
		Course Code:	WEBD3201
  */
CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP TABLE IF EXISTS calls;

CREATE TABLE calls
(

	client VARCHAR(128),
	dates TIMESTAMP

);

Grant ALL ON calls TO faculty;
INSERT INTO Calls (client, dates) VALUES (
'Robert Bob Parr', '2020-08-23');

INSERT INTO Calls (client, dates) VALUES (
'Richard Grayson', '2020-08-24');

INSERT INTO Calls (client, dates) VALUES (
'Damian Wayne', '2020-08-25');
SELECT * FROM calls;