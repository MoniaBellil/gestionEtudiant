<?php

			include_once("connex.php");
  			$idcom=connex_object();
			if (isset($_GET['m'])&&(isset($_GET["c"])))
			{
				$a= $_GET["m"];
				$b=$_GET["c"];
			}
 			if($idcom)
			{
				$req="DELETE FROM note WHERE (Matricule_Et='$a' and Code_Mat='$b')";
				$ex=$idcom->query($req);
				if($ex)
				{
					 header("Location: Notes.php?code=".$_GET["code"]);
    				exit;
								
				}
				else
					echo "0";
			}
			
?>