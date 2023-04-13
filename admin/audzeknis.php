<?php
    $page = "audzekni";
    require "header.php";

    session_start();
                    
                    
    if(isset($_SESSION['Lietotajvards'])){
        /*echo "Sveicināts, ".($_SESSION['Lietotajvards'])."!";
        echo "<a href='admin/logout.php' class='izlogoties'>Izlogoties</a>";*/
        header("Refresh:1; url=audzeknis.php");
    }else{
        echo "Tev šeit nav pieejas!";
        header("Refresh:.1; url=login.php");
    }
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Apskats par audzēkni:</div>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require "../files/connect_db.php";

                    
                    if(isset($_POST['rediget'])){
                        $atlasitaisStatuss = $_POST['Statuss'];
                        $atjaunot_statusu_SQL = "UPDATE audzekni SET Statuss = 
                        '$atlasitaisStatuss' WHERE Audzeknis_ID = ".$_POST['rediget'];

                        if(mysqli_query($savienojums, $atjaunot_statusu_SQL)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            //header("Refresh:1; url=audzekni.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=audzekni.php");
                        }
                    }else{

                    $audzeknaID = $_POST['apskatit'];
                    $atlasit_audzekni_SQL = "SELECT * FROM audzekni a JOIN statuss st ON
                    a.Statuss = st.Statuss_ID WHERE Audzeknis_ID = $audzeknaID"; 
                    $atlasa_audzekni = mysqli_query($savienojums, $atlasit_audzekni_SQL);

                    $statusi_SQL = "SELECT * FROM statuss";
                    $atlasa_statusu = mysqli_query($savienojums, $statusi_SQL);
                    $Statusi = "";

                    while($ieraksts = mysqli_fetch_assoc($atlasa_statusu)){
                        $Statusi = $Statusi."<option value={$ieraksts['Statuss_ID']}>{$ieraksts['Stat_Nosaukums']}</option>";
                    }


                    while($ieraksts = mysqli_fetch_assoc($atlasa_audzekni)){
                        echo "
                            <table>
                            <tr><td rowspan='13'><i class='fas fa-user user-ico'></i></td></tr>
                            <tr><td>Audzēknis:</td><td class='value'>{$ieraksts['Vards']} 
                            {$ieraksts['Uzvards']}</td></tr>
                            <tr><td>Dzimšanas dati:</td><td class='value'>{$ieraksts['Dzim_Dati']} </td></tr>
                            <tr><td>Tālrunis:</td><td class='value'>{$ieraksts['Talrunis']} </td></tr>
                            <tr><td>Epasta adrese:</td><td class='value'>{$ieraksts['Epasts']} </td></tr>
                            <tr><td>Dzīves vietas adrese:</td><td class='value'>{$ieraksts['Adrese']} </td></tr>
                            <tr><td>Prioritārā specialitāte:</td><td class='value'>{$ieraksts['Spec1']} </td></tr>
                            <tr><td>Sekundārā specialitāte:</td><td class='value'>{$ieraksts['Spec2']} </td></tr>
                            <tr><td>Absolvētā skola:</td><td class='value'>{$ieraksts['Izglitiba']} </td></tr>
                            <tr><td>Vidējais vērtējums diplomā:</td><td class='value'>{$ieraksts['Vid_Vertejums']} </td></tr>
                            <tr><td>Reģistrācijas datums:</td><td class='value'>{$ieraksts['Reg_Datums']} </td></tr>
                            <tr><td>Komentārs:</td><td class='value'>{$ieraksts['Komentars']} </td></tr>
                            <tr><td>Uzņemšanas statuss:</td><td class='value'>
                                <form method='POST'>
                                    <select name='Statuss' required>
                                        <option value='{$ieraksts['Statuss']}' selected hidden>{$ieraksts['Stat_Nosaukums']}</option>
                                        $Statusi;
                                    </select>
                                    <button class='btn' type='submit' name='rediget' value='{$ieraksts['Audzeknis_ID']}'>
                                    Saglabāt</button>
                                </form>
                            </td></tr>
                            </table>
                        ";
                    }

                }}else{
                    echo "<div class='pieteiksanaskluda sarkans'>Kaut kas nogāja greizi!
                    Atgriezies iepriekšējā lapā un mēģini vēlreiz!</div>";
                    header("Refresh:1; url=audzekni.php");
                }
            ?>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>