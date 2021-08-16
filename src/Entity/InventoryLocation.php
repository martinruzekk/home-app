<?php

namespace App\Entity;

use App\Repository\InventoryLocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InventoryLocationRepository::class)
 */
class InventoryLocation
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
     * @ORM\ManyToOne(targetEntity=House::class, inversedBy="inventoryLocations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $house_id;

    /**
     * @ORM\OneToMany(targetEntity=InventoryLocationImage::class, mappedBy="inventory_location_id")
     */
    private $inventoryLocationImages;

    /**
     * @ORM\OneToMany(targetEntity=ItemInfo::class, mappedBy="inventory_location_id")
     */
    private $itemInfos;

    public function __construct()
    {
        $this->inventoryLocationImages = new ArrayCollection();
        $this->itemInfos = new ArrayCollection();
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

    public function getHouseId(): ?House
    {
        return $this->house_id;
    }

    public function setHouseId(?House $house_id): self
    {
        $this->house_id = $house_id;

        return $this;
    }

    /**
     * @return Collection|InventoryLocationImage[]
     */
    public function getInventoryLocationImages(): Collection
    {
        return $this->inventoryLocationImages;
    }

    public function addInventoryLocationImage(InventoryLocationImage $inventoryLocationImage): self
    {
        if (!$this->inventoryLocationImages->contains($inventoryLocationImage)) {
            $this->inventoryLocationImages[] = $inventoryLocationImage;
            $inventoryLocationImage->setInventoryLocationId($this);
        }

        return $this;
    }

    public function removeInventoryLocationImage(InventoryLocationImage $inventoryLocationImage): self
    {
        if ($this->inventoryLocationImages->removeElement($inventoryLocationImage)) {
            // set the owning side to null (unless already changed)
            if ($inventoryLocationImage->getInventoryLocationId() === $this) {
                $inventoryLocationImage->setInventoryLocationId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ItemInfo[]
     */
    public function getItemInfos(): Collection
    {
        return $this->itemInfos;
    }

    public function addItemInfo(ItemInfo $itemInfo): self
    {
        if (!$this->itemInfos->contains($itemInfo)) {
            $this->itemInfos[] = $itemInfo;
            $itemInfo->setInventoryLocationId($this);
        }

        return $this;
    }

    public function removeItemInfo(ItemInfo $itemInfo): self
    {
        if ($this->itemInfos->removeElement($itemInfo)) {
            // set the owning side to null (unless already changed)
            if ($itemInfo->getInventoryLocationId() === $this) {
                $itemInfo->setInventoryLocationId(null);
            }
        }

        return $this;
    }
}
