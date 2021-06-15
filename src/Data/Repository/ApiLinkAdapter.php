<?php

declare(strict_types=1);

namespace App\Data\Repository;

use App\Data\Entity\ApiLink;
use App\Data\Service\ApiLinkInterface;

/**
 * ApiLinkAdapter
 * get api link data 
 * @package App\Data\Repository
 */
class ApiLinkAdapter implements ApiLinkInterface
{
    /**
     * Advirtisor API link 
     *
     * @param string $link
     */
    private $ApiLink;
    public function __construct()
    {
        $this->ApiLink = new ApiLink();
    }
    /**
     * Get API link data 
     *
     * @param string $link
     * @return array
     */
    public function getApiData(string $link): array
    {
        $this->ApiLink->setApiLink($link);
        $linkData = $this->ApiLink->getApiLinkData();
        return $linkData;
    }
}