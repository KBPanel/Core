<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities;

    /**
     * Class ChatJoinRequest
     *
     * Represents a join request sent to a chat.
     *
     * @link https://core.telegram.org/bots/api#chatjoinrequest
     *
     * @method Chat           getChat()       Chat to which the request was sent
     * @method User           getFrom()       User that sent the join request
     * @method int            getDate()       Date the request was sent in Unix time
     * @method string         getBio()        Optional. Bio of the user.
     * @method ChatInviteLink getInviteLink() Optional. Chat invite link that was used by the user to send the join request
     */
    class ChatJoinRequest extends Entity
    {
        protected function subEntities(): array
        {
            return [
                'chat'        => Chat::class,
                'from'        => User::class,
                'invite_link' => ChatInviteLink::class,
            ];
        }
    }
