<?php

namespace TenFish\WeChat\Traits;

use TenFish\WeChat\Clients\OfficialAccount\Oauth\UserInfoClient;
use TenFish\WeChat\Clients\OfficialAccount\Oauth\CodeClient;

trait OfficialAccountClientTrait
{
    public static function CodeClient()
    {
        return new CodeClient();
    }

    public static function UserInfoClient()
    {
        return new UserInfoClient;
    }
}
