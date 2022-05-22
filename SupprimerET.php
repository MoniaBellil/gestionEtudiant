<?php

			include_once("connex.php");
  			$idcom=connex_object();
			if (isset($_GET['id']))
			{
				$a= $_GET["id"];
			}
 			if($idcom)
			{
				$req="DELETE FROM etudiant WHERE Matricule_Et='$a'";
				$ex=$idcom->query($req);
				if($ex)
				{
					 header("Location: ajoutEtud.php");
    				exit;
								
				}
				else
					echo "0";
			}
			
?>