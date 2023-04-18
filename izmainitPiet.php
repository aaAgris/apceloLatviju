<?php
    $page = "pieteikums";
    require "header.php";
    if(!isset($_SESSION['lietotajvards'])){
        echo "Tev šeit nav pieejas!";
        header("Location: login.php");
    exit();
    }
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Pieteikuma info:</div>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require "./connect_db.php";

                    
                    if(isset($_POST['rediget'])){
                        $atlasitais_Vards = $_POST['Vards'];
                        $atlasitais_Uzvards = $_POST['Uzvards'];
                        $atlasitais_Dzim = $_POST['Dzim'];
                        $atlasitais_Celojums = $_POST['Cel'];
                        $atlasitie_Lidzbrauceji = $_POST['Lidz'];
                        $atlasitais_Telefons = $_POST['Tel'];
                        $atlasitais_Epasts = $_POST['Epasts'];
                        $atlasitais_Komentars = $_POST['Komentars'];
                        $atlasitais_Statuss = $_POST['Statuss'];

                        
                        
                        $atjaunot_Vardu = "UPDATE pieteikums SET vards = 
                        '$atlasitais_Vards' WHERE Pieteikums_ID = ".$_POST['rediget'];

                        $atjaunot_Uzvardu = "UPDATE pieteikums SET uzvards = 
                        '$atlasitais_Uzvards' WHERE Pieteikums_ID = ".$_POST['rediget'];

                        $atjaunot_Dzim = "UPDATE pieteikums SET dzimsanasDati = 
                        '$atlasitais_Dzim' WHERE Pieteikums_ID = ".$_POST['rediget'];

                        $atjaunot_Celojumu = "UPDATE pieteikums SET celojums = 
                        '$atlasitais_Celojums' WHERE Pieteikums_ID = ".$_POST['rediget'];

                        $atjaunot_Lidzbrauceji = "UPDATE pieteikums SET lidzbrauceji = 
                        '$atlasitie_Lidzbrauceji' WHERE Pieteikums_ID = ".$_POST['rediget'];

                        $atjaunot_Telefonu = "UPDATE pieteikums SET Telefons = 
                        '$atlasitais_Telefons' WHERE Pieteikums_ID = ".$_POST['rediget'];

                        $atjaunot_Epastu = "UPDATE pieteikums SET epasts = 
                        '$atlasitais_Epasts' WHERE Pieteikums_ID = ".$_POST['rediget'];

                        $atjaunot_Komentaru = "UPDATE pieteikums SET komentars = 
                        '$atlasitais_Komentars' WHERE Pieteikums_ID = ".$_POST['rediget'];

                        $atjaunot_Statusu = "UPDATE pieteikums SET statuss = 
                        '$atlasitais_Statuss' WHERE Pieteikums_ID = ".$_POST['rediget'];
                
        
                        if(mysqli_query($savienojums, $atjaunot_Vardu)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=pieteikumi.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=pieteikumi.php");
                        }


                        if(mysqli_query($savienojums, $atjaunot_Uzvardu)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=pieteikumi.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=pieteikumi.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_Dzim)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=pieteikumi.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=pieteikumi.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_Celojumu)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=pieteikumi.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=pieteikumi.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_Lidzbrauceji)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=pieteikumi.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=pieteikumi.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_Telefonu)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=pieteikumi.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=pieteikumi.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_Epastu)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=pieteikumi.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=pieteikumi.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_Komentaru)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=pieteikumi.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=pieteikumi.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_Statusu)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=pieteikumi.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=pieteikumi.php");
                        }



                       



                    }else{

                    $lietID = $_POST['izmainit'];
                    $atlasit_pieteikumu_SQL = "SELECT * FROM pieteikums WHERE Pieteikums_ID = $lietID"; 
                    $atlasa_pieteikumu = mysqli_query($savienojums, $atlasit_pieteikumu_SQL);


                    while($ieraksts = mysqli_fetch_assoc($atlasa_pieteikumu)){
                        echo "
                        <form action='izmainitPiet.php' method='POST'>
                            <table>
                            <tr>
                                <td>
                                Vārds:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Vards'>{$ieraksts['vards']}</textarea>
                                <td>
                            </tr>

                            <tr>
                            <td>
                            Uzvārds:
                            </td>
                            <td class='value'><textarea rows = '5' cols = '60' 
                            name = 'Uzvards'>{$ieraksts['uzvards']}</textarea>
                            <td>
                        </tr>

                        <tr>
                        <td>
                        Dzimšanas Dati:
                        </td>
                        <td class='value'><textarea rows = '5' cols = '60' 
                        name = 'Dzim'>{$ieraksts['dzimsanasDati']}</textarea>
                        <td>
                    </tr>

                    <tr>
                    <td>
                    Ceļojums:
                    </td>
                    <td class='value'><textarea rows = '5' cols = '60' 
                    name = 'Cel'>{$ieraksts['celojums']}</textarea>
                    <td>
                </tr>

                            <tr>
                                <td>
                                Līdzbraucēji:
                                </td>
                                <td class='value'>
                                <textarea rows = '5' cols = '60' 
                                name = 'Lidz'>{$ieraksts['lidzbrauceji']}</textarea>
                                <td>
                            </tr>
                            <tr>
                                <td>Telefons:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Tel'>{$ieraksts['Telefons']}</textarea>
                                <td>
                            </tr>

                            <tr>
                            <td>E-Pasts:
                            </td>
                            <td class='value'><textarea rows = '5' cols = '60' 
                            name = 'Epasts'>{$ieraksts['epasts']}</textarea>
                            <td>
                        </tr>

                        <tr>
                        <td>Komentārs:
                        </td>
                        <td class='value'><textarea rows = '5' cols = '60' 
                        name = 'Komentars'>{$ieraksts['komentars']}</textarea>
                        <td>
                    </tr>

                    <tr>
                    <td>Statuss:
                    </td>
                    <td class='value'><textarea rows = '5' cols = '60' 
                    name = 'Statuss'>{$ieraksts['statuss']}</textarea>
                    <td>
                </tr>

                            
                            <tr><td>
                                <button class='btn' type='submit' name='rediget' value='{$ieraksts['Pieteikums_ID']}'>
                                    Saglabāt</button>
                            </td></tr>
                            
                            </table>
                            </form>
                        ";
                    }

                }}else{
                    echo "<div class='pieteiksanaskluda sarkans'>Kaut kas nogāja greizi!
                    Atgriezies iepriekšējā lapā un mēģini vēlreiz!</div>";
                    header("Refresh:1; url=izmainitPiet.php");
                }
            ?>
        </div>
    </div>
</section>

<?php
   include "footer.php";
?>