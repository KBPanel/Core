<?php

namespace PHPBotts\Core\Entities\BotCommandScope;

use PHPBotts\Core\Entities\Entity;

/**
 * Class BotCommandScopeAllPrivateChats
 *
 * @link https://core.telegram.org/bots/api#botcommandscopeallprivatechats
 */
class BotCommandScopeAllPrivateChats extends Entity implements BotCommandScope
{
    public function __construct(array $data = [])
    {
        $data['type'] = 'all_private_chats';
        parent::__construct($data);
    }
}
