<?php
// header('location:./index.php');
// session_start();
include 'connect_bd.php';
echo'
<html>
<head>

   
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stil.css" rel="stylesheet">
    <style>
        *{
            
  font-family: "Alex Brush", cursive;
  font-weight: 900;
  font-style: normal;
  font-size: 40px;
}
   body{
    background-color:dark;
   }
        

    </style>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#"><i class="bi bi-car-front-fill">TuRo</i> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index_logat.php">Acasa <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="despre_noi.php">Despre Noi</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
        aria-haspopup="true" aria-expanded="false">
          Preferinte calatorie
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="preferinte_generale.php">Generale</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="preferinte_cazari.php">Cazari</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="preferinte_restaurante.php">Restaurante</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="preferinte_obiective.php">Obiective</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="preferinte_evenimente.php">Evenimente</a>
           <div class="dropdown-divider"></div> 
          <a  class="dropdown-item" class="nav-link dropdown-toggle" href="#"id="navbarDropdown" role="button" 
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rezultate filtrate</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <div class="btn-group dropright">
          <a class="dropdown-item" href="cazari_selectate.php">Cazari</a>
          <a class="dropdown-item" href="restaurante_selectate.php">Restaurante</a>
          
          <a class="dropdown-item" href="obiective_selectate.php">Obiective</a>
        
          <a class="dropdown-item" href="evenimente_selectate.php">Evenimente</a></div> 


        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="destinatii_random.php">Destinatii Random</a>
      </li>
    </ul>

  
    <li class="nav-item dropdown w-10">
        <a class="nav-link dropdown-toggle w-10 mr-3 mb-2" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i id="icon" class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu "id="drm" aria-labelledby="navbarDropdown">
          <a class="dropdown-item1" href="cont.php">Cont</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item1" href="istoric.php">Istoric</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item1" href="salvari.php">Salvari</a>
           <div class="dropdown-divider"></div>
          <a class="dropdown-item1" href="forum.php">Forum</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item1" href="./log_out.php">Delogare</a>
        </div>
      </li>
        <form action="" class="form-inline method="post" my-1 my-lg">
      <input class="form-control btn-sm mr-1" type="search" placeholder="Search" aria-label="Search" name="cauta">
      <button class="btn btn-outline-light btn-sm mr-3" name="submit"  type="submit">Search</button>
    </form>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>';

?>
