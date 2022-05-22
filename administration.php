<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css"/>
	<title>ISET-CHARGUIA</title>
	<meta charset="utf-8"/>
	<link rel="short icon" type="image/x-icon" href="icon.gif">
<style>
.b1{
		width: 40%;
		height:37px;
		
		background-color:cornflowerblue;
		color: white;
		font-size:15px;
		border: none;
		border-radius: 15px;
		cursor: pointer;
		font-weight: bolder;
		}
	
		.b1:hover 
		{
		background-color:dodgerblue ;
		}
</style>
</head>
<body>
	<?php
		$user=$_GET["id"];

		if($user!="administration")
	header("location: Index.php");
	?>
	<div class="d1">
		<a href="Index.php"><input type='button' style=" height:39px;width:10%" class='b1' value='Retour'/></a><br><br>

		<center>
		<a href="gererAbsences.php"><input style="margin-top:5%" type='button' class='b1' value='Gerer Les Absences'/></a><br><br>
		<a href="gererNotes.php"><input type='button' class='b1' value='Gerer les Notes'/></a><br><br>
		<a href="ajoutEtud.php"><input type='button' class='b1' value='Gerer les Etudiants'/></a><br><br>
		<a href="ajoutEns.php"><input type='button' class='b1' value='Gerer les Enseignants'/></a><br><br>
		<a href="ajoutMatiere.php"><input type='button' class='b1' value='Gerer les Matieres'/></a><br><br>
		<a href="ajoutClasse.php"><input type='button' class='b1' value='Gerer les Classes'/></a><br><br>
		<a href="ajoutSeance.php"><input type='button' class='b1' value='Gerer les Seances'/></a><br><br>

		</center>


<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;" src="form.png"/></a>

<footer style="margin-top:10%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>
</html>