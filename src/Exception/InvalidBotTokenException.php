<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Exception;

    /**
     * Thrown when bot token is invalid
     */
    class InvalidBotTokenException extends TelegramException
    {
        /**
         * InvalidBotTokenException constructor
         */
        public function __construct()
        {
            parent::__construct('Invalid bot token!');
        }
    }
