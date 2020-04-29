<?php
namespace TenFish\WeChat\Clients\MiniProgram\Wxacode;

use TenFish\WeChat\Clients\CoreClient;
use TenFish\WeChat\Interfaces\ClientInterface;

final class CreateQRCode extends CoreClient implements ClientInterface
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
        switch ($this->config['action']) {
            case 'get';
                $action_url = 'https://api.weixin.qq.com/wxa/getwxacode?access_token=';
                break;
            case 'getUnlimited';
                $action_url = 'https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=';
                break;
            default:
                $action_url = 'https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode?access_token=';
                break;
        }
        return $action_url . $this->accessToken;
    }

}
