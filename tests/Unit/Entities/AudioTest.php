<?php

    namespace PHPBotts\Core\Tests\Unit\Entities;

    use PHPBotts\Core\Entities\Audio;
    use PHPBotts\Core\Tests\Unit\TestCase;
    use PHPBotts\Core\Tests\Unit\TestHelpers;

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