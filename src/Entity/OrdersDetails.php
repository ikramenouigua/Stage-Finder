<?php

namespace App\Entity;

use App\Repository\OrdersDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersDetailsRepository::class)]
class OrdersDetails
{
    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Orders::class, inversedBy: 'ordersDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $orders;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Offres::class, inversedBy: 'ordersDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $offres;

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getOffres(): ?Offres
    {
        return $this->offress;
    }

    public function setOffres(?Offres $offres): self
    {
        $this->offres = $offres;

        return $this;
    }
}
