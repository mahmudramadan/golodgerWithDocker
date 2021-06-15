<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Hotel;

/** 
 * Room
 * Room properity like name and price ...etc
 * @package App\Entity  
 */
class Room
{
    /**
     * Room code
     *
     * @var string $code
     */
    protected $code;
    /**
     * Room net Price
     *
     * @var float $netPrice
     */
    protected $netPrice;
    /**
     * Room total Price
     *
     * @var float $totalPrice
     */
    protected $totalPrice;
    /**
     * Room Name
     *
     * @var string $roomName
     */
    protected $roomName;
    /**
     * Room taxes
     *
     * @var float $taxes
     */
    protected $taxes;
    /**
     * Room hotel
     *
     * @var Hotel $hotel
     */
    protected $hotel;
    /**
     * Set Room code
     *
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }
    /**
     * Get Room code
     *
     * @return string $code
     */
    public function getCode(): string
    {
        return $this->code;
    }
    /**
     * Set Room net price
     *
     * @param float $netPrice
     */
    public function setNetPrice(float $netPrice)
    {
        $this->netPrice = $netPrice;
    }
    /**
     * Get Room net price
     *
     * @return float $netPrice
     */
    public function getNetPrice(): float
    {
        return $this->netPrice;
    }
    /**
     * Set Room total price
     *
     * @param float $totalPrice
     */
    public function setTotalPrice(float $totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }
    /**
     * Get Room total price
     *
     * @return float $totalPrice
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }
    /**
     * Set Room name
     *
     * @param string $name
     */
    public function setRoomName(string $roomName = '')
    {
        $this->roomName = $roomName;
    }
    /**
     * Get Room name
     *
     * @return string $name
     */
    public function getRoomName(): string
    {
        return $this->roomName;
    }
    /**
     * Get Room taxes
     *
     * @return float $taxes
     */
    function getTaxes(): float
    {
        return $this->taxes;
    }
    /**
     * Set Room taxes
     *
     * @param float $taxes
     */
    function setTaxes(float $taxes)
    {
        $this->taxes = $taxes;
    }
    /**
     * Get Room hotel
     *
     * @return Hotel $hotel
     */
    function getHotel(): Hotel
    {
        return $this->hotel;
    }
    /**
     * Set Room hotel
     *
     * @param Hotel $hotel
     */
    function setHotel(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }
}