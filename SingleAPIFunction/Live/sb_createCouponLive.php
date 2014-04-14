<?php

define("APIKEY", "7c70028b237d85cda0cc");
define("URL", "https://www.dacast.com/backend/api/live");
define("BID", "26708");

main();

function main() {

    $live_id = '35929';
    $coupon_id = '0';

    $json = json_encode(array(
        'coupon' => array(
            'id' => $live_id,
            'code' => '124',
            'type' => array('discount-percent'),
            'value' => '20',
            'currency' => NULL,
            'max' => '20'
        )
            ), JSON_FORCE_OBJECT);

    echo var_dump($json);


    $json = json_encode($json);

    $data = curlWrap("/" . $live_id . "/coupon/" . $coupon_id . "?bid=" . BID . "&apikey=" . APIKEY, $json, "POST");

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

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-Length: ' . strlen($json)));
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);


     echo var_dump(curl_getinfo($ch)) . "<br>";

    curl_close($ch);

    $decoded = json_decode($output);
    return $decoded;
}
?>

