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
    private $food_name;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="food")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $cooked_at;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFoodName(): ?FoodName
    {
        return $this->food_name;
    }

    public function setFoodName(?FoodName $food_name): self
    {
        $this->food_name = $food_name;

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
}
