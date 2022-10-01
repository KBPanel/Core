<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Tests\Unit\Entities;

    use KSeven\TelegramBot\Entities\Games\CallbackGame;
    use KSeven\TelegramBot\Entities\InlineKeyboardButton;
    use KSeven\TelegramBot\Exception\TelegramException;
    use KSeven\TelegramBot\Tests\Unit\TestCase;

    class InlineKeyboardButtonTest extends TestCase
    {
        public function testInlineKeyboardButtonNoTextFail(): void
        {
            $this->expectException(TelegramException::class);
            $this->expectExceptionMessage('You must add some text to the button!');
            new InlineKeyboardButton([]);
        }

        public function testInlineKeyboardButtonNoParameterFail(): void
        {
            $this->expectException(TelegramException::class);
            $this->expectExceptionMessage('You must use only one of these fields: url, login_url, callback_data, web_app, switch_inline_query, switch_inline_query_current_chat, callback_game, pay!');
            new InlineKeyboardButton(['text' => 'message']);
        }

        public function testInlineKeyboardButtonTooManyParametersFail(): void
        {
            $this->expectException(TelegramException::class);
            $this->expectExceptionMessage('You must use only one of these fields: url, login_url, callback_data, web_app, switch_inline_query, switch_inline_query_current_chat, callback_game, pay!');
            $test_funcs = [
                function () {
                    new InlineKeyboardButton([
                        'text'          => 'message',
                        'url'           => 'url_value',
                        'callback_data' => 'callback_data_value',
                    ]);
                },
                function () {
                    new InlineKeyboardButton([
                        'text'                => 'message',
                        'url'                 => 'url_value',
                        'switch_inline_query' => 'switch_inline_query_value',
                    ]);
                },
                function () {
                    new InlineKeyboardButton([
                        'text'                => 'message',
                        'callback_data'       => 'callback_data_value',
                        'switch_inline_query' => 'switch_inline_query_value',
                    ]);
                },
                function () {
                    new InlineKeyboardButton([
                        'text'                             => 'message',
                        'callback_data'                    => 'callback_data_value',
                        'switch_inline_query_current_chat' => 'switch_inline_query_current_chat_value',
                    ]);
                },
                function () {
                    new InlineKeyboardButton([
                        'text'          => 'message',
                        'callback_data' => 'callback_data_value',
                        'callback_game' => new CallbackGame([]),
                    ]);
                },
                function () {
                    new InlineKeyboardButton([
                        'text'          => 'message',
                        'callback_data' => 'callback_data_value',
                        'pay'           => true,
                    ]);
                },
            ];

            $test_funcs[array_rand($test_funcs)]();
        }

        public function testInlineKeyboardButtonSuccess(): void
        {
            new InlineKeyboardButton(['text' => 'message', 'url' => 'url_value']);
            new InlineKeyboardButton(['text' => 'message', 'callback_data' => 'callback_data_value']);
            new InlineKeyboardButton(['text' => 'message', 'switch_inline_query' => 'switch_inline_query_value']);
            new InlineKeyboardButton(['text' => 'message', 'switch_inline_query' => '']); // Allow empty string.
            new InlineKeyboardButton(['text' => 'message', 'switch_inline_query_current_chat' => 'switch_inline_query_current_chat_value']);
            new InlineKeyboardButton(['text' => 'message', 'switch_inline_query_current_chat' => '']); // Allow empty string.
            new InlineKeyboardButton(['text' => 'message', 'callback_game' => new CallbackGame([])]);
            new InlineKeyboardButton(['text' => 'message', 'pay' => true]);
            self::assertTrue(true);
        }

        public function testInlineKeyboardButtonCouldBe(): void
        {
            self::assertTrue(InlineKeyboardButton::couldBe(
                ['text' => 'message', 'url' => 'url_value']
            ));
            self::assertTrue(InlineKeyboardButton::couldBe(
                ['text' => 'message', 'callback_data' => 'callback_data_value']
            ));
            self::assertTrue(InlineKeyboardButton::couldBe(
                ['text' => 'message', 'switch_inline_query' => 'switch_inline_query_value']
            ));
            self::assertTrue(InlineKeyboardButton::couldBe(
                ['text' => 'message', 'switch_inline_query_current_chat' => 'switch_inline_query_current_chat_value']
            ));
            self::assertTrue(InlineKeyboardButton::couldBe(
                ['text' => 'message', 'callback_game' => new CallbackGame([])]
            ));
            self::assertTrue(InlineKeyboardButton::couldBe(
                ['text' => 'message', 'pay' => true]
            ));

            self::assertFalse(InlineKeyboardButton::couldBe(['no_text' => 'message']));
            self::assertFalse(InlineKeyboardButton::couldBe(['text' => 'message']));
            self::assertFalse(InlineKeyboardButton::couldBe(['url' => 'url_value']));
            self::assertFalse(InlineKeyboardButton::couldBe(
                ['callback_data' => 'callback_data_value']
            ));
            self::assertFalse(InlineKeyboardButton::couldBe(
                ['switch_inline_query' => 'switch_inline_query_value']
            ));
            self::assertFalse(InlineKeyboardButton::couldBe(['callback_game' => new CallbackGame([])]));
            self::assertFalse(InlineKeyboardButton::couldBe(['pay' => true]));

            self::assertFalse(InlineKeyboardButton::couldBe([
                'url'                              => 'url_value',
                'callback_data'                    => 'callback_data_value',
                'switch_inline_query'              => 'switch_inline_query_value',
                'switch_inline_query_current_chat' => 'switch_inline_query_current_chat_value',
                'callback_game'                    => new CallbackGame([]),
                'pay'                              => true,
            ]));
        }

        public function testInlineKeyboardButtonParameterSetting(): void
        {
            $button = new InlineKeyboardButton(['text' => 'message', 'url' => 'url_value']);
            self::assertSame('url_value', $button->getUrl());
            self::assertEmpty($button->getCallbackData());
            self::assertEmpty($button->getSwitchInlineQuery());
            self::assertEmpty($button->getSwitchInlineQueryCurrentChat());
            self::assertEmpty($button->getCallbackGame());
            self::assertEmpty($button->getPay());

            $button->setCallbackData('callback_data_value');
            self::assertEmpty($button->getUrl());
            self::assertSame('callback_data_value', $button->getCallbackData());
            self::assertEmpty($button->getSwitchInlineQuery());
            self::assertEmpty($button->getSwitchInlineQueryCurrentChat());
            self::assertEmpty($button->getCallbackGame());
            self::assertEmpty($button->getPay());

            $button->setSwitchInlineQuery('switch_inline_query_value');
            self::assertEmpty($button->getUrl());
            self::assertEmpty($button->getCallbackData());
            self::assertSame('switch_inline_query_value', $button->getSwitchInlineQuery());
            self::assertEmpty($button->getSwitchInlineQueryCurrentChat());
            self::assertEmpty($button->getCallbackGame());
            self::assertEmpty($button->getPay());

            $button->setSwitchInlineQueryCurrentChat('switch_inline_query_current_chat_value');
            self::assertEmpty($button->getUrl());
            self::assertEmpty($button->getCallbackData());
            self::assertEmpty($button->getSwitchInlineQuery());
            self::assertSame('switch_inline_query_current_chat_value', $button->getSwitchInlineQueryCurrentChat());
            self::assertEmpty($button->getCallbackGame());
            self::assertEmpty($button->getPay());

            $button->setCallbackGame($callback_game = new CallbackGame([]));
            self::assertEmpty($button->getUrl());
            self::assertEmpty($button->getCallbackData());
            self::assertEmpty($button->getSwitchInlineQuery());
            self::assertEmpty($button->getSwitchInlineQueryCurrentChat());
            self::assertSame($callback_game, $button->getCallbackGame());
            self::assertEmpty($button->getPay());

            $button->setPay(true);
            self::assertEmpty($button->getUrl());
            self::assertEmpty($button->getCallbackData());
            self::assertEmpty($button->getSwitchInlineQuery());
            self::assertEmpty($button->getSwitchInlineQueryCurrentChat());
            self::assertEmpty($button->getCallbackGame());
            self::assertTrue($button->getPay());
        }
    }