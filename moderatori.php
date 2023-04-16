

<body>
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
            <div class="head-info head-color">Moderatoru adminstrēšana:    <form action='pievienotMod.php' method='post'>
                                        <button type='submit' name='pievienot' 
                                        value="{$ieraksts['lietotajs_id']}" class='btn'>
                                            Pievienot moderatoru <i class='fa fa-plus-circle'></i>
                                        </button>
                                    </form>
            </div>
            <table class="adminTabula2">
                <tr>
                    <th>Lietotājvārds</th>
                    <th>Parole</th>
                    <th>Atļaujas</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                    require "./connect_db.php";
                    $atlasit_moderatorus_SQL = "SELECT * FROM lietotajs WHERE irAdmins = 0"; 
                    $atlasa_moderatorus = mysqli_query($savienojums, $atlasit_moderatorus_SQL);

                    while($ieraksts = mysqli_fetch_assoc($atlasa_moderatorus)){
                        echo "
                            <tr>
                                <td style='width:20rem;'>{$ieraksts['lietotajvards']}</td>
                                <td style='width:20rem;'>{$ieraksts['parole']}</td>
                                <td>{$ieraksts['irAdmins']}</td>
                                <td>
                                    <form action='izmainitMod.php' method='post'>
                                        <button type='submit' name='izmainit' 
                                        value='{$ieraksts['lietotajs_id']}' class='btn2'>
                                            <i class='fa fa-edit'></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action='deleteMod.php' method='post'>
                                        <button type='submit' name='delete' 
                                        value='{$ieraksts['lietotajs_id']}' class='btn2'>
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
                