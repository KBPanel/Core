<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Tests\Unit;

    use KSeven\TelegramBot\Conversation;
    use KSeven\TelegramBot\Exception\TelegramException;
    use KSeven\TelegramBot\Telegram;

    class ConversationTest extends TestCase
    {

        protected function setUp(): void
        {
            $credentials = [
                'host'     => PHPUNIT_DB_HOST,
                'port'     => PHPUNIT_DB_PORT,
                'database' => PHPUNIT_DB_NAME,
                'user'     => PHPUNIT_DB_USER,
                'password' => PHPUNIT_DB_PASS,
            ];

            $telegram = new Telegram(self::$dummy_api_key, 'testbot');
            $telegram->enableMySql($credentials);

            //Make sure we start with an empty DB for each test.
            TestHelpers::emptyDb($credentials);
        }

        public function testConversationThatDoesntExistPropertiesSetCorrectly(): void
        {
            $conversation = new Conversation(123, 456);
            self::assertSame(123, $conversation->getUserId());
            self::assertSame(456, $conversation->getChatId());
            self::assertEmpty($conversation->getCommand());
        }

        public function testConversationThatExistsPropertiesSetCorrectly(): void
        {
            $info         = TestHelpers::startFakeConversation();
            $conversation = new Conversation($info['user_id'], $info['chat_id'], 'command');
            self::assertSame($info['user_id'], $conversation->getUserId());
            self::assertSame($info['chat_id'], $conversation->getChatId());
            self::assertSame('command', $conversation->getCommand());
        }

        public function testConversationThatDoesntExistWithoutCommand(): void
        {
            $conversation = new Conversation(1, 1);
            self::assertFalse($conversation->exists());
            self::assertEmpty($conversation->getCommand());
        }

        public function testConversationThatDoesntExistWithCommand(): void
        {
            $this->expectException(TelegramException::class);
            new Conversation(1, 1, 'command');
        }

        public function testNewConversationThatWontExistWithoutCommand(): void
        {
            TestHelpers::startFakeConversation();
            $conversation = new Conversation(0, 0);
            self::assertFalse($conversation->exists());
            self::assertEmpty($conversation->getCommand());
        }

        public function testNewConversationThatWillExistWithCommand(): void
        {
            $info         = TestHelpers::startFakeConversation();
            $conversation = new Conversation($info['user_id'], $info['chat_id'], 'command');
            self::assertTrue($conversation->exists());
            self::assertEquals('command', $conversation->getCommand());
        }

        public function testStopConversation(): void
        {
            $info         = TestHelpers::startFakeConversation();
            $conversation = new Conversation($info['user_id'], $info['chat_id'], 'command');
            self::assertTrue($conversation->exists());
            $conversation->stop();

            $conversation2 = new Conversation($info['user_id'], $info['chat_id']);
            self::assertFalse($conversation2->exists());
        }

        public function testCancelConversation(): void
        {
            $info         = TestHelpers::startFakeConversation();
            $conversation = new Conversation($info['user_id'], $info['chat_id'], 'command');
            self::assertTrue($conversation->exists());
            $conversation->cancel();

            $conversation2 = new Conversation($info['user_id'], $info['chat_id']);
            self::assertFalse($conversation2->exists());
        }

        public function testUpdateConversationNotes(): void
        {
            $info                = TestHelpers::startFakeConversation();
            $conversation        = new Conversation($info['user_id'], $info['chat_id'], 'command');
            $conversation->notes = 'newnote';
            $conversation->update();

            $conversation2 = new Conversation($info['user_id'], $info['chat_id'], 'command');
            self::assertSame('newnote', $conversation2->notes);

            $conversation3 = new Conversation($info['user_id'], $info['chat_id']);
            self::assertSame('newnote', $conversation3->notes);
        }
    }