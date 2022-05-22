<!DOCTYPE html>
<html>
<head>

  <style>
  .d2{
    z-index:1;
    max-height:300px;
    overflow: auto;
  }
  select{
    width:15%;
    padding: 12px 20px;
    margin: 2px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 18px;
    box-sizing: border-box;
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
  <?php
    if (isset($_POST['i4']))
      header('location: ajoutEtud.php');
  ?>
  <div id="top" class="d1">
<a href="administration.php?id=administration"><input type='button' class='b1' value='Retour'/></a><br><br>

<h3>Etudiants:</h3>
<div class="d2">

<table width="90%">
			<tr style="font-weight:bolder;color:grey;font-size:25px" align="left">
				<th height="40px" >matricule</th><th>nom</th><th>prenom</th><th>date Naissanec</th><th>lieu naissance</th><th>classe</th>
			</tr>
			<?php
				include_once("connex.php");
				$idcom=connex_object();
				if ($idcom)
				{
					$req="SELECT * FROM etudiant Order by Code_C";
					$resultat=$idcom->query($req) ;
					
					if ($resultat)
					{
						while ( $donnee=$resultat->fetch() )
						{
              $id=$donnee["Matricule_Et"];
						echo "<tr><td>".$donnee['Matricule_Et']."</td><td>".$donnee['Nom_Et']."</td><td>".$donnee['Prenom_Et']."</td><td>".$donnee['Date_N_Et']."</td><td>".$donnee['Lieu_N_Et']."</td><td>".$donnee['Code_C']."</td>";
            echo "<td><a href='SupprimerET.php?id=$id'><input class='b1' style='width:70%' type='button' value='Supprimer' /></a></td></tr>";
						}
						
					}
					else 
					echo "etudaint existant";
					
				}
			?>
		</table>
  </div>
<h1>Ajouter Etudiant</h1>
<form action="ajoutEtud.php" method="POST">
  <table width="100%">
  <tr><td>Matricule:</td><td width="88%"><input class="txt" type="text" placeholder="Matricule" name="i1" required /></td></tr>
  <tr><td>Nom:</td><td><input class="txt" type="text" placeholder="nom" name="i2"required /></td></tr>
  <tr><td>Prenom:</td><td><input type="text" class="txt" placeholder="prenom" name="i3" required /></td></tr>
  <tr><td>Date Naissance:</td><td><input type="text" class="txt" placeholder="annee-mois-jours"  name="i4"  required  pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))" title="Date Format: annee-mois-jours"/></td></tr>
  <tr><td>Lieu Naissance:</td><td><input type="text" class="txt" placeholder="lieu naissance" name="i5" required /></td></tr>
  <tr><td>Adresse:</td><td><input type="text" class="txt"placeholder="adresse" name="i6" required /></td></tr>
  <tr><td>Classe:</td><td>
    <?php 
              $req1="SELECT Code_C from Classe";
              $res1=$idcom->query($req1);
            if($res1)
            {
              echo"<select name='s1'>";
              while($donne=$res1->fetch())
            
              echo '<option>',$donne["Code_C"],'</option>';

              $res1->closeCursor();
            
            echo '</select>';
            }
  

    ?>

  </td></tr>
</table>
  <br><br>
  <input type="submit" value="Submit"/>
  <input type="Reset" value="reset" />
</form>

		<?php
if (isset($_POST['i1']) && isset($_POST['i2']) && isset($_POST['i3'])&& isset($_POST['i4']) && isset($_POST['i5']) && isset($_POST['i6']))
{
  $mat=$_POST['i1'];
  $nom=$_POST['i2'];
  $prenom=$_POST['i3'];
  $date=$_POST['i4'];
  $lieu=$_POST['i5'];
  $adr=$_POST['i6'];
  $class=$_POST['s1'];

$requete= "INSERT INTO etudiant  VALUES ('$mat', '$nom', '$prenom', '$date', '$lieu','$adr','$class')";
  $res=$idcom->exec($requete);
  if (!$res)
  {
    echo "<script>alert('Erreur !');</script>";
      header('location:ajoutEtud.php');
  }

  }
?>

<br><a href="#top"><input type="button" value="Retour au Top" class="b1" style="margin-left:80%;width:15%"/></a><br><br>

  <a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;z-index: -1" src="form.png"/></a>

  <footer style="margin-top:10%" class="copy">
  	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
  </footer>
  </div>
  </body>
