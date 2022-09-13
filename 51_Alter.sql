USE company;

# DESCRIBE employees

ALTER TABLE employees ADD COLUMN phone VARCHAR(12) AFTER address;

ALTER TABLE employees MODIFY position VARCHAR(15) NOT NULL ;

ALTER TABLE employees ADD COLUMN code CHAR(20);

ALTER TABLE employees CHANGE code sec_code CHAR(30) NOT NULL ;

ALTER TABLE employees ADD COLUMN dummy text;

ALTER TABLE employees DROP COLUMN dummy;

CREATE TABLE admins SELECT * FROM `aya-restaurant`.admins;

DESCRIBE employees;

select * from admins;

RENAME TABLE admins TO app_admins;

SHOW TABLES ;

TRUNCATE TABLE app_admins; #empty a table + reset auto_increment
SELECT * FROM app_admins;
DROP TABLE app_admins;
SHOW TABLES ;
ALTER TABLE emp_reports_min CHARACTER SET latin1 ENGINE MyISAM;

SHOW CREATE TABLE emp_reports_min;