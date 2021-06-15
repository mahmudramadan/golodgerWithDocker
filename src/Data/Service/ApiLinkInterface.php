<?php

declare(strict_types=1);

namespace App\Data\Service;

/**
 * ApiLinkInterface
 *
 * @package App\Data\Service
 */
interface ApiLinkInterface
{
    /**
     * Get API link data 
     *
     * @param string $link
     * @return array
     */
    public function getApiData(string $link): array;
}