<?php
require_once("connect.php");
$id = $_GET['id'];

$deleteQuery = "DELETE FROM products WHERE id = $id";

if ($connect->query($deleteQuery) === TRUE) {
    
header("location: ../products.php");
    

} else {
    echo " Something wrong happend " . $connect->error;
}
?>