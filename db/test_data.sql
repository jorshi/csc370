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
    ('funny', 'just a funny subsaiddit', TRUE, 'test'),
    ('pics', 'a subsaiddit about pics', TRUE, 'john');
    
REPLACE INTO friends(user_id, friend_id) VALUES ('test', 'john');
    
REPLACE INTO posts(title, author, subsaiddit, url, upvotes, downvotes, text) VALUES
    ('test post, please ignore', 'test', 'funny', 'arbitrary url', 10, 0, 'you ever wonder why we\'re here?'),
    ('second post', 'test', 'funny', 'arbitrary url', 0, -110, 'much ado about nothing.'),
    ('friend\'s post', 'john', 'pics', 'arbitrary url', 10, 0, 'to be, or not to be'),
    ('final post!', 'john', 'pics', 'arbitrary url', 0, -12, 'to be, or not to be');
    
REPLACE INTO favourites(user_id, post_id) VALUES ('test', 1);