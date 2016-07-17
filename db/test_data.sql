# Saiddit test data

USE saiddit;


# Test user
REPLACE INTO accounts(username, password) VALUES
    ('john', SHA2('123', 256)),
    ('test', SHA2('abc', 256));

REPLACE INTO subsaiddits(title, description, front_page, creator_key) VALUES
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

