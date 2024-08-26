<?php
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DATABASE = 'todo8';


try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //    echo "Connected successfully";

    //    $query = $conn->prepare("SELECT * FROM tasks");
//    $query->execute();
//    $result = $query->fetchAll(PDO::FETCH_OBJ);
//    echo "<pre>";
//    print_r($result);
//    echo "</pre>";

} catch (PDOException $e) {
    diePage("Connection failed: " . $e->getMessage());
}
