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

    <h3>Matieres:</h3>
<div class="d2">
<?php
include_once("connex.php");
  $idcom=connex_object();
?>
<center>
<table width="90%" border="0">
			<tr style="font-weight:bolder;color:grey;font-size:25px" align="left">
				<th height="40px" >Code Matiere</th><th>Designation Matiere </th><th>Volume Horraire</th>
			</tr>
			<?php
				if ($idcom)
				{
					$req="SELECT * FROM matiere ";
					$resultat=$idcom->query($req) ;
					
					if ($resultat)
					{
						while ( $donnee=$resultat->fetch() )
						{
              $id=$donnee['Code_Mat'];
						echo "<tr><td>".$donnee['Code_Mat']."</td><td>".$donnee['Des_Mat']."</td><td>".$donnee['Volum_H']."</td><td>";
            echo "<a href='SupprimerMat.php?id=$id'><input class='b1' style='width:60%' type='button' value='Supprimer' /></a></td></tr>";
						}
						
					}
					else 
					echo "Seance existant";
					
				}
			?>
		</table>
		</center>
</div>
<h1>Ajouter une matiere</h1>
<form action="ajoutMatiere.php" method="POST">
	<table width="100%">
  <tr><td>Code Matiere:</td><td width="80%"><input type="text" class="txt" value="" placeholder="Code" name="i1" required /></td></tr>
  <tr><td>Designation Matiere:</td><td><input type="text" class="txt" value="" placeholder="Designation" name="i2"required /></td></tr>
  <tr><td>Volume Horraire:</td><td><input type="text" class="txt" value="" placeholder="Volume Horaire" name="i3" required /></td></tr>
  </table>
	<input type="submit" value="Submit" >
  <input type="Reset" value="reset"  >
</form>

<?php
if (isset($_POST['i1']) && isset($_POST['i2']) && isset($_POST['i3']))
{
  $cod=$_POST['i1'];
  $des=$_POST['i2'];
  $vol=$_POST['i3'];
  

  
  $requete= "INSERT INTO matiere VALUES ('$cod', '$des', '$vol')";
  $res=$idcom->exec($requete);
  if (!$res)
    echo "<script>alert('Erreur !');</script>";
  else
      header('location: ajoutMatiere.php');
  }
?>
<a href="#top"><input type="button" value="Retour au Top" class="b1" style="margin-left:80%;width:15%"/></a><br><br>

  <a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;z-index:-1" src="form.png"/></a>

  <footer style="margin-top:10%" class="copy">
  	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
  </footer>
  </div>
  </body>
