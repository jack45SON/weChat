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
     */
    public function returnResponse()
    {
        return '';
    }

    /**
     * @Title: getUrl
     * @Description: todo()
     * @return string
     */
    public function getUrl()
    {
        $state = sha1(uniqid(mt_rand(1, 1000000), true));
        return sprintf('https://open.weixin.qq.com/connect/oauth2/authorize?appid=%s&redirect_uri=%s&response_type=code&scope=%s&state=%s#wechat_redirect', $this->config['appId'], $this->config['redirectUri'], $this->config['scope'], $state);
    }
}
