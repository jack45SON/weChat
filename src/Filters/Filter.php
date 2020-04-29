<?php

namespace TenFish\WeChat\Filters;

use TenFish\WeChat\Exceptions\ClientException;

class Filter
{
    /**
     * @Title: checkString
     * @param $value
     * @param $name
     * @return mixed
     * @throws ClientException
     */
    public static function checkString($value,$name)
    {
        if (!is_string($value)) {
            throw new ClientException(
                $name . ' must be a string'
            );
        }

        if ($value === '') {
            throw new ClientException(
                $name . ' cannot be empty'
            );
        }
        return $value;
    }

    /**
     * @Title: checkArray
     * @param $value
     * @param $name
     * @return mixed
     * @throws ClientException
     */
    public static function checkArray($value,$name)
    {
        if (!is_array($value)) {
            throw new ClientException(
                $name . ' must be a array'
            );
        }

        if (empty($value)) {
            throw new ClientException(
                $name . ' cannot be empty'
            );
        }
        return $value;
    }
}
