<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Commands\SystemCommands;

    use KSeven\TelegramBot\Commands\SystemCommand;

    /**
     * Generic command
     */
    class GenericCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'generic';

        /**
         * @var string
         */
        protected $description = 'Handles generic commands or is executed by default when a command is not found';

        /**
         * @var string
         */
        protected $version = '1.1.0';
    }
