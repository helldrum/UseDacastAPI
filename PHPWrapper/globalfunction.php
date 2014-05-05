<?php


function unsetIfEmpty() {
    foreach (array_keys($_POST) as $key) {
        if ($_POST[$key] == "") {
            unset($_POST[$key]);
        }
    }
}

function cleanformVariables(&$clean) {
    foreach (array_keys($_POST) as $key) {
        $clean[$key] = mysql_real_escape_string($_POST[$key]);
    }
}

?>
