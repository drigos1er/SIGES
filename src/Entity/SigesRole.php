<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SigesRoleRepository")
 */
class SigesRole
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SigesUser", inversedBy="sigesRoles")
     */
    private $sigesusers;

    public function __construct()
    {
        $this->sigesusers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|SigesUser[]
     */
    public function getSigesusers(): Collection
    {
        return $this->sigesusers;
    }

    public function addSigesuser(SigesUser $sigesuser): self
    {
        if (!$this->sigesusers->contains($sigesuser)) {
            $this->sigesusers[] = $sigesuser;
        }

        return $this;
    }

    public function removeSigesuser(SigesUser $sigesuser): self
    {
        if ($this->sigesusers->contains($sigesuser)) {
            $this->sigesusers->removeElement($sigesuser);
        }

        return $this;
    }
}
