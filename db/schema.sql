# CSC 370 Project Schema
# Adar Guy
# Kyle Newman
# Jordie Shier

DROP DATABASE IF EXISTS saiddit;
CREATE DATABASE saiddit;

USE saiddit;

CREATE TABLE accounts(
	username VARCHAR(255) PRIMARY KEY,
	password CHAR(255) NOT NULL,
	reputation INT DEFAULT 0
);

CREATE TABLE  subsaiddits(
	title VARCHAR(255) PRIMARY KEY,
	description VARCHAR(512),
	creation_time DATETIME DEFAULT NOW(),
	front_page BOOLEAN DEFAULT 0,
	creator_key VARCHAR(255) NOT NULL,

	FOREIGN KEY (creator_key) REFERENCES accounts(username) ON DELETE CASCADE
);

CREATE TABLE posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    publish_time DATETIME DEFAULT NOW(),
    edit_time DATETIME DEFAULT NOW(),
    subsaiddit VARCHAR(255) NOT NULL,
    url VARCHAR(2048),
    upvotes INT DEFAULT 0,
    downvotes INT DEFAULT 0,
    text BLOB,

    FOREIGN KEY (subsaiddit) REFERENCES subsaiddits(title) ON DELETE CASCADE,
    FOREIGN KEY (author) REFERENCES accounts(username) ON DELETE CASCADE
);

CREATE TABLE comments(
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    commentor_id VARCHAR(255) NOT NULL,
    upvotes INT,
    downvotes INT,
    creation_time DATETIME DEFAULT NOW(),
    text VARCHAR(1024),

    FOREIGN KEY (commentor_id) REFERENCES accounts(username) ON DELETE CASCADE
);

CREATE TABLE favourites(
    user_id VARCHAR(255),
    post_id VARCHAR(255),

    FOREIGN KEY (user_id) REFERENCES accounts(username) ON DELETE CASCADE
);

CREATE TABLE friends (
    user_id VARCHAR(255) NOT NULL,
    friend_id VARCHAR(255) NOT NULL,

    PRIMARY KEY (user_id,friend_id),
    FOREIGN KEY (user_id) REFERENCES accounts(username) ON DELETE CASCADE,
    FOREIGN KEY (friend_id) REFERENCES accounts(username) ON DELETE CASCADE
);

CREATE TABLE subscribes (
    user_id VARCHAR(255) NOT NULL,
    subsaid_id VARCHAR(255) NOT NULL,

    PRIMARY KEY (user_id, subsaid_id),
    FOREIGN KEY (user_id) REFERENCES accounts(username) ON DELETE CASCADE,
    FOREIGN KEY (subsaid_id) REFERENCES subsaiddits(title) ON DELETE CASCADE
);
