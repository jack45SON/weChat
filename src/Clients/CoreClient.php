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
     * returnResponse
     *
     * @return void
     */
    public function returnResponse()
    {
        $ret  = $this->httpsRequest($this->getUrl(), $this->options);
        return $ret;
    }

    /**
     * getUrl
     *
     * @return void
     */
    public function getUrl(){
    }
}
