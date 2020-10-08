<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationsRepository::class)
 */
class Reservations
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
     * @ORM\Column(type="date")
     */
    private $Rented_From;

    /**
     * @ORM\Column(type="date")
     */
    private $Rented_to;

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

    public function getRentedFrom(): ?\DateTimeInterface
    {
        return $this->Rented_From;
    }

    public function setRentedFrom(\DateTimeInterface $Rented_From): self
    {
        $this->Rented_From = $Rented_From;

        return $this;
    }

    public function getRentedTo(): ?\DateTimeInterface
    {
        return $this->Rented_to;
    }

    public function setRentedTo(\DateTimeInterface $Rented_to): self
    {
        $this->Rented_to = $Rented_to;

        return $this;
    }
}
