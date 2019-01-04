<?php
function modify_data() {
    $user_name=$_POST['user_name'];
    $user_data=$_POST['user_data'];
    $data_path=str_replace('function\modify_data.php', '', __FILE__, $i);
    $tmp="\\";
    if ($i==0) {
        $data_path=str_replace('function/modify_data.php', '', __FILE__);
        $tmp='/';
    }
    if (!file_exists("{$data_path}data{$tmp}{$user_name}.json")) die('0');
    // $data=file_get_contents("{$data_path}data{$tmp}{$user_name}.json");
    $file=fopen("{$data_path}data{$tmp}{$user_name}.json", 'w') or die('1');
    fwrite($file, $user_data);
    fclose();
    die("2");
}
/* modify data return status
0 user doesn't exists
1 open data failed
2 modify successful
 */