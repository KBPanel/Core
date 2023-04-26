<?php
    /**
     * Test "/dummyuser" command
     */
    
    namespace Dummy\UserCommands;

    use PHPBotts\Core\Commands\UserCommand;
    use PHPBotts\Core\Entities\ServerResponse;
    use PHPBotts\Core\Request;

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