USE store;
SHOW TABLES ;

SELECT * FROM users;
SELECT * FROM users2;

INSERT INTO users SET username = 'Ali', password = MD5('mohammed'), lastlogin = now(), privilege = 2;

SELECT * FROM users;

REPLACE INTO users SET username = 'mai', password = MD5('shaimaa'), lastlogin = now(), privilege = 1;
REPLACE INTO users SET username = 'mai', password = MD5('234567'), lastlogin = now();
REPLACE INTO users2 SELECT * FROM users WHERE user_id = 3;
SELECT * FROM users2;
REPLACE INTO users2 SET username = 'aya', password = MD5('123456'), privilege = 1;

UPDATE users2 SET username = 'yoyo', password = MD5('456') WHERE user_id =2;

UPDATE users2 SET lastlogin = NOW() WHERE user_id =5;
INSERT INTO users2 SELECT * FROM users WHERE user_id = 2;

UPDATE users2 SET lastlogin = NOW() WHERE user_id =4;
UPDATE users2 SET username = 'yoyo' WHERE username = 'aya10';
UPDATE users SET lastlogin = NOW() WHERE user_id =3 AND 7;

UPDATE users, users2 SET users.password = users2.password WHERE users2.user_id = 5;
UPDATE users, users2 SET users.password = users2.password WHERE users2.user_id = 2 AND users.user_id BETWEEN 2 AND 5;
UPDATE users, users2 SET users.password = users2.password WHERE users2.user_id = 3 AND users.user_id BETWEEN 2 AND 5  LIMIT 1;

