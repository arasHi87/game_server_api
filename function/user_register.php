<?php
function user_register() {
    $user_name=$_POST['user_name'];
    $user_pw=$_POST['user_pw'];
    $data_path=str_replace('function\user_register.php', '', __FILE__, $i);
    $tmp="\\";
    if ($i==0) {
        $data_path=str_replace('function/user_register.php', '', __FILE__);
        $tmp='/';
    }
    if ($user_name=='' || $user_pw=='') die('0');
    if (file_exists("{$data_path}data{$tmp}{$user_name}.json")) {
        die('1');
    } else {
        $pre_data=file_get_contents("{$data_path}GameData.json");
        // echo var_dump($pre_data);
        $demo=json_decode($pre_data);
        // echo var_dump($demo->PlayerDatas[0]->level);
        $data=$demo->PlayerDatas[0];
        $data->Name=$user_name;
        $data->password=password_hash($user_pw, PASSWORD_DEFAULT);
        $cmp_data=json_encode($demo);
        $file=fopen("{$data_path}data{$tmp}{$user_name}.json", 'w') or die('2');
        fwrite($file, $cmp_data);
        fclose($file);
        die('3');
    }
}
/*
return status
0 user name or password is empty
1 user alreay exists
2 open config file faild
3 create user successful
*/