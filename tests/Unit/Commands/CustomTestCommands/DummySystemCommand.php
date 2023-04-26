<?php

    /**
     * Test "/dummysystem" command
     */

    namespace Dummy\SystemCommands;

    use PHPBotts\Core\Commands\SystemCommand;
    use PHPBotts\Core\Entities\ServerResponse;
    use PHPBotts\Core\Request;

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