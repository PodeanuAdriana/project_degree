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

    $sql="SELECT * FROM `restaurante` WHERE  id_restaurant=$id;";
    //echo $sql;
    $select=mysqli_query($conn,$sql) or die('Nu merge !');
    if(mysqli_num_rows($select)>0){
        $ok=0;
        if(!empty($_POST['denumire']))
        {
        $denumire=$_POST['denumire'];
        $sql="UPDATE restaurante SET denumire='$denumire' WHERE id_restaurant='$id'";
        mysqli_query($conn,$sql) or die('Nu merge denumire!');
        $ok++;

        }
        if(!empty($_POST['tip_locatie']))
            {
            $tip_locatie=$_POST['tip_locatie'];
            $sql="UPDATE restaurante SET tip_locatie='$tip_locatie' WHERE id_restaurant='$id'";
            mysqli_query($conn,$sql) or die('Nu merge tip_locatie!');
            $ok++;
        }

        if(!empty($_POST['specificuri']))
        {
        $specificuri=$_POST['specificuri'];
        $sql="UPDATE restaurante SET specificuri='$specificuri' WHERE id_restaurant='$id'";
        mysqli_query($conn,$sql) or die('Nu merge specificuri!');
        $ok++;
        }

        if(!empty($_POST['evaluare']))
        {
        $evaluare=$_POST['evaluare'];
        $sql="UPDATE restaurante SET evaluare='$evaluare' WHERE id_restaurant='$id'";
        mysqli_query($conn,$sql) or die('Nu merge evaluare!');
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
                <label>Denumire</label>
                <input type="text" class="form-control" name="denumire">
            </div>
            <br>
            <div class="form-group">
                <label>Tip_locatie</label>
                <input type="text" class="form-control" name="tip_locatie">
            </div>
            <br>
            <div class="form-group">
                <label>Specificuri:</label>
                <input type="text" class="form-control" name="specificuri">
            </div>
            <br>
            <div class="form-group">
                <label>Evaluare:</label>
                <input type="number" min=0 max=5 class="form-control" name="evaluare">
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