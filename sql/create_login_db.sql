SHOW DATABASES;


USE cms_kurs;


DROP TABLE IF EXISTS Login;
CREATE TABLE Login(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30),
	password VARCHAR(120),
);



INSERT INTO Login
username, password)
VALUES
("Peter", "Lustig", "12345", "Ein Scherzbold", 2, 3.1,
"1991-04-01", "m"),
("Lisa", "Simpson", "09876", "Was gelbes", 0, 1.2,
"1987-05-11", "f");



SELECT id, username, password
FROM Login;


SHOW TABLES;

DESCRIBE Login;









