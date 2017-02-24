<?php

set_time_limit(3);



function pingDomain($domain,$port){
    $starttime = microtime(true);
    $file      = fsockopen ($domain, $port, $errno, $errstr, 10);
    $stoptime  = microtime(true);
    $status    = 0;

    if (!$file) $status = 2000;  // Site is down
    else {
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}



$val = pingDomain("192.187.107.2",80);

if($val>2000) $val = 2000;

print $val;


?>
