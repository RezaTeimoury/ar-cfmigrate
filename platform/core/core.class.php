<?php
session_start();

class core{

    public $panelStatus;
    public $CF_email;
    public $CF_token;
    public $AC_token;

    public function __construct()
    {
        if(isset($_SESSION['CF_Email']) && isset($_SESSION['CF_Token']) && !empty($_SESSION['CF_Email']) && !empty($_SESSION['CF_Token']))
        {
            $this->panelStatus = 'arvan';
            $this->CF_email = $_SESSION['CF_Email'];
            $this->CF_token = $_SESSION['CF_Token'];

            if(isset($_SESSION['AC_Token']) && !empty($_SESSION['AC_Token']))
            {
                $this->panelStatus = 'dashboard';
                $this->AC_token = $_SESSION['AC_Token'];
            }
        }
        else{
            $this->panelStatus = 'cloudflare';
        }
    }

}
?>