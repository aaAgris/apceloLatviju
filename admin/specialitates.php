<?php
    $page = "specialitates";
    require "header.php";

    session_start();
                    
                    
    if(isset($_SESSION['Lietotajvards'])){
        /*echo "Sveicināts, ".($_SESSION['Lietotajvards'])."!";
        echo "<a href='admin/logout.php' class='izlogoties'>Izlogoties</a>";*/
        header("Refresh:1; url=specialitates.php");
    }else{
        echo "Tev šeit nav pieejas!";
        header("Refresh:.1; url=login.php");
    }
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Specialitāšu adminstrēšana:    <form action='pievienotSpec.php' method='post'>
                                        <button type='submit' name='pievienot' 
                                        value="{$ieraksts['Specialitates_ID']}" class='btn'>
                                            Pievienot specialitati <i class='fas fa-plus-circle'></i>
                                        </button>
                                    </form>
            </div>
            <table class="adminTabula2">
                <tr>
                    <th>Attēls</th>
                    <th>Specialitāte</th>
                    <th>Apraksts</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                    require "../files/connect_db.php";
                    $atlasit_specialitates_SQL = "SELECT * FROM specialitates"; 
                    $atlasa_specialitates = mysqli_query($savienojums, $atlasit_specialitates_SQL);

                    while($ieraksts = mysqli_fetch_assoc($atlasa_specialitates)){
                        /*if(empty($ieraksts['Komentars'])){
                            $Komentars = "<i class='fas fa-times'></i>";
                        }else{
                            $Komentars = "<i class='fas fa-check'></i>";
                        }*/
                        echo "
                            <tr>
                                <td style='height:20rem;'><img style='height:15rem; width:23rem;
                                padding:1rem 2rem 1rem 2rem;' src=
                                '{$ieraksts['Attels_URL']}'</td>
                                <td style='width:20rem;'>{$ieraksts['Nosaukums']}</td>
                                <td>{$ieraksts['Apraksts']}</td>
                                <td>
                                    <form action='specialitate.php' method='post'>
                                        <button type='submit' name='apskatit' 
                                        value='{$ieraksts['Specialitates_ID']}' class='btn2'>
                                            <i class='fas fa-edit'></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action='delete.php' method='post'>
                                        <button type='submit' name='delete' 
                                        value='{$ieraksts['Specialitates_ID']}' class='btn2'>
                                            <i class='fas fa-trash'></i>
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