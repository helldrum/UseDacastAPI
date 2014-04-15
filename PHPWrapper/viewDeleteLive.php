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
            </form>
        </div>
    </body>
</html>   


<?php

function validateDeleteForm() {

    if (isset($_POST["bid"])) {
        if (is_numeric($_POST["bid"])) {
            if (isset($_POST["apikey"])) {
                if (isset($_POST["live_id"])) {
                    if ($_POST["live_id"] != 0) {
                        unset($clean);
                        cleanformVariables($clean);
                        unset($_POST);
                        $error = setDeleteLive($clean, $createLive, $userSetting);
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

setDeleteLive($clean, $createLive, $userSetting);
?>
                    