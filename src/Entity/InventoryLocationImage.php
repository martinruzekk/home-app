<?php

namespace App\Entity;

use App\Repository\InventoryLocationImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InventoryLocationImageRepository::class)
 */
class InventoryLocationImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2048)
     */
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity=InventoryLocation::class, inversedBy="inventoryLocationImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $inventory_location;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getInventoryLocation(): ?InventoryLocation
    {
        return $this->inventory_location;
    }

    public function setInventoryLocation(?InventoryLocation $inventory_location): self
    {
        $this->inventory_location = $inventory_location;

        return $this;
    }
}
