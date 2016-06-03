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
