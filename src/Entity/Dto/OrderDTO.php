<?php

namespace App\Entity\Dto;

use App\Entity\Order;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

class OrderDTO implements GroupSequenceProviderInterface
{
    /**
     * @Assert\NotBlank(message="Country is required.")
     * @Assert\Type(type="App\Entity\Country")
     * @Assert\Valid
     */
    private $country;

    /**
     * @Assert\NotBlank(message="Kit is required.")
     * @Assert\Type(type="App\Entity\Kit")
     * @Assert\Valid
     */
    public object $kit;

    /**
     * @Assert\NotBlank
     * @Assert\Type(type="App\Entity\Patient")
     * @Assert\Valid
     */
    public object $patient;

    public bool $paid;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return array
     */
    public function getGroupSequence() {
        return ['OrderDTO', 'Strict', 'Default'];
    }
}
