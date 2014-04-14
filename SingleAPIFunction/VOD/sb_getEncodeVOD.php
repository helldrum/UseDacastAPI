<?php

define("APIKEY", "7c70028b237d85cda0cc");
define("URL", "https://www.dacast.com/backend/api/vod");
define("BID", "26708");

main();

function main() {
    $VOD_id = '97359';
    $template_id = '2';

    $data = curlWrap("/" . $VOD_id . "/encode" . $rate_id . "?bid=" . BID . "&apikey=" . APIKEY . "&template_id=" . $template_id, null, "GET") or die("<p>can't return the data !<p>");

        
    if ($data->error->message != null) {
        echo 'Error : ' . $data->error->message;
    } else {
        echo $data->template->hash_id . '<br>';
        echo $data->template->file_id . '<br>';
        echo $data->template->user_id . '<br>';
        echo $data->template->file_size . '<br>';
        echo $data->template->date_creation . '<br>';
        echo $data->template->description . '<br>';
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
    print var_dump(curl_getinfo($ch));
    curl_close($ch);
    $decoded = json_decode($output);
    return $decoded;
}
?>

