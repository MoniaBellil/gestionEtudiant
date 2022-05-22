<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css"/>
	<title>ISET-CHARGUIA</title>
	<meta charset="utf-8"/>
	<link rel="short icon" type="image/x-icon" href="icon.gif">

<style>
 .d2{
    z-index:1;
    max-height:350px;
    overflow: auto;
  }
.b1{
		width: 10%;
		height:40px;
		
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

		input[type=text]{
		width:16%;
		padding: 12px 20px;
		margin: 2px 0;
		display: inline-block;
		border: 1px solid ;
		border-color:#ccc;
		border-radius: 15px;
		box-sizing: border-box;}
</style>
</head>
<body>
	<div class="d1">
		<?php
		$ab=false;
		echo "<a href='absence1.php?code=".$_GET["code"]."'><input type='button' class='b1' value='Retour'/></a><br><br>";

			include_once("connex.php");
  			$idcom=connex_object();

				if($idcom)
				{

					$req="SELECT Nom_Et,Prenom_Et FROM etudiant WHERE Matricule_Et='".$_GET["idE"]."'";
					$res=$idcom->query($req);
					if($res)
					{
						while($donnee=$res->fetch())
						{
							echo "<h2>Les absences de ".$donnee["Nom_Et"]." ".$donnee["Prenom_Et"]." au ".$_GET["mm"]."</h2>";
						}
						$res->closeCursor();
					}
					echo "<div class='d2'><table>";

					$req1="SELECT * from seance where (Code_C='".$_GET["code"]."' and Code_Mat='".$_GET["m"]."')";
					$res1=$idcom->query($req1);
					if ($res1)
					{
						while($donne2=$res1->fetch())
						{
							$req2="SELECT * from absence where (Code_Sea='".$donne2["Code_Sea"]."' and Matricule_Et='".$_GET["idE"]."')";
							$res2=$idcom->query($req2);
								if($res2)
								{
									while($donne3=$res2->fetch())
									{
										$ab=true;
										echo "<tr><td><h4>Le ".$donne2["Jour_Sea"]." ".$donne3["date_Absence"]." à ".$donne2["Heure_Sea"]."</h4></td><td><a href='supprimerAb1.php?idE=".$_GET["idE"]."&idS=".$donne2["Code_Sea"]."&m=".$_GET["m"]."&code=".$_GET["code"]."&mm=".$_GET["mm"]."'><input type='button' value='Supprimer' class='b1' style='width:100%;height:35px;margin-left:20%;'/></a></td></tr>";
									}
									$res2->closeCursor();
								}
						}
						$res2->closeCursor();
					}
					echo "</table></div>";

					if($ab==false)
						header("location:absence1.php?code=".$_GET["code"]);
					
        }

			
?>
<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;" src="form.png"/></a>

<footer style="margin-top:20%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>
