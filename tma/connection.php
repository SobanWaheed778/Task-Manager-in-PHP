<?php 

$server = "localhost";
$name = "root";
$password = "";
$database = "tma";

$connection = mysqli_connect($server,$name,$password,$database);

if(!$connection){
    die("QUERY FAILED: ". mysqli_error($connection));
}

?>