<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $street;

    /**
     * @ORM\Column(type="integer")
     */
    private $street_number;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $street_number_2;

    /**
     * @ORM\Column(type="string", length=85)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $zipcode;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="addresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getStreetNumber(): ?int
    {
        return $this->street_number;
    }

    public function setStreetNumber(int $street_number): self
    {
        $this->street_number = $street_number;

        return $this;
    }

    public function getStreetNumber2(): ?int
    {
        return $this->street_number_2;
    }

    public function setStreetNumber2(?int $street_number_2): self
    {
        $this->street_number_2 = $street_number_2;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCountryId(): ?Country
    {
        return $this->country_id;
    }

    public function setCountryId(?Country $country_id): self
    {
        $this->country_id = $country_id;

        return $this;
    }
}
