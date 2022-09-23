CREATE TABLE mailing_list(
                             id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                             email VARCHAR(50) NOT NULL
);


CREATE TABLE subscribers LIKE mailing_list;
ALTER TABLE subscribers ADD COLUMN name VARCHAR(50) NOT NULL AFTER id;


DESCRIBE mailing_list;;
DESCRIBE subscribers;

INSERT INTO mailing_list SET email = 'aya@me.com';
INSERT INTO mailing_list SET id = 2, email = 'aya10@me.com';
INSERT INTO mailing_list SET email = 'aya20@me.com';
INSERT INTO mailing_list SET email = 'aya30@me.com';
INSERT INTO subscribers SET email = 'aya@me.com', name = 'Aya';
INSERT INTO subscribers SET email = 'aya10@me.com', name = 'Aya10';
INSERT INTO subscribers SET email = 'aya20@me.com', name = 'Aya20';
INSERT INTO subscribers SET email = 'aya30@me.com', name = 'Aya30';
SELECT * FROM mailing_list;
SELECT * FROM subscribers;
#DELETE FROM subscribers WHERE id IN (5,6,7,8);

UPDATE subscribers SET email = 'yoyo@me.com', name = 'Yoyo' WHERE id = 1;
UPDATE subscribers SET email = 'yoyo10@me.com', name = 'Yoyo10' WHERE id = 2;
UPDATE subscribers SET email = 'yoyo20@me.com', name = 'Yoyo20' WHERE id = 3;
UPDATE subscribers SET email = 'yoyo30@me.com', name = 'Yoyo30' WHERE id = 4;

SELECT email FROM mailing_list UNION SELECT email FROM subscribers;

