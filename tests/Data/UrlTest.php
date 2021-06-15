<?php

declare(strict_types=1);

use App\Data\Repository\ApiLinkAdapter;
use PHPUnit\Framework\TestCase;

/**
 * UrlTest
 * @return array 
 */

final class UrlTest extends TestCase
{
    private $link;
    public function testUrlReturnArray(): void
    {
        $this->link = "https://f704cb9e-bf27-440c-a927-4c8e57e3bad1.mock.pstmn.io/s1/availability";
        $ApiLinkAdapter = new ApiLinkAdapter();
        $this->assertIsArray($ApiLinkAdapter->getApiData($this->link));
    }
}