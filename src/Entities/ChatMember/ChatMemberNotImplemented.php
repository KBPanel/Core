<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\ChatMember;

    use KSeven\TelegramBot\Entities\Entity;
    use KSeven\TelegramBot\Entities\User;

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
