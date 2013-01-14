<?php

/**
 * Functions.php
 */

require_once 'config/config.inc.php';

/**
 * TODO: HASHING
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
		
		$query = "SELECT username FROM users WHERE username = ? AND password = ?";
		
		if ($stmt = $mysqli->prepare($query)){
			$stmt->bind_param("ss", $username, $password);
			
			if($stmt->execute()){
				
				$stmt->store_result();
				
				if ($stmt->num_rows >= 1){
					$stmt->bind_result($username_res);
							
					while ($stmt->fetch()){
						printf("%s \n", $username_res);
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
	}
	$smarty->assign("errors", $errors);
}


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