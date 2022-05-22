<?php

			include_once("connex.php");
  			$idcom=connex_object();
			if (isset($_GET['id']))
			{
				$a= $_GET["id"];
			}
 			if($idcom)
			{
				$req="DELETE FROM seance WHERE Code_Sea='$a'";
				$ex=$idcom->query($req);
				if($ex)
				{
					 header("Location: ajoutSeance.php");
    				exit;
								
				}
				else
					echo "0";
			}
			
?>