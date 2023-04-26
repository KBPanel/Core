<?php

namespace PHPBotts\Core\Entities\ChatMember;

use PHPBotts\Core\Entities\Entity;
use PHPBotts\Core\Entities\User;

/**
 * Class ChatMemberNotImplemented
 *
 * @method string getStatus() The member's status in the chat
 * @method User   getUser()   Information about the user
 */
class ChatMemberNotImplemented extends Entity implements ChatMember
{
    //
}
