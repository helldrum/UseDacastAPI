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
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
            <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <link rel="stylesheet" href="./css/style.css">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        </head>
        <body>
            <div class="container">
                <h1 class="container displayInfo"> <?php echo $live43364->getTitle(); ?></h1>

                <div class="container player" style="height:<?php echo $live43364->getPlayer_height(); ?>px; width:<?php echo $live43364->getPlayer_width(); ?>px; " >
                    <?php echo $playerLive43364; ?>
                </div>
                <div class="container displayInfo">
                    <ul>

                        <li> <h2>Description:</h2> <p><?php echo $live43364->getDescription(); ?></p></li>
                        <div class="withButton">
                            <li><strong>Online: </strong><?php echo getButton($live43364->getOnline()); ?></li> 
                            <li><strong>AutoPlay: </strong><?php echo getButton($live43364->getAutoplay()); ?></li>
                            <li><strong>Enable ADS: </strong><?php echo getButton($live43364->getEnable_ads()); ?></li>
                            <li><strong>Enable subscription: </strong><?php echo getButton($live43364->getEnable_subscription()); ?></li>
                            <li><strong>Enable PayPerView: </strong><?php echo getButton($live43364->getEnable_payperview()); ?></li>
                            <li><strong>Enable Coupon: </strong><?php echo getButton($live43364->getEnable_coupon()); ?></il>
                            <li><strong>Is Private: </strong><?php echo getButton($live43364->getIs_private()); ?></li>
                            <li><strong>Publish on dacast: </strong><?php echo getButton($live43364->getPublish_on_dacast()); ?></li>
                        </div>
                        <?php
                        if (!$live43364->getPublish_on_dacast()) {
                            echo "<li> <strong>External video page : </strong>" . $live43364->getExternal_video_page() . "<li>";
                        }
                        ?>

                        <li><strong>BandWidth : </strong><?php echo $live43364->getBandWidth(); ?></li>
                        <li><strong>Creation Date : </strong><?php echo $live43364->getCreationDate(); ?></li>
                        <li><strong>Save Date : </strong><?php echo $live43364->getSaveDate(); ?></li>
                    </ul>
                </div>
                <div class="container displayInfo">
                    <h2>Embed js player code</h2>
                    <div><code><?php echo $liveEmbedCode43364; ?></code></div>

                    <h2>Embed IFrame player code</h2>
                    <div><code><?php echo $liveFrameEmbedCode43364; ?></code></div>

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
