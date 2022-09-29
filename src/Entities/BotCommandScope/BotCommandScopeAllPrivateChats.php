<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\BotCommandScope;

    use KSeven\TelegramBot\Entities\Entity;

    /**
     * Class BotCommandScopeAllPrivateChats
     *
     * @link https://core.telegram.org/bots/api#botcommandscopeallprivatechats
     */
    class BotCommandScopeAllPrivateChats extends Entity implements BotCommandScope
    {
        public function __construct(array $data = [])
        {
            $data['type'] = 'all_private_chats';
            parent::__construct($data);
        }
    }
