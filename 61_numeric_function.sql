CREATE DATABASE learning CHARACTER SET UTF8 COLLATE utf8_general_ci;
USE learning;
CREATE TABLE nfunction(
    num INT SIGNED NOT NULL
);
DESCRIBE nfunction;

INSERT INTO nfunction SET num = -23;
INSERT INTO nfunction SET num = -18;
INSERT INTO nfunction SET num = -3.64;
INSERT INTO nfunction SET num = -5.6;
INSERT INTO nfunction SET num = -5.4;

SELECT * FROM nfunction;
SELECT ABS(num) FROM nfunction;

ALTER TABLE nfunction MODIFY num DECIMAL(7,3) SIGNED NOT NULL ;
SELECT ABS(num) FROM nfunction;
SELECT CEIL(num) FROM nfunction;
SELECT num + 3 FROM nfunction;
SELECT LOG(2);
SELECT LOG(10);
SELECT PI();
SELECT POW(2,3);
SELECT POW(14,2);
SELECT FLOOR(num) FROM nfunction;
SELECT * FROM nfunction;
SELECT SQRT(14);
SELECT SQRT(16);
SELECT SQRT(64);
