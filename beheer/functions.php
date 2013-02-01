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
		
		$query = "SELECT USER, ADMIN, PASS FROM login WHERE USER = ? AND PASS = ?";
		
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("ss", $username, sha1($password. "ditiseenhash"));
			if($stmt->execute()){
				
				$stmt->store_result();
				$admin_res = 0;
				$pass_res = "";			
				
				$stmt->bind_result($username_res, $admin_res, $pass_res);
				
				
				$stmt->fetch();
								
				if ($stmt->num_rows == 1){
					
					if ($admin_res == 0){
						$errors[] = "Gebruiker is geen beheerder";
					}
					else {
											
						$stmt->fetch();
						
						$_SESSION['naam']		= $username_res;
						$_SESSION['ingelogd'] 	= 1;
						
						header('Location: ?page=index_beheer');
					}
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
		$mysqli->close();
	}
	$smarty->assign("errors", $errors);

}



/**
 * Verwerkt het blokkeren van een kaart.
 */

function displayCostumerCards(){
	global $smarty;
	
	$id = 0;
	$errors = array();
	$klantVoornaam 	= trim($_POST['klantVoornaam']);
	$klantAchternaam = trim($_POST['klantAchternaam']);

	if (empty($klantVoornaam) || empty($klantAchternaam)){
		$errors[] = "Vul de namen in";
	}
	else { 
		
		$mysqli = new mysqli (MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
		$query = "SELECT * FROM pas, pas_type WHERE KLANT_NR = (SELECT KLANT_NR FROM klanten WHERE VOORNAAM = ? AND ACHTERNAAM = ?) AND pas.PAS_TYPE = pas_type.ID";

	
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("ss", $klantVoornaam, $klantAchternaam);
			
			if ($stmt->execute()){
			
				$smarty->assign("showCards", 1);
				$smarty->assign("voornaam", $klantVoornaam);
				$smarty->assign("achternaam", $klantAchternaam);
				
				
				$result = $stmt->get_result();
				
				while ($row = $result->fetch_assoc()) {
					$smarty->assign("rows", $result->num_rows);
					
					$results[] = $row;
					
					$smarty->assign("results", $results);
					
					$smarty->assign("klantnr", $results[0]['KLANT_NR']);						
				}
			
			}
			else {
				printf("Execute error: %s", $stmt->error);
			}
		}
		else {
			printf("Prepared Statement Error: %s\n", $mysqli->error);
		}
		$mysqli->close();
	}
	$smarty->assign("errors", $errors);
}



/**
 * Blokkeer een kaart in de database aan de hand van het klantnummer
 */

function blockCosumerCard($klantnr){
	global $smarty;

	$mysqli = new mysqli (MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
		
	$errors = array();
	
	if (isset($_POST['blockCbx']) == "on"){
		$query = "UPDATE pas SET STATUS = 0 WHERE KLANT_NR = ? AND PAS_TYPE = 2 AND PAS_TYPE = 3";
		
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("i", $klantnr);
			
			if ($stmt->execute()){
				$updateSuccess = $stmt->affected_rows;
				
				if ($updateSuccess){
					$smarty->assign("block",1);
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
	else {
		$query = "UPDATE pas SET STATUS = 1 WHERE KLANT_NR = ? AND PAS_TYPE = 2 AND PAS_TYPE = 3";
			
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("i", $klantnr);
		
			if ($stmt->execute()){
				$updateSuccess = $stmt->affected_rows;
					
				if ($updateSuccess){
					$smarty->assign("unblock",1);
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
 * Show all the current fares listed in the database
 */

function showFares(){
	global $smarty;
	
	$mysqli = new mysqli (MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
	
	$errors = array();
	
	$query = "SELECT DISTINCT * FROM tarieven, dagen WHERE tarieven.DAG_ID = dagen.ID";
	
	if($stmt = $mysqli->prepare($query)){
		
		
		if($stmt->execute()){
			
			$result = $stmt->get_result();
		
			$success = $stmt->affected_rows;
			
			while ($row = $result->fetch_assoc()) {				
				$results[] = $row;
				$cats[] = $row['CAT_NR'];
				$dagen[] = $row['OMSCHR'];
								
				$smarty->assign("results", $results);
			}
			
			$smarty->assign("dagen", array('Ma-Vr', 'Zaterdag', 'Zondag'));
			$smarty->assign("cats", array('1', '2', '3'));
		}
		else {
			printf("Execute error: %s", $stmt->error);
		}
	}
	else {
		$errors = "Geen data";
	}	
	
	$smarty->assign("errors", $errors);
}

/**
 * Voeg een nieuw tarief toe aan de database, gebruikmakend van dagen en categorieën.
 */

function addFare(){
	global $smarty;
	
	$errors = array();
	$dag = $_POST['dagen'];
	$starttijd = trim($_POST['starttijd']);
	$eindtijd = trim($_POST['eindtijd']);
	$ingangsdatum = trim($_POST['ingangsdatum']);
	
	if (empty($starttijd) || empty($eindtijd) || empty($ingangsdatum)){
		$errors[] = "Vul alle velden in";
	}
	else {
		
		$startyear = explode("-", $ingangsdatum);
		$starttimeNumbers = explode(":", $starttijd);
		$endTimeNumbers = explode(":", $eindtijd);
		
		if ($startyear[0] < date("Y")){
			$errors[] = "Er kan geen tarief worden toegevoegd die in het verleden ligt";
		}
		elseif (($startyear[1] > 12) && ($startyear[2] > 31)){
			$errors[] = "Opgegeven maanddata kloppen niet";
		}
		elseif (($starttimeNumbers[0] > 23) || ($starttimeNumbers[1] > 59) || ($starttimeNumbers[2] > 59)) {
			$errors[] = "De opgegeven starttijd is onjuist, deze moet binnen de straal 23:59:59 zitten.";
		}
		elseif (($endTimeNumbers[0] > 23) || ($endTimeNumbers[1] > 59) || ($endTimeNumbers[2] > 59)) {
			$errors[] = "De opgegeven eindtijd is onjuist, deze moet binnen de straal 23:59:59 zitten.";
		}
		
		else {
			
			$cat = trim($_POST['cats']);
			$mysqli = new mysqli (MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
			
			$query = "INSERT INTO tarieven (DAG_ID, STARTTIJD, EINDTIJD, CAT_NR, INGANGSDATUM) VALUES (?, ?, ?, ?, ?)";
			
			if ($stmt = $mysqli->prepare($query)){
				$stmt->bind_param("sssis", $dag, $starttijd, $eindtijd, $cat, $ingangsdatum);
				
				if ($stmt->execute()){
	
					$updateSuccess = $stmt->affected_rows;
					
					if ($updateSuccess){
						$smarty->assign("added",1);
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
	}
		$smarty->assign("fouten", $errors);
	
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