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
  .d3{
    z-index:1;
    max-height:700px;
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
	<div  id="top" class="d1">
<a href="gererNotes.php"><input type='button' class='b1' value='Retour'/></a><br><br>

<?php

include_once("connex.php");
		$idcom=connex_object();

echo "<h2>Notes des Etudiant du classe ".$_GET["code"]."</h2>";

	if($idcom)
	{
		$nbMAT=0;
		$requete= "SELECT Code_Mat, Des_Mat FROM matiere";
		$res=$idcom->query($requete);
		if ($res)
		{
			while($donnee=$res->fetch())
			{
				$nbMAT++;
				echo "<h3 style='font-weight:bolder;font-size:27px'>".$donnee["Des_Mat"]."</h3><div class='d2'>";

				echo "<table width='100%'><tr style='color:grey;font-size:22px;font-weight:bolder;'><th>Nom</th><th>Prenom</th><th>Note DS</th><th>Note Exam</th><th>Note TP</th><th>Moyenne</th></tr>";
				
				$req2="SELECT Nom_Et,Prenom_Et,Matricule_Et FROM etudiant WHERE Code_C='".$_GET["code"]."'";
				$res2=$idcom->query($req2);
				if($res2)
				{
					while($donnee2=$res2->fetch())
					{
						echo "<tr align='center' height='60px'><td>".$donnee2["Nom_Et"]."</td><td>".$donnee2["Prenom_Et"]."</td>";
						$req3="SELECT Note_Ds,Note_Exam,Note_Tp from note where(Matricule_Et='".$donnee2["Matricule_Et"]."' and Code_Mat='".$donnee["Code_Mat"]."')";
						$res3=$idcom->query($req3);
						if($res3)
						{
							$i=0;
							while($donnee3=$res3->fetch())
							{
								$i++;
								$moy=(($donnee3["Note_Ds"]*0.2)+($donnee3["Note_Exam"]*0.6)+($donnee3["Note_Tp"]*0.2));
								echo "<td>".$donnee3["Note_Ds"]."</td><td>".$donnee3["Note_Exam"]."</td><td>".$donnee3["Note_Tp"]."</td><td>".$moy."</td><td><a href='supprimerNotes.php?m=".$donnee2["Matricule_Et"]."&c=".$donnee["Code_Mat"]."&code=".$_GET["code"]."'/><input type='button' class='b1' value='Supprimer' style='width:80%;background-color:blue'/></a><td>";
							}

							$res3->closeCursor();
						}
						if($i==0)
							echo "<td colspan='3' style='color:rgb(167,196,201)'>Les Notes ne sont pas encore Validées</td><td><a href='ajouterNotes.php?m=".$donnee2["Matricule_Et"]."&c=".$donnee["Code_Mat"]."&code=".$_GET["code"]."'/><td><a href='ajouterNotes.php?m=".$donnee2["Matricule_Et"]."&c=".$donnee["Code_Mat"]."&code=".$_GET["code"]."'/>";

							//echo "<input type='button' class='b1' value='Ajouter Notes' style='width:80%'/></a></td> </td>";
							echo "</tr>";

					}
					$res2->closeCursor();

				}
       			
				echo "</table></div><hr><br><br>";
       		}
			$res->closeCursor();
		}
     }


?>
<h1>Moyennes Générales</h1>
<?php
	echo "<table width='100%'><tr style='color:grey;font-size:22px;font-weight:bolder;'><td>Nom</td><td>Prenom</td><td>Moyenne</td></tr>";
	$req="SELECT Nom_Et,Prenom_Et,Matricule_Et from Etudiant where Code_C='".$_GET["code"]."'";
	$res=$idcom->query($req);
	if($res)
	{
		$moy=0;
		while($donnee=$res->fetch())
		{
			echo "<tr><td><br>".$donnee["Nom_Et"]."<br><br></td><td>".$donnee["Prenom_Et"]."<br><br></td>";
			
			$req1="SELECT Note_Ds,Note_Exam,Note_Tp from note where Matricule_Et='".$donnee["Matricule_Et"]."'";
			$nbNotes=0;
			$res2=$idcom->query($req1);
			if($res2)
			{
				while($donnee2=$res2->fetch())
				{
					$nbNotes++;
					$moy+=(($donnee2["Note_Ds"]*0.2)+($donnee2["Note_Exam"]*0.6)+($donnee2["Note_Tp"]*0.2));	

				}
				$res2->closeCursor();
				if ($nbNotes==$nbMAT)
				{
				$moy/=$nbMAT;
				echo "<td>".round($moy, 2)."<br><br></td>";	
				echo"</tr>";
				}
				else
				{
					echo "<td style='color:rgb(167,196,201);width:35%'>Les Notes ne sont pas encore Validées<br><br></td></tr>";
				}
			}
		}
		$res->closeCursor();	

	}

	echo "</table>";
?>
<br><br><a href="#top"><input type="button" value="Retour au Top" class="b1" style="margin-left:80%;width:15%"/></a><br><br>

	
<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;z-index:-1" src="form.png"/></a>

<footer style="margin-top:10%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>
