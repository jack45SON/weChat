<?php
namespace TenFish\WeChat\Clients\OfficialAccount;

use TenFish\WeChat\Clients\CoreClient;
use TenFish\WeChat\Interfaces\ClientInterface;

final class TicketClient extends CoreClient implements ClientInterface
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
        $ret  = $this->httpsRequest($this->getUrl());
        return $ret;
    }

    /**
     * @Title: getUrl
     * @Description: todo()
     * @return string
     */
    public function getUrl()
    {
        return sprintf('https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token='.$this->config['access_token']);
    }
}
