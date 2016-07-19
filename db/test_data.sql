# Saiddit test data

USE saiddit;

SET @salt = 'somesortofsalt';

# Test
REPLACE INTO accounts(username, password) VALUES
    ('john', SHA2(CONCAT('abc', @salt), 256)),
    ('maddy', SHA2(CONCAT('123', @salt), 256)),
    ('sarah', SHA2(CONCAT('bacg', @salt), 256)),
    ('steve12', SHA2(CONCAT('a1b2c3', @salt), 256)),
    ('test', SHA2(CONCAT('abcd', @salt), 256));
