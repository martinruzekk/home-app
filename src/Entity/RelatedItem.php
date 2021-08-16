<?php

namespace App\Entity;

use App\Repository\RelatedItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RelatedItemRepository::class)
 */
class RelatedItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="relatedItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $item_id;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="relatedItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $related_item_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemId(): ?Item
    {
        return $this->item_id;
    }

    public function setItemId(?Item $item_id): self
    {
        $this->item_id = $item_id;

        return $this;
    }

    public function getRelatedItemId(): ?Item
    {
        return $this->related_item_id;
    }

    public function setRelatedItemId(?Item $related_item_id): self
    {
        $this->related_item_id = $related_item_id;

        return $this;
    }
}
