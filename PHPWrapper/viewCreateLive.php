<?php
include_once ($pre . "globalfunction.php");

function validatePostLiveForm() {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["bid"])) {
            if (is_numeric($_POST["bid"])) {
                if (isset($_POST["apikey"])) {
                    if (isset($_POST["live_id"])) {
                        if (is_numeric($_POST["live_id"])) {
                            if (isset($_POST["title"])) {
                                if (isset($_POST["online"])) {
                                    if (is_numeric($_POST["online"])) {
                                        if (isset($_POST["stream_type"])) {
                                            if ($_POST["stream_type"] == 3 || $_POST["stream_type"] == 1) {
                                                if (isset($_POST["stream_category"])) {
                                                    if (is_numeric($_POST["stream_category"])) {
                                                        if (isset($_POST["publish_on_dacast"])) {
                                                            if (is_numeric($_POST["publish_on_dacast"])) {
                                                                if ($_POST["publish_on_dacast"] == 0) {
                                                                    if (!isset($_POST["external_video_page"])) {
                                                                        return "Field external_video_page is missing.";
                                                                    }
                                                                }

                                                                unset($clean);
                                                                cleanformVariables($clean);
                                                                unset($_POST);
                                                                $error = setPostLive($clean);

                                                                if ($error) {
                                                                    return $error;
                                                                }
                                                            } else {
                                                                return "Field publish_on_dacast id not numeric .";
                                                            }
                                                        } else {
                                                            return "Field publish_on_dacast id missing .";
                                                        }
                                                    } else {
                                                        return "Field stream_category is not numeric .";
                                                    }
                                                }
                                            } else {

                                                return "Incorrect value for field stream_type .";
                                            }
                                        } else {

                                            return "Field stream_type is missing.";
                                        }
                                    } else {

                                        return "Field Online is not numeric.";
                                    }
                                } else {

                                    return "Field Online is missing.";
                                }
                            } else {
                                return "Field Title is missing.";
                            }
                        } else {
                            return "Field live_id is not numeric.";
                        }
                    } else {
                        return "Field live_id is missing.";
                    }
                } else {

                    return "Field ApiKey is missing";
                }
            } else {

                return "Broadcaster Id is not numeric.";
            }
        } else {

            return "Field Broadcaster Id missing.";
        }
    }
}

function setPostLive($clean) {

    $userSetting = new UserApiSettings($clean["bid"], $clean["apikey"]);
    $createLive = new Live();

    $createLive->setLiveId($clean["live_id"]);
    $createLive->setTitle($clean["title"]);
    $createLive->setOnline($clean["online"]);
    $createLive->setDescription($clean["Description"]);
    $createLive->setStream_type($clean["stream_type"]);
    $createLive->setStream_category($clean["stream_category"]);
    $createLive->setPublish_on_dacast($clean["publish_on_dacast"]);
    $createLive->setExternal_video_page($clean["external_video_page"]);

//Optional Fields
    $createLive->setDescription($clean["description"]);
    $createLive->setAutoplay($clean["autoplay"]);
    $createLive->setActivateChat($clean["activateChat"]);
    $createLive->setPlayer_width($clean["player_width"]);
    $createLive->setPlayer_height($clean["player_height"]);
    $createLive->setCountries_id($clean["countries_id"]);
    $createLive->setReferers_id($clean["referers_id"]);
    $createLive->setBackup_url($clean["backupUrl"]);
    $createLive->setCustom_data($clean["customData"]);

    $liveDao = new DAOLive($userSetting, new Live());
    $fonctionreturn = $liveDao->create($createLive);

    return $fonctionreturn;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="./css/bootstrap.min.css"> 
        <link rel="stylesheet" href="./css/bootstrap-theme.min.css"> 
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="formCreate container">

            <form value="formCreateLive" action="" method="POST">
                <div class="form-group"><label>broadcaster id:</label> <input class="form-control" type="text" name="bid" value="26708"> </div>
                <div class="form-group"><label>apikey:</label> <input class="form-control" type="text" name="apikey" value="7c70028b237d85cda0cc"> </div>
                <div class="form-group"><label>live_id(0 if new): </label><input class="form-control" type="text" value="0" name="live_id"> </div>             
                <div class="form-group"><label>title: </label><input class="form-control" type="text" name="title"> </div>
                <div class="form-group"><label>description: </label><input class="form-control" type="text" name="description"> </div>
                <div class="form-group"><label>custom data: </label><input class="form-control" type="text" name="customData"> </div>
                <div class="form-group"><label>Online: </label><select class="form-control" type="bool" name="online">
                        <option  value="0" selected="true">Channel Offline</option>
                        <option  value="1">Channel Online</option>
                    </select> 
                </div>
                <div class="form-group"><label>stream_type</label>
                    <select class="form-control" name="stream_type">
                        <option value="1"selected="true">video Live</option>
                        <option value="3">radio Live</option>
                    </select> 
                </div>
                <div class="form-group"><label>backup URL: </label><input class="form-control" type="text" name="backupUrl"> </div>
                <div class="form-group"><label>stream category: </label>
                    <select class="form-control" name="stream_category">
                        <option value="1">Animals</option>
                        <option value="2">Comedy</option>
                        <option value="3">Education</option>
                        <option value="4">Entertainement</option>
                        <option value="5">Film</option>
                        <option value="6">Gaming</option>
                        <option value="7">Life</option>
                        <option value="8">Music</option>
                        <option value="9">News</option>
                        <option value="10">People</option>
                        <option value="11">Politics</option>
                        <option value="13">Sports</option>
                        <option value="14">Technology</option>
                        <option value="15">Travel</option>
                        <option value="16">Shows</option>
                        <option value="17">Events</option>
                        <option value="19">Faith</option>
                        <option value="20"selected="true">Default</option>
                    </select> 
                </div>
                <div class="form-group"><label>activateChat: </label>
                    <select class="form-control" name="activateChat">
                        <option value="1">Enable</option>
                        <option value="0" selected="true" >Disable</option>
                    </select> </div>
                <div class="form-group"><label>autoplay: </label>
                    <select class="form-control" name="autoplay">
                        <option value="1">Enable</option>
                        <option value="0"  selected="true" >Disable</option>
                    </select>
                </div>
                <div class="form-group"><label>publish on dacast: </label>
                    <select class="form-control"  name="publish_on_dacast">
                        <option value="1" selected="true">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </div>
                <div class="form-group "><label>external video page: </label><input class="form-control" type="text" name="external_video_page"> </div>
                <div class="form-group "><label>player_width: </label><input class="form-control" type="number" name="player_width"> </div>
                <div class="form-group "><label>player_height: </label><input class="form-control" type="number" name="player_height"> </div>
                <div class="form-group "><label>countries_id: </label><input class="form-control" type="number" name="countries_id"> </div>
                <div class="form-group "><label>referers_id: </label><input class="form-control" input type="number" name="referers_id"> </div>
                <div class="form-group "><input type="submit" value="Submit"></div>
            </form>

            <?php
            $message = validatePostLiveForm();

            if ($message instanceof Live) {
                echo $message;
            } else {

                echo "<p class='bg-danger'>$message</p>";
            }
            ?>
        </div>
    </body>
</html>