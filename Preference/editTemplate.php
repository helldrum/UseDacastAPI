<?php


define("APIKEY", "55ce5cde89b6d45d1624");
define("URL", "https://www.dacast.com/backend/api/preferences/template");
define("BID", "26708");

 main();
 
function main()
{

	$live_id = 35719;
	echo URL . "/" . $live_id . "?bid=" . BID 	. "&apikey=" . APIKEY ;
	$json='{ "live":{"id":"35719","title": "new auto Channel 1","description": "your channel description tralala","custom_data": "","online": "0","stream_type": "1","acquisition": "0","http_url": "","backup_url": null,"stream_category": "20","creationDate": "","saveDate": "1386204552","user_id": "26708","bandWidth": "0","activateChat": "0","autoplay": "1","noframe_security": "2","enable_ads": "0","enable_subscription": "0","enable_payperview": "0","enable_coupon": "0","is_private": "0","publish_on_dacast": "1","seo_index": "1","params": "","ads_preroll": "0","ads_midroll": "0","ads_overlay": "0","external_video_page": "","archive_filename": "","companion_position": "right","theme_id": "1","watermark_position": "0","watermark_size": "0","watermark_url": "","id_player_size": null,"player_width": null,"player_height": null,"referers_id": "0","countries_id": "0","thumbnail_id": "1","splashscreen_id": "0","thumbnail_online": "","check_splash": "0","splash_null": "vide","thumb_null": "vide","hds": null,"hls": null}}';
	//echo preg_replace('@[\x00-\x1f\x7f-\xff]@e', '" (0x" . dechex(ord("\\0")) . ") "', $json);
	
	$json = json_encode($json);
	$data = curlWrap(URL .	"/1?bid=26708&apikey=55ce5cde89b6d45d1624&name=customauto&width=200&height=200&video_bitrate=5256&audio_bitrate=56256&file_type=audio&format=MP4+Video+H.264%2FAAC", null, "POST") ;
	
	// or die ("<p> ERROR : " . $data->error->message . "<p>")
	var_dump($data);
	
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
			curl_setopt($ch, CURLOPT_POST, true);
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
	
	    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ( $status != 201 ) {
            die(curl_error($ch) . ", curl_errno " . curl_errno($ch));
        }

	curl_close($ch);
	$decoded = json_decode($output);
	return $decoded;
}
?>

