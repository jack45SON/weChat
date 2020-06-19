<?php
namespace TenFish\WeChat\Clients\OfficialAccount;

use TenFish\WeChat\Clients\CoreClient;
use TenFish\WeChat\Interfaces\ClientInterface;

final class ShareClient extends CoreClient implements ClientInterface
{


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @Title: returnResponse
     * @Description: todo()
     * @return array|mixed
     */
    public function returnResponse()
    {
        $jsapiTicket    = $this->config['ticket'];
        $url            = $this->config['url'];
        $timestamp      = time();
        $nonceStr       = sha1(uniqid(mt_rand(1, 1000000), true));
        $string         = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
        $signature      = sha1($string);
        $signPackage    = array(
            "appId"         => $this->config['app_id'],
            "nonceStr"      => $nonceStr,
            "timestamp"     => $timestamp,
            "url"           => $url,
            "signature"     => $signature,
            "rawString"     => $string,
            "jsapiTicket"   => $jsapiTicket
        );
        return $signPackage;
    }

    /**
     * @Title: getUrl
     * @Description: todo()
     * @return string
     */
    public function getUrl()
    {
        return '';
    }
}
