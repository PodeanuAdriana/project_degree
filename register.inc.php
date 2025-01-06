 <?php
    include 'includes/connect_bd.php';


    if (isset($_POST['submit'])) {
     
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $username = $_POST['username'];
        $varsta = $_POST['varsta'];
        $parola = $_POST['parola'];
        $email = $_POST['email'];
        $telefon = $_POST['telefon'];
        
        $insert = "INSERT INTO utilizatori (nume_utilizator, prenume_utilizator, username, varsta, parola, email, mobil) 
                   VALUES ('$nume', '$prenume', '$username', '$varsta', '$parola', '$email', '$telefon')";
    
        if ($conn->query($insert) === TRUE) {
      
            
                    header('location:log_in.php');
                 
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
