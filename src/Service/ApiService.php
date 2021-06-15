<?php

declare(strict_types=1);

namespace App\Service;

/**
 * ApiService
 *
 * @package App\Service  
 */

class ApiService implements SortingInterface
{
    /**
     * Get rooms data after sorting 
     *
     * @param array $roomsData
     * @return array $finalRoomsData
     */
    public function getRoomsAfterSorting(array $roomsData): array
    {
        $finalRoomsData = [];
        foreach ($roomsData as $roomItem) {
            $roomCode = $roomItem->getCode();
            $hotelName = $roomItem->getHotel()->getName();
            $arrIndex = $hotelName . "_" . $roomCode;
            $roomTotalPrice = $roomItem->getTotalPrice();
            $insertRoomStatus = true;
            if (isset($finalRoomsData[$arrIndex]) && $finalRoomsData[$arrIndex]['totalPrice'] <= $roomTotalPrice) {
                $insertRoomStatus = false;
            }
            if ($insertRoomStatus) {
                $roomItemData['code'] = $roomCode;
                $roomItemData['name'] = $roomItem->getRoomName();
                $roomItemData['netPrice'] = $roomItem->getNetPrice();
                $roomItemData['totalPrice'] = $roomTotalPrice;
                $roomItemData['taxes'] = $roomItem->getTaxes();
                $roomItemData['hotelName'] = $hotelName;
                $roomItemData['hotelStars'] = $roomItem->getHotel()->getStars();
                $finalRoomsData[$arrIndex] = $roomItemData;
            }
        }
        usort($finalRoomsData, function ($a, $b) {
            if ($a['totalPrice'] == $b['totalPrice']) return 0;
            return $a['totalPrice'] > $b['totalPrice'] ? 1 : -1;
        });
        return $finalRoomsData;
    }
}