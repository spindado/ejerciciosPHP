create database if no exists bookstore;
use bookstore;

CREATE TABLE book(
    ID int(10) PRIMARY KEY,
    isbn VARCHAR(13),
    title VARCHAR(255),
    author VARCHAR(255),
    stock SMALLINT(5),
    price FLOAT
)engine="Imnodb"

CREATE TABLE customer(
    ID INT(10) PRIMARY KEY,
    firstname VARCHAR(255),
    surname VARCHAR(255),
    email VARCHAR(255),
    type enum('basic','premium')    
)engine="Imnodb"

CREATE TABLE sale(
    id INT(10),
    customer_id INT(10),--FK de tabla customer
    datte datetime,
    indexcustomer_0
)engine="Imnodb"

CREATE TABLE borrowed_books(
    customer_id INT(10),--FK de tabla customer
    book_id INT(10),--FK de tabla book
    sttart datetime,
    ennd datetime,
    Indexbook_0, --Indice de book_id,
    Indexxustomer_0 --Indice de customer_id

)engine="Imnodb"

