<?php

$conn = mysqli_connect("localhost", "root", "", "allproducts");

if(mysqli_connect_error()){
    echo"Cannot Conect";
    exit();
}


define("UPLOADPRD_SRC", $_SERVER['DOCUMENT_ROOT']."/backEnd/prdImages/");

define("FETCHPRD_SRC", "https://areksa.com/backEnd/prdImages/");


?>
