<?php

/**
 * Functions.php
 */

require_once 'config/config.inc.php';


/**
 * Verwerkt de login
 */

function processLogin(){
	global $smarty;
	
	$errors 	= array();
	$username 	= trim($_POST['username']);
	$password 	= trim($_POST['password']);
	
	$username_res = "";
	
	if(empty($username) || empty($password)){
		$errors[] = "U ben vergeten enkele verplichte velden in te vullen.";
	} else {
		
		$mysqli = new mysqli (MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
		
		$query = "SELECT username FROM beheerders WHERE username = ? AND password = ?";
		
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("ss", $username, sha1($password));
			
			if($stmt->execute()){
				
				$stmt->store_result();
			
				$stmt->bind_result($username_res);

				if ($stmt->num_rows == 1){
					
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
	
		$query = "SELECT klanten.klantnr,  
				FROM klanten, klantenpas, bezoekerspas
					WHERE klanten.klantnr = klantenpas.klantnr 
						AND klantenpas.pasnr = bezoekerspas.pasnr";
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