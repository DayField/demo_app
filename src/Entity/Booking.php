<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookingRepository;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
#[ORM\Table(name: '`booking`')]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'bookings')]
    private $booker;

    #[ORM\ManyToOne(targetEntity: Ad::class, inversedBy: 'bookings')]
    private $ad;

    #[ORM\Column]
    private DateTime $createdAt;

    #[ORM\Column]
    #@Assert\Date(message="Merci de saisir une date valide")
    private DateTime $startingDate;

    #[ORM\Column]
    #@Assert\Date(message="Merci de saisir une date valide")
    private DateTime $endingDate;

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function prePersist()
    {
        if (empty($this->createdAt)) {
            $this->createdAt = new \DateTime();
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBooker(): ?User
    {
        return $this->booker;
    }

    public function setBooker(?User $booker): self
    {
        $this->booker = $booker;

        return $this;
    }

    public function getAd(): ?Ad
    {
        return $this->ad;
    }

    public function setAd(?Ad $ad): self
    {
        $this->ad = $ad;
        return $this;
    }

    /**
     * Get the value of startingDate
     */
    public function getStartingDate()
    {
        return $this->startingDate;
    }

    /**
     * Set the value of startingDate
     *
     * @return  self
     */
    public function setStartingDate($startingDate)
    {
        $this->startingDate = $startingDate;

        return $this;
    }

    /**
     * Get the value of endingDate
     */
    public function getEndingDate()
    {
        return $this->endingDate;
    }

    /**
     * Set the value of endingDate
     *
     * @return  self
     */
    public function setEndingDate($endingDate)
    {
        $this->endingDate = $endingDate;

        return $this;
    }
}
