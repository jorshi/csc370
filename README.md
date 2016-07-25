# CSC 370 - Saiddit
###### Jordie Shier, Adar Guy, Kyle Newman


## Part 1: ER diagram:

![Alt text](presentation/csc370_p1.png)

Legend:
  - many-to-many: straight line
  - many-to-one: straight line with arrow
  - one-to-one: straight line with semi-circle

## Part 2: Schema:

Schema had stayed relatively unchanged from the beginning. We built our schema with the intention of making Saiddit a clone of Reddit, so our database decisions were based on what we observed of Reddit itself (ex. friends are strictly one way).

We added UPDATE CASCADE commands in the schema to accomodate profile settings changes.

Search query (query h) is handled through indexing using the innoDB engine. Posts are indexed by (title, text) in the schema.

## Part 3: Code

Languages:
  - HTML
  - CSS
  - Javascript, ajax, Bootstrap
  - PHP
  - MySQL

We used GitHub to work from the same repo, and used mysql scripts in [db](db) to keep the database consistent between devices.

Used a php script called [populator.php](db/populator.php) to populate Saiddit. It works by pulling content provided by reddit using json and storing it within our database. (usage: initialize the schema then call php ./populator.php)

