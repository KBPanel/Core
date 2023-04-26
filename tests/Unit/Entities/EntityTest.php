<?php

    namespace PHPBotts\Core\Tests\Unit\Entities;

    use PHPBotts\Core\Entities\Entity;
    use PHPBotts\Core\Tests\Unit\TestCase;

    class EntityTest extends TestCase
    {
        public function testEscapeMarkdown(): void
        {
            // Make sure all characters that need escaping are escaped.

            // Markdown V1
            self::assertEquals('\[\`\*\_', Entity::escapeMarkdown('[`*_'));
            self::assertEquals('\*mark\*\_down\_~test~', Entity::escapeMarkdown('*mark*_down_~test~'));

            // Markdown V2
            self::assertEquals('\_\*\[\]\(\)\~\`\>\#\+\-\=\|\{\}\.\!', Entity::escapeMarkdownV2('_*[]()~`>#+-=|{}.!'));
            self::assertEquals('\*mark\*\_down\_\~test\~', Entity::escapeMarkdownV2('*mark*_down_~test~'));
        }
    }