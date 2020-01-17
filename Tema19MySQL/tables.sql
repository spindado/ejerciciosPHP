create database if not exists bookstore;
use bookstore;
CREATE TABLE book (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(13) NOT NULL,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    stock SMALLINT(5)  NOT NULL,
    price FLOAT NOT NULL
) engine='Innodb';

CREATE TABLE customer (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    surname VARCHAR(255),
    email VARCHAR(255),
    type ENUM('basic','premium') 
) engine='Innodb';

CREATE TABLE sale (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    customer_id INT(10),
    date DATETIME,
    FOREIGN KEY(customer_id) REFERENCES customer(id) ON UPDATE CASCADE ON DELETE CASCADE  
) engine='Innodb';

CREATE TABLE borrowed_books (
    customer_id INT(10),
    book_id INT(10),
    start DATETIME,
    end DATETIME,
    FOREIGN KEY(customer_id) REFERENCES customer(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(book_id) REFERENCES book(id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY(customer_id,book_id)
) engine='Innodb';

CREATE TABLE sale_book (
    book_id INT(10),
    sale_id INT(10),
    amount SMALLINT(5),
    FOREIGN KEY (book_id) REFERENCES book(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (sale_id) REFERENCES sale(id) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (book_id, sale_id)
) engine='Innodb';
