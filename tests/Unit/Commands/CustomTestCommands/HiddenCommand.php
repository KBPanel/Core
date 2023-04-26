<?php

    /**
     * Test "/hidden" command to test $show_in_help
     */
    
    namespace PHPBotts\Core\Commands\UserCommands;

    use PHPBotts\Core\Commands\UserCommand;
    use PHPBotts\Core\Entities\ServerResponse;
    use PHPBotts\Core\Request;

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