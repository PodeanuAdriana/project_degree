<?php
 function campuri_necompletate($nume,$prenume,$username,$varsta,$parola,$parolare,$email,$telefon)
    {
        $result;
        if(empty($nume) || empty($prenume) ||empty($username)|| empty($varsta) || empty($parola) || empty($parolare) || empty($email)){
        $result=true;

        }
        else
        {
            $result=false;
        }
        return $result;
    }

    function email_invalid($email)
    {
        $result;
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
        $result=true;

        }
        else{
            $result=false;}
        
        return $result;
    }
  function username_invalid($username)
    {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;

        }
        else
        {
            $result=false;
        }
        return $result;
    }

    function parole_identice($parola,$parolare)
    {
        $result;
        if($parola !== $parolare){
        $result=true;

        }
        else{
            $result=false;}
        
        return $result;
    }

    function utilizatorExistent( $conn,$email,$username)
    {
        $select="SELECT * FROM utilizatori WHERE email=? OR username=? ; ";
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$select)){
            header("location:../register.php?error=stmtNuMere");
            exit();
        }
        mysqli_stmt_bind_param($stmt,"ss",$email,$username);
        mysqli_stmt_execute($stmt);

        $resultD= mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultD)){
            //daca este adevarat ma redirectioneaza catre login 
           // header("location:../login.php");

           //ecaterina_ionela@gmail.com 36
            return $row;
        }
        else{
            $result=false;
            return $result;
        }
        mysqli_stmt_close($stmt);

    }


    function campuri_necompletateLogIn($parola,$email)
    {
        $result;
        if( empty($parola) || empty($email) || empty($username)){
        $result=true;

        }
        else
        {
            $result=false;
        }
        return $result;
    }





