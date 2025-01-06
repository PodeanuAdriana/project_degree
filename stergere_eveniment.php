<?php
include 'connect_db.php';
error_reporting(0);
if(isset($_GET['stergeid'])){
    $id=$_GET['stergeid'];

    $stergere="DELETE FROM evenimente WHERE id_cazare=$id;";
    $rez=mysqli_query($conn,$stergere);
    if($rez)
    {
       header("location:administrator.php");
    }
    else
        die(mysqli_error($conn));

}
?>