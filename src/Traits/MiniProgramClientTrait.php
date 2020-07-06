<?php

namespace TenFish\WeChat\Traits;

use TenFish\WeChat\Clients\MiniProgram\Auth\AccessTokenClient;
use TenFish\WeChat\Clients\MiniProgram\Auth\LoginClient;
use TenFish\WeChat\Clients\MiniProgram\Wxacode\CreateQRCode;

trait MiniProgramClientTrait
{
    public static function MiniAuthLoginClient()
    {
        return new LoginClient();
    }

    public static function MiniAccessTokenClient()
    {
        return new AccessTokenClient();
    }

    public static function MiniCreateQRCodeClient()
    {
        return new CreateQRCode();
    }
}
