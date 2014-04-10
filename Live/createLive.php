<?php

define("APIKEY", "YourAPIKEY");
define("URL", "https://www.dacast.com/backend/api/live");
define("BID", "YourBroadcasterID");

main();

function main() {

    $title = urlencode("live auto 1");
    $description = urlencode("auto generate live");
    $online = urlencode('0');
    $stream_type = urlencode('1');
    $stream_category = urlencode('20');
    $publish_on_dacast = urlencode('1');

    $data = curlWrap("/0?bid=26708&apikey=7c70028b237d85cda0cc&title=" . $title . "&description=" . $description . "&online=" . $online . "&stream_type=" . $stream_type . "&stream_category=" . $stream_category . "&publish_on_dacast=" . $publish_on_dacast, NULL, "POST");


    if ($data->error->message != null) {
        echo "<p>Error : " . $data->error->message . "</p>";
    } else {
        echo
        '<p>live  created !<p>'
        . '<lu> '
        . '<li> id : ' . $data->live->id . ' </li>'
        . '<li> title : ' . $data->live->title . ' </li>'
        . '<li> description : ' . $data->live->description . '</li>'
        . '<li> online : ' . $data->live->online . '</li>'
        . '<li> stream_type : ' . $data->live->stream_type . '</li>'
        . '<li> stream_category : ' . $data->live->stream_category . ' </li>'
        . '<li> publish_on_dacast : ' . $data->live->publish_on_dacast . ' </li>'
        . '</lu>';
    }
}

function curlWrap($url, $json, $action) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_URL, URL . $url);
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

    curl_close($ch);

    $decoded = json_decode($output);
    return $decoded;
}
?>

