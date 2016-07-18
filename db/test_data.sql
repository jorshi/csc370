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

REPLACE INTO subsaiddits(title, description, front_page, creator_key) VALUES
    ('asksaiddit', 'questions', 1, 'sarah'),
    ('videos', 'moving pictures', 1, 'steve12'),
    ('funny', 'Funny posts yolo', 1, 'test'),
    ('photos', 'Saiddit Photos', 1, 'john');

REPLACE INTO posts(title, author, subsaiddit, url, text, upvotes, downvotes) VALUES
    ('photos of cats', 'john', 'photos', 'urllss', 'cat with hats', 10, 3),
    ('post 1', 'test', 'funny', 'dajshd', 'knock knock lol', 25, 5),
    ('Post alskda', 'test', 'funny', 'dajshd', 'knock knock lol', 100, 40);

REPLACE INTO subscribes VALUES
    ('john', 'photos'),
    ('john', 'funny'),
    ('test', 'funny');

