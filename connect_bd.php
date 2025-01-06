<?php

$serverName= "localhost";
$userName= "root";
$password= "";
$dbname="planificare_calatorie";




$conn=mysqli_connect($serverName,$userName,$password,$dbname);


if(mysqli_connect_errno()){
    die("Conexiune nereusita! ".mysqli_connect_error());
}

