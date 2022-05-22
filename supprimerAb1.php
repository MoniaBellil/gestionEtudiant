<?php

			include_once("connex.php");
  			$idcom=connex_object();
if (isset($_GET['idE'])&&(isset($_GET["idS"])))
			{
				$a= $_GET["idE"];
				$b=$_GET["idS"];
			}
 			if($idcom)
			{
				$req="DELETE FROM absence WHERE (Matricule_Et='$a' and Code_Sea='$b')";
				$ex=$idcom->query($req);
				if($ex)
				{
					 header("Location: SupprimerAb.php?idE=$a&m=".$_GET["m"]."&code=".$_GET["code"]."&mm=".$_GET["mm"]);
    				exit;
								
				}
				else
					echo "0";
			}

?>