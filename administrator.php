<?php
include 'includes/meniu_log.php';
include 'includes/connect_bd.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/preferinte_calatorie.css">
    <title>Admin</title>
</head>
<body>




        <div class="card" style="width:50cm;">
            <div class="card-body" style="background-color:white">
                <h5 class="card-title">Liste</h5>
                    <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active mx-auto" aria-current="page" href="#" onclick="paginaincarcata('utilizatori.php')">Utilizatori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="paginaincarcata('restaurante.php')">Restaurante</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="paginaincarcata('cazari.php')">Cazari</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="paginaincarcata('obiective.php')">Obiective</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-auto" onclick="paginaincarcata('evenimente.php')">Evenimente</a>
                    </li>
                    </ul>
  
                 </div>  
                 <div class="divulet" id="divulet" >
                  
                 </div>
                
          </div> 
    </div>  
          <script>
        function paginaincarcata(page) {
            fetch(page)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('divulet').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error loading content:', error);
                    document.getElementById('divulet').innerHTML = '<p>Eroare la încărcarea conținutului.</p>';
                });
        }
    </script>

</body>
</html>
<?php
include 'footer.php';
?>