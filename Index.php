<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css"/>
	<title>ISET-CHARGUIA</title>
	<meta charset="utf-8"/>
	<link rel="short icon" type="image/x-icon" href="icon.gif">
</head>
<body>
	<div class="d1">
		<br>
		<form method="POST" action="Index.php">
			<input class="txt" name="i1" id="i1" value="<?php  if(isset($_POST['i1'])) echo $_POST['i1']?>" type="text" required placeholder="Utilisateur"/>
			<input class="txt" name="i2" id="i2" value="<?php  if(isset($_POST['i2'])) echo $_POST['i2']?>" type="password" required placeholder="Mot de passe" pattern="[a-zA-Z0-9]{8,}"/>
			<input type="submit" value="Connecter" ><br>
		
		</form>
	<?php
	include_once("connex.php");
	if((isset($_POST["i1"]))&&(isset($_POST["i2"])))
	{
		if($_POST["i1"]=="enseignant")
		{
			if($_POST["i2"]=="enseignant")
				{
					header("Location: enseignant.php?id=enseignant");
    				exit;
				}
			else
				echo "<script>document.getElementById('i2').style.borderColor ='red'</script>";	
			}
			else if($_POST['i1']=="administration")
			{
				if($_POST["i2"]=="administration")
					{
						header("Location: administration.php?id=administration");
    					exit;
					}
			else
				echo "<script>document.getElementById('i2').style.borderColor ='red'</script>";	

			}
			else
				{
				echo "<script>document.getElementById('i1').style.borderColor ='red'</script>";
				echo "<script>document.getElementById('i2').style.borderColor ='red'</script>";
				}
		}
			
	
		?>
<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;" src="form.png"/></a>

<footer style="margin-top:37%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>	
</html>
