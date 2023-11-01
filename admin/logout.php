<?php 
require_once("functions/functions.php");

session_start(); 

session_unset();

session_destroy();
dd(" ../index.php");