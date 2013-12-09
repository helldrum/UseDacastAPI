<?php
define("APIKEY", "YourAPIKey");
define("URL", "https://www.dacast.com/backend/api/vod");
define("BID", "yourBroadcasterID");

 main();
 
function main(){
	$VOD_id = YouVODId;
	
	$data = curlWrap("/" . $VOD_id . "?bid=" . BID . "&apikey=" . APIKEY, null, "GET") or die ("<p>can return the data !<p>");
	
	if(isset($data)){
		echo 'id : '. $data->vod->id . '<br>';
		echo 'title : '. $data->vod->title . '<br>';
		echo 'description : '. $data->vod->description . '<br>';
		echo 'online : ' . $data->vod->online . '<br>';
		echo 'filename : ' . $data->vod->filename . '<br>';		
		echo 'upload_url : ' . $data->vod->upload_url . '<br>';		
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

