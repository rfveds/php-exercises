use my_db;

CREATE TABLE users
(
    id         INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name       VARCHAR(255) NOT NULL,
    email      VARCHAR(255) NOT NULL,
    password   VARCHAR(255) NOT NULL,
    created_at datetime     NOT NULL,
    is_active  BOOLEAN      NOT NULL DEFAULT 1,
    KEY is_active (is_active),
    UNIQUE KEY email (email)
);

CREATE TABLE invoices
(
    id      INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNSIGNED,
    amount  DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE SET NULL ON UPDATE CASCADE
);


insert into users (name, email, password, created_at)
values ('John Doe', 'john@mail.com', '123456 ', now());

insert into invoices (user_id, amount)
values (1, 100.00);

insert into invoices (user_id, amount)
values (1, 200.00);
