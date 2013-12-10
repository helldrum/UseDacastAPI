<?php
define("APIKEY", "YourAPIKey");
define("URL", "https://www.dacast.com/backend/api/vod");
define("BID", "yourBroadcasterID");

main();
 
function main(){
	$vod_id = "YourVODid";

	$ch = curl_init(URL . "/" . $vod_id . "/embed/frame?bid=" . BID  . "&apikey=" . APIKEY);

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
	curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem"); 
	curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

	$output = curl_exec($ch);

	curl_close($ch);
	$decoded = json_decode($output);

	echo var_dump($decoded);
}
?>

