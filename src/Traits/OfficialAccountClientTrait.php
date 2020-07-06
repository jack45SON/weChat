<?php

namespace TenFish\WeChat\Traits;

use TenFish\WeChat\Clients\OfficialAccount\AccessTokenClient;
use TenFish\WeChat\Clients\OfficialAccount\Oauth\UserInfoClient;
use TenFish\WeChat\Clients\OfficialAccount\Oauth\CodeClient;
use TenFish\WeChat\Clients\OfficialAccount\ShareClient;
use TenFish\WeChat\Clients\OfficialAccount\TicketClient;

trait OfficialAccountClientTrait
{
    public static function CodeClient()
    {
        return new CodeClient();
    }

    public static function OAUserInfoClient()
    {
        return new UserInfoClient();
    }

    public static function OAAccessTokenClient()
    {
        return new AccessTokenClient();
    }

    public static function OATicketClient()
    {
        return new TicketClient();
    }


    public static function OAShareClient()
    {
        return new ShareClient();
    }
}
