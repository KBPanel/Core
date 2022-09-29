<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Entities\MenuButton;

    /**
     * Describes that no specific value for the menu button was set.
     */
    class MenuButtonDefault extends MenuButton
    {
        public function __construct(array $data)
        {
            $data['type'] = 'default';
            parent::__construct($data);
        }
    }
