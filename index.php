<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\AdvertisorsData;

// get adverisors api linkes 
$adverisorsApiArray = ['https://f704cb9e-bf27-440c-a927-4c8e57e3bad1.mock.pstmn.io/s2/availability', 'https://f704cb9e-bf27-440c-a927-4c8e57e3bad1.mock.pstmn.io/s1/availability'];

if (count($adverisorsApiArray) > 0) {
    $AdvertisorsData = new AdvertisorsData($adverisorsApiArray);
    $AdvertisorsData->getAdvertisorsRoomsJson();
} else {
    echo json_encode(array('status' => 200, 'foundRooms' => false, 'rooms' => []));
}