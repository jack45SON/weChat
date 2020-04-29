<?php

namespace TenFish\WeChat;

use TenFish\WeChat\Traits\OfficialAccountClientTrait;
use TenFish\WeChat\Traits\MiniProgramClientTrait;

class Factory
{
    use OfficialAccountClientTrait;
    use MiniProgramClientTrait;
}
