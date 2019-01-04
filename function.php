<?php
#init the var
function my_filter($var, $type = "int") {
    switch ($type) {
        case 'string':
            $var = isset($var) ? filter_var($var, FILTER_SANITIZE_MAGIC_QUOTES) : '';
            break;
        case 'url':
            $var = isset($var) ? filter_var($var, FILTER_SANITIZE_URL) : '';
            break;
        case 'email':
            $var = isset($var) ? filter_var($var, FILTER_SANITIZE_EMAIL) : '';
            break;
        case 'int':
        default:
            $var = isset($var) ? filter_var($var, FILTER_SANITIZE_NUMBER_INT) : '';
            break;
    }

    return $var;
}

#require all the php file in the path
function require_folder($dir) {
    foreach (scandir($dir) as $file) {
        if ($file != '.' && $file != '..') {
            require_once $dir . '/' . $file;
        }
    }
}

#error log
function err_log($text) {
    $handle = fopen('error_log.txt', 'a');
    $txt = '[ ' . date("Y-m-d H:i:s") . ' ] ' . $text . "\n";
    fwrite($handle, $txt);
    fclose($handle);
}