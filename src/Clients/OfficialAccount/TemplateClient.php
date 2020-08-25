<?php
namespace TenFish\WeChat\Clients\OfficialAccount;

use TenFish\WeChat\Clients\CoreClient;
use TenFish\WeChat\Interfaces\ClientInterface;

final class TemplateClient extends CoreClient implements ClientInterface
{


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
        $url            = $this->config['url'];
        $open_id        = $this->config['open_id'];
        $template_id    = $this->config['template_id'];
        $data           = $this->config['data'];
        $template_msg = array(
            'touser'        => $open_id,
            'url'           => $url,
            'template_id'   => $template_id,
            'topcolor'      => '#FF0000',
            'data'          => $data
        );
        $ret  = $this->httpsRequest($this->getUrl(),$template_msg,array('Content-Type: application/x-www-form-urlencoded'));
        return $ret;
    }

    public function getUrl()
    {
        return sprintf('https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$this->config['access_token']);
    }
}
