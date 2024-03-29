<?php

    namespace PHPBotts\Core\Tests\Unit;

    use PHPBotts\Core\TelegramLog;
    use Monolog\Formatter\LineFormatter;
    use Monolog\Handler\StreamHandler;
    use Monolog\Logger;

    class TelegramLogTest extends TestCase
    {
        /**
         * @var array Dummy logfile paths
         */
        private static $logfiles = [
            'debug'  => '/tmp/php-telegram-bot-debug.log',
            'error'  => '/tmp/php-telegram-bot-error.log',
            'update' => '/tmp/php-telegram-bot-update.log',
        ];

        protected function setUp(): void
        {
            TelegramLog::initialize(
                new Logger('bot_log', [
                    (new StreamHandler(self::$logfiles['debug'], Logger::DEBUG))->setFormatter(new LineFormatter(null, null, true)),
                    (new StreamHandler(self::$logfiles['error'], Logger::ERROR))->setFormatter(new LineFormatter(null, null, true)),
                ]),
                new Logger('bot_log_updates', [
                    (new StreamHandler(self::$logfiles['update'], Logger::INFO))->setFormatter(new LineFormatter('%message%' . PHP_EOL)),
                ])
            );
        }

        protected function tearDown(): void
        {
            // Make sure no logger instance is set after each test.
            TestHelpers::setStaticProperty(TelegramLog::class, 'logger', null);
            TestHelpers::setStaticProperty(TelegramLog::class, 'update_logger', null);

            // Make sure no logfiles exist.
            foreach (self::$logfiles as $file) {
                file_exists($file) && unlink($file);
            }
        }

        public function testNullLogger(): void
        {
            TelegramLog::initialize(null, null);

            TelegramLog::debug('my debug log');
            TelegramLog::error('my error log');
            TelegramLog::update('my update log');

            foreach (self::$logfiles as $file) {
                self::assertFileDoesNotExist($file);
            }
        }

        public function testDebugStream(): void
        {
            $file = self::$logfiles['debug'];

            self::assertFileDoesNotExist($file);
            TelegramLog::debug('my debug log');
            TelegramLog::debug('my {place} {holder} debug log', ['place' => 'custom', 'holder' => 'placeholder']);

            self::assertFileExists($file);
            $debug_log = file_get_contents($file);
            self::assertStringContainsString('bot_log.DEBUG: my debug log', $debug_log);
            self::assertStringContainsString('bot_log.DEBUG: my custom placeholder debug log', $debug_log);
        }

        public function testErrorStream(): void
        {
            $file = self::$logfiles['error'];

            self::assertFileDoesNotExist($file);
            TelegramLog::error('my error log');
            TelegramLog::error('my {place} {holder} error log', ['place' => 'custom', 'holder' => 'placeholder']);

            self::assertFileExists($file);
            $error_log = file_get_contents($file);
            self::assertStringContainsString('bot_log.ERROR: my error log', $error_log);
            self::assertStringContainsString('bot_log.ERROR: my custom placeholder error log', $error_log);
        }

        public function testUpdateStream(): void
        {
            $file = self::$logfiles['update'];

            self::assertFileDoesNotExist($file);
            TelegramLog::update('my update log');
            TelegramLog::update('my {place} {holder} update log', ['place' => 'custom', 'holder' => 'placeholder']);

            self::assertFileExists($file);
            $update_log = file_get_contents($file);
            self::assertStringContainsString('my update log', $update_log);
            self::assertStringContainsString('my custom placeholder update log', $update_log);
        }
    }