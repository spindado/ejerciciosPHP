<?php

//error_reporting(0);

$refBook = [
    'id' => 'bk103',
    'Author' => 'J.K.Rowling',
    'Title' => 'Harry Potter y la piedra Fisolofal',
    'Genre' => 'Ficción',
    'Price' => '12.99',
    'PublishDate' => '1995-02-01',
    'Description' => 'Un joven mago...'
];

$file = 'catalog.xml';

function añadirNuevoNodo($sxe, $refBook, $file) {
    $book = $sxe->addChild('Book');

    foreach ($refBook as $key => $value) {
        if ($key == 'id') {
            $book->addAttribute($key, $value);
        } else {
            $book->addChild($key, $value);
        }
    }
    if(!$sxe->asXML($file)) {
        throw new \Exception('No se ha podido guardar en el fichero');
    }
    //var_dump($sxe);
}

if (file_exists($file)) {
    $xmlFile = simplexml_load_file($file);
} else {
    exit('Error al abrir ' . $file);
}

try {
    añadirNuevoNodo($xmlFile, $refBook, $file);
} catch (\Exception $e) {
    echo $e->getMessage();
}
