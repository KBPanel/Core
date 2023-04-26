<?php

    /**
     * Test "/visible" command to test $show_in_help
     */

    namespace PHPBotts\Core\Commands\UserCommands;

    use PHPBotts\Core\Commands\UserCommand;
    use PHPBotts\Core\Entities\ServerResponse;
    use PHPBotts\Core\Request;

    class VisibleCommand extends UserCommand
    {
        /**
         * @var string
         */
        protected $name = 'visible';

        /**
         * @var string
         */
        protected $description = 'This command is visible in help';

        /**
         * @var string
         */
        protected $usage = '/visible';

        /**
         * @var string
         */
        protected $version = '1.0.0';

        /**
         * @var bool
         */
        protected $show_in_help = true;

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