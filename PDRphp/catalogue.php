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

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


<title>catalogue</title>
</head>
<script>
          $(function(){
  $(".fold-table tr.view").on("click", function(){
    $(this).toggleClass("open").next(".fold").toggleClass("open");
  });
});
</script>

<body>

<nav>
  <div class="header">
  <div class="wrapper">
      <div class="logo">
        <a href="accueil.php" style="color:white;">UNIGE</a>
      </div>
      <div class="onglet">
        <a id="ong1" href="accueil.php" style="color:white;">CATALOGUE DES COURS</a>
        <a id="ong2">TABLEAU</a>
        <a id="ong3">CONNEXION</a>
      </div>
  </div>
  </div>
  </nav>


  <?php

if(isset($_POST['prog'])&& !empty($_POST['prog'])){
    $idprogramme= $_POST["programmes"];

    $reqtitre = "SELECT Nom FROM Programme WHERE id =".$idprogramme;

    $res = $bddconn -> query($reqtitre);

    $req = "SELECT Cours.Code, Cours.Intitule, Professeur.Nom, Professeur.Prenom, Cours_Programme.NCredits, Periodicite.Periode, Cours_Salle.Jour, Cours_Salle.HeureDebut, Cours_Salle.HeureFin, Cours.Description, Cours.Moodle, Cours.MediaServer, Cours.Evaluation, Salle.Nom, Salle.Batiment, Cours.Type
            FROM Cours, Professeur, Cours_Prof, Cours_Programme, Cours_Salle, Periodicite, Salle
            Where Cours.ID = Cours_Salle.IdCours AND Salle.ID = Cours_Salle.IdSalle AND Cours.ID = Cours_Prof.IdCours AND Professeur.ID = Cours_Prof.IdProfesseur AND Cours.ID = Cours_Programme.IdCours AND Cours_Programme.IdProgramme = ".$idprogramme." AND Cours.ID = Cours_Salle.IdCours AND Salle.ID = Cours_Salle.IdSalle GROUP BY Cours.Code";
    $result = $bddconn -> query($req);


?>

<div class="content">
  <div class="wrapper2">


      <div class="input">
         <input type="text" name="recherche" placeholder="Rechercher un cours">
           <button type="button" name="button"><i class="fas fa-search"></i></button>
      </div>
      <div class="facc">
        <?php
            while ($row1 = $res -> fetch()) {
                if ($row1 ==true ){
                    echo "<h3 style='font-weight: bold'>".$row1[0]." </h3>";
                }
            }
    
        ?>
        <hr>
      </div>
       <div class="desc">

        <div>
        <select name="Semestre" class="Semestre">
            <option value="1">Semestre d'automne</option>
            <option value="2">Semestre de printemps</option>
        </select>
    </div>
    	<div>
        <select name="Types" class="Type">
            <option value="obligatoire">Enseignement obligatoire</option>
            <option value="optionnel">Enseignement à option</option>
        </select>
    	</div>

    </div>


    	<div class="Liste">
        <h3 style="font-weight: bold; padding-bottom: 20px;">Liste des cours</h3>
      </div>




							<table class="fold-table">
							  <thead>
							    <tr>
							     <th>Code du cours</th><th>Intitulé du cours</th><th>Enseignants responsable</th><th>Nb de crédits</th> <th>Semestre</th><th>Horaires</th>
							    </tr>
                              </thead>
                        <?php
                         while ($row = $result -> fetch()) {
                        if ($row ==true ){

                ?>
							  <tbody>
							    <tr class="view">
                <?php
                    for($i=0; $i<9; $i++){
                        if($i==2){
                            echo "<td>".$row[2].",".$row[3]."</td>";
                            $i++;
                        }
                        else if($i==6){
                            echo "<td>".$row[6].",".$row[7].",".$row[8]."</td>";
                            $i=$i+2;
                        }
                        else{
                         echo "<td>".$row[$i]."</td>";
                        
                        }
                    }

                ?>

							    </tr>
							    <tr class="fold">
							      <td colspan="7">
							        <div class="fold-content">
                                     <?php
                        echo "<h3>".$row[1]."<h3>";?>
                            <h5>Descriptif du cours :</h5>
                        <?php
                        echo "<p>".$row[9]."<p>";

                     ?>

							        </div>
							      </td>
							    </tr>
                              </tbody>
              <?php
            }
        }
    }
                              ?>
							</table>

</div>
</div>

</body>
</html>
