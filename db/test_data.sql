# Saiddit test data

USE saiddit;


# Test user
REPLACE INTO accounts(username, password) VALUES
    ('test', SHA2('abc', 256));

REPLACE INTO subsaiddits(title, description, front_page, creator_key) VALUES
    ('funny', 'Funny posts yolo', 1, 'test');

REPLACE INTO posts(title, author, subsaiddit, url, text) VALUES
    ('post 1', 'test', 'funny', 'dajshd', 'knock knock lol');

REPLACE INTO posts(title, author, subsaiddit, url, text) VALUES
    ('Post alskda', 'test', 'funny', 'dajshd', 'knock knock lol');
