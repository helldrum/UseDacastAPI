<?php

define("APIKEY", "7c70028b237d85cda0cc");
define("URL", "https://www.dacast.com/backend/api/live");
define("BID", "26708");

main();

function main() {
/*
    $live_id = '0';
    $title = urlencode("plop");
    $description = urlencode("plap");
    $online = '1';
    $stream_type = '1';
    $stream_category = '20';
    $publish_on_dacast = '1';

    $data = curlWrap("/" . $live_id . "?bid=" . BID . "&apikey=" . APIKEY
            . "&title=" . $title . "&description=" . $description . "&online=" . $online
            . "&stream_type=" . $stream_type . "&stream_category=" . $stream_category
            . "&publish_on_dacast=" . $publish_on_dacast, NULL, "POST");

*/
    $data = curlWrap("https://www.dacast.com/backend/api/live/0?bid=26708&apikey=7c70028b237d85cda0cc&title=baconWave1&description=baconWave1&custom_data=baconWave1&online=0&stream_type=1&stream_category=20&publish_on_dacast=1", NULL, "POST");

    if ($data->error->message != null) {
        echo "<p>Error : " . $data->error->message . "</p>";
    } else {
        echo '<br>' . var_dump($data) . '<br>';
    }
}

function curlWrap($url, $json, $action) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_URL,  $url);
    curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
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


    echo "<br>" . var_dump(curl_getinfo($ch)) . "<br>";

    curl_close($ch);

    $decoded = json_decode($output);
    return $decoded;
}
?>


