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
<meta charset="UTF-8">
<title>accueil</title>
</head>



<script>
          $(function(){
  $(".fold-table tr.view").on("click", function(){
    $(this).toggleClass("open").next(".fold").toggleClass("open");
  });
});
</script>


<?php

$id = intval($_SESSION['id']);


						$req = "SELECT Cours.ID, Cours.Code, Cours.Intitule, Professeur.Nom, Professeur.Prenom, 
						Cours_Programme.NCredits, Periodicite.Periode, Cours_Salle.Jour, Cours_Salle.HeureDebut, 
						Cours_Salle.HeureFin, Cours.Description, Cours.Moodle, Cours.MediaServer, Cours.Evaluation, Salle.Nom, 
						Salle.Batiment, Cours.Type
						FROM Cours, Professeur, Cours_Prof, Cours_Programme, Cours_Salle, Periodicite, Salle, Etudiant_Cours
						Where Cours.ID = Cours_Salle.IdCours AND Salle.ID = Cours_Salle.IdSalle AND Cours.ID = Cours_Prof.IdCours 
						AND Professeur.ID = Cours_Prof.IdProfesseur AND Cours.ID = Cours_Programme.IdCours AND Cours.ID = Cours_Salle.IdCours 
						AND Salle.ID = Cours_Salle.IdSalle AND IdEtudiant = ".$id." AND Cours.ID = Etudiant_Cours.IdCours GROUP BY Cours.Code";

						$result = $bddconn -> query($req);
											

