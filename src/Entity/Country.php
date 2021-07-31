<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private string $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string",  name="iso_code", length=3, nullable=true)
     */
    private string $isoCode;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private string $currency;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="country")
     */
    private $orders;

    /**
     * @ORM\OneToMany(targetEntity=CountryKit::class, mappedBy="country")
     */
    private $kits;

    public function __construct()
    {
        $this->patients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIsoCode(): ?string
    {
        return $this->isoCode;
    }

    /**
     * @param string|null $isoCode
     * @return $this
     */
    public function setIsoCode(?string $isoCode): self
    {
        $this->isoCode = $isoCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }
//
//    /**
//     * @param Order $order
//     * @return $this
//     */
//    public function addOrder(Order $order): self
//    {
//        if (!$this->orders->contains($order)) {
//            $this->orders[] = $order;
//            $order->setCountry($this);
//        }
//
//        return $this;
//    }

    /**
     * @return string
     */
    public function __toString(){
        return $this->name;
    }

}
