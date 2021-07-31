<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryKitRepository::class)
 * @ORM\Table(name="country_kit")
 */
class CountryKit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="kits"))
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="Kit", inversedBy="countryKits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kit;

    /**
     * @ORM\Column(type="float")
     */
    private float $price;

    /**
     * @return mixed
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getKit(): Kit
    {
        return $this->kit;
    }

    /**
     * @param mixed $kit
     */
    public function setKit(Kit $kit): void
    {
        $this->kit = $kit;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}