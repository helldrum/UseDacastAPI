<?php

define("APIKEY", "YourAPIKEY");
define("URL", "https://www.dacast.com/backend/api/preferences/template");
define("BID", "YourBroadcasterID");

main();

function main() {
    //0 fonctionne avec swagger pas avec curl 
    $data = curlWrap("/0?bid=" . BID . "&apikey=" . APIKEY, null, "GET") or die("<p>can't return the json !<p>");


    if (isset($data->error->message)) {
        echo 'ERROR : ' . $data->error->message;
    } else {
        foreach ($data->template as $template) {
            echo 'id : ' . $template->id . '<br>';
            echo 'name : ' . $template->name . '<br>';
            echo 'format : ' . $template->format . '<br>';
            echo 'resolution : ' . $template->resolution . '<br>';
        }
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

