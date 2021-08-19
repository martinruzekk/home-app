<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
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
     * @ORM\ManyToOne(targetEntity=Address::class)
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=2048, nullable=true)
     */
    private $logo_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=2048, nullable=true)
     */
    private $website_url;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=320, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="company")
     */
    private $items;

    /**
     * @ORM\OneToMany(targetEntity=ItemInfo::class, mappedBy="retailer")
     */
    private $itemInfos;

    public function __construct()
    {
        $this->items = new ArrayCollection();
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

    public function getAddressId(): ?Address
    {
        return $this->address;
    }

    public function setAddressId(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(?string $logo_url): self
    {
        $this->logo_url = $logo_url;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->website_url;
    }

    public function setWebsiteUrl(?string $website_url): self
    {
        $this->website_url = $website_url;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setCompany($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getCompany() === $this) {
                $item->setCompany(null);
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
            $itemInfo->setRetailer($this);
        }

        return $this;
    }

    public function removeItemInfo(ItemInfo $itemInfo): self
    {
        if ($this->itemInfos->removeElement($itemInfo)) {
            // set the owning side to null (unless already changed)
            if ($itemInfo->getRetailer() === $this) {
                $itemInfo->setRetailer(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }
}
