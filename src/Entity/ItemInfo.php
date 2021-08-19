<?php

namespace App\Entity;

use App\Repository\ItemInfoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemInfoRepository::class)
 */
class ItemInfo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="itemInfos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $item;

    /**
     * @ORM\Column(type="datetime")
     */
    private $purchase_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expiration_date;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="itemInfos")
     */
    private $retailer;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_used;

    /**
     * @ORM\Column(type="float")
     */
    private $purchase_price;

    /**
     * @ORM\ManyToOne(targetEntity=InventoryLocation::class, inversedBy="itemInfos")
     */
    private $inventory_location;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->purchase_date;
    }

    public function setPurchaseDate(\DateTimeInterface $purchase_date): self
    {
        $this->purchase_date = $purchase_date;

        return $this;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expiration_date;
    }

    public function setExpirationDate(\DateTimeInterface $expiration_date): self
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }

    public function getLastUsed(): ?\DateTimeInterface
    {
        return $this->last_used;
    }

    public function setLastUsed(?\DateTimeInterface $last_used): self
    {
        $this->last_used = $last_used;

        return $this;
    }

    public function getPurchasePrice(): ?float
    {
        return $this->purchase_price;
    }

    public function setPurchasePrice(float $purchase_price): self
    {
        $this->purchase_price = $purchase_price;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getRetailer(): ?Company
    {
        return $this->retailer;
    }

    public function setRetailer(?Company $retailer): self
    {
        $this->retailer = $retailer;

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
