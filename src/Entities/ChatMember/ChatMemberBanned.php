<?php

namespace PHPBotts\Core\Entities\ChatMember;

use PHPBotts\Core\Entities\Entity;
use PHPBotts\Core\Entities\User;

/**
 * Class ChatMemberBanned
 *
 * @link https://core.telegram.org/bots/api#chatmemberbanned
 *
 * @method string getStatus()    The member's status in the chat, always “kicked”
 * @method User   getUser()      Information about the user
 * @method int    getUntilDate() Date when restrictions will be lifted for this user; unix time
 */
class ChatMemberBanned extends Entity implements ChatMember
{
    /**
     * @inheritDoc
     */
    protected function subEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
