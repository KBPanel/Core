<?php

namespace PHPBotts\Core\Entities\BotCommandScope;

use PHPBotts\Core\Entities\Entity;

/**
 * Class BotCommandScopeDefault
 *
 * @link https://core.telegram.org/bots/api#botcommandscopedefault
 */
class BotCommandScopeDefault extends Entity implements BotCommandScope
{
    public function __construct(array $data = [])
    {
        $data['type'] = 'default';
        parent::__construct($data);
    }
}
