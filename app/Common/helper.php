<?php

use App\Models\User;
use Carbon\Carbon;

function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}

function replaceStr($str)
{
    return(preg_match('/\s+/','-'));
}
function convert($size, $unit)
{
    if ($unit == "KB") {
        return $fileSize = round($size / 1024, 4) . 'KB';
    }
    if ($unit == "MB") {
        return $fileSize = round($size / 1024 / 1024, 4) . 'MB';
    }
    if ($unit == "GB") {
        return $fileSize = round($size / 1024 / 1024 / 1024, 4) . 'GB';
    }
}

function checkTokenExpiryInMunites($time , $timeDiff = 60)
{
//    prx($time);
    $data = Carbon::parse($time->format('Y-m-d h:i:s a'));
    $now = Carbon::now();
    $diff = $data->diffInMinutes($now);

    if ($diff > $timeDiff){
        return true;
    }else{
        return false;
    }
}

function generateRandomString($length = 20)
{
    $ch = '1234567890abcdefghiklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $len = strlen($ch);
    $random = '';
    for ($i = 0;$i < $length;$i++){
        $random .= $ch[random_int(0,$len-1)];
    }
    return $random;
}
