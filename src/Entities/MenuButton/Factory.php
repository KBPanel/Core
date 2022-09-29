<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\MenuButton;

    use KSeven\TelegramBot\Entities\Entity;

    class Factory extends \KSeven\TelegramBot\Entities\Factory
    {
        public static function make(array $data, string $bot_username): Entity
        {
            $type = [
                'commands' => MenuButtonCommands::class,
                'web_app'  => MenuButtonWebApp::class,
                'default'  => MenuButtonDefault::class,
            ];

            if (! isset($type[$data['type'] ?? ''])) {
                return new MenuButtonNotImplemented($data, $bot_username);
            }

            $class = $type[$data['type']];
            return new $class($data, $bot_username);
        }
    }
