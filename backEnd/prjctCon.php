<?php

$conn = mysqli_connect("localhost", "root", "", "allprojects");

if(mysqli_connect_error()){
    echo"Cannot Conect";
    exit();
}


define("UPLOADPRJCT_SRC", $_SERVER['DOCUMENT_ROOT']."/backEnd/prjctImages/");

define("FETCHPRJCT_SRC", "https://areksa.com/backEnd/prjctImages/");

define("UPLOADVIDPRJCT_SRC", $_SERVER['DOCUMENT_ROOT']."/backEnd/prjctImages/");

define("FETCHVIDPRJCT_SRC", "https://areksa.com/backEnd/prjctImages/");


?>
