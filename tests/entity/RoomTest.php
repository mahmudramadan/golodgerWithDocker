<?php

declare(strict_types=1);

namespace Entity;

use App\Entity\Hotel;
use App\Entity\Room;
use PHPUnit\Framework\TestCase;

/**
 * RoomTest
 * test setter and getter of room data 
 */
final class RoomTest extends TestCase
{

    private $hotel;
    private $room;
    /**
     * test setter functions
     */
    protected function setUp(): void
    {
        $this->hotel = new Hotel();
        $this->hotel->setName('Hotel A');
        $this->hotel->setStars(5);
        $this->room = new Room();
        $this->room->setCode("DBL-TWN");
        $this->room->setRoomName("Double or Twin SUPERIOR");
        $this->room->setNetPrice(250.00);
        $this->room->setTaxes(10.00);
        $this->room->setTotalPrice(260.00);
        $this->room->setHotel($this->hotel);
    }
    /**
     * test Getter functions
     */
    public function testGetter(): void
    {
        self::assertSame("DBL-TWN", $this->room->getCode());
        self::assertSame("Double or Twin SUPERIOR", $this->room->getRoomName());
        self::assertEquals(250.00, $this->room->getNetPrice());
        self::assertEquals(10.00, $this->room->getTaxes());
        self::assertEquals(260.00, $this->room->getTotalPrice());
        self::assertSame($this->hotel, $this->room->getHotel());
    }
}