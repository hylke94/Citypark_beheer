<?php
$naar = 'yorian@localhost'; // Waar moet het naartoe?
$onderwerp = 'Contactformulier (je site)'; // Het onderwerp van het bericht
 
// Header instellen, zodat nl2br() werkt
$headers = "MIME-version: 1.0\r\n"; 
$headers .= "content-type: text/html;charset=utf-8\r\n";
 
if(isset($_POST['versturen'])) // Als het formulier verzonden is door op de verzend knop te klikken
{
	$voornaam = trim($_POST['voornaam']); // Alle overbodige spaties uit het voornaam veld verwijderen
	$achternaam = trim($_POST['achternaam']); // Alle overbodige spaties uit het achternaam veld verwijderen
	$email = trim($_POST['email']); // Alle overbodige spaties uit het email veld verwijderen
	$bericht = trim($_POST['bericht']); // Alle overbodige spaties uit het bericht veld verwijderen
	$fout = false; // Om te kijken straks of er wat fout is
 
	if(empty($voornaam)) // Als het voornaam veld niet is ingevuld
	{
		print '<p>Helaas, het voornaam veld is verplicht maar is nu niet ingevuld!</p>';
		$fout = true; // Zorgen dat het script zometeen weet dat er wat fout is
	}
	if(empty($achternaam)) // Als het achternaam veld niet is ingevuld
	{
		print '<p>Helaas, het achternaam veld is verplicht maar is nu niet ingevuld!</p>';
		$fout = true; 
	}
	if(empty($email)) // Als het email veld niet is ingevuld
	{
		print '<p>Helaas, het email veld is verplicht maar is nu niet ingevuld!</p>';
		$fout = true;
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) // Als het email adres niet correct is
	{
		print '<p>Helaas, het email adres is niet correct!</p>';
		$fout = true;
	}
	if(empty($bericht)) // Als het bericht veld niet is ingevuld
	{
		print '<p>Helaas, het bericht veld is verplicht maar is nu niet ingvuld!</p>';
		$fout = true;
	}
 
	if($fout == false) // Als er niks fout is (alles is dus netjes ingevuld)
	{
		$headers .= 'From: ' . $voornaam . ' ' . $achternaam . '<' . $email . '>'; // Een afzender instellen zodat je kan reageren.
 
		if(mail($naar, $onderwerp, nl2br($bericht), $headers))
		{
			print '<p>Het bericht is succesvol verzonden!</p>';
		}
		else
		{
			print '<p>Helaas, er is wat fout gegaan tijdens het verzenden van het formulier.</p>';
		}
	}
}
?>
 


