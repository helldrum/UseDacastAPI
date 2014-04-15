<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$prod = 0;
$pre = '';
if ($prod == 1) {
    $pre = './';
}

include_once ($pre . "globalfunction.php");

//you need to set here your own APIKEy and BID
define('BID', '26708');
define('API_KEY', '7c70028b237d85cda0cc');


try {


    //trigger BID is not numeric Exception
    //$userSettings = new UserApiSettings('dgcfh', API_KEY);
    $userSettings = new UserApiSettings(BID, API_KEY);


    $live = new Live;
    $liveDao = new DAOLive($userSettings, $live);

    //live doesn't exist
    //echo $liveDao->deleteById('12');
    ////live not numeric get a Fatal Error  live_id not numeric
    //$liveDao->deleteById('12EER');
    //delete live 42971
    //  echo $liveDao->deleteLiveById('42971');
    // get live 42971
    //exception live id is not numeric
    //echo $liveDao->getLiveById("ergjn");
    //exception use getAllLiveInstead
    //echo $liveDao->getLiveById(0);
    //get and display live 42971
    // $liveDao->getLiveById('42971');
    // var_dump($liveDao->getCurrentLive());
    // var_dump($liveDao->getAllLive());
    //create new default live
    //var_dump($liveDao->createNewLive($live));
    //init new live 
    //var_dump($customLive);
    //$custom_live = new Live(42, 'live generate by the API plop', 'this is my live channel description', 'custom data i can put everything on it 34564758%*&*^)*9', '0');
    //$result = $liveDao->createNewLive($custom_live);
    //var_dump($result);
    //TODO not finish due to currency bug
    //$rate= new Rate(0, "payperview", 1.00, "USD", 2, "min");
    //$liveDao->createRateById(12066, $rate);
    //get rate 12074 of channel 33482
    // $liveDao->getRatebyId(33482, 12074);
    // $rate12074Live33482 = $liveDao->get_currentObjet()->get_currentRate();
    //var_dump($rate12074Live33482);

    $tabAllLive = $liveDao->get_all();
    
    foreach ($tabAllLive as $live ){
        echo $live;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>



<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>

    </body>
</html>
