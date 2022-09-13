CREATE DATABASE store CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE users(
                      user_id int unsigned not null primary key auto_increment,
                      username varchar(30) not null ,
                      password char(72) not null ,
                      lastlogin datetime
);

alter table users CHANGE lastlogin last_login datetime;

show tables ;
describe users;


ALTER TABLE users ADD COLUMN privilege tinyint(1) DEFAULT 2;
describe users;

CREATE TABLE user_profiles(
                              profile_id INT UNSIGNED NOT NULL ,
                              first_name VARCHAR(20) NOT NULL ,
                              last_name VARCHAR(20),
                              facebook_url VARCHAR(100),
                              image VARCHAR(150),
                              gender enum('male', 'female')NOT NULL ,
                              address VARCHAR(100) NOT NULL ,
                              CONSTRAINT fk_profile_id FOREIGN KEY (profile_id) REFERENCES users(user_id)
);




