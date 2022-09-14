use store;
describe users;
INSERT INTO users (username, password, lastlogin) VALUES('Mohammed', md5('Yehia'), now());
INSERT INTO users SET username = 'Ahmed', password = md5('ibrahim'), lastlogin = NOW();
SELECT * FROM users;
ALTER TABLE users MODIFY username VARCHAR(30) NOT NULL UNIQUE ;

INSERT INTO users SET username = 'aya', password = MD5('123456');
INSERT INTO users SET username = 'aya', password = MD5('123456') ON DUPLICATE KEY UPDATE username = CONCAT(username, 10)
SELECT * FROM users;

CREATE TABLE users2 LIKE users;

INSERT INTO users2 SELECT * FROM users WHERE user_id = 3;
SELECT * FROM users2