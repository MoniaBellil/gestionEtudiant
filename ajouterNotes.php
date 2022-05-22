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
  .d3{
    z-index:1;
    max-height:700px;
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
		<br><br><br>
		<form method="POST"/>
			<input class='txt1' required name='i1' type='text' Placeholder='Note DS'/><br><br>
			<input class='txt1' required name='i2' type='text' Placeholder='Note Exam'/><br><br>
			<input class='txt1' required name='i3' type='text' Placeholder='Note TP'/><br><br>
			<input class='b1'  type='submit' value='Valider'/>
			<?php
			echo "<a href='Notes.php?code=".$code=$_GET["code"]."'><input class='b1'  type='button' style='background-color:red;width:8.5%; margin-left:10px;' value='Anuller'/></a>";
			?>
		</form>
		
<?php
include_once("connex.php");
		$idcom=connex_object();
if((isset($_POST["i1"]))&&(isset($_POST["i2"]))&&(isset($_POST["i3"])))
	{
		$d=$_POST["i1"];
		$e=$_POST["i2"];
		$t=$_POST["i3"];

		$req="INSERT INTO note values ('".$_GET["m"]."', '".$_GET["c"]."', $d, $e, $t)";
		$res=$idcom->query($req);
		
		header("location: Notes.php?code=".$_GET["code"]);
	}

?>
<a href="Index.php"><img style="position:absolute;top:2%;left:88.7%;z-index:-1" src="form.png"/></a>

<footer style="margin-top:32%" class="copy">
	&copy; copyright 2017 , all rights reserved to Khaili Med Amine - Jadoui Bassem
</footer>
</div>
</body>