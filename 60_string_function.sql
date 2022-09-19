USE store;
SHOW TABLES ;

SELECT * FROM users ORDER BY username ASC;
SELECT * FROM users ORDER BY username ASC LIMIT 3 OFFSET 3;
SELECT * FROM users ORDER BY username ASC LIMIT 2, 4;

describe employees;
SELECT * FROM employees;
SELECT first_name, last_name FROM employees WHERE emp_no = 10012;
SELECT BIT_LENGTH(first_name), last_name FROM employees WHERE emp_no = 10012;
SELECT BIT_LENGTH(first_name), CHAR_LENGTH(last_name) FROM employees WHERE emp_no = 10012;
SELECT * FROM employees WHERE CHAR_LENGTH(last_name) > 7 LIMIT 100;
SELECT CHAR_LENGTH('aya');
SELECT CONCAT(first_name,' ', last_name) FROM employees;
SELECT CONCAT_WS(', ','Name:', first_name, last_name) FROM employees ORDER BY emp_no DESC LIMIT 10;
SELECT ELT(1, 'aya', 'magd', 'alaa');
show tables;
SELECT * FROM users;
INSERT INTO users SET username = ELT(1, 'ayman', 'hamed'), password = MD5('123456'), lastlogin = NOW() ;
SELECT FIELD('aya', 'ahmed', 'magd', 'alaa', 'aya'); #POSITION OF THE FIRST ELEMENT
SELECT TO_BASE64('aya');
SELECT FROM_BASE64('YXlh');
SELECT INSTR('football', 'balls');
SELECT LOWER('AHMED');
SELECT UPPER('magd');