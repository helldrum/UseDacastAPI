<?php
include_once ($pre . "globalfunction.php");

function validateDeleteForm() {

    if (isset($_POST["bid"])) {
        if (is_numeric($_POST["bid"])) {
            if (isset($_POST["apikey"])) {
                if (isset($_POST["live_id"])) {
                    if ($_POST["live_id"] != 0) {
                        unset($clean);
                        cleanformVariables($clean);
                        unset($_POST);
                        $message = setDeleteLive($clean);
                        if(isset($message)){
                            return $message;
                            
                        }
                    } else {
                        return "live id can't be 0.";
                    }
                } else {
                    return "live id is Missing";
                }
            } else {
                return "API key is Missing .";
            }
        } else {
            return "Broadcaster id is not numeric.";
        }
    } else {
        return "Broadcaster id is missing";
    }
}

function setDeleteLive(&$clean) {
    $userSetting = new UserApiSettings($clean["bid"], $clean["apikey"]);
    $live = new Live();
    $liveDao = new DAOLive($userSetting, $live);
    $message = $liveDao->deleteById($clean["live_id"]);
    return $message;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>

            <form action = "" method = "POST">
                <p>broadcaster id: <input type = "text" name = "bid" value = "26708"> <p>
                <p>apikey: <input type = "text" name = "apikey" value = "7c70028b237d85cda0cc"> <p>
                <p>live_id(can't be 0): <input type = "text" name = "live_id"> <p>
                <p><input type="submit" value="Submit"></p>
            </form>
            <p class="DisplayMessage"><?php echo validateDeleteForm(); ?></p>
        </div>
    </body>
</html>             