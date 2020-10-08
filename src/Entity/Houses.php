<?php

namespace App\Entity;

use App\Repository\HousesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HousesRepository::class)
 */
class Houses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Address;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $Peice;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $Discount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getPeice(): ?string
    {
        return $this->Peice;
    }

    public function setPeice(string $Peice): self
    {
        $this->Peice = $Peice;

        return $this;
    }

    public function getDiscount(): ?string
    {
        return $this->Discount;
    }

    public function setDiscount(string $Discount): self
    {
        $this->Discount = $Discount;

        return $this;
    }
}