<?php

    namespace PHPBotts\Core\Tests\Unit\Entities;

    use PHPBotts\Core\Entities\Location;
    use PHPBotts\Core\Tests\Unit\TestCase;

    class LocationTest extends TestCase
    {
        private $coordinates;

        public function setUp(): void
        {
            $this->coordinates = [
                'longitude' => (float) mt_rand(10, 69),
                'latitude'  => (float) mt_rand(10, 48),
            ];
        }

        public function testBaseStageLocation(): void
        {
            $location = new Location($this->coordinates);
            self::assertInstanceOf(Location::class, $location);
        }

        public function testGetLongitude(): void
        {
            $location = new Location($this->coordinates);
            $long     = $location->getLongitude();
            self::assertIsFloat($long);
            self::assertEquals($this->coordinates['longitude'], $long);
        }

        public function testGetLatitude(): void
        {
            $location = new Location($this->coordinates);
            $lat      = $location->getLatitude();
            self::assertIsFloat($lat);
            self::assertEquals($this->coordinates['latitude'], $lat);
        }
    }