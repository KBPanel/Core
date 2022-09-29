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
     * Class ChatMemberOwner
     *
     * @link https://core.telegram.org/bots/api#chatmemberowner
     *
     * @method string getStatus()      The member's status in the chat, always “creator”
     * @method User   getUser()        Information about the user
     * @method string getCustomTitle() Custom title for this user
     * @method bool   getIsAnonymous() True, if the user's presence in the chat is hidden
     */
    class ChatMemberOwner extends Entity implements ChatMember
    {
        /**
         * {@inheritdoc}
         */
        protected function subEntities(): array
        {
            return [
                'user' => User::class,
            ];
        }
    }
