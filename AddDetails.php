<?php
include "DbConnection.php";
$handle = new DbConnection();
$conn = $handle->getDb();

$table = "details";
$statement = $conn->prepare("INSERT INTO " . $table . "(name, email, phone) VALUES (:name, :email, :phone)");
$name = "Dan189";
$email = "gittasbn@gmail.com";
$phone = 54353535;
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam('phone', $phone, PDO::PARAM_INT);
$statement->execute();
