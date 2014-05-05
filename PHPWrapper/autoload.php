<?php

function autoload($class) {
    $file = sprintf('Class/DAO/%s.php', $class);
    if (is_file($file)) {
        require_once $file;
        return;
    }
    $file = sprintf('Class/%s.php', $class);
    if (is_file($file)) {
        require_once $file;
        return;
    }
}

spl_autoload_register('autoload');

?>