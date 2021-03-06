<?php

define("APIKEY", "YourAPIKey");
define("URL", "https://www.dacast.com/backend/api/live");
define("BID", "YouBroadcasterId");

main();

function main() {
    $live_id = "YourLiveID";

    $ch = curl_init(URL . "/" . $live_id . "/embed/frame?bid=" . BID . "&apikey=" . APIKEY);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

    $output = curl_exec($ch);
    $decoded = json_decode($output);
    curl_close($ch);

    echo var_dump($decoded);
}
?>

