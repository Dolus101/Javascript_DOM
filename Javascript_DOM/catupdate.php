<?php
include_once("dbconnect.php");

$id = $_POST['id'];
$name = $_POST['name'];

try {
    $query = "UPDATE category_table SET category_name = :name WHERE id = :id";
    $statement = $connection->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':name', $name);
    $statement->execute();

    echo json_encode(["res" => "success"]);
} catch(PDOException $th) {
    echo json_encode(['error' => $th->getMessage()]);
}
?>
