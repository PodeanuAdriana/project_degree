<?php
include 'header.php';
if(mysqli_connect_errno()){
    die("Conexiune nereusita! ".mysqli_connect_error());
}
$id =$_GET['modificaid'];
if(isset($_POST['update'])){

    $sql="SELECT * FROM `utilizatori` WHERE  id_cont=$id;";
    echo $sql;
    $select=mysqli_query($conn,$sql) or die('Nu merge !');
    if(mysqli_num_rows($select)>0){
        $ok=0;
        if(!empty($_POST['nume']))
        {
        $nume=$_POST['nume'];
        $sql="UPDATE utilizatori SET nume_utilizator='$nume' WHERE id_cont='$id'";
        mysqli_query($conn,$sql) or die('Nu merge USER!');
        $ok++;

        }
        if(!empty($_POST['prenume']))
            {
            $prenume=$_POST['prenume'];
            $sql="UPDATE utilizatori SET prenume_utilizator='$prenume' WHERE id_cont='$id'";
            mysqli_query($conn,$sql) or die('Nu merge USER!');
            $ok++;
        }

        if(!empty($_POST['username']))
        {
        $username=$_POST['username'];
        $sql="UPDATE utilizatori SET username='$username' WHERE id_cont='$id'";
        mysqli_query($conn,$sql) or die('Nu merge USER!');
        $ok++;
        }

        if(!empty($_POST['varsta']))
        {
        $varsta=$_POST['varsta'];
        $sql="UPDATE utilizatori SET varsta='$varsta' WHERE id_cont='$id'";
        mysqli_query($conn,$sql) or die('Nu merge USER!');
        $ok++;
        }
    
        if(!empty($_POST['parola'])){
                $parola=$_POST['parola'];
                $sql="UPDATE utilizatori SET parola='$parola' WHERE id_cont='$id'";
                mysqli_query($conn,$sql) or die('Nu merge PAROLA!');
                $ok++;
        }
            
        if(!empty($_POST['email']))
        {
            $email=$_POST['email'];
            $sql="UPDATE utilizatori SET email='$email' WHERE id_cont='$id'";
            mysqli_query($conn,$sql) or die('Nu merge EMAIL!');
            $ok++;
        }

        if(!empty($_POST['mobil'])){
            $mobil=$_POST['mobil'];
            $sql="UPDATE utilizatori SET mobil='$mobil' WHERE id_cont='$id'";
            mysqli_query($conn,$sql) or die('Nu merge TELE!');
            $ok++;
        }

        if(!empty($_POST['rol'])){
            $rol=$_POST['rol'];
            $sql="UPDATE utilizatori SET rol='$rol' WHERE id_cont='$id'";
            mysqli_query($conn,$sql) or die('Nu merge TELE!');
            $ok++;
        }

        
        if($ok>0){
            //echo'Modificare reusita!';
            header('location:administrator.php');
            
        }
            else
            echo 'Modificare nereusita!';
    }
    else echo'ID negasit!';
    
}
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/preferinte_calatorie.css">
</head>
<body>
<div class="Formular">
<form action="" method="POST">
<div class="container">
        <div class="card" style="width:20cm;">
            <div class="card-body">
                    <h5 class="card-title">Modificari</h5>
                <label>Nume</label>
                <input type="text" class="form-control" name="nume">
            </div>
            <br>
            <div class="form-group">
                <label>Prenume</label>
                <input type="text" class="form-control" name="prenume">
            </div>
            <br>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="username">
            </div>
            <br>
            <div class="form-group">
                <label>Varsta:</label>
                <input type="number" min=16 class="form-control" name="varsta">
            </div>
            <br>
            <div class="form-group">
            <label>Parola</label>
            <input type="password" class="form-control"  name="parola">
        </div><br>
            <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
        </div><br>
        <div class="form-group">
            <label>Mobil</label>
            <input type="text" class="form-control"  name="mobil">
        </div><br>


            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <button tpe="back"class="btn btn-info" name="back"><a href="administrator.php">Back</a></button>
                    </form>

                </div>
            </div>
    </div>
</body>
</html>