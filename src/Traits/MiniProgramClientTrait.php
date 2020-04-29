<?php

namespace TenFish\WeChat\Traits;

use TenFish\WeChat\Clients\MiniProgram\Auth\AccessTokenClient;
use TenFish\WeChat\Clients\MiniProgram\Auth\LoginClient;
use TenFish\WeChat\Clients\MiniProgram\Wxacode\CreateQRCode;

trait MiniProgramClientTrait
{
    public static function AuthLogin()
    {
        return new LoginClient();
    }

    public static function AccessToken()
    {
        return new AccessTokenClient();
    }

    public static function CreateQRCode()
    {
        return new CreateQRCode();
    }
}
