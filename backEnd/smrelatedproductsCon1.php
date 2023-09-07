<?php

$conn = mysqli_connect("localhost", "root", "", "allproducts");

if(mysqli_connect_error()){
    echo"Cannot Conect";
    exit();
}


define("UPLOADPRD_SRC2", $_SERVER['DOCUMENT_ROOT']."/are/backEnd/smrelatedproducts/");

define("FETCHPRD_SRC2", "http://127.0.0.1/are/backEnd/smrelatedproducts/");
?>
