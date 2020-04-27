<?php
namespace TenFish\MiniProgram\Clients\Auth;

use TenFish\MiniProgram\Clients\Client;
use TenFish\MiniProgram\Interfaces\ClientInterface;

/**
 * Login
 */
final class AccessTokenClient extends Client implements ClientInterface
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
        return sprintf('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s', $this->appId, $this->secret);
    }
}
