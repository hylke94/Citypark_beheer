<?php

/**
 * Functions.php
 */

require_once 'config/config.inc.php';

$mysqli = new mysqli (MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);

/**
 * Verwerkt de login
 */

function processLogin(){
	global $smarty;
	
	$errors 	= array();
	$username 	= trim($_POST['username']);
	$password 	= trim($_POST['password']);
	
	$username_res = "";
	$admin = 0;
	
	if(empty($username) || empty($password)){
		$errors[] = "U ben vergeten enkele verplichte velden in te vullen.";
	} else {
		
		
		$query = "SELECT USER, ADMIN FROM login WHERE USER = ? AND PASS = ?";
		
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("ss", $username, sha1($password));
			
			if($stmt->execute()){
				
				$stmt->store_result();
			
				$stmt->bind_result($username_res, $admin);
				
				if ($stmt->num_rows == 1){
					
					if ($admin == "0"){
						$errors[] = "Gebruiker is geen beheerder";
					}
					
					
					$stmt->fetch();
					
					$_SESSION['naam']		= $username_res;
					$_SESSION['ingelogd'] 	= 1;
					
					header('Location: ?page=index_beheer');
				}
				else { 
					$errors[] = "Account bestaat niet";
					
				}
			}
			else {
				printf("Execute error: %s", $stmt->error);
			}
			
		}
		else {
			printf("Prepared Statement Error: %s\n", $mysqli->error);
		}
	}
	$smarty->assign("errors", $errors);
}


/**
 * Verwerkt het blokkeren van een kaart.
 */

function processBlockCard(){
	global $smarty;
	
	$errors = array();
	$klantnaam 	= trim($_POST['klantNaam']);

	if (empty($klantnaam)){
		$errors[] = "Vul een naam in";
	}
	else { 
	
		$query = "SELECT * from login, pas WHERE login.KLANT_NR = pas.KLANT_NR AND ACHTERNAAM = ?";
		
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("s", $klantnaam);
			
			
		}
		
		
	}
	$smarty->assign("errors", $errors);
	
}




/**
 * Vernietig de sessie en stuur de gebruiker terug naar de index.
 */

function logoutUser(){
	session_destroy();
	header("Location: index.php");
}

/**
 * Generate a random Salt.
 * @param int $max
 * @return string
 */

function generateSalt($max = 15) {
	$characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
	$i = 0;
	$salt = "";
	while ($i < $max) {
		$salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
		$i++;
	}
	return $salt;
}

?>