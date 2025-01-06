<?php
include 'meniu.php';
?>
<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/login.css">
            <title>Log_in</title>
        </head>
        <body>
        <form action="login.inc.php" method="POST">
            <div class="container">
                
                <div class="login">
                <br></br>
                <br></br>
                    <label><b>LogIn</b></label>
                    <br></br>
                    <label>E-mail:</label>
                    <input type="text" name="email" placeholder="@gmail.com/0222245121" requierd>
                    <br></br>
        
                    <label>Parola:</label>
                    <input type="password" name="parola">
        
                    <div class="butonel1">
                    <input type="submit"class="button" class="textbox" name="submit" id="trimite"value="Trimite">
                    </div>
        
                </div>
         
                    <div class="imagine">
                  <img src="imagini/mare1.jpg">
                    </div>
            </div>
        
            </form>
            <?php

           // $email_trimite=$_POST['email'];
          //  $parola_trimite=$_POST['parola'];



           

//     if(isset($_POST["submit"])){
    
//         $email=$_POST["email"];
//         $parola=$_POST["parola"];

//         require_once 'includes/connect_db.php';
//         require_once 'includes/functions.inc.php';

//         // if(campuri_necompletateLogIn($email,$parola)!== false){
//         //   //  header("location:../log_in.php?error=campnecompletat");
//         //    // exit();
//         // }

//         loginUser($email,$parola);
// }
// else
// {
//    // header("location: ../log_in.php");
//     exit();
// }


//            /* if(isset($_GET["error"]))
//             {

//                 if($_GET["error"]=="campnecompletat"){
//                     echo '<p>Campuri necompletate!</p>';
//                    // header("location:signup.php");
//                 }
                 
//                 else if($_GET["error"]=="gresealautentificare"){
//                  echo '<p>Greseala  autentificare!</p>';
//                  // header("location:signup.php");
//                  }
//                  else if($_GET["error"]=="parola_gresita"){
//                     echo '<p>Greseala  autentificare!</p>';
//                     // header("location:signup.php");
//                     }


//             }*/
//         ?>
        </body>
        </html>