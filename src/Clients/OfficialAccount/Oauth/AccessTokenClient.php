<?php
namespace TenFish\WeChat\Clients\OfficialAccount\Oauth;

use TenFish\WeChat\Clients\CoreClient;
use TenFish\WeChat\Interfaces\ClientInterface;

/**
 * Login
 */
final class AccessTokenClient extends CoreClient implements ClientInterface
{


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * getUrl
     *
     * @return void
     */
    public function getUrl()
    {
        return sprintf('https://api.weixin.qq.com/cgi-bin/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code', $this->appId, $this->secret, $this->code);
    }
}
