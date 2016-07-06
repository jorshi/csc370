# Initialize database system

DROP USER IF EXISTS 'saiddit_sys'@'localhost';

CREATE USER 'saiddit_sys'@'localhost';

GRANT ALL PRIVILEGES ON saiddit.* TO 'saiddit_sys'@'localhost';

