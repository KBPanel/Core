<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Tests\Unit\Entities;

    use KSeven\TelegramBot\Entities\KeyboardButton;
    use KSeven\TelegramBot\Entities\KeyboardButtonPollType;
    use KSeven\TelegramBot\Entities\WebAppInfo;
    use KSeven\TelegramBot\Exception\TelegramException;
    use KSeven\TelegramBot\Tests\Unit\TestCase;

    class KeyboardButtonTest extends TestCase
    {
        public function testKeyboardButtonNoTextFail(): void
        {
            $this->expectException(TelegramException::class);
            $this->expectExceptionMessage('You must add some text to the button!');
            new KeyboardButton([]);
        }

        public function testKeyboardButtonTooManyParametersFail(): void
        {
            $this->expectException(TelegramException::class);
            $this->expectExceptionMessage('You must use only one of these fields: request_contact, request_location, request_poll, web_app!');
            new KeyboardButton(['text' => 'message', 'request_contact' => true, 'request_location' => true]);
        }

        public function testKeyboardButtonSuccess(): void
        {
            new KeyboardButton(['text' => 'message']);
            new KeyboardButton(['text' => 'message', 'request_contact' => true]);
            new KeyboardButton(['text' => 'message', 'request_location' => true]);
            new KeyboardButton(['text' => 'message', 'request_poll' => new KeyboardButtonPollType([])]);
            new KeyboardButton(['text' => 'message', 'web_app' => new WebAppInfo([])]);
            self::assertTrue(true);
        }

        public function testInlineKeyboardButtonCouldBe(): void
        {
            self::assertTrue(KeyboardButton::couldBe(['text' => 'message']));
            self::assertFalse(KeyboardButton::couldBe(['no_text' => 'message']));
        }

        public function testKeyboardButtonParameterSetting(): void
        {
            $button = new KeyboardButton('message');
            self::assertSame('message', $button->getText());
            self::assertEmpty($button->getRequestContact());
            self::assertEmpty($button->getRequestLocation());
            self::assertEmpty($button->getRequestPoll());
            self::assertEmpty($button->getWebApp());

            $button->setText('new message');
            self::assertSame('new message', $button->getText());

            $button->setRequestContact(true);
            self::assertTrue($button->getRequestContact());
            self::assertEmpty($button->getRequestLocation());
            self::assertEmpty($button->getRequestPoll());
            self::assertEmpty($button->getWebApp());

            $button->setRequestLocation(true);
            self::assertEmpty($button->getRequestContact());
            self::assertTrue($button->getRequestLocation());
            self::assertEmpty($button->getRequestPoll());
            self::assertEmpty($button->getWebApp());

            $button->setRequestPoll(new KeyboardButtonPollType([]));
            self::assertEmpty($button->getRequestContact());
            self::assertEmpty($button->getRequestLocation());
            self::assertInstanceOf(KeyboardButtonPollType::class, $button->getRequestPoll());
            self::assertEmpty($button->getWebApp());

            $button->setWebApp(new WebAppInfo([]));
            self::assertEmpty($button->getRequestContact());
            self::assertEmpty($button->getRequestLocation());
            self::assertEmpty($button->getRequestPoll());
            self::assertInstanceOf(WebAppInfo::class, $button->getWebApp());
        }

        public function testReturnsSubentitiesOnArray()
        {
            $button = new KeyboardButton('message');
            $button->request_poll = [];
            $this->assertInstanceOf(KeyboardButtonPollType::class, $button->getRequestPoll());

            $button->web_app = [];
            $this->assertInstanceOf(WebAppInfo::class, $button->getWebApp());
        }
    }