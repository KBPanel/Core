<?php

    namespace PHPBotts\Core\Tests\Unit\Entities;

    use PHPBotts\Core\Entities\InlineKeyboard;
    use PHPBotts\Core\Entities\InlineKeyboardButton;
    use PHPBotts\Core\Exception\TelegramException;
    use PHPBotts\Core\Tests\Unit\TestCase;

    class InlineKeyboardTest extends TestCase
    {
        private function getRandomButton($text): InlineKeyboardButton
        {
            $random_params = ['url', 'callback_data', 'switch_inline_query', 'switch_inline_query_current_chat', 'pay'];
            $param         = $random_params[array_rand($random_params, 1)];
            $data          = [
                'text' => $text,
                $param => 'random_param',
            ];

            return new InlineKeyboardButton($data);
        }

        public function testInlineKeyboardDataMalformedField(): void
        {
            $this->expectException(TelegramException::class);
            $this->expectExceptionMessage('inline_keyboard field is not an array!');
            new InlineKeyboard(['inline_keyboard' => 'wrong']);
        }

        public function testInlineKeyboardDataMalformedSubfield(): void
        {
            $this->expectException(TelegramException::class);
            $this->expectExceptionMessage('inline_keyboard subfield is not an array!');
            new InlineKeyboard(['inline_keyboard' => ['wrong']]);
        }

        public function testInlineKeyboardSingleButtonSingleRow(): void
        {
            $inline_keyboard = (new InlineKeyboard(
                $this->getRandomButton('Button Text 1')
            ))->getProperty('inline_keyboard');
            self::assertSame('Button Text 1', $inline_keyboard[0][0]->getText());

            $inline_keyboard = (new InlineKeyboard(
                [$this->getRandomButton('Button Text 2')]
            ))->getProperty('inline_keyboard');
            self::assertSame('Button Text 2', $inline_keyboard[0][0]->getText());
        }

        public function testInlineKeyboardSingleButtonMultipleRows(): void
        {
            $keyboard = (new InlineKeyboard(
                $this->getRandomButton('Button Text 1'),
                $this->getRandomButton('Button Text 2'),
                $this->getRandomButton('Button Text 3')
            ))->getProperty('inline_keyboard');
            self::assertSame('Button Text 1', $keyboard[0][0]->getText());
            self::assertSame('Button Text 2', $keyboard[1][0]->getText());
            self::assertSame('Button Text 3', $keyboard[2][0]->getText());

            $keyboard = (new InlineKeyboard(
                [$this->getRandomButton('Button Text 4')],
                [$this->getRandomButton('Button Text 5')],
                [$this->getRandomButton('Button Text 6')]
            ))->getProperty('inline_keyboard');
            self::assertSame('Button Text 4', $keyboard[0][0]->getText());
            self::assertSame('Button Text 5', $keyboard[1][0]->getText());
            self::assertSame('Button Text 6', $keyboard[2][0]->getText());
        }

        public function testInlineKeyboardMultipleButtonsSingleRow(): void
        {
            $keyboard = (new InlineKeyboard([
                $this->getRandomButton('Button Text 1'),
                $this->getRandomButton('Button Text 2'),
            ]))->getProperty('inline_keyboard');
            self::assertSame('Button Text 1', $keyboard[0][0]->getText());
            self::assertSame('Button Text 2', $keyboard[0][1]->getText());
        }

        public function testInlineKeyboardMultipleButtonsMultipleRows(): void
        {
            $keyboard = (new InlineKeyboard(
                [
                    $this->getRandomButton('Button Text 1'),
                    $this->getRandomButton('Button Text 2'),
                ],
                [
                    $this->getRandomButton('Button Text 3'),
                    $this->getRandomButton('Button Text 4'),
                ]
            ))->getProperty('inline_keyboard');

            self::assertSame('Button Text 1', $keyboard[0][0]->getText());
            self::assertSame('Button Text 2', $keyboard[0][1]->getText());
            self::assertSame('Button Text 3', $keyboard[1][0]->getText());
            self::assertSame('Button Text 4', $keyboard[1][1]->getText());
        }

        public function testInlineKeyboardAddRows(): void
        {
            $keyboard_obj = new InlineKeyboard([]);

            $keyboard_obj->addRow($this->getRandomButton('Button Text 1'));
            $keyboard = $keyboard_obj->getProperty('inline_keyboard');
            self::assertSame('Button Text 1', $keyboard[0][0]->getText());

            $keyboard_obj->addRow(
                $this->getRandomButton('Button Text 2'),
                $this->getRandomButton('Button Text 3')
            );
            $keyboard = $keyboard_obj->getProperty('inline_keyboard');
            self::assertSame('Button Text 2', $keyboard[1][0]->getText());
            self::assertSame('Button Text 3', $keyboard[1][1]->getText());

            $keyboard_obj->addRow($this->getRandomButton('Button Text 4'));
            $keyboard = $keyboard_obj->getProperty('inline_keyboard');
            self::assertSame('Button Text 4', $keyboard[2][0]->getText());
        }
    }