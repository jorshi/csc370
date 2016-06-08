drop database subsaidit;
create database subsaidit;

use subsaidit;

create table Accounts(
	username VARCHAR(255) PRIMARY KEY,
	password CHAR(20) NOT NULL,
	reputation INT DEFAULT 0
);

create table Subsaidits(
	title VARCHAR(255) PRIMARY KEY,
	description VARCHAR(512),
	creation_time DATETIME DEFAULT NOW(),
	front_page BOOLEAN DEFAULT 0,
	creator_key VARCHAR(255) NOT NULL,
	
	FOREIGN KEY (creator_key) REFERENCES Accounts(username) ON DELETE CASCADE
);

create table Comments(
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    commentor_id VARCHAR(255) NOT NULL,
    upvotes INT,
    downvotes INT,
    creation_time DATETIME DEFAULT NOW(),
    text VARCHAR(1024),
    
    FOREIGN KEY (commentor_id) REFERENCES Accounts(username) ON DELETE CASCADE
);

create table Favourites(
    user_id VARCHAR(255),
    post_id VARCHAR(255),
    
    FOREIGN KEY (user_id) REFERENCES Accounts(username) ON DELETE CASCADE
);
