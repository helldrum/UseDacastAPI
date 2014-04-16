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

//    $userSettings = new UserApiSettings('dgcfh', API_KEY);
    //trigger BID is not numeric Exception
    $userSettings = new UserApiSettings(BID, API_KEY);

    $live = new Live;
    $liveDao = new DAOLive($userSettings, $live);

    //live doesn't exist
//   echo $liveDao->deleteById('12');
 
//    $liveDao->deleteById('12EER');
    //return  live_id is not numeric
    
    //delete live 42971
//    echo $liveDao->deleteById('42971');
    //return Element #42971 of type live has been deleted 
   
   // get live 42971
//    echo $liveDao->getById("ergjn");
    //exception live id is not numeric
    
//    echo $liveDao->getById(0);
    //exception  live_id = 0 use the function getAllLive instead
    
    //get and display live 42971
//    echo $liveDao->getById('42971');

    //get and display all live 
//    $tabAllLive = $liveDao->get_all();
//     foreach ($tabAllLive as $live) {
//         echo $live."<br>";
//     }
     
  
    //create new default live
//    echo $liveDao->create(new Live());
    
    //try to create a live with a rate in parameter instead of Live
//    echo $liveDao->create(new Rate());
    //return live parameter is not a live object
    
    //init new live 
//  $custom_live = new Live(42, 'live generate by the API', 'this is my live channel description', 'custom data i can put everything on it 34564758%*&*^)*9', '0');
    
//   echo  $liveDao->create($custom_live);
    
    //$rate= new Rate(0, "payperview", 1.00, "USD", 2, "min");
//    $liveDao->createRateById(12066, $rate);
    //return pending function due to currency issues 
    
    
    //get rate 12074 of channel 33482
//    echo $liveDao->getRatebyId(33482, 12074);
    //return rate 12074 of the live 33482

    //get rate 12075 from live 348083 this live doesn't exit
//    echo $liveDao->getRatebyId(348083, 12075);
    //return Error : SQLSTATE[HY093]: Invalid parameter number: no parameters were bound 
    
    //invalid live_id 
//     echo $liveDao->getRatebyId("348083ee", 12075);
    // return live_id is not numeric
    
    //invalid live_id 
//     echo $liveDao->getRatebyId(0, 12075);
     //live_id can't be set to 0
   
//    echo $liveDao->getRatebyId(33482, 0);
    //rate_id = 0 use the function getAllRate instead.
    
//    echo $liveDao->getRatebyId(33482, "ttbrth");
    // rate_id is not numeric
    
//    echo $liveDao->deleteRateById(34808, 12075);
    //Element #34808 of type live has been deleted 

//    $tabAllRate = $liveDao->getAllRatebyId(34808);
//   
//    foreach ($tabAllRate as $rate ) {
//        echo $rate."<br>" ;
//    }
    
//   echo $liveDao->getCouponbyId(35717, 13782);
   
   echo $liveDao->deleteCouponbyId(35717, 13782);
    
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>

    </body>
</html>
