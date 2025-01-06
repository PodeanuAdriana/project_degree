<?php
$serverName= "localhost";
$userName= "root";
$password= "";
$dbname="planificare_calatorie";
$conn=mysqli_connect($serverName,$userName,$password,$dbname);
if(mysqli_connect_errno()){
    die("Conexiune nereusita! ".mysqli_connect_error());
}
$id =$_GET['modificaid'];
if(isset($_POST['update'])){

    $sql="SELECT * FROM `adrese` WHERE  id_adresa=$id;";
    //echo $sql;
    $select=mysqli_query($conn,$sql) or die('Nu merge !');
    if(mysqli_num_rows($select)>0){
        $ok=0;
        if(!empty($_POST['regiune']))
        {
        $regiune=$_POST['regiune'];
        $sql="UPDATE adrese SET regiune='$regiune' WHERE id_adresa='$id'";
        mysqli_query($conn,$sql) or die('Nu merge regiune!');
        $ok++;

        }
        if(!empty($_POST['judet']))
            {
            $judet=$_POST['judet'];
            $sql="UPDATE adrese SET judet='$judet' WHERE id_adresa='$id'";
            mysqli_query($conn,$sql) or die('Nu merge judet!');
            $ok++;
        }

        if(!empty($_POST['localitate']))
        {
        $localitate=$_POST['localitate'];
        $sql="UPDATE adrese SET localitate='$localitate' WHERE id_adresa='$id'";
        mysqli_query($conn,$sql) or die('Nu merge localitate!');
        $ok++;
        }

        if(!empty($_POST['strada']))
        {
        $strada=$_POST['strada'];
        $sql="UPDATE adrese SET strada='$strada' WHERE id_adresa='$id'";
        mysqli_query($conn,$sql) or die('Nu merge strada!');
        $ok++;
        }
      

        if($ok>0){
          //  echo'Modificare reusita!';
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
                <label>regiune</label>
                <input type="text" class="form-control" name="regiune">
            </div>
            <br>
            <div class="form-group">
                <label>judet</label>
                <input type="text" class="form-control" name="judet">
            </div>
            <br>
            <div class="form-group">
                <label>localitate:</label>
                <input type="text" class="form-control" name="localitate">
            </div>
            <br>
            <div class="form-group">
                <label>Strada:</label>
                <input type="text" class="form-control" name="localitate">
            </div>
            <br>
            <div class="form-group">
                <label>Nr:</label>
                <input type="number" min=0 max=5 class="form-control" name="strada">
            </div>
            <br>
            
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <button tpe="back"class="btn btn-info" name="back"><a href="administrator.php">Back</a></button>
                    </form>

                </div>
            </div>
    </div>
</body>
</html>