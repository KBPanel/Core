<?php

    /**
     * This file is part of the PHPBot Telegram package.
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    namespace KSeven\TelegramBot\Tests\Unit\Entities;

    use KSeven\TelegramBot\Entities\File;
    use KSeven\TelegramBot\Tests\Unit\TestCase;

    class FileTest extends TestCase
    {
        /**
         * @var array
         */
        private $data;

        public function setUp(): void
        {
            $this->data = [
                'file_id'   => (int) mt_rand(1, 99),
                'file_size' => (int) mt_rand(100, 99999),
                'file_path' => 'home' . DIRECTORY_SEPARATOR . 'phpunit',
            ];
        }

        public function testBaseStageLocation(): void
        {
            $file = new File($this->data);
            self::assertInstanceOf(File::class, $file);
        }

        public function testGetFileId(): void
        {
            $file = new File($this->data);
            $id   = $file->getFileId();
            self::assertIsInt($id);
            self::assertEquals($this->data['file_id'], $id);
        }

        public function testGetFileSize(): void
        {
            $file = new File($this->data);
            $size = $file->getFileSize();
            self::assertIsInt($size);
            self::assertEquals($this->data['file_size'], $size);
        }

        public function testGetFilePath(): void
        {
            $file = new File($this->data);
            $path = $file->getFilePath();
            self::assertEquals($this->data['file_path'], $path);
        }

        public function testGetFileSizeWithoutData(): void
        {
            unset($this->data['file_size']);
            $file = new File($this->data);
            $id   = $file->getFileSize();
            self::assertNull($id);
        }

        public function testGetFilePathWithoutData(): void
        {
            unset($this->data['file_path']);
            $file = new File($this->data);
            $path = $file->getFilePath();
            self::assertNull($path);
        }
    }