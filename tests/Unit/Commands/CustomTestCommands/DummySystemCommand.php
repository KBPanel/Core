<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    /**
     * Test "/dummysystem" command
     */

    namespace Dummy\SystemCommands;

    use KSeven\TelegramBot\Commands\SystemCommand;
    use KSeven\TelegramBot\Entities\ServerResponse;
    use KSeven\TelegramBot\Request;

    class DummySystemCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = 'dummysystem';

        /**
         * @var string
         */
        protected $description = 'Dummy SystemCommand';

        /**
         * @var string
         */
        protected $usage = '/dummysystem';

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