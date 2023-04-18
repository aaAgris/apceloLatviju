
<?php 
    require("header.php");
?>
<div id="pieteiksanas">
    <?php 
            require("connect_db.php");
            if(isset($_POST['gatavs'])){
                $vards_ievade = $_POST['vards'];
                $uzvards_ievade = $_POST['uzvards'];
                $dzim_dati_ievade = $_POST['dzimDati'];
                $celojums_ievade = $_POST['dropdown'];
                $lidzbrauceju_ievade = $_POST['skaits'];
                $telefona_ievade = $_POST['nr'];
                $epasta_ievade = $_POST['epasts'];
                $komentars_ievade = $_POST['koment'];

                    $atlasit_id_SQL = "SELECT * FROM galamerkis WHERE Nosaukums = '$celojums_ievade'"; 
                    $atlasa_id = mysqli_query($savienojums, $atlasit_id_SQL);


                    while($ieraksts = mysqli_fetch_assoc($atlasa_id)){
                    $IDGalam = $ieraksts['GalamID'];
                    }

          /*      $parbaudeSQL = "SELECT * FROM pieteikums WHERE Telefons = '$telefona_ievade'"; #Pārbauda vai neatkārtojas tālrunis
               $parbaudesRezultats= mysqli_query($savienojums, $parbaudeSQL);
                if(mysqli_num_rows($parbaudesRezultats) >= 1){ #Ja tālrunis atkārtojas (tāda tālruņa vērtība > 1)
                    echo "<div class='pieteiksanaskluda sarkans'>
                            Kļūda! Informācija par jums jau ir iesniegta! <br> Ja vēlaties veikt kādas
                            izmaiņas lūdzu sazinieties ar PIKC LVT pa tālruni + 371 69 999 999!</div>"; */
                

                    if(!empty($vards_ievade) && !empty($uzvards_ievade) && !empty($dzim_dati_ievade) &&
                    !empty($telefona_ievade) && !empty($celojums_ievade) && !empty($epasta_ievade)){
                        $pievienot_pieteikumu_SQL = "INSERT INTO pieteikums(vards, uzvards, dzimsanasDati, celojums, lidzbrauceji, Telefons,
                        epasts, komentars, statuss, IDGalam) VALUES('$vards_ievade','$uzvards_ievade', '$dzim_dati_ievade',
                        '$celojums_ievade', '$lidzbrauceju_ievade', '$telefona_ievade', '$epasta_ievade', '$komentars_ievade','1', '$IDGalam')"; #Ievieto ievadītās vērtības datubāzes tabulā

                        if(mysqli_query($savienojums, $pievienot_pieteikumu_SQL)){
                            echo "<div class='pieteiksanaskluda zals'>Peiteikums veiksmīgs!</div>";
                            header("Refresh:1; url=index.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=index.php");
                        }
                    }else{
                        echo "<div class='pieteiksanaskluda sarkans'>Reģistrācija nav izdevusies! Kāds no ievades laukiem aizpildīts NEKOREKTI!</div>";
                    }
                }
           // }

    ?>
</div>

</body>
</html>