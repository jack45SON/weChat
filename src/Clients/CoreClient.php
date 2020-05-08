<?php
namespace TenFish\WeChat\Clients;

use TenFish\WeChat\Traits\AcsTrait;

/**
 * Login
 */
class CoreClient
{
    use AcsTrait;

    public function __construct()
    {
    }

    /**
     * @Title: returnResponse
     * @Description: todo()
     * @return array|mixed
     */
    public function returnResponse()
    {
        $ret  = $this->httpsRequest($this->getUrl(), $this->config['options']);
        return $ret;
    }

    /**
     * @Title: getUrl
     * @Description: todo()
     */
    public function getUrl(){
        return '';
    }
}
