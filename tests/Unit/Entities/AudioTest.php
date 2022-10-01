<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Tests\Unit\Entities;

    use KSeven\TelegramBot\Entities\Audio;
    use KSeven\TelegramBot\Tests\Unit\TestCase;
    use KSeven\TelegramBot\Tests\Unit\TestHelpers;

    class AudioTest extends TestCase
    {
        /**
         * @var array
         */
        private $record;

        public function setUp(): void
        {
            $this->record = TestHelpers::getFakeRecordedAudio();
        }

        public function testInstance(): void
        {
            $audio = new Audio($this->record);
            self::assertInstanceOf(Audio::class, $audio);
        }

        public function testGetProperties(): void
        {
            $audio = new Audio($this->record);
            self::assertEquals($this->record['file_id'], $audio->getFileId());
            self::assertEquals($this->record['duration'], $audio->getDuration());
            self::assertEquals($this->record['performer'], $audio->getPerformer());
            self::assertEquals($this->record['title'], $audio->getTitle());
            self::assertEquals($this->record['mime_type'], $audio->getMimeType());
            self::assertEquals($this->record['file_size'], $audio->getFileSize());
        }
    }