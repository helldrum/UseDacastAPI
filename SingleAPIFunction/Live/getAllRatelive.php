<?php

define("APIKEY", "YourAPIKey");
define("URL", "https://www.dacast.com/backend/api/live");
define("BID", "YouBroadcasterId");

main();

function main() {
    $live_id = YourLiveId;

    $data = curlWrap("/" . $live_id . "/rate/?bid=" . BID . "&apikey=" . APIKEY, null, "GET") or die("<p>can't return the data !<p>");

    foreach ($data->rate as $rate) {
        echo 'id : ' . $rate->id . '<br>';
        echo 'type : ' . $rate->type . '<br>';
        echo 'price : ' . $rate->price . '<br>';
        echo 'currency : ' . $rate->currency . '<br><br>';
    }
}

function curlWrap($url, $json, $action) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_URL, URL . $url);
    curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");

    switch ($action) {
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

