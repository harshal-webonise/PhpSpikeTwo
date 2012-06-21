<?php

class security 
{ 
    private $protocol; 

    function __construct() 
    { 
        $this->set_protocol(); 
        return; 
    } 

    private function set_protocol() 
    { 
        if ($_SERVER['HTTPS'] && strtolower($_SERVER['HTTPS']) == "on") 
        { 
            $this->protocol = "https"; 
        } 
        else 
        { 
            $this->protocol = "http"; 
        } 
        return; 
    } 

    public function prevent_remote_referrer() 
    { 
        if (!preg_match("/^".$this->protocol.":\/\/". $_SERVER['HTTP_HOST'] ."\//i",$_SERVER['HTTP_REFERER'])) 
        { 
            @die($_SERVER['HTTP_REFERER'] ." is a remote referrer."); 
        } 
        return; 
    } 
} 
?>
