<?php
    $page = "moderatori";
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
            <div class="head-info head-color">Moderatora info:</div>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require "./connect_db.php";

                    
                    if(isset($_POST['rediget'])){
                        $atlasitais_Lietotajvards = $_POST['Lietotajvards'];
                        $atlasita_Parole = $_POST['Parole'];
                        $atlasita_atlauja = $_POST['Atlauja'];

                        $atlasita_Parole = password_hash($atlasita_Parole, PASSWORD_DEFAULT);
                        
                        
                        $atjaunot_lietotajvardu_SQL = "UPDATE lietotajs SET lietotajvards = 
                        '$atlasitais_Lietotajvards' WHERE lietotajs_id = ".$_POST['rediget'];

                        $atjaunot_paroli_SQL = "UPDATE lietotajs SET parole = 
                        '$atlasita_Parole' WHERE lietotajs_id = ".$_POST['rediget'];

                        $atjaunot_atlauju_SQL = "UPDATE lietotajs SET irAdmins = 
                        '$atlasita_atlauja' WHERE lietotajs_id = ".$_POST['rediget'];
        
                        if(mysqli_query($savienojums, $atjaunot_lietotajvardu_SQL)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=moderatori.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=moderatori.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_paroli_SQL)){
                            
                            header("Refresh:1; url=moderatori.php"); 
                        }else{
                           
                            header("Refresh:1; url=moderatori.php"); 
                        }

                        if(mysqli_query($savienojums, $atjaunot_atlauju_SQL)){
                            
                            header("Refresh:1; url=moderatori.php"); 
                        }else{
                          
                            header("Refresh:1; url=moderatori.php");
                        }



                    }else{

                    $lietID = $_POST['izmainit'];
                    $atlasit_moderatoru_SQL = "SELECT * FROM lietotajs WHERE lietotajs_id = $lietID"; 
                    $atlasa_moderatoru = mysqli_query($savienojums, $atlasit_moderatoru_SQL);


                    while($ieraksts = mysqli_fetch_assoc($atlasa_moderatoru)){
                        echo "
                        <form action='izmainitMod.php' method='POST'>
                            <table>
                            <tr>
                                <td>
                                Lietotājvārds:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Lietotajvards'>{$ieraksts['lietotajvards']}</textarea>
                                <td>
                            </tr>
                            <tr>
                                <td>
                                Parole:
                                </td>
                                <td class='value'>
                                <textarea rows = '5' cols = '60' 
                                name = 'Parole'>{$ieraksts['parole']}</textarea>
                                <td>
                            </tr>
                            <tr>
                                <td>Ir Admins:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Atlauja'>{$ieraksts['irAdmins']}</textarea>
                                <td>
                            </tr>

                            
                            <tr><td>
                                <button class='btn' type='submit' name='rediget' value='{$ieraksts['lietotajs_id']}'>
                                    Saglabāt</button>
                            </td></tr>
                            
                            </table>
                            </form>
                        ";
                    }

                }}else{
                    echo "<div class='pieteiksanaskluda sarkans'>Kaut kas nogāja greizi!
                    Atgriezies iepriekšējā lapā un mēģini vēlreiz!</div>";
                    header("Refresh:1; url=izmainitMod.php");
                }
            ?>
        </div>
    </div>
</section>

<?php
   include "footer.php";
?>