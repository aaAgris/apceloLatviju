<?php
    $page = "audzekni";
    require "header.php";

    session_start();
                    
                    
    if(isset($_SESSION['Lietotajvards'])){
        /*echo "Sveicināts, ".($_SESSION['Lietotajvards'])."!";
        echo "<a href='admin/logout.php' class='izlogoties'>Izlogoties</a>";*/
        header("Refresh:1; url=audzekni.php");
    }else{
        echo "Tev šeit nav pieejas!";
        header("Refresh:.1; url=login.php");
    }
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Audzēkņu adminstrēšana:</div>
            <table class="adminTabula">
                <tr>
                    <th>Vārds</th>
                    <th>Uzvārds</th>
                    <th>1.specialitāte</th>
                    <th>2.specialitāte</th>
                    <th>Absolvējis</th>
                    <th>Vidējā atzīme</th>
                    <th>Statuss</th>
                    <th>Komentāri</th>
                    <th></th>
                </tr>

                <?php
                    require "../files/connect_db.php";
                    $atlasit_audzknus_SQL = "SELECT * FROM audzekni a JOIN statuss st ON
                    a.Statuss = st.Statuss_ID"; 
                    $atlasa_audzeknus = mysqli_query($savienojums, $atlasit_audzknus_SQL);

                    while($ieraksts = mysqli_fetch_assoc($atlasa_audzeknus)){
                        if(empty($ieraksts['Komentars'])){
                            $Komentars = "<i class='fas fa-times'></i>";
                        }else{
                            $Komentars = "<i class='fas fa-check'></i>";
                        }
                        echo "
                            <tr>
                                <td>{$ieraksts['Vards']}</td>
                                <td>{$ieraksts['Uzvards']}</td>
                                <td>{$ieraksts['Spec1']}</td>
                                <td>{$ieraksts['Spec2']}</td>
                                <td>{$ieraksts['Izglitiba']}</td>
                                <td>{$ieraksts['Vid_Vertejums']}</td>
                                <td>{$ieraksts['Stat_Nosaukums']}</td>
                                <td>$Komentars</td>
                                <td>
                                    <form action='audzeknis.php' method='post'>
                                        <button type='submit' name='apskatit' 
                                        value='{$ieraksts['Audzeknis_ID']}' class='btn2'>
                                            <i class='fas fa-edit'></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            </table>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>