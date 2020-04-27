<?php

namespace TenFish\WeChat\Clients\OfficialAccount\Oauth;

use TenFish\WeChat\Clients\CoreClient;

/**
 * CodeClient
 */
final class CodeClient extends CoreClient
{

    /**
     * returnResponse
     *
     * @return void
     */
    public function returnResponse()
    {
        return '';
    }
    /**
     * getUrl
     *
     * @return void
     */
    public function getUrl()
    {
        $state = sha1(uniqid(mt_rand(1, 1000000), true));
        return sprintf('https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=%s&state=%s#wechat_redirect', $this->appId, $this->redirectUri, $this->scope, $state);
    }
}
