<?php

define("APIKEY", "YourAPIKEY");
define("URL", "https://www.dacast.com/backend/api/preferences/template");
define("BID", "YourBroadcasterID");

main();

function main() {
    $template_id = YourTemplateID;

    $data = curlWrap("/" . $template_id . "?bid=" . BID . "&apikey=" . APIKEY, null, "GET") or die("<p>can return the json !<p>");


    if (isset($data->error->message)) {
        echo 'ERROR : ' . $data->error->message;
    } else {
        echo 'id : ' . $data->template[0]->id . '<br>';
        echo 'name : ' . $data->template[0]->name . '<br>';
        echo 'format : ' . $data->template[0]->format . '<br>';
        echo 'resolution : ' . $data->template[0]->resolution . '<br>';
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

