<?php
require_once("connect.php");
require_once("functions.php");
$id = $_POST['id'];

$deleteQuery = "DELETE FROM products WHERE id = $id";

if ($connect->query($deleteQuery) === TRUE) {
    
dd("../products.php");
    

} else {
    echo " Something wrong happend " . $connect->error;
}
?>