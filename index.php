<?php

require('classes/Curl.php');
$curl = new Curl;

$curl->get("enter url here");
if($curl->error)
{
    echo $curl->curlErrorMessage;
}
else
{
    echo $curl->curlResponse;
}





