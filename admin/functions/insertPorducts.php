<?php

$name = $_POST["name"];
$price = $_POST["price"];
$count = $_POST["count"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$description = $_POST["des"];

$image = $_FILES["image"];

$imageSize = $image['size'];
$imageError = $image['error'];
$imageTMP = $image['tmp_name'];

$allowed_extensions = ['jpg', 'jpeg', 'png'];
$allowed_mime_types = ["image/jpeg", "image/png"];

if ($imageError === 0) {
    $imageExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
    if (in_array($imageExtension, $allowed_extensions)) {
        if (in_array($image['type'], $allowed_mime_types)) {
            if ($imageSize < 2000000) {
                $finallyImageName = time() . rand(1, 1000000) . $image['name'];
                move_uploaded_file($imageTMP, "../img/$finallyImageName");

                $insertProducts = "INSERT INTO products (name, price, image, count, brand, category, description) 
                VALUES ('$name', '$price', '$finallyImageName', '$count', '$brand', '$category', '$description')";
require_once("connect.php");
                

                $productQuery = $connect->query($insertProducts);

                header("location: ../products.php");
                exit;
            } else {
                echo "File size exceeds the limit";
            }
        } else {
            echo "Invalid file type";
        }
    } else {
        echo "Extension not allowed";
    }
} else {
    echo "Error uploading image";
}
