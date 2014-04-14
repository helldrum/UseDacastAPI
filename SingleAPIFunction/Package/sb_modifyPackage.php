<?php

define("APIKEY", "7c70028b237d85cda0cc");
define("URL", "https://www.dacast.com/backend/api/package");
define("BID", "26708");


main();

function main() {

    $package_id = '34047';

    $json = json_encode(array(
        'package' => array(
            'id' => (string) $live_id,
            'title' => (string) 'package',
            'description' => (string) 'modify package',
            'online' => (string) '0',
            'stream_category' => (string) '20',
            'publish_on_dacast' => (string) '1'
        )
            ), JSON_FORCE_OBJECT);

    echo var_dump($json) . "<br>";


    $data = curlWrap("/" . $package_id . "?bid=" . BID . "&apikey=" . APIKEY, $json, "POST");

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
    curl_setopt($ch, CURLOPT_URL, URL . $url);
    curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

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

    $headers = array(
        'Content-type: application/json',
        'Pragma: no-cache',
        'Server: nginx',
        'X-Powered-By: PHP/5.5.5-1+debphp.org~precise+2',
        'Content-Length: ' . sizeof($json),
        'Connection: keep-alive'
    );
    
    curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);


    echo "<br>" . var_dump(curl_getinfo($ch)) . "<br>" .var_dump(curl_error($ch));

    curl_close($ch);

    $decoded = json_decode($output);
    return $decoded;
}
?>

