<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// includiamo database.php e libro.php per poterli usare
include_once '../config/database.php';
include_once '../models/libro.php';
// creiamo un nuovo oggetto Database e ci colleghiamo al nostro database
$database = new Database();
$db = $database->getConnection();
// Creiamo un nuovo oggetto Libro
$libro = new Libro($db);
// query products
$stmt = $libro->read();
$num = $stmt->rowCount();
// se vengono trovati libri nel database
if($num>0){
    // array di libri
    $libri_arr = array();
    $libri_arr["records"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $libro_item = array(
            "ISBN" => $ISBN,
            "Autore" => $autore,
            "Titolo" => $titolo
        );
        array_push($libri_arr["records"], $libro_item);
    }
    echo json_encode($libri_arr);
}else{
    echo json_encode(
        array("message" => "Nessun Libro Trovato.")
    );
}
?>