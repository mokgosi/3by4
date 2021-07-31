<?php

namespace App\Entity\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

class OrderDTO implements GroupSequenceProviderInterface
{
    /**
     * @Assert\NotBlank
     * @Assert\Type(type="App\Entity\Country")
     * @Assert\Valid
     */
    public object $country;

    /**
     * @Assert\NotBlank
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

    /**
     * @return array
     */
    public function getGroupSequence() {
        return ['OrderDTO', 'Strict', 'Default'];
    }
}
