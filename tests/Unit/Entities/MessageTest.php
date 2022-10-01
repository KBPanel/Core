<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Tests\Unit\Entities;

    use KSeven\TelegramBot\Tests\Unit\TestCase;
    use KSeven\TelegramBot\Tests\Unit\TestHelpers;

    class MessageTest extends TestCase
    {
        public function testTextAndCommandRecognise(): void
        {
            // /command
            $message = TestHelpers::getFakeMessageObject(['text' => '/help']);
            self::assertEquals('/help', $message->getFullCommand());
            self::assertEquals('help', $message->getCommand());
            self::assertEquals('/help', $message->getText());
            self::assertEquals('', $message->getText(true));

            // text
            $message = TestHelpers::getFakeMessageObject(['text' => 'some text']);
            self::assertNull($message->getFullCommand());
            self::assertNull($message->getCommand());
            self::assertEquals('some text', $message->getText());
            self::assertEquals('some text', $message->getText(true));

            // /command@bot
            $message = TestHelpers::getFakeMessageObject(['text' => '/help@testbot']);
            self::assertEquals('/help@testbot', $message->getFullCommand());
            self::assertEquals('help', $message->getCommand());
            self::assertEquals('/help@testbot', $message->getText());
            self::assertEquals('', $message->getText(true));

            // /command text
            $message = TestHelpers::getFakeMessageObject(['text' => '/help some text']);
            self::assertEquals('/help', $message->getFullCommand());
            self::assertEquals('help', $message->getCommand());
            self::assertEquals('/help some text', $message->getText());
            self::assertEquals('some text', $message->getText(true));

            // /command@bot some text
            $message = TestHelpers::getFakeMessageObject(['text' => '/help@testbot some text']);
            self::assertEquals('/help@testbot', $message->getFullCommand());
            self::assertEquals('help', $message->getCommand());
            self::assertEquals('/help@testbot some text', $message->getText());
            self::assertEquals('some text', $message->getText(true));

            // /command\n text
            $message = TestHelpers::getFakeMessageObject(['text' => "/help\n some text"]);
            self::assertEquals('/help', $message->getFullCommand());
            self::assertEquals('help', $message->getCommand());
            self::assertEquals("/help\n some text", $message->getText());
            self::assertEquals(' some text', $message->getText(true));

            // /command@bot\nsome text
            $message = TestHelpers::getFakeMessageObject(['text' => "/help@testbot\nsome text"]);
            self::assertEquals('/help@testbot', $message->getFullCommand());
            self::assertEquals('help', $message->getCommand());
            self::assertEquals("/help@testbot\nsome text", $message->getText());
            self::assertEquals('some text', $message->getText(true));

            // /command@bot \nsome text
            $message = TestHelpers::getFakeMessageObject(['text' => "/help@testbot \nsome text"]);
            self::assertEquals('/help@testbot', $message->getFullCommand());
            self::assertEquals('help', $message->getCommand());
            self::assertEquals("/help@testbot \nsome text", $message->getText());
            self::assertEquals("\nsome text", $message->getText(true));
        }

        public function testGetType(): void
        {
            $message = TestHelpers::getFakeMessageObject(['text' => null]);
            self::assertSame('message', $message->getType());

            $message = TestHelpers::getFakeMessageObject(['text' => '/help']);
            self::assertSame('command', $message->getType());

            $message = TestHelpers::getFakeMessageObject(['text' => 'some text']);
            self::assertSame('text', $message->getType());
        }
    }