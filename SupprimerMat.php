<?php

			include_once("connex.php");
  			$idcom=connex_object();
			if (isset($_GET['id']))
			{
				$a= $_GET['id'];
				
			}
 			if($idcom)
			{
				$req="DELETE FROM matiere WHERE Code_Mat='$a'";
				$ex=$idcom->query($req);
				if($ex)
				{
					 header("Location: ajoutMatiere.php");
    				exit;
								
				}
				else
					echo "0";
			}
			
?>