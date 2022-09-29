<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\BotCommandScope;

    use KSeven\TelegramBot\Entities\Entity;

    /**
     * Class BotCommandScopeDefault
     *
     * @link https://core.telegram.org/bots/api#botcommandscopedefault
     */
    class BotCommandScopeDefault extends Entity implements BotCommandScope
    {
        public function __construct(array $data = [])
        {
            $data['type'] = 'default';
            parent::__construct($data);
        }
    }
