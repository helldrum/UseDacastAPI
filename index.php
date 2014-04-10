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
include_once ($pre . "Class/DAO/APICall.php");
include_once ($pre . "Class/DAO/DAOLive.php");
include_once ($pre . "Class/DAO/UserApiSettings.php");
include_once ($pre . "Class/Live.php");


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
    // echo $liveDao->deleteLiveById('12');
    ////live not numeric get a Fatal Error  live_id not numeric
    //$liveDao->deleteLiveById('12EER');
    //delete live 42971
    //  echo $liveDao->deleteLiveById('42971');
    // get live 42971
    
    //exception live id is not numeric
    //echo $liveDao->getLiveById("ergjn");
    
    //exception use getAllLiveInstead
    //echo $liveDao->getLiveById(0);
    
    //get and display live 42971
    $liveDao->getLiveById('42971');
    var_dump($liveDao->getCurrentLive());
    
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
