<?php
    require "./connect_db.php";

    
    if(isset($_POST['delete'])){
        $izdzest_ierakstu_SQL = "DELETE FROM galamerkis 
        WHERE GalamID = ".$_POST['delete'];
        if(mysqli_query($savienojums, $izdzest_ierakstu_SQL)){
            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
            header("Refresh:1; url=index.php"); 
        }else{
            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
            header("Refresh:1; url=index.php");
        }
    }

  

 
?>