<?php
define("APIKEY", "YourAPIKey");
define("URL", "https://www.dacast.com/backend/api/playlist");
define("BID", "yourBroadcasterID");

main();
 
function main(){
	$live_id = "YourLiveId";

	$ch = curl_init(URL . "/" . $live_id . "/embed/frame?bid=" . BID  . "&apikey=" . APIKEY);

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

