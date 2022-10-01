<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Tests\Unit\Entities;

    use KSeven\TelegramBot\Entities\User;
    use KSeven\TelegramBot\Tests\Unit\TestCase;

    class UserTest extends TestCase
    {
        public function testInstance(): void
        {
            $user = new User(['id' => 1]);
            self::assertInstanceOf(User::class, $user);
        }

        public function testGetId(): void
        {
            $user = new User(['id' => 123]);
            self::assertEquals(123, $user->getId());
        }

        public function testTryMention(): void
        {
            // Username
            $user = new User(['id' => 1, 'first_name' => 'John', 'last_name' => 'Taylor', 'username' => 'jtaylor']);
            self::assertEquals('@jtaylor', $user->tryMention());

            // First name.
            $user = new User(['id' => 1, 'first_name' => 'John']);
            self::assertEquals('John', $user->tryMention());

            // First and Last name.
            $user = new User(['id' => 1, 'first_name' => 'John', 'last_name' => 'Taylor']);
            self::assertEquals('John Taylor', $user->tryMention());
        }

        public function testEscapeMarkdown(): void
        {
            // Username.
            $user = new User(['id' => 1, 'first_name' => 'John', 'last_name' => 'Taylor', 'username' => 'j_taylor']);
            self::assertEquals('@j_taylor', $user->tryMention());
            self::assertEquals('@j\_taylor', $user->tryMention(true));

            // First name.
            $user = new User(['id' => 1, 'first_name' => 'John[']);
            self::assertEquals('John[', $user->tryMention());
            self::assertEquals('John\[', $user->tryMention(true));

            // First and Last name.
            $user = new User(['id' => 1, 'first_name' => 'John', 'last_name' => '`Taylor`']);
            self::assertEquals('John `Taylor`', $user->tryMention());
            self::assertEquals('John \`Taylor\`', $user->tryMention(true));
        }

        public function testGetProperties(): void
        {
            // Username.
            $user = new User(['id' => 1, 'username' => 'name_phpunit']);
            self::assertEquals('name_phpunit', $user->getUsername());

            // First name.
            $user = new User(['id' => 1, 'first_name' => 'name_phpunit']);
            self::assertEquals('name_phpunit', $user->getFirstName());

            // Last name.
            $user = new User(['id' => 1, 'last_name' => 'name_phpunit']);
            self::assertEquals('name_phpunit', $user->getLastName());
        }
    }