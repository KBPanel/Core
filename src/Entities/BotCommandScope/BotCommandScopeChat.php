<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\BotCommandScope;

    use KSeven\TelegramBot\Entities\Entity;

    /**
     * Class BotCommandScopeChat
     *
     * @link https://core.telegram.org/bots/api#botcommandscopechat
     *
     * <code>
     * $data = [
     *   'chat_id' => '123456'
     * ];
     * </code>
     *
     * @method string getType()   Scope type, must be chat
     * @method string getChatId() Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @method $this setChatId(string $chat_id) Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     */
    class BotCommandScopeChat extends Entity implements BotCommandScope
    {
        public function __construct(array $data = [])
        {
            $data['type'] = 'chat';
            parent::__construct($data);
        }
    }
