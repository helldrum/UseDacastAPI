<!--
Sample View use to show how to use the DaCast API Object Wrapper and display live information
-->

<!DOCTYPE html>
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


define('BID', '26708');
define('API_KEY', '7c70028b237d85cda0cc');


try {


    $userSettings = new UserApiSettings(BID, API_KEY);
    $live = new Live;
    $liveDao = new DAOLive($userSettings, $live);
    $error = $liveDao->getById('43364');
    $live43364 = $liveDao->get_currentObjet();
    $liveEmbedCode43364 = $liveDao->getEmbedCode(43364, "js");
    $liveFrameEmbedCode43364 = $liveDao->getEmbedCode(43364, "frame");
    $playerLive43364 = html_entity_decode($liveEmbedCode43364);
} catch (Exception $e) {
    $e->getMessage();
}
?>

<html>
    <head>
        <title>Display live</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <h1> <?php echo $live43364->getTitle(); ?></h1>

        <div class="player" style="height:<?php echo$live43364->getPlayer_height(); ?>px; width:<?php echo $live43364->getPlayer_width(); ?>px; " >
            <?php echo $playerLive43364; ?>
        </div>
        <div class="displayLiveData">
            <p>Online: <?php echo$live43364->getOnline(); ?></p> 
            <p>Description: <?php echo $live43364->getDescription(); ?></p>
            <p>AutoPlay: <?php echo $live43364->getAutoplay(); ?></p>
            <p>Enable ADS: <?php echo $live43364->getEnable_ads(); ?></p>
            <p>Enable subscription: <?php echo $live43364->getEnable_subscription(); ?></p>
            <p>Enable PayPerView: <?php echo $live43364->getEnable_payperview(); ?></p>
            <p>Enable Coupon: <?php echo $live43364->getEnable_coupon(); ?></p>
            <p>Is Private: <?php echo $live43364->getIs_private(); ?></p>
            <p>Publish on dacast: <?php echo $live43364->getPublish_on_dacast(); ?></p>

            <?php
            if (!$live43364->getPublish_on_dacast()) {
                echo "<p> External video page : " . $live43364->getExternal_video_page();
            }
            ?>

            <p>BandWidth : <?php echo $live43364->getBandWidth(); ?></p>
            <p>Creation Date : <?php echo $live43364->getCreationDate(); ?></p>
            <p>Save Date : <?php echo $live43364->getSaveDate(); ?></p>
        </div>
        <div class="embedCode">
            <h2>Embed js player code</h2>
            <div><?php echo $liveEmbedCode43364; ?></div>

            <h2>Embed IFrame player code</h2>
            <div><?php echo $liveFrameEmbedCode43364; ?></div>

        </div>
    </body>
</html>


<?php 

function checkFormDataIntegrity(){
    
    
    
}

?>
