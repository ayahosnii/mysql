CREATE TABLE expensive_types(
                                id tinyint(2) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                type VARCHAR(50) NOT NULL
);

CREATE TABLE expensive_transcriptions(
                                         id tinyint(2) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                         expense_type TINYINT(2) UNSIGNED NOT NULL,
                                         description VARCHAR(100) NOT NULL ,
                                         created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                         amount DECIMAL(5,2) NOT NULL ,
                                         constraint fk_expense_type FOREIGN KEY (expense_type) REFERENCES expensive_types(id)
);

SHOW TABLES ;

INSERT INTO expensive_types SET type = 'Electricity Fee';
INSERT INTO expensive_types SET type = 'Water Fee';
INSERT INTO expensive_types SET type = 'Home Rent';
INSERT INTO expensive_types SET type = 'Phone Bill';
INSERT INTO expensive_types SET type = 'Mobile Bill';
INSERT INTO expensive_types SET type = 'Beverages';

SELECT * FROM expensive_types;

INSERT INTO expensive_transcriptions SET expense_type = 1, description = 'This is the electricity bill of the current month', amount = 34.25;

SELECT * FROM expensive_transcriptions;

INSERT INTO expensive_transcriptions SET expense_type = 1, description = 'The bill was at a high rate this month', amount = 102.56;
INSERT INTO expensive_transcriptions SET expense_type = 1, description = 'I have complained against the service', amount = 27.50;
INSERT INTO expensive_transcriptions SET expense_type = 2, description = 'The bill is reasonable after all', amount = 30.98, created = 20220111120000;
INSERT INTO expensive_transcriptions SET expense_type = 2, description = 'The bill is at a high rate this month', amount = 75.61, created = 20220111120000;
INSERT INTO expensive_transcriptions SET expense_type = 2, description = 'I was discussing some situation with my neighbour', amount = 25.71, created = 20220111120000;
UPDATE expensive_transcriptions SET id = 5, created = 20220221183249 WHERE id=7;
SELECT AVG(amount) FROM expensive_transcriptions WHERE expense_type = 1;
SELECT expense_type, AVG(amount) FROM expensive_transcriptions GROUP BY expense_type;
SELECT expense_type, SUM(amount) FROM expensive_transcriptions GROUP BY expense_type;
SELECT expense_type, SUM(amount) FROM expensive_transcriptions WHERE created BETWEEN 20220101 AND 20220301 GROUP BY expense_type;
SELECT expense_type, COUNT(amount) FROM expensive_transcriptions WHERE expense_type = 1;
SELECT expense_type, SUM(amount), GROUP_CONCAT(description SEPARATOR ' | ') FROM expensive_transcriptions GROUP BY expense_type;
