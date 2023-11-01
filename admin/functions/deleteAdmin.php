<?php
// deleteAdmin.php
require_once("functions.php");


require_once("connect.php");
$id = $_GET['id'];

$deleteQuery = "DELETE FROM administration WHERE id = $id";

if ($connect->query($deleteQuery) === TRUE) {
    
dd("../admin.php");
    

} else {
    echo " Something wrong happend " . $connect->error;
}
?>