<?php

			include_once("connex.php");
  			$idcom=connex_object();
			if (isset($_GET['id']))
			{
				$a= $_GET["id"];
			}
 			if($idcom)
			{
				$req="DELETE FROM enseignant WHERE Matricule_En='$a'";
				$ex=$idcom->query($req);
				if($ex)
				{
					 header("Location: ajoutEns.php");
    				exit;
								
				}
				else
					echo "0";
			}
			
?>