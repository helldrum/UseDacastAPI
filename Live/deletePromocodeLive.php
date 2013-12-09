<?php
define("APIKEY", "55ce5cde89b6d45d1624");
define("URL", "https://www.dacast.com/backend/api/live");
define("BID", "26708");

main();
 
function main(){
	$VOD_id = 35909;
	$coupon_id = 9803;
	$data = curlWrap("/" . $VOD_id . "/coupon/" . $coupon_id . "?bid=" . BID . "&apikey=" . APIKEY, null, "DELETE") or die ("<p>ERROR : can return the data !<p>");
	
	if($data->error->message){	
		echo  "<p>ERROR : " . $data->error->message . '<p>';
	}
	
	echo "<p>".$data->message. '<p>';
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

