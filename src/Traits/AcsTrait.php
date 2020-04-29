<?php

namespace TenFish\WeChat\Traits;

use TenFish\WeChat\Filters\Filter;

trait AcsTrait
{
    public $config;
    public $accessToken;

    /**
     * @Title: config
     * @param array $config
     * @return $this
     */
    public function config(array $config)
    {
        $this->config = Filter::checkArray($config,'config');
        return $this;
    }

    /**
     * @Title: accessToken
     * @param string $accessToken
     * @return $this
     */
    public function accessToken(string $accessToken)
    {
        $this->accessToken = Filter::checkString($accessToken,'accessToken');
        return $this;
    }

    /**
     * @Title: httpsRequest
     * @param $url
     * @param array $data
     * @param int $second
     * @return array|mixed
     */
    public function httpsRequest($url, array $data = array(), int $second = 30)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_TIMEOUT, $second);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($curl);
        $error = curl_errno($curl);
        if ($error !== 0) {
            curl_close($curl);
            return ['errCode' => -1, 'errmsg' => curl_error($curl)];
        } else {
            curl_close($curl);
            return json_decode($output, true);
        }
    }
}
