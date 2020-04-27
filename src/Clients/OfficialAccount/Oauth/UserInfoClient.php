<?php
namespace TenFish\WeChat\Clients\OfficialAccount\Oauth;

use TenFish\WeChat\Clients\CoreClient;
use TenFish\WeChat\Interfaces\ClientInterface;

/**
 * Login
 */
final class UserInfoClient extends CoreClient implements ClientInterface
{


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * returnResponse
     *
     * @return void
     */
    public function returnResponse()
    {
        if(!$this->accessToken || !$this->openId){
            $url = sprintf('https://api.weixin.qq.com/cgi-bin/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code', $this->appId, $this->secret, $this->code);
            $access_token_result    = $this->httpsRequest($url);
            $this->accessToken      = $access_token_result['access_token'];
            $this->openId           = $access_token_result['openid'];
        }

        $ret  = $this->httpsRequest($this->getUrl(), $this->options);
        return $ret;
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
