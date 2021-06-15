<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\entity\RectangleClass;
use App\Repository\ApiRepository;
use App\Service\ApiService;

final class SortRoomsTest extends TestCase
{

    /**
     * Test sort room by price and remove duplicated
     *
     * @return void
     * @throws \Exception
     */
    public function testSortedData(): void
    {
        $allHotelData = include __DIR__ . '/../../data/sampleData.php';
        $exactlySortedRooms = include __DIR__ . '/../../data/exactlySortedRooms.php';

        // get all rooms in hotels and set room details like name , price ...etc
        $apiRepository = new ApiRepository($allHotelData);
        $allRooms = $apiRepository->getApiRooms();

        // sort all hotels and remove duplicated rooms whith more price 
        $apiService = new ApiService();
        $roomSortedData = $apiService->getRoomsAfterSorting($allRooms);
        foreach ($roomSortedData as $key => $Room) {
            self::assertSame($exactlySortedRooms[$key]['code'], $Room['code']);
            self::assertSame($exactlySortedRooms[$key]['hotel']['name'], $Room['hotelName']);
            self::assertEquals($exactlySortedRooms[$key]['totalPrice'], $Room['totalPrice']);
        }
    }
}