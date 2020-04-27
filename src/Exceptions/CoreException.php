<?php

namespace TenFish\WeChat\Exceptions;

use Exception;

abstract class CoreException extends Exception
{

    /**
     * @var string
     */
    protected $errorCode;

    /**
     * @var string
     */
    protected $errorMessage;

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param $errorMessage
     *
     * @deprecated
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @codeCoverageIgnore
     * @deprecated
     */
    public function setErrorType()
    {
    }
}
