<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Commands\SystemCommands;

    use KSeven\TelegramBot\Commands\SystemCommand;
    use KSeven\TelegramBot\Entities\ServerResponse;
    use KSeven\TelegramBot\Exception\TelegramException;
    use KSeven\TelegramBot\Request;
    use KSeven\TelegramBot\Telegram;

    /**
     * Generic message command
     */
    class GenericmessageCommand extends SystemCommand
    {
        /**
         * @var string
         */
        protected $name = Telegram::GENERIC_MESSAGE_COMMAND;

        /**
         * @var string
         */
        protected $description = 'Handle generic message';

        /**
         * @var string
         */
        protected $version = '1.2.0';

        /**
         * @var bool
         */
        protected $need_mysql = true;

        /**
         * Execution if MySQL is required but not available
         *
         * @return ServerResponse
         * @throws TelegramException
         */
        public function executeNoDb(): ServerResponse
        {
            // Try to execute any deprecated system commands.
            if (self::$execute_deprecated && $deprecated_system_command_response = $this->executeDeprecatedSystemCommand()) {
                return $deprecated_system_command_response;
            }

            return Request::emptyResponse();
        }

        /**
         * Execute command
         *
         * @return ServerResponse
         * @throws TelegramException
         */
        public function execute(): ServerResponse
        {
            // Try to continue any active conversation.
            if ($active_conversation_response = $this->executeActiveConversation()) {
                return $active_conversation_response;
            }

            // Try to execute any deprecated system commands.
            if (self::$execute_deprecated && $deprecated_system_command_response = $this->executeDeprecatedSystemCommand()) {
                return $deprecated_system_command_response;
            }

            return Request::emptyResponse();
        }
    }
