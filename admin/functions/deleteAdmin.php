<?php
// deleteAdmin.php


require_once("connect.php");
$id = $_GET['id'];

$deleteQuery = "DELETE FROM administration WHERE id = $id";

if ($connect->query($deleteQuery) === TRUE) {
    
header("location: ../admin.php");
    

} else {
    echo " Something wrong happend " . $connect->error;
}
?>