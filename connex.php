<?php
	function connex_object()
	{

		define ("MYHOST","localhost");
		define ("MYBD","miniprojet");
		define ("MYUSER","root");
		define ("MYPASS","");
		try
		{
			$idcom=new PDO('mysql:host='.MYHOST.';dbname='.MYBD, MYUSER, MYPASS);
			return $idcom;
		}
			catch(Exception $e)
			{
				echo 'Erreur: '.$e->getMessage().'<br>';
				return NULL;
			}
	}
?>
