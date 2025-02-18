<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 24)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $month_price = null;

    #[ORM\Column]
    private ?int $day_price = null;

    #[ORM\Column(length: 24)]
    private ?string $gearbox = null;

    #[ORM\Column]
    private ?int $places = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthPrice(): ?int
    {
        return $this->month_price;
    }

    public function getFormattedMonthPrice(): ?string
    {
        return number_format($this->getMonthPrice() / 100, 2, ',', ' ');
    }

    public function setMonthPrice(string $month_price): static
    {
        $this->month_price = (int) str_replace(',', '', $month_price);

        return $this;
    }

    public function getDayPrice(): ?int
    {
        return $this->day_price;
    }

    public function getFormattedDayPrice(): ?string
    {
        return number_format(intval($this->day_price) / 100, 2, ',', ' ');
    }

    public function setDayPrice(string $day_price): static
    {
        $this->day_price = (int) str_replace(',', '', $day_price);

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->gearbox;
    }

    public function getFormattedGearbox(): ?string
    {
        return $this->getGearbox() === 'manual' ? 'Manuelle' : 'Automatique';
    }

    public function setGearbox(string $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
