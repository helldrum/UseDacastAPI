<?php
define("APIKEY", "YourAPIKey");
define("URL", "https://www.dacast.com/backend/api/template");
define("BID", "yourBroadcasterID");

 main();
 
function main(){
	$playlist_id = YourPlaylistId;
	
	$data = curlWrap("/" . $playlist_id . "?bid=" . BID . "&apikey=" . APIKEY, null, "GET") or die ("<p>can return the json !<p>");

	if(isset($data->error->message)){
		echo 'ERROR : ' . $data->error->message;
	}
	else
		{
		echo 'id : '. $data->playlist->id . '<br>';
		echo 'title : '. $data->playlist->title . '<br>';
		echo 'description : '. $data->playlist->description . '<br>';
		echo 'online : ' . $data->playlist->online . '<br>';
		echo 'stream_url : ' . $data->playlist->stream_url . '<br>';
		echo 'stream_publishing_point : ' . $data->playlist->stream_publishing_point . '<br>';
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

