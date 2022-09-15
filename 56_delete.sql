USE store;
SHOW TABLES ;

SELECT * FROM users;
SELECT * FROM users2;

SELECT * FROM users;

INSERT INTO users2 SELECT * FROM users ON DUPLICATE KEY UPDATE users2.user_id = users.user_id + 8;

DELETE FROM users2 WHERE user_id = 3;

DELETE users, users2 from users, users2 WHERE users.user_id = 4 AND users2.user_id = 4;

INSERT INTO users SET username = 'Magd', password = MD5('123456');

UPDATE users SET lastlogin = now() WHERE user_id = 8;

DELETE FROM users WHERE username = 'aya10';

DELETE FROM users ORDER BY username DESC LIMIT 2;

