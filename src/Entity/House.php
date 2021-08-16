<?php

namespace App\Entity;

use App\Repository\HouseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HouseRepository::class)
 */
class House
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
    private $name;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Address::class)
     */
    private $address_id;

    /**
     * @ORM\OneToMany(targetEntity=InventoryLocation::class, mappedBy="house_id")
     */
    private $inventoryLocations;

    public function __construct()
    {
        $this->inventoryLocations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddressId(): ?Address
    {
        return $this->address_id;
    }

    public function setAddressId(?Address $address_id): self
    {
        $this->address_id = $address_id;

        return $this;
    }

    /**
     * @return Collection|InventoryLocation[]
     */
    public function getInventoryLocations(): Collection
    {
        return $this->inventoryLocations;
    }

    public function addInventoryLocation(InventoryLocation $inventoryLocation): self
    {
        if (!$this->inventoryLocations->contains($inventoryLocation)) {
            $this->inventoryLocations[] = $inventoryLocation;
            $inventoryLocation->setHouseId($this);
        }

        return $this;
    }

    public function removeInventoryLocation(InventoryLocation $inventoryLocation): self
    {
        if ($this->inventoryLocations->removeElement($inventoryLocation)) {
            // set the owning side to null (unless already changed)
            if ($inventoryLocation->getHouseId() === $this) {
                $inventoryLocation->setHouseId(null);
            }
        }

        return $this;
    }
}
