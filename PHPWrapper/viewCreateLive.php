<?php
include_once ($pre . "globalfunction.php");

function validatePostLiveForm() {
    unsetIsEmpty();
    if (isset($_POST)) {
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
                                                                $error = validateOptionalField();
                                                                if ($error) {
                                                                    return $error;
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

function validateOptionalField() {

    if (isset($_POST["autoplay"])) {
        if (!is_bool($_POST["autoplay"])) {
            return "Field Autoplay is not boolean.";
        }
    }
    if (isset($_POST["activateChat"])) {
        if (!is_bool($_POST["activateChat"])) {
            return "Field activateChat not boolean.";
        }
    }

    if (isset($_POST["player_width"])) {
        if (!is_numeric($_POST["player_width"])) {
            return "Field player_width is not numeric.";
        }
    }
    if (isset($_POST["player_height"])) {
        if (!is_numeric($_POST["player_height"])) {
            return "Field player_height is not numeric.";
        }
    }
    if (isset($_POST["countries_id"])) {
        if (!is_numeric($_POST["countries_id"])) {
            return "Field countries_id is not numeric.";
        }
    }
    if (isset($_POST["referers_id"])) {
        if (!is_numeric($_POST["referers_id"])) {
            return "Field referers_id is not numeric.";
        }
    }
}

function setPostLive($clean, &$createLive) {

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
    $error = $liveDao->create($createLive);
    if (!$error) {
        return "live creation success !";
    }
    return $error;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>

            <form action="" method="POST">
                <p>broadcaster id: <input type="text" name="bid" value="26708"> <p>
                <p>apikey: <input type="text" name="apikey" value="7c70028b237d85cda0cc"> <p>
                <p>live_id(0 if new): <input type="text" value="0" name="live_id"> <p>             
                <p>title: <input type="text" name="title"> <p>
                <p>description: <input type="text" name="description"> <p>
                <p>custom data: <input type="text" name="customData"> <p>
                <p>Online: <select type="bool" name="online">
                        <option value="0" selected="true">Channel Offline</option>
                        <option value="1">Channel Online</option>
                    </select> 
                <p>stream_type
                    <select name="stream_type">
                        <option value="1"selected="true">video Live</option>
                        <option value="3">radio Live</option>
                    </select> 
                <p>
                <p>backup URL: <input type="text" name="backupUrl"> <p>
                <p>stream category: <select name="stream_category">
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
                <p>activateChat: <select>
                        <option value="1" name="activateChat" >Enable</option>
                        <option value="0" name="activateChat" selected="true" >Disable</option>
                    </select> <p>
                <p>autoplay: <select>
                        <option value="1" name="autoplay" >Enable</option>
                        <option value="0" name="autoplay" selected="true" >Disable</option>
                    </select>
                <p>publish on dacast: <select name="publish_on_dacast">
                        <option value="1" selected="true">Enable</option>
                        <option value="0">Disable (require to set external video page)</option>
                    </select>
                <p>external video page: <input type="text" name="external_video_page"> <p>
                <p>player_width: <input type="number" name="player_width"> <p>
                <p>player_height: <input type="number" name="player_height"> <p>
                <p>countries_id: <input type="number" name="countries_id"> <p>
                <p>referers_id: <input type="number" name="referers_id"> <p>
                <p><input type="submit" value="Submit"></p>
                <p class="DisplayMessage"><?php echo print_r($message); ?></p>


            </form>
        </div>
    </body>
</html>