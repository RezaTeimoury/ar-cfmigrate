<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require_once(dirname(__FILE__).'/../vendor/autoload.php');

require_once dirname(__FILE__) . "/core/core.data.php";

$url = explode("/",$_SERVER["REQUEST_URI"]);

$pageLocation = 'dashboard';

if($core->panelStatus == 'login')
{
    $pageLocation = 'login';
}
if($core->panelStatus == 'arvan')
{
    $pageLocation = 'arvan';
}
if($core->panelStatus == 'cloudflare')
{
    $pageLocation = 'cloudflare';
}


if($pageLocation == 'dashboard')
{
    $key = new AR\CFM\Auth\APIKey($core->AC_token);
    $adapter = new AR\CFM\Adapter\Guzzle($key);
    $domains = new AR\CFM\Endpoints\Domains($adapter);

    $keyCloudFlare = new AR\CFM\Auth\APICloudFlareToken($core->CF_token,$core->CF_email);
    $adapterCloudFlare = new AR\CFM\Adapter\Guzzle($keyCloudFlare,"https://api.cloudflare.com/client/v4/");
    $cloudFlareZones = new AR\CFM\Endpoints\CloudflareZones($adapterCloudFlare);
    $cloudFlareDns = new AR\CFM\Endpoints\CloudflareDns($adapterCloudFlare);

    $dashboardPage = 'home';
    if(isset($url[2]) && $url[2] == 'dns' && isset($url[3]) && !empty($url[3]))
    {
        $dashboardPage = 'dnslist';
        $domainName = $url[3];
    }
}

require_once dirname(__FILE__) . "/view.php";
