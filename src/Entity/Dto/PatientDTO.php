<?php

namespace App\Entity\Dto;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

class PatientDTO implements GroupSequenceProviderInterface
{
    /**
     * @var string
     * @Assert\NotBlank(message="First Name is required.")
     * @Assert\Regex(pattern="/^[a-zA-Z- ]+$/")
     * @Assert\Length(min = 2, max = 50,
     *    minMessage = "This value must be at least {{ min }} characters long.",
     *    maxMessage = "This value cannot be longer than {{ max }} characters.",
     *    allowEmptyString = false
     * )
     */
    public string $firstName;

    /**
     * @var string
     * @Assert\NotBlank(message="Last Name is required.")
     * @Assert\Regex(pattern="/^[a-zA-Z- ]+$/")
     * @Assert\Length(min = 2, max = 50,
     *    minMessage = "This value must be at least {{ min }} characters long.",
     *    maxMessage = "This value cannot be longer than {{ max }} characters.",
     *    allowEmptyString = false
     * )
     */
    public string $lastName;

    /**
     * @Assert\NotBlank(message="Email is required.")
     * @Assert\Email(
     *     message = "This value is not a valid email address.",
     *     mode = "strict"
     * )
     */
    public string $email;

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return array
     */
    public function getGroupSequence() {
        return ['PatientDTO', 'Strict', 'Default'];
    }
}
