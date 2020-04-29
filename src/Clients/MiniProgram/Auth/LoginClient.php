<?php
namespace TenFish\WeChat\Clients\MiniProgram\Auth;

use TenFish\WeChat\Clients\CoreClient;
use TenFish\WeChat\Interfaces\ClientInterface;

/**
 * Login
 */
final class LoginClient extends CoreClient implements ClientInterface
{

    private $sessionKey;

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
        $res = $this->codeSession();
        if (isset($res['session_key'])) {
            $this->setSessionKey($res['session_key']);
            if ($this->config['signature'] != sha1($this->config['rawData'] . $this->sessionKey)) {
                return ['errcode' => -1, 'errmsg' => '签名错误'];
            };
            $res = $this->decryptData();
        }
        return $res;
    }

    /**
     * _codeSession
     *
     * @return void
     */
    private function codeSession()
    {
        $ret  = $this->httpsRequest($this->getUrl());
        return $ret;
    }

    /**
     * getUrl
     *
     * @return void
     */
    public function getUrl()
    {
        return sprintf('https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s', $this->config['appId'], $this->config['secret'], $this->config['code']);
    }

    /**
     * setSessionKey
     *
     * @param string $sessionKey
     * @return void
     */
    private function setSessionKey(string $sessionKey)
    {
        $this->sessionKey = $sessionKey;
    }

    /**
     * _decryptData
     *
     * @return void
     */
    private function decryptData()
    {
        if (strlen($this->sessionKey) != 24) {
            return ['errcode' => -41001, 'errmsg' => 'encodingAesKey 非法'];
        }
        $aesKey = base64_decode($this->sessionKey);
        if (strlen($this->config['iv']) != 24) {
            return ['errcode' => -41002, 'errmsg' => 'encodingAesKey 非法'];
        }
        $aesIV = base64_decode($this->config['iv']);
        $aesCipher = base64_decode($this->config['encryptedData']);
        $result = openssl_decrypt($aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);
        $dataObj = json_decode($result);
        if ($dataObj  == NULL) {
            return ['errcode' => -41003, 'errmsg' => 'aes 解密失败'];
        }
        if ($dataObj->watermark->appid != $this->config['appId']) {
            return ['errcode' => -41003, 'errmsg' => 'aes 解密失败'];
        }
        return ['errcode' => 0, 'errmsg' => '成功', 'result' => $result];
    }
}
