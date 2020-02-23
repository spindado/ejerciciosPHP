<?php

namespace model\lib;

class Book {
    //private static $lastID = 0;
    //protected $id;
    protected $isbn;
    protected $title;
    protected $author;
    protected $stock;
    protected $price;

    public function __construct($isbn, $title, $author, $stock, $price) {
        //$this->id = ++self::$lastID;
        $this->isbn=$isbn;
        $this->title=$title;
        $this->author=$author;
        $this->stock=$stock;
        $this->price=$price;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getPrice() {
        return $this->price;
    }

    public function __toString() {
        return "<p>$this->isbn - $this->title - $this->author - $this->stock - $this->price</p>";
    }
}
