<?php

$conn = mysqli_connect("localhost", "root", "", "allproducts");

if(mysqli_connect_error()){
    echo"Cannot Conect";
    exit();
}


define("UPLOADPRD2_SRC", $_SERVER['DOCUMENT_ROOT']."/are/backEnd/prdImages/");



define("FETCHPRD2_SRC", "http://127.0.0.1/are/backEnd/prdImages/");

?>
