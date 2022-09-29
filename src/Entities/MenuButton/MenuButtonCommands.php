<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\MenuButton;

    /**
     * Represents a menu button, which opens the bot's list of commands.
     */
    class MenuButtonCommands extends MenuButton
    {
        public function __construct(array $data)
        {
            $data['type'] = 'commands';
            parent::__construct($data);
        }
    }
