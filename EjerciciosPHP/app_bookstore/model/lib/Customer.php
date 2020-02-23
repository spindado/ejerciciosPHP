<?php

namespace model\lib;

class Customer {
    protected $firstname;
    protected $surname;
    protected $email;
    protected $password;
    protected $type;

    public function __construct($email, $password, $firstname = "", $surname = "", $type = "") {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;
    }


    public function checkTitleExists($title, $titles) {
        foreach ($titles as $arrayTitle) {
            if(in_array($title, $arrayTitle)) {
                throw new \Exception('No se puede guardar, el libro ya existe');
            }
        }
    }


    public function getEmail() {
        return $this->email;
    }


    public function getFirstname() {
        return $this->firstname;
    }


    public function deleteBook($pdo, $book_id) {
        $query = <<<SQL
DELETE FROM bookstore_pilar.book WHERE book.id=:id
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('id', "$book_id");
        $result = $result->execute();
        if (!$result) {
            throw new \Exception('No se pudo eliminar el libro');
        }
    }


    public function equalEmail($emailRowsArray) {
        foreach ($emailRowsArray as $emailRows) {
            foreach ($emailRows as $email) {
                //echo "<p></p>Recuperado: $email , Introducido: $this->email<br>";
                if ($email === $this->email) {
                    return true;
                }
            }
        }
        return false;
    }


    public function equalPassword($passwordArray) {
        //$password = $passwordArray['password'];
        //echo "<p></p>Recuperada: $password , Introducida: $this->password<br>";
        if ($passwordArray['password'] === $this->password) {
            return true;
        }
        return false;
    }


    public function insertBook($pdo, $book) {
        $isbn = $book->getIsbn();
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $stock = $book->getStock();
        $price = $book->getPrice();
        $query = <<<SQL
INSERT INTO bookstore_pilar.book (isbn,title,author,stock,price) VALUES ("$isbn","$title","$author","$stock","$price");
SQL;
/*$sql = 'INSERT INTO bookstore_pilar.book (isbn,title,author,stock,price) VALUES (?,?,?,?,?)';
$result->bindValue(0,$email);*/
        $result = $pdo->prepare($query);
        $result = $result->execute();
        if (!$result) {
            throw new \Exception('No se ha podido guardar el libro');
        }
    }


    public function insertBorrowedBooks($pdo, $customer_id, $book_id, $start) {
        $query = <<<SQL
INSERT INTO bookstore_pilar.borrowed_books (customer_id,book_id,start) VALUES ("$customer_id","$book_id","$start");
SQL;
        $result = $pdo->prepare($query);
        $result = $result->execute();
        if (!$result) {
            throw new \Exception('No se ha podido alquilar el libro');
        }
    }


    public function insertCustomer($pdo) {
        $query = <<<SQL
INSERT INTO bookstore_pilar.customer (firstname,surname,email,password,type) VALUES ("$this->firstname","$this->surname","$this->email","$this->password","$this->type");
SQL;
        $result = $pdo->prepare($query);
        return $result->execute();
    }


    public function insertSale($pdo, $customerID, $dateSale) {
        $query = <<<SQL
INSERT INTO bookstore_pilar.sale (customer_id,date) VALUES ("$customerID","$dateSale");
SQL;
        $result = $pdo->prepare($query);
        $result = $result->execute();
        if (!$result) {
            throw new \Exception('No se ha podido comprar');
        }
    }


    public function insertSaleBook($pdo, $bookID, $saleID, $amount) {
        $query = <<<SQL
INSERT INTO bookstore_pilar.sale_book (book_id,sale_id,amount) VALUES ("$bookID","$saleID","$amount");
SQL;
        $result = $pdo->prepare($query);
        $result = $result->execute();
        if (!$result) {
            throw new \Exception('No se ha podido comprar el libro');
        }
    }


