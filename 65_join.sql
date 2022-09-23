show databases ;
CREATE DATABASE test_M_Y CHARACTER SET utf8 COLLATE utf8_general_ci;

USE test_M_Y;

CREATE TABLE student (
                         id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                         name VARCHAR(40) NOT NULL,
                         courseId INT UNSIGNED NOT NULL
);

DESCRIBE student;

CREATE TABLE courses (
                         id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                         title VARCHAR(100) NOT NULL
);

SHOW TABLES ;

INSERT INTO courses SET title = 'Web Design';
INSERT INTO courses SET title = 'Web Development';
INSERT INTO courses SET title = 'HTML5 Technical Preview';
INSERT INTO courses SET title = 'CSS3 Beyond the basic';
INSERT INTO courses SET title = 'Javascript, An introduction';

SELECT * FROM courses;

INSERT INTO student SET name = 'Mohamed Yehia', courseId = 3;

ALTER TABLE student ADD CONSTRAINT fk_course_id FOREIGN KEY (courseId) REFERENCES courses(id);

INSERT INTO student SET name = 'Mohammed Ahmed', courseId = 2;
INSERT INTO student SET name = 'Ibrahim Ahmed', courseId = 1;

ALTER TABLE student MODIFY courseId INT UNSIGNED;
DESCRIBE student;

INSERT INTO student SET name = 'Ali Mohammed', courseId = 4;
INSERT INTO student SET name = 'Mohammed Ali';

SELECT * FROM student;

SELECT * FROM student INNER JOIN courses ON student.courseId = courses.id;
SELECT student.*, courses.title FROM student INNER JOIN courses ON student.courseId = courses.id;
SELECT student.id, student.name, courses.title FROM student INNER JOIN courses ON student.courseId = courses.id;
SELECT student.id, student.name, courses.title FROM student LEFT JOIN courses ON student.courseId = courses.id;
SELECT student.id, student.name, courses.title FROM student RIGHT JOIN courses ON student.courseId = courses.id;
SELECT courses.title, student.id, student.name FROM courses LEFT JOIN student ON student.courseId;