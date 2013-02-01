<?php
session_start();
if(isset($_POST['submit']))
	{
		include 'db.php';
				
		//Connect to server and select database
		mysql_connect($dbhost,$dbuser, $dbpass)or die ("Cannot connect:".mysql_error());
		mysql_select_db($dbname)or die(mysql_error());
		
		//username and password sent from form
		$myusername=$_POST['email'];
		$mypassword=($_POST['password']);

		//to protect MySQL injection
		$myusername=stripslashes($myusername);
		$myusername=mysql_real_escape_string($myusername);
		//$mypassword=mysql_real_escape_string($mypassword);
		$mypassword = sha1($mypassword."ditiseenhash");
		
		$sql="SELECT * FROM login WHERE user='".$myusername."' and pass='".$mypassword."';";
		$result=mysql_query($sql);
		
		//Mysql_num_row is counting table row
		$count=mysql_num_rows($result);
		//If result matched $myusername and $mypassword, table row must be 1 row
		
		
		if($count==1)
		{
			$count=mysql_fetch_assoc($result);
			$_SESSION['klantnr']=$count['KLANT_NR'];
			$_SESSION['loader']=1;
				header('Location: ../overzicht.php');
		}else{
			print "Email of Wachtwoord fout";
		}
	}
	
