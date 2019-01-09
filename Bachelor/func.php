<?php
include "cours.php"; 
?>

<?php
  if(isset($_GET) && !empty($_GET["id"])){
 

    $req = "SELECT * FROM Programme WHERE StructurResponsable =".$_GET["id"];
    $result = $bddconn -> query($req);

    while ($row = $result -> fetch()) {
         if ($row ==true ){
              echo "<option value=".$row["ID"].">".$row["Nom"]."</option>";
            }
        }
    }




    if(isset($_GET) && !empty($_GET["cours"]) && !empty($_GET["etudiant"])){
        $id = (int)$_GET["etudiant"];
        $req = "SELECT ID FROM Cours WHERE ID = ".$_GET["cours"];
        $result = $bddconn -> query($req);
        while ($row = $result -> fetch()) {
             if ($row ==true ){
                    $req1 = "INSERT INTO Etudiant_Cours (IdEtudiant, IdCours) VALUES (".$id.", ".$row[0].");";
                    $bddconn -> exec($req1);
                }
            }
      }


?>