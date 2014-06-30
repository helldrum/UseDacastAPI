<?php

  define("APIKEY", "MyAPIKey");
  define("URL", "https://www.dacast.com/backend/api/vod");
  define("BID", "MyBID");
 
main();

function main() {
    $VOD_id = 0;

    $data = curlWrap("/" . $VOD_id . "?bid=" . BID . "&apikey=" . APIKEY, null, "GET") or die("<p>can return the data !<p>");

    if (isset($data)) {
        if (isset($data->error)) {
            echo $data->error->message;
        } else {

            foreach ($data->vod as $singleVOD) {
   
                echo 'id : ' . $singleVOD->id . '<br>';
                echo 'title : ' . $singleVOD->title . '<br>';
                echo 'description : ' . $singleVOD->description . '<br>';
                echo 'online : ' . $singleVOD->online . '<br>';
                echo 'filename : ' . $singleVOD->filename . '<br>';
                echo 'upload_url : ' . $singleVOD->upload_url . '<br>';
            }
        }
    } else {

        echo "<p>data are null<p>";
    }
}

function curlWrap($url, $json, $action) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_URL, URL . $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
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
    if ($output === false) {
        echo 'Curl error: ' . curl_error($ch);
    }

    curl_close($ch);
    $decoded = json_decode($output);
    return $decoded;
}
?>

