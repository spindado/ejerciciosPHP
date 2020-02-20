<?php 


if(isset($_POST['insert'])){
    $number = $_POST['number'];
    $xmlFile = simplexml_load_file("movie.xml");
    $xml = new SimpleXMLElement("<movies></movies>");
    $c = 0;
    for ($i=0; $i < $number ; $i++) { 
        $id = $xml->addChild("id");
        $id->addChild("id".$c);
        $movie = $xml->addChild("movie".$c);
        $movie->addChild("title",$_POST['title']);
        $movie_cast = $movie ->addChild("cast");
        $actors = $movie_cast ->addChild("actor".$c);
        $actors->addChild("actor",$_POST['actor']);
        $c++;
        
    }
    $xml_File = $xml->asXML("movie.xml");
    
    if($xml_File){
        echo "XML file have been generated successfully";
    }else{
        echo "XML file error";
    }

}else{
    echo <<< HDR
    <form action="" method="post">
        <label for="number">numero de libros a insertar</label>
        <input type="number" name="number" min="1" max="10"><br>
        <label for="title">titulo:</label>
        <input type="text" name="title"><br>
        <label for="title">actor:</label>
        <input type="text" name="actor"><br>
        <input type="submit" name="insert" value="insertar">
    </form>
HDR;
}



?>