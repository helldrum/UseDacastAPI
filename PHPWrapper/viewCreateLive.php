<?php
include_once ($pre . "globalfunction.php");
include ($pre . "autoload.php");

function validatePostLiveForm() {

    if (isset($_POST["SubmitLive"])) {
        if (isset($_POST["bid"])) {
            if (is_numeric($_POST["bid"])) {
                if (isset($_POST["apikey"])) {
                    if ($_POST["live_id"] != '') {
                        if (is_numeric($_POST["live_id"])) {
                            if ($_POST["title"] != "") {
                                if ($_POST["description"] != "") {
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
                                    return "Field description is missing.";
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
    $createLive->setDescription($clean["description"]);
    $createLive->setOnline($clean["online"]);
    $createLive->setStream_type($clean["stream_type"]);
    $createLive->setStream_category($clean["stream_category"]);
    $createLive->setPublish_on_dacast($clean["publish_on_dacast"]);
    $createLive->setExternal_video_page($clean["external_video_page"]);

//Optional Fields

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
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    </head>
    <body>

        <script>
            //jquery form validation    
            $(document).ready(function() {
                $("#formCreatelive").validate({
                    rules: {
                        live_id: {
                            minlength: 1,
                            maxlength: 6,
                            required: true
                        },
                        title: {
                            minlength: 3,
                            maxlength: 30,
                            required: true
                        },
                        description: {
                            minlength: 3,
                            maxlength: 50,
                            required: true
                        },
                        online: {
                            minlength: 1,
                            maxlength: 1,
                            required: true
                        },
                        stream_type: {
                            minlength: 1,
                            maxlength: 1,
                            required: true
                        },
                        stream_category: {
                            minlength: 1,
                            maxlength: 1,
                            required: true
                        },
                        publish_on_dacast: {
                            minlength: 1,
                            maxlength: 1,
                            required: true
                        },
                        external_video_page: {
                            minlength: 1,
                            maxlength: 500,
                            required: false
                        },
                        autoplay: {
                            minlength: 1,
                            maxlength: 1,
                            required: false

                        },
                        activateChat: {
                            minlength: 1,
                            maxlength: 1,
                            required: false

                        },
                        player_width: {
                            minlength: 3,
                            maxlength: 4,
                            required: false

                        },
                        player_height: {
                            minlength: 3,
                            maxlength: 4,
                            required: false

                        },
                        countries_id: {
                            minlength: 1,
                            maxlength: 6,
                            required: false

                        },
                        referers_id_id: {
                            minlength: 1,
                            maxlength: 6,
                            required: false

                        },
                        backupUrl: {
                            minlength: 1,
                            maxlength: 1000,
                            required: false

                        },
                        customData: {
                            minlength: 1,
                            maxlength: 5000,
                            required: false
                        }
                    },
                    highlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                    }
                });

                $("#formCreateRate").validate({
                    rules: {
                        live_id: {
                            minlength: 1,
                            maxlength: 6,
                            required: true
                        },
                        rate_id: {
                            minlength: 1,
                            maxlength: 6,
                            required: true
                        },
                        type: {
                            minlength: 1,
                            maxlength: 15,
                            required: true
                        },
                        price: {
                            minlength: 1,
                            maxlength: 6,
                            required: true
                        },
                        currency: {
                            minlength: 1,
                            maxlength: 4,
                            required: true
                        },
                        time_quantity: {
                            minlength: 1,
                            maxlength: 6,
                            required: true

                        }
                    },
                    highlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                    }
                });
            });
        </script>
        <!-- Create live form-->
        <div class="container sizeTwoForm">
            <div class="formCreate  left">
                <h2>Live Creation</h2>
                <form id= "formCreatelive" value="formCreateLive" action="" method="POST" class="form-horizontal">
                    <div class="form-group"><label>broadcaster id:</label> <input   class="form-control" type="number" name="bid" value="26708"> </div>
                    <div class="form-group"><label>apikey:</label> <input  class="form-control" type="text" name="apikey" value="7c70028b237d85cda0cc"> </div>
                    <div class="form-group"><label>live_id(0 if new): </label><input class="form-control" type="number" value="0" name="live_id"> </div>             
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
                    <div class="form-group "><button class="btn btn-primary" type="button submit" name="SubmitLive">Submit</button></div>
                </form>

                <?php
                $message = validatePostLiveForm();

                if ($message instanceof Live) {
                    echo "<pre>" . $message . "</pre>";
                } else {
                    echo "<p class='bg-danger'>$message</p>";
                }
                ?>
            </div>
            <!--Rate Form-->            
            <div class="right formCreate">
                <h2>Rate creation</h2>
                <form id= "formCreateRate" value="formCreateRate" action="" method="POST" class="form-horizontal">
                    <div class="form-group"><label>broadcaster id:</label> <input   class="form-control" type="text" name="bid" value="26708"> </div>
                    <div class="form-group"><label>apikey:</label> <input  class="form-control" type="text" name="apikey" value="7c70028b237d85cda0cc"></div>
                    <div class="form-group"><label>live_id(can't be set to 0): </label><input class="form-control" type="text" name="live_id"></div>  
                    <div class="form-group "><label>rate_id: </label><input class="form-control" type="text" value="0" name="rate_id"> </div>

                    <div class="form-group"><label>type: </label>
                        <select class="form-control" name="type">
                            <option value="payperview" selected="true" >payperview</option>
                            <option value="subscription">subscription</option>
                        </select>
                    </div>

                    <div class="form-group "><label>price: </label><input class="form-control" type="number" name="price"> </div>

                    <div class="form-group"><label>currency: </label>
                        <select class="form-control" name="currency">
                            <option value="USD" selected="true" >US Dollar</option>
                            <option value="EUR">Euro</option>
                        </select>
                    </div>
                    <div class="form-group "><label>time_quantity: </label><input class="form-control" type="number" name="time_quantity"> </div>
                    <div class="form-group"><label>time_unit: </label>
                        <select class="form-control" name="time_unit">
                            <option value="min" selected="true">minute</option>
                            <option value="hour">hour</option>
                            <option value="day">day</option>
                            <option value="weekly">weekly</option>
                            <option value="monthly">monthly</option>
                            <option value="quarterly">quarterly</option>
                            <option value="biannual">biannual</option>
                        </select>
                    </div>
                    <div class="form-group"><button class="btn btn-primary" type="button submit" value="SubmitRate">Submit</button></div>
                </form>
            </div>
        </div>
    </body>
</html>