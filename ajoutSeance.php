<!DOCTYPE html>
<html>
<head>
  <style>
  .d2{
    z-index:1;
    max-height:350px;
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
    if (isset($_POST['sub']))
      header('location: ajoutSeance.php');
  ?>
  <div id="top" class="d1">
<a href="administration.php?id=administration"><input type='button' class='b1' value='Retour'/></a><br><br>

    <h3>Seances:</h3>

    <div align="center" class="d2">
<table width="100%">
			<tr style="font-weight:bolder;color:grey;font-size:25px" align="left">
				<th height="40px" >Code Seance</th><th>Jour Seance</th><th>Heure Seance</th><th>Matiere</th><th>Enseignant</th><th>classe</th>
			</tr>
			<?php
				include_once("connex.php");
				$idcom=connex_object();
				if ($idcom)
				{
					$req="SELECT * FROM seance ORDER BY Code_Sea";
					$resultat=$idcom->query($req) ;
					
					if ($resultat)
					{
						while ( $donnee=$resultat->fetch() )
						{
              $req1=("SELECT Nom_En, Prenom_En FROM enseignant WHERE Matricule_En='".$donnee["Matricule_En"]."'");
              $res2=$idcom->query($req1);
              
              if($res2)
              {
              while ($donnee1=$res2->fetch())
              {
                $en=$donnee1["Nom_En"]." ".$donnee1["Prenom_En"];
              }
               $res2->closeCursor();
            }
            $req1=("SELECT Des_Mat FROM matiere WHERE Code_Mat='".$donnee["Code_Mat"]."'");
              $res2=$idcom->query($req1);
              
              if($res2)
              {
              while ($donnee1=$res2->fetch())
              {
                $ma=$donnee1["Des_Mat"];
              }
               $res2->closeCursor();
            }

              $id=$donnee["Code_Sea"];
						echo "<tr><td>".$donnee['Code_Sea']."</td><td>".$donnee['Jour_Sea']."</td><td>".$donnee['Heure_Sea']."</td><td>".$ma."</td><td>".$en."</td><td>".$donnee['Code_C']."</td>";
            //echo"<td><a target='_blank'  href='classe2.php?id=".$donnee["Code_C"]."&se=".$donnee["Code_Sea"]."&mat=".$donnee["Code_Mat"]."'><input style='width:100%' type='button' class='b1' value='Etudiants'/></a><br></td>";
           echo "<td><a href='SupprimerSea.php?id=$id'><input class='b1' style='width:100%' type='button' value='Supprimer' /></a></td></tr>";
						}
						  $resultat->closeCursor();
            
					}
					else 
					echo "Erreur";
					
				}
			?>
		</table>
  </div>
<h1>Ajouter Seance</h1>
<form action="ajoutSeance.php" method="post">
  <table width="100%">
  <tr><td>Matiere:</td><td width="84%">
        <?php 
              $req1="SELECT Code_Mat, Des_Mat from matiere";
              $res1=$idcom->query($req1);
            if($res1)
            {

              $tab=array();
              $i=0;
              echo"<select name='s1'>";
              while($donne=$res1->fetch())
              {
              $tab[$i][0]=$donne["Code_Mat"];
              $tab[$i][1]=$donne["Des_Mat"];
              echo '<option>',$tab[$i][1],'</option>';
              $i++;
              }
              $res1->closeCursor();
            
            echo '</select>';
            }
  

    ?>



  </td></tr>
  <tr><td>Classe:</td><td>
    
  <?php 
              $req1="SELECT Code_C from Classe";
              $res1=$idcom->query($req1);
            if($res1)
            {
              echo"<select name='s2'>";
              while($donne=$res1->fetch())
            
              echo '<option>',$donne["Code_C"],'</option>';

              $res1->closeCursor();
            
            echo '</select>';
            }
  

    ?>



  </td></tr>
  <tr><td>jour:</td><td><select name="s5">

<option>Lundi</option>
<option>Mardi</option>
<option>Mercredi</option>
<option>Jeudi</option>
<option>Vendredi</option>
<option>Samedi</option>

</td></tr>
  <tr><td>heure:</td><td><select name="s4">
<option>S1 (08:30)</option>
<option>S2 (10:10)</option>
<option>S3 (11:50)</option>
<option>S4 (14:00)</option>
<option>S5 (15:40)</option>
</select>
  </td></tr>
  <tr><td>Enseignant:</td><td>
 <?php 
              $req1="SELECT Matricule_En, Nom_En, Prenom_En from enseignant";
              $res1=$idcom->query($req1);
            if($res1)
            {

              $tab1=array();
              $i=0;
               echo"<select name='s3'>";
              while($donne=$res1->fetch())
              {
              $tab1[$i][0]=$donne["Matricule_En"];
              $tab1[$i][1]=$donne["Nom_En"];
              $tab1[$i][2]=$donne["Prenom_En"];
              echo '<option>'.$donne["Nom_En"]." ".$donne["Prenom_En"].'</option>';
              $i++;
              }
              $res1->closeCursor();
            
            echo '</select>';
            }
  

    ?>
    


  </td></tr>

</table>
  <br><br>
  <input type="submit" name="sub" value="Submit" >
  <input type="Reset" value="reset"  >
</form>

<?php

if (isset($_POST['sub']))
{
 $req1="SELECT COUNT(*) from seance";
  $res1=$idcom->query($req1);
  if($res1)
  {
    while($donnee=$res1->fetch()) 
      $code=$donnee['COUNT(*)'];
  $res1->closeCursor();
 
$code++;

}
for($i=0;$i<sizeof($tab);$i++)
{
  if($tab[$i][1]==$_POST['s1'])
  {
    $codeM=$tab[$i][0];
    break;
  }
 }
  
  $codeCl=$_POST['s2'];
  $jour=$_POST['s5'];
  $heure=substr($_POST['s4'],4,5);
 for($i=0;$i<sizeof($tab1);$i++)
 {
  $ch=$tab1[$i][1];
  $ch=$ch." ";
  $ch=$ch.$tab1[$i][2];
  if($ch==$_POST["s3"])
    {
     $ens=$tab1[$i][0];
    }
 
 }

  $requete= "INSERT INTO Seance  VALUES ('$code', '$jour', '$heure', '$codeM', '$ens','$codeCl')";
  $res=$idcom->exec($requete);
  if (!$res)
    echo "<script>alert('Impossible de créer cette Séance !');</script>";
  }
?>
<a href="#top"><input type="button" value="Retour au Top" class="b1" style="margin-left:80%;width:15%"/></a><br><br>


  <a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;z-index:-1" src="form.png"/></a>

  <footer style="margin-top:10%" class="copy">
  	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
  </footer>
  </div>
  </body>
