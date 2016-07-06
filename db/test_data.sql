# Saiddit test data

USE saiddit;

INSERT INTO accounts(username, password) VALUES
    ('test', SHA2('abc', 256));
