USE store;
SHOW TABLES ;

SELECT * FROM users;
SELECT * FROM users2;

INSERT INTO users SET username = 'alaa', password = MD5('hello_world'), lastlogin = now();
INSERT INTO users SET username = 'hema', password = MD5('fiejsdfws'), lastlogin = now();
SELECT * FROM users where user_id = 8;
SELECT * FROM users where user_id > 7;
SELECT username, password FROM users WHERE user_id > 5;
SELECT username, password FROM users WHERE user_id > 2 < 4;
SELECT username FROM users WHERE user_id = 2 OR user_id = 5;
SELECT username FROM users WHERE user_id = 2+3;

SHOW TABLES;
DESCRIBE user_profiles;

ALTER TABLE user_profiles MODIFY gender ENUM('male', 'female') DEFAULT 'female' NOT NULL ;
INSERT INTO user_profiles SET profile_id = 9, first_name = 'Aya', address = 'Egypt';
INSERT INTO user_profiles SET profile_id = 10, first_name = 'Alaa', address = 'Egypt';
INSERT INTO user_profiles SET profile_id = 13, first_name = 'hema', last_name = 'hosni', gender = 'male', address = 'Egypt';


SELECT * FROM users;
SELECT * FROM user_profiles;
SELECT * FROM user_profiles WHERE last_name IS NOT NULL;
SELECT * FROM user_profiles WHERE last_name IS UNKNOWN;
SELECT * FROM user_profiles WHERE last_name IS FALSE;
SELECT * FROM user_profiles WHERE last_name IS TRUE;
SELECT * FROM user_profiles WHERE profile_id IS TRUE;
SELECT * FROM user_profiles WHERE profile_id IS FALSE;
UPDATE user_profiles SET facebook_url = 0 WHERE profile_id = 10;
UPDATE user_profiles SET facebook_url = 1 WHERE profile_id = 9;
SELECT * FROM user_profiles WHERE first_name LIKE 'a%';
show tables
