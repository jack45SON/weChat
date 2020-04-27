<?php

namespace TenFish\WeChat\Traits;

use TenFish\WeChat\Filters\Filter;

trait AcsTrait
{
    public $appId;
    public $secret;
    public $accessToken;
    public $action;
    public $redirectUri;
    public $options;

    /**
     * appId
     *
     * @param string $appId
     * @return void
     */
    public function appId(string $appId)
    {
        $this->appId = Filter::checkString($appId,'appId');
        return $this;
    }

    /**
     * secret
     *
     * @param string $secret
     * @return void
     */
    public function secret(string $secret)
    {
        $this->secret = Filter::checkString($secret, 'secret');
        return $this;
    }

    /**
     * accessToken
     *
     * @param string $accessToken
     * @return void
     */
    public function accessToken(string $accessToken)
    {
        $this->accessToken = Filter::checkString($accessToken, 'accessToken');
        return $this;
    }

    /**
     * action
     *
     * @param string $action
     * @return void
     */
    public function action(string $action)
    {
        $this->action = Filter::checkString($action, 'action');
        return $this;
    }

    /**
     * openId
     *
     * @param string $openId
     * @return void
     */
    public function openId(string $openId)
    {
        $this->openId = Filter::checkString($openId, 'openId');
        return $this;
    }

    /**
     * options
     *
     * @param array $options
     * @return void
     */
    public function options(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * redirectUri
     *
     * @param string $redirectUri
     * @return void
     */
    public function redirectUri(string $redirectUri)
    {
        $this->redirectUri = Filter::checkString($redirectUri, 'redirectUri');
        return $this;
    }
    /**
     * scope
     *
     * @param string $scope
     * @return void
     */
    public function scope(string $scope)
    {
        $this->scope = Filter::checkString($scope, 'scope');
        return $this;
    }

    /**
     * httpsRequest
     *
     * @param [type] $url
     * @param array $data
     * @param integer $second
     * @return void
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
