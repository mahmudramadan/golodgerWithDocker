<?php

declare(strict_types=1);

namespace App;

use App\Data\Repository\ApiLinkAdapter;
use App\Repository\ApiRepository;
use App\Service\ApiService;

/**
 * AdvertisorsData
 *
 * @package App  
 */
class AdvertisorsData
{
    /**
     * advertisors array 
     *
     * @var array $advertisors
     */
    protected $advertisors;

    public function __construct(array $advertisors)
    {
        $this->advertisors = $advertisors;
    }
    /**
     * Return All Hotel rooms data after soring 
     *
     * @return array allHotelData
     */
    public function getAdvertisorsRoomsJson()
    {
        // all data will be inserted in this array $allHotelData
        $allHotelData = [];
        foreach ($this->advertisors  as $adverisorsApiItem) {
            $apiLinkObj = new ApiLinkAdapter();
            // get data from advertisor API link
            $hotelData = $apiLinkObj->getApiData($adverisorsApiItem);
            if (count($hotelData) > 0) {
                foreach ($hotelData['hotels'] as $hotelDataItem) {
                    $allHotelData[] = $hotelDataItem;
                }
            }
        }
        if (count($allHotelData) > 0) {
            // get all rooms in hotels and set room details like name , price ...etc
            $apiRepository = new ApiRepository($allHotelData);
            $allRooms = $apiRepository->getApiRooms();

            // sort all hotels and remove duplicated rooms whith more price 
            $apiService = new ApiService();
            $roomSortedData = $apiService->getRoomsAfterSorting($allRooms);
           return json_encode(array('status' => 200, 'foundRooms' => true, 'rooms' => $roomSortedData));
        } 
            // ther is no hotel rooms
            return json_encode(array('status' => 200, 'foundRooms' => false, 'rooms' => []));
        
    }
}
