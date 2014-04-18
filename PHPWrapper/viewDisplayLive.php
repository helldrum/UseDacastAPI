<!--
Sample View use to show how to use the DaCast API Object Wrapper and display live information
-->


<?php
$prod = 0;
$pre = '';
if ($prod == 1) {
    $pre = './';
}

include ($pre . "globalfunction.php");

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

<!DOCTYPE html>
<html lang="en">
    <html>
        <head>
            <title>Display live</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width">
            <link rel="stylesheet" href="./css/bootstrap.min.css">
            <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
            <link rel="stylesheet" href="./css/style.css">
            <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> 
        </head>
        <body>
            <script>
                jQuery(function($) {
                    $('span').popover({
                        trigger: 'hover focus'
                    });

                    $('div').popover({
                        trigger: 'hover focus'
                    });
                });

            </script>

            <div class="container">
                <img src="http://www.dacast.com/images/logo_blue.png" alt="dacast logo">
                <h1 class="container displayInfo"><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getTitle() function"> <?php echo $live43364->getTitle(); ?></span></h1>
                <div data-container="body" data-toggle="popover" data-placement="right" data-content="html_entity_decode( $liveDao->getEmbedCode( '{YourLiveID}','js'))" class="container player" style="height:<?php echo $live43364->getPlayer_height(); ?>px; width:<?php echo $live43364->getPlayer_width(); ?>px; " >
                    <?php echo $playerLive43364; ?>
                    </span>
                </div>
                <div class=" container displayInfo"  ><pre class='text-info'>The div container can be dynamicly resize if you get the height and width of the player with the function $live->getPlayer_height() and $live->getPlayer_width()</pre></div>

                <div class="container displayInfo" >
                    
                    <span data-container="pre" data-toggle="popover" data-placement="right" data-content="$live->getDescription() function"><h2>Description:</h2><pre><?php echo $live43364->getDescription(); ?></pre></span>

                    <ul>

                        <div class="withButton">
                            <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getOnline() function"><strong>Online: </strong><?php echo getButton($live43364->getOnline()); ?></span></li> 
                            <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getAutoplay() function"><strong>AutoPlay: </strong><?php echo getButton($live43364->getAutoplay()); ?></span></li>
                            <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getEnable_ads() function"><strong>Enable ADS: </strong><?php echo getButton($live43364->getEnable_ads()); ?></span></li>
                            <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getEnable_subscription() function"><strong>Enable subscription: </strong><?php echo getButton($live43364->getEnable_subscription()); ?></span></li>
                            <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getEnable_payperview() function"><strong>Enable PayPerView: </strong><?php echo getButton($live43364->getEnable_payperview()); ?></span></li>
                            <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getEnable_coupon() function"><strong>Enable Coupon: </strong><?php echo getButton($live43364->getEnable_coupon()); ?></span></il>
                            <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getIs_private() function"><strong>Is Private: </strong><?php echo getButton($live43364->getIs_private()); ?></span></li>
                            <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getPublish_on_dacast() function"><strong>Publish on dacast: </strong><?php echo getButton($live43364->getPublish_on_dacast()); ?></span></li>
                        </div>
                        <?php
                        if (!$live43364->getPublish_on_dacast()) {
                            echo '<li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getExternal_video_page() function"> <strong>External video page : </strong>' . $live43364->getExternal_video_page() . "<li></span>";
                        }
                        ?>

                        <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getBandWidth() function"><strong>BandWidth: </strong><?php echo $live43364->getBandWidth(); ?></span></li>
                        <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getCreationDate() function"><strong>Creation Date: </strong><?php echo $live43364->getCreationDate(); ?></span></li>
                        <li><span data-container="body" data-toggle="popover" data-placement="right" data-content="$live->getSaveDate() function"><strong>Save Date: </strong><?php echo $live43364->getSaveDate(); ?></span></li>
                    </ul>
                </div>
                <div class="container displayInfo">
                    <h2>Embed js player code</h2>
                    <div><span data-container="body" data-toggle="popover" data-placement="right" data-content="$liveDao->getEmbedCode( '{YourLiveID}', 'js') function"><pre><?php echo $liveEmbedCode43364; ?></pre></span></div>

                    <h2>Embed IFrame player code</h2>
                    <div><span data-container="body" data-toggle="popover" data-placement="right" data-content="$liveDao->getEmbedCode( '{YourLiveID}', 'frame') function"><pre><?php echo $liveFrameEmbedCode43364; ?></pre></span></div>

                </div>
            </div>
        </body>
    </html>


    <?php

    function getButton($value) {
        $button = null;
        if ($value == 1) {
            $button = '<button type="button" class="btn btn-xs btn-success">On</button>';
        } else {
            $button = '<button type="button" class="btn btn-xs btn-danger">Off</button>';
        }
        return $button;
    }
    ?>
