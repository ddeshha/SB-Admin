<?php

require_once("connect.php");

$id = $_POST['id'];
$name = $_POST["name"];
$price = $_POST["price"];
$count = $_POST["count"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$description = $_POST["description"];

$image = $_FILES["image"];
echo "<pre>";
print_r($_FILES);

$imageName = $image["name"];
$imageExplode = explode(".", $imageName);
$imageExtension = end($imageExplode);

$imageSize = $image['size'];

$imageError = $image['error'];

$imageTMP = $image['tmp_name'];

$extension_allowed = ['jpg', 'jpeg', 'png'];
$allowed_memes = ["image/jpeg", "image/png"];

if ($imageError === 0) {
    if (!in_array($imageExtension, $extension_allowed)) {
        die("Not allowed file extension");
    } elseif ($imageSize > 4000000) {
        die("File size not allowed");
    } elseif (!in_array($image['type'], $allowed_memes)) {
        die("Invalid file type");
    }

    $finallyImageName = time() . rand(1, 1000000) . $imageName;

    move_uploaded_file($imageTMP, "../img/$finallyImageName");

    $updateProducts = "UPDATE products SET name='$name', price='$price', image='$finallyImageName', count='$count', brand='$brand', category='$category', description='$description' WHERE id = $id";
} else {
    $updateProducts = "UPDATE products SET name='$name', price='$price', count='$count', brand='$brand', category='$category', description='$description' WHERE id = $id";
}

$queryProducts = $connect->query($updateProducts);

if ($queryProducts){

header("location: ../products.php");

}else{
    $connect -> error;
}

