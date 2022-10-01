<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Tests\Unit\Commands;

    use KSeven\TelegramBot\Commands\Command;
    use KSeven\TelegramBot\Telegram;
    use KSeven\TelegramBot\Tests\Unit\TestCase;

    class CommandTestCase extends TestCase
    {
        /**
         * @var Telegram
         */
        protected $telegram;

        /**
         * @var Command
         */
        protected $command;

        /**
         * setUp
         */
        public function setUp(): void
        {
            $this->telegram = new Telegram(self::$dummy_api_key, 'testbot');

            // Add custom commands dedicated to do some tests.
            $this->telegram->addCommandsPath(__DIR__ . '/CustomTestCommands');
            $this->telegram->getCommandsList();
        }

        /**
         * Make sure the version number is in the format x.x.x, x.x or x
         */
        public function testVersionNumberFormat(): void
        {
            self::assertRegExp('/^(\d+\\.)?(\d+\\.)?(\d+)$/', $this->command->getVersion());
        }
    }