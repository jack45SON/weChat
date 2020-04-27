<?php
namespace TenFish\MiniProgram\Clients\Auth;

use TenFish\MiniProgram\Clients\Client;
use TenFish\MiniProgram\Interfaces\ClientInterface;

/**
 * Login
 */
final class UserInfoClient extends Client implements ClientInterface
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
        return sprintf('https://api.weixin.qq.com/sns/userinfo?access_token=%s&openid=%s&lang=%s', $this->accessToken, $this->openId,'zh_CN');
    }
}
