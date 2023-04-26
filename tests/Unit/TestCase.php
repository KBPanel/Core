<?php

    namespace PHPBotts\Core\Tests\Unit;

    use PHPUnit\Framework\TestCase as BaseTestCase;

    class TestCase extends BaseTestCase
    {
        /**
         * @var string
         */
        public static $dummy_api_key = '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11';

        protected function skip64BitTest(): void
        {
            if (PHP_INT_SIZE === 4) {
                self::markTestSkipped(
                    'Skipping test that can run only on a 64-bit build of PHP.'
                );
            }
        }
    }