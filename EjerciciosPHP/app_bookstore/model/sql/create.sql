create database if not exists bookstore_pilar;
use bookstore_pilar;
CREATE TABLE book (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(13) NOT NULL,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    stock SMALLINT(5) NOT NULL,
    price FLOAT NOT NULL
) engine='Innodb';

CREATE TABLE customer (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    type ENUM('basic', 'premium') NOT NULL
) engine='Innodb';

CREATE TABLE sale (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    customer_id INT(10),
    date DATETIME NOT NULL,
    INDEX customer_0(customer_id),
    FOREIGN KEY(customer_id) REFERENCES customer(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = 'Innodb';

CREATE TABLE borrowed_books (
    customer_id INT(10),
    book_id INT(10),
    start DATETIME NOT NULL,
    end DATETIME,
    INDEX book_0(book_id),
    INDEX customer_0(customer_id),
    FOREIGN KEY(customer_id) REFERENCES customer(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(book_id) REFERENCES book(id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY(customer_id,book_id)
) engine='Innodb';

CREATE TABLE sale_book (
    book_id INT(10),
    sale_id INT(10),
    amount SMALLINT(5) NOT NULL,
    INDEX sale_0(sale_id),
    INDEX book_0(book_id),
    FOREIGN KEY (book_id) REFERENCES book(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (sale_id) REFERENCES sale(id) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT pk_bs PRIMARY KEY(book_id,sale_id)
) engine='Innodb';