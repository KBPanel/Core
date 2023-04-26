<?php

    /**
     * Test "/dummyadmin" command
     */

    namespace Dummy\AdminCommands;

    use PHPBotts\Core\Commands\AdminCommand;
    use PHPBotts\Core\Entities\ServerResponse;
    use PHPBotts\Core\Request;

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