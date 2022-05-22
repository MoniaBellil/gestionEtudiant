<!DOCTYPE html>
<html>
<head>
	<style>
	 .d2{
    z-index:1;
    max-height:700px;
    overflow: auto;
  }
		.b1{
		width: 8%;
		height:38px;
		
		background-color:blue;
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
		input[type=text]{
		width:60%;
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
<div class="d1">


<?php
$id=$_GET["id"];
$se=$_GET["se"];
include_once("connex.php");
 echo "<h1>".$_GET["id"]."</h1>";
$idcom=connex_object();

if($idcom)
{
				$requete= "SELECT * from etudiant";
					$res=$idcom->query($requete);
					if ($res)
					{
						$tab=array();
						$i=0;
						echo "<div class='d2'><table border='0' width='40%'><tr style='color:grey;font-weight:bolder;font-size:24px'align='left'><th height='50px'>Nom Prenom</th><th>Absent</th><th><th></tr>";
						while($donnee=$res->fetch())
						{
							if($donnee["Code_C"]==$_GET["id"])
							{
								
								echo "<tr height='30px'><form method='POST' action=''><td>".$donnee["Nom_Et"]." ".$donnee["Prenom_Et"]."</td><td><input name='a".$i."' type='Checkbox'/></td><td id='td".$i."' width='30%'></td></tr>";
								$tab[$i]=$donnee["Matricule_Et"];
							}

							$i++;
						}
						$res->closeCursor();
						echo "</table></div><br><br>";
							echo "<input type='submit' class='b1' value='Valider'/></form>";
								
							
							for($j=0;$j<$i;$j++)
							{
								if(isset($_POST["a".$j]))
								{
									echo "<script>console.log('".$tab[$j]."')</script>";
									$e=$tab[$j];
								$matricule=$donnee["Matricule_Et"];
								$requete1= "INSERT INTO absence VALUES ('$e','$se',1,'".date("d/m/Y")."')";
								$res1=$idcom->exec($requete1);
								if ($res1)
									{
						echo "<script>document.getElementById('td".$j."').innerHTML='Marquer absent';</script>";

									}
									else
									{
										echo "<script>document.getElementById('td".$j."').innerHTML='Déja absent';</script>";
									}

								}
							}
					
					}
					
					else
						echo "res erreur";
}
?>



<input class="b1"  type="Button" value="Retour" onclick="self.close()"/>

</script>
<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;z-index:-1" src="form.png"/></a>

<footer style="margin-top:20%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>