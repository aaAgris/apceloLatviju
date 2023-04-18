<?php
    $page = "profils";
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
            <div class="head-info head-color">Profila info:</div>
            <?php
                if(isset($_SESSION['lietotajvards'])){ 
                    require "./connect_db.php";

                    
                    if(isset($_POST['rediget'])){
                        $atlasitais_Lietotajvards = $_POST['Lietotajvards'];
                        $atlasita_Parole = $_POST['Parole'];

                        $atlasita_Parole = password_hash($atlasita_Parole, PASSWORD_DEFAULT);
                        
                        
                        $atjaunot_lietotajvardu_SQL = "UPDATE lietotajs SET lietotajvards = 
                        '$atlasitais_Lietotajvards' WHERE lietotajs_id = ".$_POST['rediget'];

                        $atjaunot_paroli_SQL = "UPDATE lietotajs SET parole = 
                        '$atlasita_Parole' WHERE lietotajs_id = ".$_POST['rediget'];

                        if(mysqli_query($savienojums, $atjaunot_lietotajvardu_SQL)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=profils.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=profils.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_paroli_SQL)){
                            
                            header("Refresh:1; url=profils.php"); 
                        }else{
                           
                            header("Refresh:1; url=profils.php"); 
                        }


                    }else{

                    $lietID = $_SESSION['lietotajs_id'];
                    $atlasit_prof_SQL = "SELECT * FROM lietotajs WHERE lietotajs_id = '$lietID'"; 
                    $atlasa_prof = mysqli_query($savienojums, $atlasit_prof_SQL);


                    while($ieraksts = mysqli_fetch_assoc($atlasa_prof)){
                        echo "
                        <form action='profils.php' method='POST'>
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
                            <td>
                            <button class='btn' id='signUp'><a href='./index.php#sakums'>Doties uz sākuma lapu</button>
                            </td>
                            <td>
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
                    header("Refresh:1; url=profils.php");
                }
            ?>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>
</body>
</html>