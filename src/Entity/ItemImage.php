<?php

namespace App\Entity;

use App\Repository\ItemImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemImageRepository::class)
 */
class ItemImage
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
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="itemImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $item_id;

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

    public function getItemId(): ?Item
    {
        return $this->item_id;
    }

    public function setItemId(?Item $item_id): self
    {
        $this->item_id = $item_id;

        return $this;
    }
}
