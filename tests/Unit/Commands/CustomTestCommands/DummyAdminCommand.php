<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    /**
     * Test "/dummyadmin" command
     */

    namespace Dummy\AdminCommands;

    use KSeven\TelegramBot\Commands\AdminCommand;
    use KSeven\TelegramBot\Entities\ServerResponse;
    use KSeven\TelegramBot\Request;

    class DummyAdminCommand extends AdminCommand
    {
        /**
         * @var string
         */
        protected $name = 'dummyadmin';

        /**
         * @var string
         */
        protected $description = 'Dummy AdminCommand';

        /**
         * @var string
         */
        protected $usage = '/dummyadmin';

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