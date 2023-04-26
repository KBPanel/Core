<?php

    namespace PHPBotts\Core\Tests\Unit\Commands;

    use PHPBotts\Core\Commands\Command;
    use PHPBotts\Core\Telegram;
    use PHPBotts\Core\Tests\Unit\TestCase;

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