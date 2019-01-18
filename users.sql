CREATE TABLE users (
  UserID int NOT NULL AUTO_INCREMENT,
  first_name VARCHAR (20),
  last_name VARCHAR (20),
  email VARCHAR (50),
  pass VARCHAR (20),
  DofB DATE,
  alevel int,
  PRIMARY KEY (UserID)
)