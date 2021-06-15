<?php

declare(strict_types=1);

namespace App\Entity;

/** 
 * Hotel
 * Hotel properity like name and stars
 * @package App\Entity  
 */
class Hotel
{
    /**
     * Hotel Name
     *
     * @var string $name
     */
    protected $name;
    /**
     * Hotel stars
     *
     * @var int $stars
     */
    protected $stars;
    /**
     * Get Hotel stars
     *
     * @return int $stars
     */
    function getStars(): int
    {
        return $this->stars;
    }
    /**
     * Set Hotel Stars
     *
     * @param int $stars
     */
    function setStars(int $stars)
    {
        $this->stars = $stars;
    }
    /**
     * Get Hotel name
     *
     * @return int $stars
     */
    function getName(): string
    {
        return $this->name;
    }
    /**
     * Set Hotel name
     *
     * @param string $name
     */
    function setName(string $name)
    {
        $this->name = $name;
    }
}