SELECT NOW();
SELECT NOW(6);
SELECT ADDDATE('2022-06-19', INTERVAL 2 DAY );
SELECT ADDDATE('2022-06-19 13:26:56.345', INTERVAL 2 DAY );
SELECT ADDDATE('2022-06-19 13:26:56.345', INTERVAL '1 4' DAY_HOUR );
SELECT ADDDATE('2022-06-19 13:26:56.345', INTERVAL 2 MICROSECOND );
SELECT NOW();
SELECT ADDTIME('17:30:50', '1:12:13');
SELECT CURDATE();
SELECT CURRENT_DATE;
SELECT DATE (20120713132415);
SELECT TIME (20120713132415);
SELECT DATE (NOW());
SELECT TIME (NOW());
SELECT DATE_SUB('2015-03-22', INTERVAL 3 DAY );
SELECT SUBDATE('2015-03-22', INTERVAL 3 DAY );
CREATE TABLE dfunction (
                           startDate DATE NOT NULL,
                           endDate DATE NOT NULL
);
INSERT INTO dfunction SET startDate = 20160413,
                          endDate = 20160415;

INSERT INTO dfunction SET startDate = NOW(),
                          endDate = ADDDATE(NOW(), INTERVAL 5 DAY );

SELECT * FROM dfunction WHERE DATEDIFF(endDate, startDate) > 2;
ALTER TABLE dfunction ADD COLUMN courseName VARCHAR(100) NOT NULL;

UPDATE dfunction SET courseName = 'Web Design' WHERE startDate = 20220921;
UPDATE dfunction SET courseName = 'Web Development' WHERE endDate = 20160415;
SELECT * FROM dfunction WHERE DATEDIFF(endDate, startDate) >= 4;
SELECT DAYNAME(startDate), DAYNAME(endDate) FROM dfunction WHERE DATEDIFF(endDate, startDate) >= 4;
SELECT CONCAT (DAYNAME(startDate), ' - ' , startDate), DAYNAME(endDate) FROM dfunction WHERE DATEDIFF(endDate, startDate) >= 4;
SELECT DAYOFMONTH(NOW());
SELECT DAYOFYEAR(NOW());
SELECT TIMEDIFF('17:18:21', '10:54:12');
SELECT MINUTE(TIMEDIFF('17:18:21', '10:54:12'));
SELECT MINUTE(TIMEDIFF('17:18:21', '10:54:12')) AS minute_difference;
SELECT CONCAT(SECOND(TIMEDIFF('17:18:21', '10:54:12')), ' SEC') AS second_difference;
SELECT CONCAT(MINUTE(TIMEDIFF('17:18:21', '10:54:12')), ' MIN') AS minute_difference;
SELECT CONCAT(HOUR(TIMEDIFF('17:18:21', '10:54:12')), ' HOUR') AS hour_difference;
SELECT WEEKOFYEAR(NOW());
SELECT * FROM dfunction;