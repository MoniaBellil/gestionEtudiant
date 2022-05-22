<!DOCTYPE html>
<html>
<head>
	<style>
		.b1{
		width: 100px;
		height:30px;
		
		background-color:cornflowerblue;
		color: white;
		border: none;
		border-radius: 15px;
		cursor: pointer;
		}
	
		.b1:hover 
		{
		background-color:dodgerblue ;
		}

	</style>
	<link rel="stylesheet" href="style.css"/>
	<title>ISET-CHARGUIA</title>
	<meta charset="utf-8"/>
	<link rel="short icon" type="image/x-icon" href="icon.gif">
</head>
<body>
	<div class="d1">

<?php
include_once("connex.php");
 echo "<h1>".$_GET["id"]."</h1>";
$idcom=connex_object();
if($idcom)
{
	$requete= "SELECT * from etudiant";
					$res=$idcom->query($requete);
					if ($res)
					{
						while($donnee=$res->fetch())
						{
							if($donnee["Code_C"]==$_GET["id"])
							{
								echo $donnee["Nom_Et"]." ".$donnee["Prenom_Et"]."<br><br>";
							}
						}
						$res->closeCursor();
					}
					else
						echo "res erreur";
}
?>
<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;" src="form.png"/></a>

<footer style="margin-top:37%" class="copy">
	&copy; copyright 2017 , all rights reserved by Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>