<?php
define("APIKEY", "YourAPIKey");
define("URL", "https://www.dacast.com/backend/api/vod");
define("BID", "YourBroadcasterId");


main();
 
function main(){
	$VOD_id = YourVOD_Id;
	$rate_id = YourRate_Id ;
	
	$data = curlWrap("/" . $VOD_id . "/rate/" . $rate_id . "?bid=" . BID . "&apikey=" . APIKEY, null, "GET") or die ("<p>can't return the data !<p>");
	
	if(isset($data)){
		echo 'id : '. $data->rate->id . '<br>';
		echo 'type : '. $data->rate->type . '<br>';
		echo 'price : '. $data->rate->price . '<br>';
		echo 'currency : ' . $data->rate->currency . '<br>';
	
	}	
}

function curlWrap($url, $json, $action)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
	curl_setopt($ch, CURLOPT_URL, URL.$url);
	curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");
	

	switch($action){
		case "POST":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		break;
		case "GET":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		break;
		case "PUT":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		break;
		case "DELETE":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		break;
		default:
		break;
	}
	 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
	curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$output = curl_exec($ch);

	curl_close($ch);
	$decoded = json_decode($output);
	return $decoded;
}
?>

