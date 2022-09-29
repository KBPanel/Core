<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities;

    /**
     * This object represents a service message about new members invited to a video chat.
     *
     * @link https://core.telegram.org/bots/api#videochatparticipantsinvited
     *
     * @method User[]      getUsers()       New members that were invited to the video chat
     */
    class VideoChatParticipantsInvited extends Entity
    {
        /**
         * {@inheritdoc}
         */
        protected function subEntities(): array
        {
            return [
                'users' => [User::class],
            ];
        }
    }
