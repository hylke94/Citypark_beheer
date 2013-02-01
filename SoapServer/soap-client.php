<?

// create a client
$client = new nusoap_client('http://citypark.hylke94.nl/bankservice/bankservice.php?wsdl', true);
$client->soap_defencoding = 'UTF-8';

// check for any errors
$error = $client->getError();
if ($error) echo '<h3>Constructor error</h3><pre>' . $error . '</pre>';

// get the result
if ($action === 'trf') $result = $client->call('transfer', array('accountfrom' => $accountfrom, 'accountto' => $accountto, 'amount' => $amount));
else $result = $client->call('doCreditCheck', array('accountnr' => $accountnr, 'amount' => $amount));

// look for any errors in the xml-file (a fault is returned)
if ($client->fault) :
	echo '<h3>Fault</h3><pre>';
	echo print_r($result);
	echo '</pre>';
else :
	$error = $client->getError();
	if ($error) echo '<h3>Error</h3><pre>'.$error.'</pre>';
		echo '<h3>Result:</h3><pre>'.$result.'</pre>';
endif;

// print debug-info
if ($debug) :
	echo '<h3>Request</h3>';
	echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
	echo '<h3>Response</h3>';
	echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
	echo '<h3>Debug</h3>';
	echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>'	;
endif;