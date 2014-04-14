<?php

define("APIKEY", "YourAPIKey");
define("URL", "https://www.dacast.com/backend/api/package");
define("BID", "YouBroadcasterId");

main();

function main() {
    $package_id = "YourPackageID";

    $ch = curl_init(URL . "/" . $package_id . "/embed/frame?bid=" . BID . "&apikey=" . APIKEY);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");

    $output = curl_exec($ch);

    curl_close($ch);
    $decoded = json_decode($output);

    echo var_dump($decoded);
}
?>

