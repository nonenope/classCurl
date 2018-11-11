<?php

require('classes/Curl.php');

$curl = new Curl;

$curl->setOpt(CURLOPT_FOLLOWLOCATION, true);
$curl->setOpt(CURLOPT_RETURNTRANSFER, true);
$curl->setOpt(CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:7.0.1) Gecko/20100101 Firefox/7.0.12011-10-16 20:23:00");
$curl->setOpt(CURLOPT_REFERER,"http://example.com/aboutme.html");

$curl->get("enter url here");

if($curl->error)
{
    echo $curl->curlErrorMessage;
}
else
{
    echo $curl->curlResponse;
}





