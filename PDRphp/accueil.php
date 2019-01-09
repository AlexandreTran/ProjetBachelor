<?php
include "cours.php"; 
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" 
integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="function.js"></script>

<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">
<title>accueil</title>
</head>
<body>

<nav>
  <div class="header">
  <div class="wrapper">
      <div class="logo">
        <a href="accueil.php" style="color:white;">UNIGE</a>
      </div>
      <div class="onglet">
        <a id="ong1" href="catalogue.php" style="color:white;">CATALOGUE DES COURS</a>
        <a id="ong2">TABLEAU</a>
        <a id="ong3">CONNEXION</a>
      </div> 
  </div>
  </div>
  </nav>


  <div class="content">
  <div class="wrapper2">
      <div class="input">
         <input type="text" name="recherche" placeholder="Rechercher un cours" class="input3">
           <button type="button" name="button"><i class="fas fa-search"></i></button>
      </div>
      <div class="fac">
        <h3>Dans quelle faculté êtes-vous</h3>
      </div>

<form name="prog" action="catalogue.php" method="post">
      <div class="fac2">
        <select name="faculte" id="faculte" onchange="programme(this)">
  
            <option disabled selected value> -- select an option -- </option>
            <?php 
              $req = "SELECT * FROM Structure_Responsable";
              $result = $bddconn -> query($req);
              
              while ($row = $result -> fetch()) {
                  if ($row ==true ){
                      echo "<option value=".$row["ID"].">".$row["Nom"]."</option>";
               }
            }
          ?>

        </select>
      </div>
      <div class="bache">
        <p>Choisissez votre bachelor</p>
      </div>
      <div class="fac2">
        <select name="programmes" id="programmes">
          <option disabled selected value> -- select an option -- </option>
        </select>
      </div>


      <div class="submit">
      <input type="submit" name="prog" class="btn btn-success" value="Rechercher" id="sub2" style="width:10%" disabled>
      </div>

      </form>

</div>
</div>
</body>
</html>
