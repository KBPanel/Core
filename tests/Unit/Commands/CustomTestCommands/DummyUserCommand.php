<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    /**
     * Test "/dummyuser" command
     */
    
    namespace Dummy\UserCommands;

    use KSeven\TelegramBot\Commands\UserCommand;
    use KSeven\TelegramBot\Entities\ServerResponse;
    use KSeven\TelegramBot\Request;

    class DummyUserCommand extends UserCommand
    {
        /**
         * @var string
         */
        protected $name = 'dummyuser';

        /**
         * @var string
         */
        protected $description = 'Dummy UserCommand';

        /**
         * @var string
         */
        protected $usage = '/dummyuser';

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