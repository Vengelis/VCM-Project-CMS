<?php 
if(!isset($exe))
{
    ?><script>
    document.location.replace("../../../../index.php?app=system&mod=errors&ctl=display&cmpt=security");
    </script><?php
}
function parse_size($size) {
    $unit = preg_replace('/[^bkmgtpezy]/i', '', $size);
    $size = preg_replace('/[^0-9\.]/', '', $size);
    if ($unit) {
      return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
    }
    else {
      return round($size);
    }
  }
function verifUploadedFileSize($controller)
{
    if(isset($_FILES[$controller])) {
        if($_FILES[$controller]['size'] > parse_size(ini_get('post_max_size'))) { 
            return false;
        } else {
           return true;
        }
    } else {
        return false;
    }
}

function generateRandomString($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}