<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
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
     * @ORM\ManyToOne(targetEntity=ItemType::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $item_type;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $ammount;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="items")
     */
    private $company;

    /**
     * @ORM\OneToMany(targetEntity=ItemInfo::class, mappedBy="item")
     */
    private $itemInfos;

    /**
     * @ORM\OneToMany(targetEntity=ItemImage::class, mappedBy="item")
     */
    private $itemImages;

    /**
     * @ORM\OneToMany(targetEntity=RelatedItem::class, mappedBy="item")
     */
    private $relatedItems;

    public function __construct()
    {
        $this->itemInfos = new ArrayCollection();
        $this->itemImages = new ArrayCollection();
        $this->relatedItems = new ArrayCollection();
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

    public function getAmmount(): ?int
    {
        return $this->ammount;
    }

    public function setAmmount(int $ammount): self
    {
        $this->ammount = $ammount;

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
            $itemInfo->setItem($this);
        }

        return $this;
    }

    public function removeItemInfo(ItemInfo $itemInfo): self
    {
        if ($this->itemInfos->removeElement($itemInfo)) {
            // set the owning side to null (unless already changed)
            if ($itemInfo->getItem() === $this) {
                $itemInfo->setItem(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ItemImage[]
     */
    public function getItemImages(): Collection
    {
        return $this->itemImages;
    }

    public function addItemImage(ItemImage $itemImage): self
    {
        if (!$this->itemImages->contains($itemImage)) {
            $this->itemImages[] = $itemImage;
            $itemImage->setItem($this);
        }

        return $this;
    }

    public function removeItemImage(ItemImage $itemImage): self
    {
        if ($this->itemImages->removeElement($itemImage)) {
            // set the owning side to null (unless already changed)
            if ($itemImage->getItem() === $this) {
                $itemImage->setItem(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RelatedItem[]
     */
    public function getRelatedItems(): Collection
    {
        return $this->relatedItems;
    }

    public function addRelatedItem(RelatedItem $relatedItem): self
    {
        if (!$this->relatedItems->contains($relatedItem)) {
            $this->relatedItems[] = $relatedItem;
            $relatedItem->setItem($this);
        }

        return $this;
    }

    public function removeRelatedItem(RelatedItem $relatedItem): self
    {
        if ($this->relatedItems->removeElement($relatedItem)) {
            // set the owning side to null (unless already changed)
            if ($relatedItem->getItem() === $this) {
                $relatedItem->setItem(null);
            }
        }

        return $this;
    }

    public function getItemType(): ?ItemType
    {
        return $this->item_type;
    }

    public function setItemType(?ItemType $item_type): self
    {
        $this->item_type = $item_type;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }
}
