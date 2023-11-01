<?php
require_once("functions.php");
$name = $_POST["name"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$address = $_POST["adress"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$pr = $_POST["pr"];
$gender = $_POST["gender"];

require_once("connect.php");

$insertAdmin = "INSERT INTO administration (name, password, adress, phone, email, pr, gender) 
VALUES ('$name', '$password', '$address', '$phone', '$email', '$pr', '$gender')";

$adminQuery = $connect->query($insertAdmin);

if ($adminQuery) {
    dd("../admin.php");
    exit;
} else {
    echo "Error inserting admin into the database.";
}
?>
