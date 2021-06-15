<?php

declare(strict_types=1);

namespace App\Data\Entity;

/**
 * ApiLink
 * connect to Api url 
 * @package App\Data\Entity
 */
class ApiLink
{
    /**
     * Link of API Advertisor
     * @param string 
     */
    private $link;
    /**
     * link data 
     * @param array $ApiLinkData 
     */
    private $ApiLinkData;
    /**
     * set api link 
     * @param string $link
     */
    public function setApiLink(string $link)
    {
        $this->link = $link;
    }
    /**
     * get api link data 
     * 
     * @return array $ApiLinkData
     */
    public function getApiLinkData(): array
    {
        //  Initiate curl
        $ch = curl_init();
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL, $this->link);
        // Execute
        $result = curl_exec($ch);
        // Closing
        curl_close($ch);
        $ApiData = json_decode($result, true);
        if (isset($ApiData['error'])) {
            $this->ApiLinkData = [];
        } else {
            $this->ApiLinkData = $ApiData;
        }
        return $this->ApiLinkData;
    }
}