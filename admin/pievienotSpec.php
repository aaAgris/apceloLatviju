<?php
    $page = "specialitates";
    require "header.php";
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Pievienot jaunu specialitati</div>
            <table class="adminTable">
            <form action="insert.php" method='POST'>
                <tr>
                            <th>Specialitate:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Nosaukums" required>
                                Ievadi specialitates nosaukumu*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>Apraksts:</th>
                            <td>
                            <textarea rows = "5" cols = "100" name="Apraksts" required>
                                Ievadi specialitates aprakstu*</textarea>
                                </td>
                        </tr>
                        <tr>
                        <th>Attels:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Attels" required>
                                Ievadi specialitates attela saiti*</textarea>
                                </td>
                        </tr>
                            
                        
                        <tr> <td></td>
                            <td>
                            <input class="btn" type="submit" id="poga" name="pievienotSpec" value="Pievienot">
                            </td>   
                        </tr>
</form>
                            </table>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>