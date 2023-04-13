<?php
    $page = "pakalpojumi";
    //require "header.php";
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Pievienot jaunu pakalpojumu</div>
            <table class="adminTable">
            <form action="insert.php" method='POST'>
                <tr>
                            <th>Pakalpojums:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Nosaukums" required>
                                Ievadi pakalpojuma nosaukumu*</textarea>
                                </td>
                        </tr>
                        <tr>
                        <th>Attels:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Attels" required>
                                Ievadi pakalpojuma attela saiti*</textarea>
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
                            <th>Cena:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Cena" required>
                                Ievadi pakalpojuma cenu*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>IDlietotajs:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="IDLietotajs" required>
                                Ievadi savu lietotaja ID*</textarea>
                                </td>
                        </tr>
                        
                            
                        
                        <tr> <td></td>
                            <td>
                            <input class="btn" type="submit" id="poga" name="pievienotPak" value="Pievienot">
                            </td>   
                        </tr>
</form>
                            </table>
        </div>
    </div>
</section>

<?php
    //include "footer.php";
?>