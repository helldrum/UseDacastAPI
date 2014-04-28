<?php

function autoload($class) {
    $file = sprintf($pre . 'Class/DAO/%s.php', $class);
    if (is_file($file)) {
        require_once $file;
        return;
    }
    $file = sprintf($pre . 'Class/%s.php', $class);
    if (is_file($file)) {
        require_once $file;
        return;
    }
}

spl_autoload_register('autoload');

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
