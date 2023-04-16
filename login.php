<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ielogošanās sistēmā</title>
    <link rel="stylesheet" href="./style_login.css">
</head>
<body>
	<div class="container" id="container">
		<div class="form-container sign-in-container">



<?php
	if(isset($_POST["Ielogoties"])){
		require "./connect_db.php";
		session_start();
		

		$Lietotajvards = mysqli_real_escape_string($savienojums, 
		$_POST["Lietotajvards"]);

		$Parole = mysqli_real_escape_string($savienojums, 
		$_POST["Parole"]);
		$_SESSION['parole'] = (string) $Parole;

		$sqlVaicajums = "SELECT * FROM lietotajs WHERE
		lietotajvards = '$Lietotajvards'";

		$rezultats = mysqli_query($savienojums, $sqlVaicajums);

		if(mysqli_num_rows($rezultats) == 1){
			while($row = mysqli_fetch_array($rezultats)){
				if(password_verify($Parole, $row["parole"])){
					$_SESSION["lietotajvards"] = $Lietotajvards;
					$irAdmins = $row['irAdmins'];
					$lietotajs_id = $row['lietotajs_id'];
					$_SESSION['irAdmins'] = $irAdmins;
					$_SESSION['lietotajs_id'] = $lietotajs_id;
					header("location:index.php");
				}else{
					echo "<p class='p2'>Nepareizs lietotajvards vai parole!</p>";
				}
			}
		}else{
			echo "<p class='p2'>Nepareizs lietotajvards vai parole!</p>";
		}

	}

	if(isset($GET['logout'])){
		session_destroy();
	}
	
?>







			<form action="" method="POST">
				<img class="logo" src="./images/ApskatiLV_Logo.png">
				<h1>Ielogoties sistēmā</h1>
				<input type="text" name="Lietotajvards" placeholder="Lietotājvārds" />
				<input type="password" name="Parole" placeholder="Parole" />
				<!--<input type="submit" name="Ielogoties" placeholder="Ielogoties"/>-->
				<button name="Ielogoties">Ielogoties</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Sveiki!</h1>
					<p>Autorizācija iespējama tikai ja esi administators vai moderators!</p>
					<button class="ghost" id="signUp"><a href="./index.php">Doties uz sākuma lapu</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>