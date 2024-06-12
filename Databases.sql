CREATE TABLE IF NOT EXISTS users(
    id int AUTO_INCREMENT,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    username varchar(250) NOT NULL,
    email varchar(250) NOT NULL,
    password varchar(255) NOT NULL,
    dob varchar(10) NOT NULL,
    is_enabled boolean NOT NULL DEFAULT true,
    PRIMARY KEY (id),
    UNIQUE KEY unique_columns (username,email)
);

CREATE TABLE IF NOT EXISTS posts(
    id int AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    content varchar(255),
    user_id int NOT NULL,
    is_enabled boolean NOT NULL DEFAULT true,
    created_at date,
    updated_at date,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE IF NOT EXISTS comments (
    id int AUTO_INCREMENT,
    post_id int NOT NULL,
    name varchar(50) NOT NULL,
    email varchar(50),
    text varchar(255) NOT NULL,
    is_enabled boolean NOT NULL DEFAULT true,
    PRIMARY KEY (id),
    FOREIGN KEY (post_id) REFERENCES posts (id)
)