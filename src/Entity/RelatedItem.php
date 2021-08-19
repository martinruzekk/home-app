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
    private $item;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="relatedItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $related_item;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRelatedItem(): ?Item
    {
        return $this->related_item;
    }

    public function setRelatedItem(?Item $related_item): self
    {
        $this->related_item = $related_item;

        return $this;
    }
}
