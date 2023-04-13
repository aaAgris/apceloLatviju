<?php
    $page = "celojumi";
    //require "header.php";
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Pievienot jaunu ceļojumu</div>
            <table class="adminTable">
            <form action="insertCel.php" method='POST'>
                <tr>
                            <th>Pakalpojums:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Nosaukums" required>
                                Ievadi ceļojuma nosaukumu*</textarea>
                                </td>
                        </tr>
                        <tr>
                        <th>Attels:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Attels" required>
                                Ievadi ceļojuma attela saiti*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>Apraksts:</th>
                            <td>
                            <textarea rows = "5" cols = "100" name="Apraksts" required>
                                Ievadi ceļojuma aprakstu*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>Lokācija:</th>
                            <td>
                            <textarea rows = "5" cols = "100" name="Lokacija" required>
                                Ievadi ceļojuma lokācija*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>Cena:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Cena" required>
                                Ievadi ceļojuma cenu*</textarea>
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
                            <input class="btn" type="submit" id="poga" name="pievienotCel" value="Pievienot">
                            </td>   
                        </tr>
                        <tr>
                            <td>
                        <button class="ghost" id="signUp"><a href="./index.php">Doties uz sākuma lapu</button>
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