?>


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
        <!-- <a id="ong2" href="tableau.php" style="color:white;">Mon Tableau</a> -->
        <?php
								if (isset($_SESSION['id'])) {
									echo '<form action="logout.php" method="POST">
									<button type="submit" name="submit">Logout</button>
									</form>';
								}
								else {
									echo '<a id="ong3" href="connect.php" style="color:white;">Me connecter</a>';
								}
							?>
      </div> 
  </div>
  </div>
  </nav>


  <div class="content">



      <div class="jour">
					<h4>Mardi</h4>
					<table class="fold-table">
							  <thead>
							    <tr>
							        <th>Intitulé du cours</th><th>Enseignants responsable</th><th>Nb de crédits</th><th>Horaires</th>
							    </tr>
								</thead>
										<?php 
										while ($row = $result -> fetch()) { 
												if ($row ==true){
													if($row[7] == 'Mardi') {
										?>
							  <tbody>
							    <tr class="view">

									<?php      					
    						echo "<td class = 'Intitule'>".$row[2]."</td>";
    						echo "<td class = 'Prof'>".$row[3].",".$row[4]."</td>";
    						echo "<td class = 'NCds'>".$row[5]."</td>";
								echo "<td class = 'Horaire'>".$row[7].",".$row[8].",".$row[9]."</td>";                  
									?>

							    </tr>
							    <tr class="fold" style="background-color:#FFF6E2;">
							      <td colspan="7">
							        <div class="fold-content">
											<?php
                        echo "<h3>".$row[2]."<h3>";?>
                            <h5>Descriptif du cours :</h5>
                        <?php
                        echo "<p>".$row[10]."<p>";
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


				<?php

$id = intval($_SESSION['id']);


						$req = "SELECT Cours.ID, Cours.Code, Cours.Intitule, Professeur.Nom, Professeur.Prenom, 
						Cours_Programme.NCredits, Periodicite.Periode, Cours_Salle.Jour, Cours_Salle.HeureDebut, 
						Cours_Salle.HeureFin, Cours.Description, Cours.Moodle, Cours.MediaServer, Cours.Evaluation, Salle.Nom, 
						Salle.Batiment, Cours.Type
						FROM Cours, Professeur, Cours_Prof, Cours_Programme, Cours_Salle, Periodicite, Salle, Etudiant_Cours
						Where Cours.ID = Cours_Salle.IdCours AND Salle.ID = Cours_Salle.IdSalle AND Cours.ID = Cours_Prof.IdCours 
						AND Professeur.ID = Cours_Prof.IdProfesseur AND Cours.ID = Cours_Programme.IdCours AND Cours.ID = Cours_Salle.IdCours 
						AND Salle.ID = Cours_Salle.IdSalle AND IdEtudiant = ".$id." AND Cours.ID = Etudiant_Cours.IdCours GROUP BY Cours.Code";

						$result2 = $bddconn -> query($req);
											

?>
				<div class="jour">
					<h4>Jeudi</h4>
					<table class="fold-table">
							  <thead>
							    <tr>
							        <th>Intitulé du cours</th><th>Enseignants responsable</th><th>Nb de crédits</th><th>Horaires</th>
							    </tr>
								</thead>
										<?php 
										while ($row1 = $result2 -> fetch()) { 
												if ($row1 == true){
													if($row1[7] == 'Jeudi') {
										?>
							  <tbody>
							    <tr class="view">

									<?php      					
    						echo "<td class = 'Intitule'>".$row1[2]."</td>";
    						echo "<td class = 'Prof'>".$row1[3].",".$row1[4]."</td>";
    						echo "<td class = 'NCds'>".$row1[5]."</td>";
								echo "<td class = 'Horaire'>".$row1[7].",".$row1[8].",".$row1[9]."</td>";                  
									?>

							    </tr>
							    <tr class="fold" style="background-color:#FFF6E2;">
							      <td colspan="7">
							        <div class="fold-content">
											<?php
                        echo "<h3>".$row1[2]."<h3>";?>
                            <h5>Descriptif du cours :</h5>
                        <?php
                        echo "<p>".$row1[10]."<p>";
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


      <!-- <div class="jour">
          <h4>Mercredi</h4>
          <table class="fold-table">
							  <thead>
							    <tr>
							        <th>Intitulé du cours</th><th>Enseignants responsable</th><th>Nb de crédits</th><th>Horaires</th>
							    </tr>
							  </thead>
							  <tbody *ngFor="let user of users">
							    <tr class="view">
							      <td>{{ user.Intitule }}</td>
							      <td>{{ user.NomProf }}</td>
							      <td>{{ user.NCredits }}</td>
							      <td>{{ user.Jour }}</td>
							    </tr>
							    <tr class="fold" style="background-color:#FFF6E2;">
							      <td colspan="7">
							        <div class="fold-content">
							          <h3>{{ user.Intitule }}</h3>
							          <p>{{ user.Description }}</p>
							        </div>
							      </td>
							    </tr>
							  </tbody>
							</table>
        </div>


      <div class="jour">
          <h4>Jeudi</h4>
          <table class="fold-table">
							  <thead>
							    <tr>
							        <th>Intitulé du cours</th><th>Enseignants responsable</th><th>Nb de crédits</th><th>Horaires</th>
							    </tr>
							  </thead>
							  <tbody *ngFor="let user of users">
							    <tr class="view">
							      <td>{{ user.Intitule }}</td>
							      <td>{{ user.NomProf }}</td>
							      <td>{{ user.NCredits }}</td>
							      <td>{{ user.Jour }}</td>
							    </tr>
							    <tr class="fold" style="background-color:#FFF6E2;">
							      <td colspan="7">
							        <div class="fold-content">
							          <h3>{{ user.Intitule }}</h3>
							          <p>{{ user.Description }}</p>
							        </div>
							      </td>
							    </tr>
							  </tbody>
							</table>
        </div>


      <div class="jour">
          <h4>Vendredi</h4>
          <table class="fold-table">
							  <thead>
							    <tr>
							        <th>Intitulé du cours</th><th>Enseignants responsable</th><th>Nb de crédits</th><th>Horaires</th>
							    </tr>
							  </thead>
							  <tbody *ngFor="let user of users">
							    <tr class="view">
							      <td>{{ user.Intitule }}</td>
							      <td>{{ user.NomProf }}</td>
							      <td>{{ user.NCredits }}</td>
							      <td>{{ user.Jour }}</td>
							    </tr>
							    <tr class="fold" style="background-color:#FFF6E2;">
							      <td colspan="7">
							        <div class="fold-content">
							          <h3>{{ user.Intitule }}</h3>
							          <p>{{ user.Description }}</p>
							        </div>
							      </td>
							    </tr>
							  </tbody>
							</table>
        </div> -->

  </div>




</body>
</html>