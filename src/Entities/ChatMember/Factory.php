<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\ChatMember;

    use KSeven\TelegramBot\Entities\Entity;

    class Factory extends \KSeven\TelegramBot\Entities\Factory
    {
        public static function make(array $data, string $bot_username): Entity
        {
            $type = [
                'creator'       => ChatMemberOwner::class,
                'administrator' => ChatMemberAdministrator::class,
                'member'        => ChatMemberMember::class,
                'restricted'    => ChatMemberRestricted::class,
                'left'          => ChatMemberLeft::class,
                'kicked'        => ChatMemberBanned::class,
            ];

            if (!isset($type[$data['status'] ?? ''])) {
                return new ChatMemberNotImplemented($data, $bot_username);
            }

            $class = $type[$data['status']];
            return new $class($data, $bot_username);
        }
    }
