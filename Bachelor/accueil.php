<?php
include "cours.php"; 
?>
<?php  session_start(); ?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" 
integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"><meta charset="UTF-8">
<title>accueil</title>
</head>

<script>

    function programme(idstructure){


      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("programmes").innerHTML = this.responseText;
        }
      }
              
		xmlhttp.open("GET", "func.php?id="+ idstructure.value, false);
		xmlhttp.send();

    var button = document.getElementById("sub2").disabled = false;;

}
</script>


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


  <div class="content">
  <div class="wrapper2">
      <div class="input">
      <input type="text" name="recherche" placeholder="Rechercher un cours" class="form-control" aria-label="Search" style="width:60%; left:50%; margin:auto;">
      </div>



      
      <div class="fac">
        <h3 style="font-size:25px;">Dans quelle faculté êtes-vous</h3>
      </div>

    <form name="prog" action="catalogue.php" method="post">
      <div class="fac2">
        <select name="faculte" id="faculte" onchange="programme(this)" class="form-control form-control-sm" style="width:50%">
  
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
        <h4>Choisissez votre bachelor</h4>
      </div>
      <div class="fac2">
        <select name="programmes" id="programmes" onchange="" class="form-control form-control-sm" style="width:50%">
          <option disabled selected value> -- select an option -- </option>
        </select>
      </div>


      <div class="submit">
      <input type="submit" name="prog" class="btn btn-success" value="Rechercher" id="sub2" style="width:10%" disabled>
      </div>

      </form>

</div>
</div>

   
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $req = "SELECT * FROM Etudiant WHERE Prenom ='".$username. "' AND MDP ='".$password."'";
    $result = $bddconn -> query($req);
    
    while ($row = $result -> fetch()) {
        if ($row ==true ){
          $db_username = $row[2];
          $db_lastname = $row[1];
          $db_password = $row[3];
          $db_id = $row[0];
        }
    }


    if ($username !== $db_username && $password !== $db_password){
      header("Location: ../Bachelor/connect.php");
    }

    else if($username == $db_username && $password == $db_password) {
      header("Location: ../Bachelor/accueil.php");

      $_SESSION['username'] = $db_username;
      $_SESSION['lastname'] = $db_lastname;
      $_SESSION['id'] = $db_id;

    }
}
?>




</body>
</html>