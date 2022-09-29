<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\BotCommandScope;

    use KSeven\TelegramBot\Entities\Entity;

    /**
     * Class BotCommandScopeAllChatAdministrators
     *
     * @link https://core.telegram.org/bots/api#botcommandscopeallchatadministrators
     */
    class BotCommandScopeAllChatAdministrators extends Entity implements BotCommandScope
    {
        public function __construct(array $data = [])
        {
            $data['type'] = 'all_chat_administrators';
            parent::__construct($data);
        }
    }
