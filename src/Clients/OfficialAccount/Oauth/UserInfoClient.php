<?php
namespace TenFish\WeChat\Clients\OfficialAccount\Oauth;

use TenFish\WeChat\Clients\CoreClient;
use TenFish\WeChat\Interfaces\ClientInterface;

/**
 * Login
 */
final class UserInfoClient extends CoreClient implements ClientInterface
{
    private $openId;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @Title: returnResponse
     * @Description: todo()
     * @return array|mixed
     */
    public function returnResponse()
    {
        if(!$this->accessToken){
            $url = sprintf('https://api.weixin.qq.com/sns/oauth2/access_token?appid=%s&secret=%s&code=%s&grant_type=authorization_code', $this->config['appId'], $this->config['secret'], $this->config['code']);
            $access_token_result    = $this->httpsRequest($url);
            if(isset($access_token_result['errcode'])){
                return $access_token_result;
            }
            $this->accessToken      = $access_token_result['access_token'];
            $this->openId           = $access_token_result['openid'];
        }

        $ret  = $this->httpsRequest($this->getUrl());
        return $ret;
    }

    /**
     * @Title: getUrl
     * @Description: todo()
     * @return string
     */
    public function getUrl()
    {
        return sprintf('https://api.weixin.qq.com/sns/userinfo?access_token=%s&openid=%s&lang=%s', $this->accessToken, $this->openId,'zh_CN');
    }
}
