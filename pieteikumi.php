

<body>
<?php
    $page = "pieteikumi";
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
            <div class="head-info head-color">Pieteikumu apskate:
            </div>
            <table class="adminTabula2">
                <tr>
                    <th>Vārds</th>
                    <th>Uzvārds</th>
                    <th>Dzimšanas Dati</th>
                    <th>Ceļojums</th>
                    <th>Līdzbraucēji</th>
                    <th>Telefons</th>
                    <th>E-Pasts</th>
                    <th>Komentārs</th>
                    <th>Statuss</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                    require "./connect_db.php";
                    $atlasit_pieteikumus_SQL = "SELECT * FROM pieteikums"; 
                    $atlasa_pieteikumus = mysqli_query($savienojums, $atlasit_pieteikumus_SQL);

                    while($ieraksts = mysqli_fetch_assoc($atlasa_pieteikumus)){
                        echo "
                            <tr>
                                <td style='width:20rem;'>{$ieraksts['vards']}</td>
                                <td style='width:20rem;'>{$ieraksts['uzvards']}</td>
                                <td style='width:20rem;'>{$ieraksts['dzimsanasDati']}</td>
                                <td style='width:20rem;'>{$ieraksts['celojums']}</td>
                                <td style='width:20rem;'>{$ieraksts['lidzbrauceji']}</td>
                                <td style='width:20rem;'>{$ieraksts['Telefons']}</td>
                                <td style='width:20rem;'>{$ieraksts['epasts']}</td>
                                <td style='width:20rem;'>{$ieraksts['komentars']}</td>
                                <td style='width:20rem;'>{$ieraksts['statuss']}</td>

                                <td>
                                    <form action='izmainitPiet.php' method='post'>
                                        <button type='submit' name='izmainit' 
                                        value='{$ieraksts['Pieteikums_ID']}' class='btn2'>
                                            <i class='fa fa-edit'></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action='deletePiet.php' method='post'>
                                        <button type='submit' name='delete' 
                                        value='{$ieraksts['Pieteikums_ID']}' class='btn2'>
                                            <i class='fa fa-trash'></i>
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
</body>
</html>
                