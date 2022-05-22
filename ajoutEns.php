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
  .txt{
    width: 100%;
    padding: 12px 20px;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid ;
    border-color:#ccc;
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
    <a href="administration.php?id=administration"><input type='button' class='b1' value='Retour'/></a><br><br>

<?php
include_once("connex.php");
  $idcom=connex_object();
?>
<h3>Enseignants:</h3>
<div class="d2">
<center>
<table width="90%" border="0">
			<tr style="font-weight:bolder;color:grey;font-size:25px" align="left">
				<th height="40px" >matricule</th><th>nom</th><th>prenom</th><th>date Naissanec</th><th>lieu naissance</th><th>specialite</th>
			</tr>
			<?php
				if ($idcom)
				{
					$req="SELECT * FROM enseignant ";
					$resultat=$idcom->query($req) ;
					
					if ($resultat)
					{
						while ( $donnee=$resultat->fetch() )
						{
              $id=$donnee["Matricule_En"];
						echo "<tr><td>".$donnee['Matricule_En']."</td><td>".$donnee['Nom_En']."</td><td>".$donnee['Prenom_En']."</td><td>".$donnee['Date_N_En']."</td><td>".$donnee['Lieu_N_En']."</td><td>".$donnee['Specialite']."</td>";
             echo "<td><a href='SupprimerEn.php?id=$id'><input class='b1' style='width:80%' type='button' value='Supprimer' /></a></td></tr>";
						}
						
					}
					else 
					echo "Erreur";
					
				}
			?>
		</table>
		</center>
</div>
<h1>Ajouter enseignant</h1>
<form action="ajoutEns.php" method="POST">
	<table width="100%">
  <tr><td>Matricule:</td><td width="88%"><input type="text" class="txt" value="" placeholder="Matricule" name="i1" required /></td></tr>
  <tr><td>Nom:</td><td><input type="text" class="txt" value="" placeholder="nom" name="i2"required /></td></tr>
  <tr><td>Prenom:</td><td><input type="text" class="txt" value="" placeholder="prenom" name="i3" required /></td></tr>
  <tr><td>Date Naissance:</td><td><input type="text" class="txt" value="" pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" title="Date Format: annee-mois-jours" placeholder="annee-mois-jours" name="i4" required /></td></tr>
  <tr><td>Lieu Naissance:</td><td><input type="text" class="txt" value="" placeholder="lieu naissance" name="i5" required /></td></tr>
  <tr><td>Specialité:</td><td><input type="text" class="txt" value="" placeholder="Specialité" name="i6" required /></td></tr>
</table><br><br>
	<input type="submit" value="Submit" >
  <input type="Reset" value="reset"  >
</form>

<?php
if (isset($_POST['i1']) && isset($_POST['i2']) && isset($_POST['i3'])&& isset($_POST['i4']) && isset($_POST['i5']) && isset($_POST['i6']))
{
  $mat=$_POST['i1'];
  $nom=$_POST['i2'];
  $prenom=$_POST['i3'];
  $date=$_POST['i4'];
  $lieu=$_POST['i5'];
  $spec=$_POST['i6'];

  
  $requete= "INSERT INTO enseignant VALUES ('$mat', '$nom', '$prenom', '$date','$lieu','$spec')";
  $res=$idcom->exec($requete);
  if (!$res)
    echo "<script>alert('Erreur !');</script>";
  else
      header('location: ajoutEns.php');
  }
?>
<a href="#top"><input type="button" value="Retour au Top" class="b1" style="margin-left:80%;width:15%"/></a><br><br>

  <a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;z-index:-1" src="form.png"/></a>

  <footer style="margin-top:10%" class="copy">
  	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
  </footer>
  </div>
  </body>