<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pieteikšanās specialitātē</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/lvt.png" type="image/x-icon">
</head>
<body>
    
<header>
        <div class="logo"> <img src="images/ApskatiLV_Logo.png"></div>
        <nav class="nav">
            <ul>
                <li><a href="index.php#home">Sākums</a></li>
                <li><a href="index.php#pakalpojumi">Pakalpojumi</a></li>
                <li><a href="index.php#celojumi">Ceļojumi</a></li>
                <li><a href="index.php#pieteikties">Pieteikties</a></li>
                <li><a href="index.php#jaunumi">Jaunumi</a></li>
                <li><a href="index.php#parmums">Par Mums</a></li>
                <li><a href="./login.php"><i class="fa fa-lock"></i></a></li>
                
                <?php
                 if(isset($_SESSION['lietotajvards'])): ?>
                  <li><a href="logout.php">Izlogoties</a></li>
                <?php endif; ?>
                
            </ul>
        </nav>
    </header>


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

                $parbaudeSQL = "SELECT * FROM pieteikums WHERE Telefons = '$telefona_ievade'"; #Pārbauda vai neatkārtojas tālrunis
                $parbaudesRezultats= mysqli_query($savienojums, $parbaudeSQL);
                if(mysqli_num_rows($parbaudesRezultats) >= 1){ #Ja tālrunis atkārtojas (tāda tālruņa vērtība > 1)
                    echo "<div class='pieteiksanaskluda sarkans'>
                            Kļūda! Informācija par jums jau ir iesniegta! <br> Ja vēlaties veikt kādas
                            izmaiņas lūdzu sazinieties ar PIKC LVT pa tālruni + 371 69 999 999!</div>";
                

                    if(!empty($vards_ievade) && !empty($uzvards_ievade) && !empty($dzim_dati_ievade) &&
                    !empty($telefona_ievade) && !empty($celojums_ievade) && !empty($epasta_ievade)){
                        $pievienot_pieteikumu_SQL = "INSERT INTO pieteikums(vards, uzvards, dzimsanasDati, celojums, lidzbrauceji, Telefons,
                        epasts, komentars) VALUES('$vards_ievade','$uzvards_ievade', '$dzim_dati_ievade',
                        '$celojums_ievade', '$lidzbrauceju_ievade', '$telefona_ievade', '$epasta_ievade', '$komentars_ievade')"; #Ievieto ievadītās vērtības datubāzes tabulā

                        if(mysqli_query($savienojums, $pievienot_pieteikumu_SQL)){
                            echo "
                            <p>Reģistrācija ir noritējusi veiksmīgi! Uz drīzu sazināšanos!</p>";
                        }else{
                            echo "
                            <p>Reģistrācija nav izdevusies! Mēģiniet vēlreiz!</p>";
                        }
                    }else{
                        echo "<div class='pieteiksanaskluda sarkans'>Reģistrācija nav izdevusies! Kāds no ievades laukiem aizpildīts NEKOREKTI!</div>";
                    }
                }
            }

    ?>
</div>

<script src="files/script.js"></script>

</body>
</html>