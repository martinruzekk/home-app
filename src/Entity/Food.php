<?php

namespace App\Entity;

use App\Repository\FoodRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FoodRepository::class)
 */
class Food
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FoodName::class, inversedBy="food")
     * @ORM\JoinColumn(nullable=false)
     */
    private $food_name_id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="food")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $cooked_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFoodNameId(): ?FoodName
    {
        return $this->food_name_id;
    }

    public function setFoodNameId(?FoodName $food_name_id): self
    {
        $this->food_name_id = $food_name_id;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getCookedAt(): ?\DateTimeImmutable
    {
        return $this->cooked_at;
    }

    public function setCookedAt(\DateTimeImmutable $cooked_at): self
    {
        $this->cooked_at = $cooked_at;

        return $this;
    }
}
