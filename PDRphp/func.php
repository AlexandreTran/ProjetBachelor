<?php
include "cours.php"; 
?>

<?php

    // function faculte(){
    //     $req = "SELECT * FROM Structure_Responsable";
    //     $result = $bddconn -> query($req);
        
    //     while ($row = $result -> fetch()) {
    //         if ($row ==true ){
    //             echo "<option value=".$row["ID"].">".$row["Nom"]."</option>";
    //         }
    //     }
    // }



  if(isset($_GET) && !empty($_GET["id"])){
 

    $req = "SELECT * FROM Programme WHERE StructurResponsable =".$_GET["id"];
    $result = $bddconn -> query($req);

    while ($row = $result -> fetch()) {
         if ($row ==true ){
              echo "<option value=".$row["ID"].">".$row["Nom"]."</option>";
            }
        }
    }
    

if(isset($_GET) && !empty($_GET["cours"])){
    $req = "SELECT ID FROM Cours WHERE ID = ".$_GET["cours"];
    $result = $bddconn -> query($req);
    while ($row = $result -> fetch()) {
         if ($row ==true ){
                $req1 = "INSERT INTO Etudiant_Cours (IdEtudiant, IdCours) VALUES (Null, ".$row[0].")";
                $bddconn -> exec($req1);
            }
        }
  }
?>