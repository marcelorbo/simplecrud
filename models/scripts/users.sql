/* users */
DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT,
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at DATETIME NOT NULL ON UPDATE CURRENT_TIMESTAMP(),
    
	name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(30),
    profile VARCHAR(10),
    
    PRIMARY KEY (id)
);

/*
    FOREIGN KEY (idcorrespondente) REFERENCES corespondentes(id)
		ON DELETE CASCADE
*/        