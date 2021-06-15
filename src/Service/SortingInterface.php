<?php

declare(strict_types=1);

namespace App\Service;

/**
 * SortingInterface
 *
 * @package App\Service  
 */
interface SortingInterface
{
    /**
     * Get rooms data after sorting 
     *
     * @param array $rooms
     * @return array
     */
    public function getRoomsAfterSorting(array $roomsData): array;
}