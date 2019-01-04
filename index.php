<?php
require_once 'function.php';
require_folder('./function');
$op = isset($_REQUEST['op']) ? my_filter($_REQUEST['op'], "string") : '';

switch ($op) {

    case 'user_register':
        user_register();
        break;

    case 'user_login':
        user_login();
        break;

    case 'get_data':
        get_data();
        break;

    case 'modify_data':
        modify_data();
        break;
}