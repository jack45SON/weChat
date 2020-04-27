<?php

namespace TenFish\WeChat\Filters;

use TenFish\WeChat\Exceptions\ClientException;

class Filter
{
    /**
     * checkString
     *
     * @param [type] $value
     * @param [type] $name
     * @return void
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
}
