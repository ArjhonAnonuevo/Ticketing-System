	CREATE TABLE user (
        id INT PRIMARY KEY,
        firstname VARCHAR(255),
        lastname VARCHAR(255),
        email VARCHAR(200) UNIQUE,
        username VARCHAR(255) UNIQUE,
        password VARCHAR(200),
        anydeskIp VARCHAR(50) UNIQUE,
        branch VARCHAR(200),
        department VARCHAR(200),
        credentials VARCHAR(20)
    );