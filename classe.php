<!DOCTYPE html>
<html>
<head>
	<style>
	 .d2{
    z-index:1;
    height:400px;
    max-height:450px;
    overflow: auto;
  }
		.b1{
		width: 10%;
		height:37px;
		
		background-color:cornflowerblue;
		color: white;
		border: none;
		margin:10px;
		border-radius: 15px;
		cursor: pointer;
		}
	
		.b1:hover 
		{
		background-color:dodgerblue ;
		}
		input[type=number]{
		width:70%;
		padding: 12px 20px;
		margin: 2px 0;
		display: inline-block;
		border: 1px solid ;
		border-color:#ccc;
		border-radius: 15px;
		box-sizing: border-box;}
	</style>
	<link rel="stylesheet" href="style.css"/>
	<title>ISET-CHARGUIA</title>
	<meta charset="utf-8"/>
	<link rel="short icon" type="image/x-icon" href="icon.gif">
</head>
<body>
<div id="top" class="d1">

<input class="b1" type="Button" value="Retour" onclick="self.close()"/>

<?php
$id=$_GET["id"];
$se=$_GET["se"];
$mat=$_GET["mat"];
include_once("connex.php");
 echo "<h1>".$_GET["id"]."</h1>";
$idcom=connex_object();

if($idcom)
{
				$requete= "SELECT * from etudiant";
					$res=$idcom->query($requete);
					if ($res)
					{
						
						$i=0;
						echo "<div class='d2'><table border='0' width='100%'>";
						while($donnee=$res->fetch())
						{
							if($donnee["Code_C"]==$_GET["id"])
							{
								
								echo "<tr><form method='POST' action=''><td>".$donnee["Nom_Et"]." ".$donnee["Prenom_Et"]."</td><td><input class='txt1'  name='d".$i."' value='";
									if(isset($_POST["d$i"])) {echo $_POST["d$i"];};

								echo "' type='number' step='0.01' min='0' max='20' Placeholder='Note DS'/></td><td><input 	class='txt1' name='e".$i."'value='";
								if(isset($_POST["e$i"])) {echo $_POST["e$i"];};

								echo"' type='number' step='0.01' min='0' max='20' Placeholder='Note Exam'/><td><input type='number' step='0.01' min='0' max='20' class='txt1' value='";
								if(isset($_POST["t$i"])) {echo $_POST["t$i"];};
								echo"' name='t".$i."' Placeholder='Note TP'/></td></td><td><input class='b1'  type='submit' value='Valider'/><td id='td".$i."' width='15%' style='font-size:20px;font-weight:bolder;'></td></form></tr>";

								if((isset($_POST["d".$i]))&&(isset($_POST["e".$i]))&&(isset($_POST["t".$i])))
								{
								
									$matricule=$donnee["Matricule_Et"];
									$nds=$_POST["d".$i];
									$nex=$_POST["e".$i];
									$ntp=$_POST["t".$i];
									$requete1= "INSERT INTO note VALUES ('$matricule','$mat','$nds', '$nex', '$ntp')";
									$res1=$idcom->exec($requete1);
									if ($res1)
									{
										echo "<script>document.getElementById('td".$i."').innerHTML='✓';</script>";
									}

									else
										echo "<script>document.getElementById('td".$i."').innerHTML='Déjà valider';</script>";

								}
							
						}

							$i++;
						}
						$res->closeCursor();
						echo "</table></div><br><br>";
						
					
					}
					
					else
						echo "res erreur";
				}

?>

<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;z-index:-1" src="form.png"/></a>
<br><a href="#top"><input type="button" value="Retour au Top" class="b1" style="margin-left:80%;width:15%"/></a><br><br>

<footer style="margin-top:20%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>