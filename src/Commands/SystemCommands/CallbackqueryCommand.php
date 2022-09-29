<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Commands\SystemCommands;

    use KSeven\TelegramBot\Commands\SystemCommand;
    use KSeven\TelegramBot\Entities\ServerResponse;

    /**
     * Callback query command
     */
    class CallbackqueryCommand extends SystemCommand
    {
        /**
         * @var callable[]
         */
        protected static $callbacks = [];

        /**
         * @var string
         */
        protected $name = 'callbackquery';

        /**
         * @var string
         */
        protected $description = 'Reply to callback query';

        /**
         * @var string
         */
        protected $version = '1.0.0';

        /**
         * Command execute method
         *
         * @return ServerResponse
         */
        public function execute(): ServerResponse
        {
            //$callback_query = $this->getCallbackQuery();
            //$user_id        = $callback_query->getFrom()->getId();
            //$query_id       = $callback_query->getId();
            //$query_data     = $callback_query->getData();

            $answer         = null;
            $callback_query = $this->getCallbackQuery();

            // Call all registered callbacks.
            foreach (self::$callbacks as $callback) {
                $answer = $callback($callback_query);
            }

            return ($answer instanceof ServerResponse) ? $answer : $callback_query->answer();
        }

        /**
         * Add a new callback handler for callback queries.
         *
         * @param $callback
         */
        public static function addCallbackHandler($callback): void
        {
            self::$callbacks[] = $callback;
        }
    }
