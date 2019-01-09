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
<meta charset="UTF-8">
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
                                    echo '<a href="connect.php" id="ong2"><button class="btn btn-dark btn-sm">Se connecter</button></a>';

								}
							?>
      </div> 
  </div>
  </div>
  </nav>



  <?php

        if(isset($_POST['prog'])&& !empty($_POST['prog'])){
            $idprogramme= $_POST["programmes"];

            $reqtitre = "SELECT Nom FROM Programme WHERE id =".$idprogramme;

            $res = $bddconn -> query($reqtitre);

            $req = "SELECT Cours.ID, Cours.Code, Cours.Intitule, Professeur.Nom, Professeur.Prenom, Cours_Programme.NCredits, Periodicite.Periode, Cours_Salle.Jour, Cours_Salle.HeureDebut, Cours_Salle.HeureFin, Cours.Description, Cours.Moodle, Cours.MediaServer, Cours.Evaluation, Salle.Nom, Salle.Batiment, Cours.Type
            FROM Cours, Professeur, Cours_Prof, Cours_Programme, Cours_Salle, Periodicite, Salle
            Where Cours.ID = Cours_Salle.IdCours AND Salle.ID = Cours_Salle.IdSalle AND Cours.ID = Cours_Prof.IdCours AND Professeur.ID = Cours_Prof.IdProfesseur AND Cours.ID = Cours_Programme.IdCours AND Cours_Programme.IdProgramme = ".$idprogramme." AND Cours.ID = Cours_Salle.IdCours AND Salle.ID = Cours_Salle.IdSalle GROUP BY Cours.Code";
            $result = $bddconn -> query($req);

        ?>

<div class="content">
  <div class="wrapper2">


      <div class="input">
          
      <input type="text" name="recherche" placeholder="Rechercher un cours" class="form-control" aria-label="Search" style="width:60%; left:50%; margin:auto;">
      </div>
      <div class="facc">
        <?php 
            while ($row1 = $res -> fetch()) {
                if ($row1 ==true ){
                    echo "<h4 style='font-size:25px;'>".$row1[0]." </h4>";
                }
            }
    
        ?>
        <hr align="left" width="80%" style="border: 0.04em solid #DADADA; margin-top:30px; margin-bottom:30px;">
      </div>
       <div class="desc" style="margin-bottom:40px;">

        <div>
        <select name="Semestre" class="form-control form-control-sm" style="width: 80%;">
            <option value="1">Semestre d'automne</option>
            <option value="2">Semestre de printemps</option>
        </select>
    </div>
    	<div>
        <select name="Types" class="form-control form-control-sm" style="width: 80%;">
            <option value="obligatoire">Enseignement obligatoire</option>
            <option value="optionnel">Enseignement à option</option>
        </select>
    	</div>

    </div>
    	<div class="Liste">
        <h4 style="padding-bottom: 20px; font-size:25px;">Liste des cours</h4>
      </div>
							<table class="fold-table">
							  <thead>
							    <tr>
							     <th>Code du cours</th><th>Intitulé du cours</th><th>Enseignants responsable</th>
                                 <th>Nb de crédits</th> <th>Semestre</th><th>Horaires</th>
							    </tr>
                              </thead>

                        <?php     
                         while ($row = $result -> fetch()) {
                                if ($row ==true ){
                                $db_id = $row[1];
                ?>
						 <tbody id = '<?php $row[0]; ?>'>
							    <tr class="view">
                                <?php 
                                        echo "<td class = 'Code'>".$row[1]."</td>";
                                        echo "<td class = 'Intitule'>".$row[2]."</td>";
                                        echo "<td class = 'Prof'>".$row[3].",".$row[4]."</td>";
                                        echo "<td class = 'NCds'>".$row[5]."</td>";
                                        echo "<td class = 'Semestre'>".$row[6]."</td>";
                                        echo "<td class = 'Horaire'>".$row[7].",".$row[8].",".$row[9]."</td>";
                                ?>
                                </tr> 
							    <tr class="fold"  style="background-color:#FFFCF4;">
							      <td colspan="7">
							        <div class="fold-content">
                                     <?php
                        echo "<h3>".$row[2]."<h3>";?>
                            <h5>Descriptif du cours :</h5>
                        <?php
                        echo "<p>".$row[10]."<p>";
                         ?>
                     <?php
                     echo "<button onclick='add(".$row[0].")' class='btn btn-secondary'>Ajouter</button>";
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
<script>
function add(idcours){
	  var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
		        alert(this.responseText + "Le cours a bien été ajouté");
	    }
	  }
        idetud = "<?php echo $_SESSION['id']; ?>";
		xmlhttp.open("GET", "func.php?cours="+ idcours +"&etudiant="+ idetud, false);
		xmlhttp.send();
}
</script>
</body>
</html>