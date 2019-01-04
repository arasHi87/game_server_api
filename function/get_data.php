<?php
function get_data() {
    $user_name=$_POST['user_name'];
    $data_path=str_replace('function\get_data.php', '', __FILE__, $i);
    $tmp="\\";
    if ($i==0) {
        $data_path=str_replace('function/get_data.php', '', __FILE__);
        $tmp='/';
    }
    if (!file_exists("{$data_path}data{$tmp}{$user_name}.json")) die('0');
    $data=file_get_contents("{$data_path}data{$tmp}{$user_name}.json");
    die("{$data}");
}
/* get date return status
0 doesn't user exists
{data} return data successful
 */