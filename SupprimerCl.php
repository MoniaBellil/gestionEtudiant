<?php

			include_once("connex.php");
  			$idcom=connex_object();
			if (isset($_GET['id']))
			{
				$a= $_GET["id"];
			}
 			if($idcom)
			{
				$req="DELETE FROM classe WHERE Code_C='$a'";
				$ex=$idcom->query($req);
				if($ex)
				{
					 header("Location: ajoutClasse.php");
    				exit;
								
				}
				else
					echo "0";
			}
			
?>