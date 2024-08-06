<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "aze";

$connect=mysqli_connect($server,$user,$password,$database);
if($connect)
{
   //echo "";
}
else{
    die("Database Connection Error");
}