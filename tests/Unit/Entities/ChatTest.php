<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Tests\Unit\Entities;

    use KSeven\TelegramBot\Tests\Unit\TestCase;
    use KSeven\TelegramBot\Tests\Unit\TestHelpers;

    class ChatTest extends TestCase
    {
        public function testChatType(): void
        {
            $chat = TestHelpers::getFakeChatObject();
            self::assertEquals('private', $chat->getType());

            $chat = TestHelpers::getFakeChatObject(['id' => -123, 'type' => null]);
            self::assertEquals('group', $chat->getType());

            $chat = TestHelpers::getFakeChatObject(['id' => -123, 'type' => 'supergroup']);
            self::assertEquals('supergroup', $chat->getType());

            $chat = TestHelpers::getFakeChatObject(['id' => -123, 'type' => 'channel']);
            self::assertEquals('channel', $chat->getType());
        }

        public function testIsChatType(): void
        {
            $chat = TestHelpers::getFakeChatObject();
            self::assertTrue($chat->isPrivateChat());

            $chat = TestHelpers::getFakeChatObject(['id' => -123, 'type' => null]);
            self::assertTrue($chat->isGroupChat());

            $chat = TestHelpers::getFakeChatObject(['id' => -123, 'type' => 'supergroup']);
            self::assertTrue($chat->isSuperGroup());

            $chat = TestHelpers::getFakeChatObject(['id' => -123, 'type' => 'channel']);
            self::assertTrue($chat->isChannel());
        }

        public function testTryMention(): void
        {
            // Username.
            $chat = TestHelpers::getFakeChatObject(['id' => 1, 'first_name' => 'John', 'last_name' => 'Taylor', 'username' => 'jtaylor']);
            self::assertEquals('@jtaylor', $chat->tryMention());

            // First name.
            $chat = TestHelpers::getFakeChatObject(['id' => 1, 'first_name' => 'John', 'last_name' => null, 'username' => null]);
            self::assertEquals('John', $chat->tryMention());

            // First and Last name.
            $chat = TestHelpers::getFakeChatObject(['id' => 1, 'first_name' => 'John', 'last_name' => 'Taylor', 'username' => null]);
            self::assertEquals('John Taylor', $chat->tryMention());

            // Non-private chat should return title.
            $chat = TestHelpers::getFakeChatObject(['id' => -123, 'type' => null, 'title' => 'My group chat']);
            self::assertSame('My group chat', $chat->tryMention());
        }
    }