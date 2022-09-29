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
     * Class ChatMemberMember
     *
     * @link https://core.telegram.org/bots/api#chatmembermember
     *
     * @method string getStatus() The member's status in the chat, always “member”
     * @method User   getUser()   Information about the user
     */
    class ChatMemberMember extends Entity implements ChatMember
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
