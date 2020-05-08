<?php
namespace TenFish\WeChat\Clients\OfficialAccount;

use TenFish\WeChat\Clients\CoreClient;
use TenFish\WeChat\Interfaces\ClientInterface;

final class AccessTokenClient extends CoreClient implements ClientInterface
{


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @Title: getUrl
     * @Description: todo()
     * @return string
     */
    public function getUrl()
    {
        return sprintf('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s', $this->config['appId'], $this->config['secret']);
    }
}