    public function selectAvailableStock($pdo, $bookID) {
        $query = <<<SQL
SELECT stock-count(book_id) AS available_stock
FROM bookstore_pilar.book, bookstore_pilar.borrowed_books
WHERE book.id=:id AND book.id=borrowed_books.book_id AND end IS NULL;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('id', "$bookID");
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectBook($pdo, $title) {
        $query = <<<SQL
SELECT isbn, title, author, stock, price
FROM bookstore_pilar.book
WHERE book.title=:title;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('title', "$title");
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectBooks($pdo) {
        $query = <<<SQL
SELECT isbn, title, author, stock, price
FROM bookstore_pilar.book;
SQL;
        $result = $pdo->prepare($query);
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectBookID($pdo, $title) {
        $query = <<<SQL
SELECT id from bookstore_pilar.book WHERE book.title=:title;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('title', "$title");
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectIDBookFromBorrowed($pdo, $title, $customerID) {
        $query = <<<SQL
SELECT id FROM bookstore_pilar.book, bookstore_pilar.borrowed_books
WHERE title=:title AND id=book_id AND customer_id=:customer_id AND end IS NULL;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('title', "$title");
        $result->bindValue('customer_id', "$customerID");
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectBookIDsFromBorrowed($pdo, $customerID) {
        $query = <<<SQL
SELECT book_id from bookstore_pilar.borrowed_books WHERE borrowed_books.customer_id=:customer_id AND end IS NULL;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('customer_id', "$customerID");
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectCustomerID($pdo, $email) {
        $query = <<<SQL
SELECT id from bookstore_pilar.customer WHERE customer.email=:email;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('email', "$email");
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectEmails($pdo) {
        $query = <<<SQL
SELECT email from bookstore_pilar.customer;
SQL;
        $result = $pdo->prepare($query);
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectPassword($pdo, $email) {
        $query = <<<SQL
SELECT password from bookstore_pilar.customer WHERE customer.email=:email;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('email', "$email");
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectSaleID($pdo, $customerID, $dateSale) {
        $query = <<<SQL
SELECT id from bookstore_pilar.sale WHERE sale.customer_id=:customer_id AND sale.date=:date;
SQL;
            $result = $pdo->prepare($query);
            $result->bindValue('customer_id', "$customerID");
            $result->bindValue('date', "$dateSale");
            $result->execute();
            $rows = $result->fetchAll();
            if (!$rows) {
                throw new \Exception('No se ha realizado ninguna compra ese día');
            }
            return $rows; 
    }


    public function selectStock($pdo, $bookID) {
        $query = <<<SQL
SELECT stock FROM bookstore_pilar.book WHERE id=:id;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('id', "$bookID");
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectTitles($pdo) {
        $query = <<<SQL
SELECT title FROM bookstore_pilar.book;
SQL;
        $result = $pdo->prepare($query);
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function selectTitlesBorrowed($pdo, $bookID) {
        $query = <<<SQL
SELECT title FROM bookstore_pilar.book WHERE id=:book_id;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('book_id', "$bookID");
        $result->execute();
        $rows = $result->fetchAll();
        return $rows;
    }


    public function updateBorrowedBooks($pdo, $end, $customerID, $bookID) {
        $query = <<<SQL
UPDATE bookstore_pilar.borrowed_books SET end=:end WHERE borrowed_books.customer_id=:customer_id AND borrowed_books.book_id=:book_id;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('end', "$end");
        $result->bindValue('customer_id', "$customerID");
        $result->bindValue('book_id', "$bookID");
        $result = $result->execute();
        if (!$result) {
            throw new \Exception('No se pudo devolver el libro');
        }
    }

    public function updateStock($pdo, $newStock, $bookID) {
        $query = <<<SQL
UPDATE bookstore_pilar.book SET stock=:stock WHERE book.id=:book_id;
SQL;
        $result = $pdo->prepare($query);
        $result->bindValue('stock', "$newStock");
        $result->bindValue('book_id', "$bookID");
        $result = $result->execute();
        if (!$result) {
            throw new \Exception('No se pudo actualizar el stock');
        }
    }


    public function __toString() {
        return "<p>$this->firstname $this->surname - $this->email - $this->password - $this->type</p>";
    }
}
