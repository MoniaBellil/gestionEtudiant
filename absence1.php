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

		input[type=number]{
		width:16%;
		padding: 12px 20px;
		margin: 2px 0;
		display: inline-block;
		border: 1px solid ;
		border-color:#ccc;
		border-radius: 15px;
		box-sizing: border-box;}
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
	<div id="top" class="d1">
		<a href="gererAbsences.php"><input type='button' class='b1' value='Retour'/></a>
		<br><br>

<?php
include_once("connex.php");
		$idcom=connex_object();

echo "<h2>Les absences des Etudiant du Classe ".$_GET["code"]."</h2><br><br>";

if($idcom)
	{
		$requete= "SELECT Code_Mat, Des_Mat FROM matiere";
		$res=$idcom->query($requete);
		if ($res)
		{
			$i=0;
			while($donnee=$res->fetch())
			{
				echo "<h3 style='font-weight:bolder;font-size:27px'>".$donnee["Des_Mat"];
				$i++;
				echo "<form method='POST' action='#".$i."' id='bottom'>";
				echo "<input type='number' step='0.01' min='0' max='6' value='";
					if(isset($_POST[$i])) {echo $_POST[$i];};
				echo "' id='".$i."' name='".$i."' style=' margin-left:65%;margin-right:1%' placeholder='Taux Elimination (00.00)' required /><input type='submit' value='Elimination' class='b1' style='background-color:blue;width:10%'/></form></h3><div class='d2'>";


				echo "<table width='100%'><tr style='color:grey;font-size:22px;font-weight:bolder;'><th>Nom</th><th>Prenom</th><th>Nombre D'absences</th><th></th></tr>";
			
			

echo"</div>";
				
				$req5="SELECT Matricule_Et, Nom_Et, Prenom_Et FROM etudiant where Code_C='".$_GET["code"]."'";
				
				$res5=$idcom->query($req5);
				
				if($res5)
				{
				while($donnee5=$res5->fetch())
				{	
					$ab=0;
					
				echo "<tr align='center' height='60px'><td>".$donnee5["Nom_Et"]."</td><td>".$donnee5["Prenom_Et"]."</td></td>";
				$idE=$donnee5["Matricule_Et"];
				$req2="SELECT Code_Sea from seance where Code_Mat='".$donnee["Code_Mat"]."'";
				$res2=$idcom->query($req2);
				if($res2)
				{
					while($donnee2=$res2->fetch())
					{
						$req3="SELECT COUNT(*),Code_Sea FROM absence where (Matricule_Et='".$donnee5["Matricule_Et"]."' and Code_Sea='".$donnee2["Code_Sea"]."')";
					
					$res3=$idcom->query($req3);
					if ($res3)
						{

							while($donnee3=$res3->fetch())
							{
								$ab+=$donnee3["COUNT(*)"];
							}
							$res3->closeCursor();
						}	

					}
					$res2->closeCursor();
								echo "<td>".$ab."</td><td style='color:red;font-size:18;font-weight:bolder;' width='10%'>";
								if(isset($_POST[$i]))
								{
									if ($ab>$_POST[$i])
										echo "Eliminé";
								}
								echo"</td>";
								if ($ab>0)
									echo "<td><a href='SupprimerAb.php?idE=$idE&m=".$donnee["Code_Mat"]."&code=".$_GET["code"]."&mm=".$donnee["Des_Mat"]."'><input class='b1' style='width:60%' type='button' value='Gerer absences' /></a></td></tr>";
						
					}
					}
					$res5->closeCursor();

				}
			   			
			echo "</table></div><hr>";
			
       		
		}

			$res->closeCursor();
     }
 }
				
?>
<br><br><a href="#top"><input type="button" value="Retour au Top" class="b1" style="margin-left:80%;width:15%"/></a><br><br>




<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;" src="form.png"/></a>

<footer style="margin-top:10%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>