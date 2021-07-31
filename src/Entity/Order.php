<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 * @ORM\HasLifecycleCallbacks
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="orders")
     */
    private object $country;

    /**
     * @ORM\ManyToOne(targetEntity=Kit::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private object $kit;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private object $patient;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $paid;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    private \DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    private \DateTime $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @param Country|null $country
     * @return $this
     */
    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Kit|null
     */
    public function getKit(): ?Kit
    {
        return $this->kit;
    }

    /**
     * @param Kit|null $kit
     * @return $this
     */
    public function setKit(?Kit $kit): self
    {
        $this->kit = $kit;

        return $this;
    }

    /**
     * @return Patient|null
     */
    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    /**
     * @param Patient|null $patient
     * @return $this
     */
    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPaid(): ?bool
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     * @return $this
     */
    public function setPaid(bool $paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PostPersist
     */
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
