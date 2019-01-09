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

<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">
<meta charset="UTF-8">
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
        <a id="ong2" href="accueil.php" style="color:white;">Rechercher un cours</a>
        <?php
								if (isset($_SESSION['id'])) {
									echo '<a id="ong2" href="tableau.php" style="color:white;">Mon Tableau</a>';
								}
								else {
									echo ' <a id="ong2" href="connect.php" style="color:white;">Mon Tableau</a>';
								}
							?>
        <?php
								if (isset($_SESSION['id'])) {
									echo '<form action="logout.php" method="POST" id="ong2">
									<button type="submit" name="submit" class="btn btn-dark btn-sm" id="logout">Se deconnecter</button>
									</form>';
								}
								else {
                  // echo '<a id="ong3" href="connect.php" style="color:white;">Me connecter</a>';
                  echo '<a href="connect.php" id="ong2"><button class="btn btn-dark btn-sm">Se connecter</button></a>';

								}
							?>
      </div> 
  </div>
  </div>
  </nav>



 
    <div class="container" style="padding-top:50px;">
        <div class="col-xs-6">
            <form action="accueil.php" method="post">

                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text"  name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password"  name="password" class="form-control">
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="submit" style="width:10%">


            </form>
        </div>
    </div>

<!-- 
    <?php 
              $req = "SELECT * FROM Etudiant";
              $result = $bddconn -> query($req);
              
              while ($row = $result -> fetch()) {
                  if ($row ==true ){
                      echo "<option value=".$row["ID"].">".$row["Nom"]."</option>";
                      print_r($row);
                  }
              }

            ?>
   
    <?php

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo $username;
    echo $password;
}
?> -->


</div>
</div>



</body>
</html>