<?php
include 'includes/connect_bd.php';
session_start();
//require_once 'includes/functii.inc.php';
if(isset($_POST['submit'])){
 
    $email=$_POST['email'];
    $parola=$_POST['parola'];
   if(empty($email) ||empty($parola)){
    header('location:login.php');
 
   }
    $select="SELECT * FROM utilizatori WHERE email='$email';";
    $rez=mysqli_query($conn,$select);

    if(mysqli_num_rows($rez)>0)
    {
        while($row =mysqli_fetch_array($rez)){
            $email_db=$row['email'];
            $parola_db=$row['parola'];
            $rol=$row['rol'];
            $id_cont=$row['id_cont'];
        }
        if($email=="admin@admin.com")
        {
        if($parola===$parola_db)                    // verific daca parola este egala cu cea din bd
            {  $_SESSION['id']=$id_cont;
                $_SESSION['email']=$email;
                // aici pot face session['nume_utilizator_autenti']=$row['username'];
                // si cu mail session['email_utilizator']=$row['email'];
                // si ma duce on indx logat
              
                echo '<script>alert("Aveti drepturi de admin!");</script>';
                header("location:administrator.php"); 
            }
                else
                echo '<script>alert("Parola gresita!");</script>';


           
        }
        else
            if($email===$email_db)
            

                if($parola===$parola_db)                    // verific daca parola este egala cu cea din bd
                {  $_SESSION['id']=$id_cont;
                    // aici pot face session['nume_utilizator_autenti']=$row['username'];
                    // si cu mail session['email_utilizator']=$row['email'];
                    // si ma duce on indx logat
                  
                    echo '<script>alert("Aveti drepturi de utilizator!");</script>';
                    header('location:./index_logat.php'); 
                    
                }
                  
                
            



        mysqli_free_result($rez);
        
    }
    // if(campuri_necompletateLogIn($email,$parola)!== false){
    //     header("location:../log_in.php?error=campnecompletat");
    //     exit();
    // }
}