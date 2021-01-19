<?php

class Manager{
	function connexionDB(){
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=pepiniere;charset=utf8', 'root', '');
			return $bdd;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}
}
