<?php
function user_login() {
    $user_name=$_POST['user_name'];
    $user_pw=$_POST['user_pw'];
    $data_path=str_replace('function\user_login.php', '', __FILE__, $i);
    $tmp="\\";
    if ($i==0) {
        $data_path=str_replace('function/user_login.php', '', __FILE__);
        $tmp='/';
    }
    if (!file_exists("{$data_path}data{$tmp}{$user_name}.json")) die('0');
    $pre_data=file_get_contents("{$data_path}data{$tmp}{$user_name}.json");
    $demo=json_decode($pre_data);
    // echo var_dump($demo);
    // $pw=$demo->PlayerDatas[0]->password;
    // echo $pw;
    if (!password_verify($user_pw, $demo->PlayerDatas[0]->password)) die('1');
    else die('2');
}

/* login return status 
0 user not found
1 password wrong
2 login successful
*/