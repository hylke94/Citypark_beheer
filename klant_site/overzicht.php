<?php
session_start();
if(isset($_SESSION['loader'])){
	unset($_SESSION['loader']);
	print "<body onload=\"parent.location.reload()\">";
}else{
include 'includes/db.php';
//Connect to server and select database
mysql_connect($dbhost,$dbuser, $dbpass)or die ("Cannot connect:".mysql_error());
mysql_select_db($dbname)or die(mysql_error());
$query = "select * from pas where `KLANT_NR` = '".$_SESSION['klantnr']."' AND (`PAS_TYPE` = '2' OR `PAS_TYPE` = '3');";
$result= mysql_query($query);
if(is_bool($result)){
	print "U heeft nog geen parkeerkaarten op uw naam staan.<BR />Heeft u al wel kaarten ontvangen neem dan contact op met onze helpdesk.";
}else{
print "
<strong>Parkeerkaarten overzicht</strong>\n
<hr />\n
<table>\n
	<tr>\n
		<th>Kaartnummer</th><th>Type</th><th>Status</th>\n
	</tr>\n";
while($array = mysql_fetch_array($result, MYSQL_ASSOC)){
	if($array['STATUS']==0){
		$status="Geblokeerd";
	}else{
		$status="Normaal";
	}
	if($array['PAS_TYPE']==2){
		$type="Abbonneepas";
	}elseif($array['PAS_TYPE']==3){
		$type="Bezoekerspas";
	}
	
	print "<tr><td>".$array['PAS_ID']."</td><td>".$type."</td><td>".$status."</td></tr>";

}
print "</table>";
}
}
?>