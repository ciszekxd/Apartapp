<?php

namespace App\Entity;

use App\Repository\InputFormRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InputFormRepository::class)
 */
class InputForm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $arrivalDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $lengthOfVisit;

    /**
     * @ORM\Column(type="integer")
     */
    private $AmountOfPeople;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrivalDate;
    }

    public function setArrivalDate(\DateTimeInterface $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    public function getLengthOfVisit(): ?int
    {
        return $this->lengthOfVisit;
    }

    public function setLengthOfVisit(int $lengthOfVisit): self
    {
        $this->lengthOfVisit = $lengthOfVisit;

        return $this;
    }

    public function getAmountOfPeople(): ?int
    {
        return $this->AmountOfPeople;
    }

    public function setAmountOfPeople(int $AmountOfPeople): self
    {
        $this->AmountOfPeople = $AmountOfPeople;

        return $this;
    }
}
