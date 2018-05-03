-- The Movie table
-- Every movie must have a unique ID as primary key.
-- Every movie must have a title.
-- Check if ID is non-negative.
CREATE TABLE Movie (
	id INT,
    title VARCHAR(100) NOT NULL,
    year INT,
    rating VARCHAR(10),
    company VARCHAR(50),
    
    PRIMARY KEY (id),
    CHECK(id >= 0)
) ENGINE = INNODB;

-- The Actor table
-- Every actor must have a unique ID as primary key..
-- Every actor must have a first name and a last name.
-- Every actor must have a date of birth.
-- Check if ID is non-negative.
CREATE TABLE Actor (
	id INT,
    last VARCHAR(20) NOT NULL,
    first VARCHAR(20) NOT NULL,
    sex VARCHAR(6),
    dob DATE NOT NULL,
    dod DATE,
    
    PRIMARY KEY (id),
    CHECK(id >= 0)
) ENGINE = INNODB;

-- The Director table
-- Every director must have a unique ID as primary key..
-- Every director must have a first name and a last name.
-- Every director must have a date of birth.
-- Check if ID is non-negative.
CREATE TABLE Director (
	id INT,
    last VARCHAR(20) NOT NULL,
    first VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    dod DATE,
    
    PRIMARY KEY (id),
    CHECK(id >= 0)
) ENGINE = INNODB;

-- The MovieGenre table
-- Every tuple must have a mid that also appears in the Movie(id).
CREATE TABLE MovieGenre (
	mid INT NOT NULL,
    genre VARCHAR(20) NOT NULL,
    
    FOREIGN KEY (mid) REFERENCES Movie(id) 
) ENGINE = INNODB;

-- The MovieDirector table
-- Every tuple must have a mid that also appears in the Movie(id).
-- Every tuple must have a did that also appears in the Director(id).
CREATE TABLE MovieDirector (
	mid INT NOT NULL,
    did INT NOT NULL,
    
    FOREIGN KEY (mid) REFERENCES Movie(id),
    FOREIGN KEY (did) REFERENCES Director(id)
) ENGINE = INNODB; 

-- The MovieActor table
-- Every tuple must have a mid that also appears in the Movie(id).
-- Every tuple must have a aid that also appears in the Actor(id).
CREATE TABLE MovieActor (
	mid INT NOT NULL,
    aid INT NOT NULL,
    role VARCHAR(50),
    
    FOREIGN KEY (mid) REFERENCES Movie(id),
    FOREIGN KEY (aid) REFERENCES Actor(id)
) ENGINE = INNODB;

-- The Review table
-- Every tuple must have a mid that also appears in the Movie(id).
-- Check if rating is between 0 and 5 inclusive.
CREATE TABLE Review (
	name VARCHAR(20),
    time TIMESTAMP,
    mid INT,
    rating INT,
    comment VARCHAR(500),
    
    FOREIGN KEY (mid) REFERENCES Movie(id),
    CHECK(rating >= 0 AND rating <=5)
) ENGINE = INNODB;

-- The MaxPersonID table
CREATE TABLE MaxPersonID (
	id INT
) ENGINE = INNODB;

-- The MaxMovieID
CREATE TABLE MaxMovieID (
	id INT
) ENGINE = INNODB;