<?php

use Model;

class Book {
    //private static $lastID = 0;
    protected $id;
    protected $author;
    protected $title;
    protected $genre;
    protected $price;
    protected $publishDate;
    protected $description;

    public function __construct($author, $title, $genre, $price, $publishDate, $description) {
        //$this->id = ++self::$lastID;
        $this->id = null;
        $this->author=$author;
        $this->title=$title;
        $this->genre=$genre;
        $this->price=$price;
        $this->publishDate=$publishDate;
        $this->description=$description;
    }

    public function setID($catalog) {
        foreach ($catalog->attributes() as $id) {
            # code...
        }
        $this->id = $catalog->count();
    }
}
