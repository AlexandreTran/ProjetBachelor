<?php


        $servername = "localhost";
        $username = "root";
        $password = "";
        
        try {
            $bddconn = new PDO("mysql:host=$servername;dbname=PDR", $username, $password);
            // set the PDO error mode to exception
            $bddconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully"; 
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }

        // $req = "SELECT * FROM Cours";
        // $result = $bddconn -> query($req);

        // while ($row = $result -> fetch()) {
        //     if ($row ==true ){
        //         echo $row["ID"];
        //     }
        // }


?>