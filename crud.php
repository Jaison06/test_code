<?php
include "Queries.php";
$details_insert = new Queries();

$name = "Jaison George Mangara123";
$email = "jaiosnmangara@gmail.com";
$phone = 1234567890;
$price = 50.00;
$id = 34;

$tbl_name = "Details";

$fields = array('name' => $name, 'email' => $email, 'phone' => $phone, 'price' => $price);

$wh_clause = array('id' => $id);

//var_dump($wh_clause);

$details_insert->Insert($tbl_name, $fields);
$details_insert->Update($tbl_name, $fields, $wh_clause);
$details_insert->Delete($tbl_name, $wh_clause);
