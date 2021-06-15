<?php

declare(strict_types=1);

namespace App\Repository;

/** 
 * ApiService
 * get all data from api link 
 * @package App\Repository  
 */

use App\Entity\Hotel;
use App\Entity\Room;

class ApiRepository
{
    /**
     * hotelData conatin all hotel data included rooms
     * @var $hotelData
     */
    protected $hotelData;

    public function __construct(array $data)
    {
        $this->hotelData = $data;
    }
    /**
     * Return All Rooms after setting properties
     *
     * @return array $Rooms
     */
    public function getApiRooms(): array
    {
        $Rooms = [];
        foreach ($this->hotelData  as $hotelDataItem) {
            $hotel = new Hotel();
            $hotel->setStars($hotelDataItem['stars']);
            $hotel->setName($hotelDataItem['name']);
            $hotelRooms = $hotelDataItem['rooms'];
            if (count($hotelRooms) > 0) {
                foreach ($hotelRooms as $roomData) {
                    $room = new Room();
                    $room->setCode($roomData['code']);
                    $room->setRoomName(isset($roomData['name']) ? $roomData['name'] : "Not Defined");
                    $room->setNetPrice(isset($roomData['net_price']) ? (float) $roomData['net_price'] : (float) $roomData['net_rate']);
                    $room->setTotalPrice(isset($roomData['totalPrice']) ? (float) $roomData['totalPrice'] : (float) $roomData['total']);
                    $room->setHotel($hotel);
                    $room->setTaxes(isset($roomData['taxes']) ? $this->calculateRoomTaxes($roomData['taxes']) : 0);
                    $Rooms[] = $room;
                }
            }
        }
        return $Rooms;
    }
    /**
     * calculate room taxes and may be there are many taxes 
     * @param array $roomTaxes
     * @return float $roomTaxesVal
     */
    public function calculateRoomTaxes(array $roomTaxes): float
    {
        if (isset($roomTaxes['amount'])) {
            return (float)$roomTaxes['amount'];
        }
        $roomTaxesVal = 0;
        foreach ($roomTaxes as $tax) {
            $taxVal = (float)$tax['amount'];
            $roomTaxesVal += $taxVal;
        }
        return $roomTaxesVal;
    }
}