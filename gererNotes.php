<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css"/>
	<title>ISET-CHARGUIA</title>
	<meta charset="utf-8"/>
	<link rel="short icon" type="image/x-icon" href="icon.gif">

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

		input[type=text]{
		width:16%;
		padding: 12px 20px;
		margin: 2px 0;
		display: inline-block;
		border: 1px solid ;
		border-color:#ccc;
		border-radius: 15px;
		box-sizing: border-box;}
</style>
</head>
<body>
	<div class="d1">
<a href="administration.php?id=administration"><input type='button' class='b1' value='Retour'/></a><br><br>

	<center>
<div style="margin-top:6%" class="d2">
  <?php
include_once("connex.php");
		$idcom=connex_object();

				if($idcom)
				{
					$requete= "SELECT Code_C FROM classe";
					$res=$idcom->query($requete);
					if ($res)
					{
						while($donnee=$res->fetch())
						{
                 			echo "<a href='Notes.php?code=".$donnee["Code_C"]."' /><input style='width:40%' class='b1' type='Button' value='".$donnee["Code_C"]."'/><br><br>";
           				 }
						$res->closeCursor();
					}
        		}

?>

</div>
</center>

<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;" src="form.png"/></a>

<footer style="margin-top:10%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>
