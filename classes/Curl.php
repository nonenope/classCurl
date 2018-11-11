<?php

class Curl
{
    const DEFAULT_TIMEOUT = 10;

    public $url;
    public $curl;
    public $option = [];

    public $curlResponse; 
    public $curlErrorCode = 0;
    public $curlErrorMessage = null;

    public $error = false;
    public $errorMessage; 

    public function __construct()
    {
        if (!extension_loaded('curl')) {
            throw new Exception('cURL library is not loaded');
        }

        $this->curl = curl_init();
    }

    public function setOpt($option, $value)
    {
        $success = curl_setopt($this->curl, $option, $value);
        if ($success) {
            $this->options[$option] = $value;
        }
        return $success;
    }

    public function setTimeout($time = null)
    {
        $seconds = ($time) ? $time : DEFAULT_TIMEOUT;
        $this->setOpt(CURLOPT_TIMEOUT, $seconds);
    }
    public function setUrl()
    {
        $this->setOpt(CURLOPT_URL, $this->url);
    }

    public function get($url = null)
    {
        $this->url = $url;
        $this->setUrl();
        return $this->exec();
    }

    public function exec()
    {
        $this->curlResponse     = curl_exec($this->curl);
        $this->curlErrorCode    = curl_errno($this->curl);
        $this->curlErrorMessage = curl_error($this->curl);

        $this->error = $this->curlErrorCode || $this->curlErrorMessage;
    }



    
}