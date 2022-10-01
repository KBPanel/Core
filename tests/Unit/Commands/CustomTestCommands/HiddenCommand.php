<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    /**
     * Test "/hidden" command to test $show_in_help
     */
    
    namespace KSeven\TelegramBot\Commands\UserCommands;

    use KSeven\TelegramBot\Commands\UserCommand;
    use KSeven\TelegramBot\Entities\ServerResponse;
    use KSeven\TelegramBot\Request;

    class HiddenCommand extends UserCommand
    {
        /**
         * @var string
         */
        protected $name = 'hidden';

        /**
         * @var string
         */
        protected $description = 'This command is hidden in help';

        /**
         * @var string
         */
        protected $usage = '/hidden';

        /**
         * @var string
         */
        protected $version = '1.0.0';

        /**
         * @var bool
         */
        protected $show_in_help = false;

        /**
         * Command execute method
         *
         * @return mixed
         */
        public function execute(): ServerResponse
        {
            return Request::emptyResponse();
        }
    }