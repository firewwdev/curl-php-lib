<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Firewwdev\CurlPhpLib\cURL;

$cmd = $argv[1] ?? null;
$url = $argv[2] ?? null;

if(!$cmd){
    echo "Informe um método.\n";
    exit();
}

if(!$url){
    echo "Informe uma URL. \n";
    exit();
}

$curl = new cURL;

if($cmd === 'get'){
    print_r($curl -> curl('get', $url));
}else{
    echo 'Insira um método válido.';
    exit();
}
