<?php

use App\Models\User;

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
