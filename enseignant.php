<!DOCTYPE html>
<html>
<head>
	<style>
	 .d2{
    z-index:1;
    max-height:350px;
    overflow: auto;
  }
		.b1{
		width: 100px;
		height:37px;
		
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

		input[type=password]{
		width: 15%;
		padding: 12px 20px;
		margin: 2px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 15px;
		box-sizing: border-box;
	}

	</style>
	<link rel="stylesheet" href="style.css"/>
	<title>ISET-CHARGUIA</title>
	<meta charset="utf-8"/>
	<link rel="short icon" type="image/x-icon" href="icon.gif">
</head>
<body>
	<div id="top" class="d1">
		<div id="bre">

<a href="Index.php"><input id="bre" type='button' style=" width:10%" class='b1' value='Retour'/></a>
<br><br><br><br>
</div>
	<form method="POST" action="" id="f">
			<input name="i4" id="i4" type="password" required placeholder="Code de Connexion"/>
			<input id="b" type="submit" value="Connecter" ><br>
	</form>	



<?php
$user=$_GET["id"];
if($user!="enseignant")
	header("location: Index.php");
	include_once("connex.php");
	if(isset($_POST["i4"]))
	{ 
		$day="";
		
		switch(date("l"))
		{
			case "Monday": {$day="lundi";break;}
			case "Tuesday": {$day="mardi";break;}
			case "Wednesday": {$day="mercredi";break;}
			case "Thursday": {$day="jeudi";break;}
			case "Friday": {$day="vendredi";break;}
			case "Saturday": {$day="samedi";break;}
		}
		$idcom=connex_object();
				
				if($idcom)
				{
					$requete= "SELECT Matricule_En, Nom_En, Prenom_En FROM enseignant where Matricule_En='".$_POST["i4"]."'";
					$res=$idcom->query($requete);
					$i=0;
					if ($res)
					{
						echo "<a href='enseignant.php?id=enseignant'><input class='b1' type='button' value='Deconnexion'/></a><br><br>";
						while($donnee=$res->fetch())
						{
							$i++;
								echo "<b><h3>Connecter en tant que: ".$donnee["Nom_En"]." ".$donnee["Prenom_En"]."</h3></b><br>";
						}
						$res->closeCursor();
						}
						
						if ($i>0)
						{
							echo "<script>document.getElementById('f').style.display='none';</script>";
							echo "<script>document.getElementById('bre').style.display='none';</script>";
					
					
					$requete2="SELECT * FROM seance where Matricule_En='".$_POST["i4"]."'";
					$res2=$idcom->query($requete2);
					if ($res2)
					{
						echo "<br><h3>Seances:</h3><br><div class='d2'><table border='0' width='70%'>";
						while($donnee2=$res2->fetch())
						{

								$requete3="SELECT Des_Mat FROM matiere where Code_Mat='".$donnee2["Code_Mat"]."'";
								$res3=$idcom->query($requete3);
								if($res3)
								{
									while($donnee3=$res3->fetch())
									{
											$mat=$donnee3["Des_Mat"];
											break;
									
									}
									$res3->closeCursor();

								echo "<tr><td height='40px'>".$mat." le ".$donnee2["Jour_Sea"]." à ".$donnee2["Heure_Sea"]." Classe: ".$donnee2["Code_C"]."<br></td>";
								echo"<td><a target='_blank' href='classe.php?id=".$donnee2["Code_C"]."&se=".$donnee2["Code_Sea"]."&mat=".$donnee2["Code_Mat"]."'><input type='button' class='b1' value='Ajouter Notes'/></a><br></td>";
								$hour=substr($donnee2["Heure_Sea"],0,2)+1;
								$minute=substr($donnee2["Heure_Sea"],3,2)+30;
								$checkDay=strcasecmp($donnee2["Jour_Sea"],$day);
								if($minute>=60)
								{
								$hour++;
								$minute-=60;
								$minute=$minute."0";
								}
								$endTime="$hour:$minute";
								if(($checkDay==0) &&(($donnee2["Heure_Sea"]<=date("H:i"))&&(date("H:i")<$endTime)))
								{
									echo "<td style='color:#b3ffb3;width:20%;'>Séance en cours..</td><td><a target='_blank'  href='classe2.php?id=".$donnee2["Code_C"]."&se=".$donnee2["Code_Sea"]."&mat=".$donnee2["Code_Mat"]."'><input style='width:100%' type='button' class='b1' value='Marquer Absences'/></a><br></td>";
								}
								echo"</tr>";
							}
							
							}
							$res->closeCursor();
							echo"</tr></table></div>";						

							}
								else
						echo "Erreur res2";
				  	
				echo"<br><br><a href='#top'><input type='button' value='Retour au Top' class='b1' style='margin-left:80%;width:15%'/></a><br><br>";

				}
				else
						echo "<script>document.getElementById('i4').style.borderColor ='red'</script>";



						
				}		
				else
					echo "idcom erreur";
		
			}					

?>

<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;z-index:-1" src="form.png"/></a>

<footer style="margin-top:23%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>
</html>