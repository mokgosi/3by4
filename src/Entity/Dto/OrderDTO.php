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
    public $country;

    /**
     * @Assert\NotBlank(message="Kit is required.")
     * @Assert\Type(type="App\Entity\Kit")
     * @Assert\Valid
     */
    public $kit;

    /**
     * @Assert\Valid
     */
    public $patient;

    public bool $paid = false;

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
     * @return mixed
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @return mixed
     */
    public function getKit()
    {
        return $this->kit;
    }

     /**
     * @return mixed
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * @return array
     */
    public function getGroupSequence() {
        return ['OrderDTO', 'Strict', 'Default'];
    }
}
