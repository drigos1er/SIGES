<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SigesUserRepository")
 * @UniqueEntity(fields={"username"},
 * message="Cette valeur est dejà utilisé par un autre utilisateur"
 * )
 * @ORM\HasLifecycleCallbacks()
 */
class SigesUser implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=150,nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $speciality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $discipline;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $up;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $updprofil;

    /**
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $enabled;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_login;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="6", minMessage="Votre mot de passe doit faire minimum 6 caractères")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creatdat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $upddat;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $tokendat;



    /**
     * @Assert\EqualTo(propertyPath="password", message="Veuillez saisir un mot de passe identique")
     */
    public $confirm_password;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SigesRole", mappedBy="sigesusers")
     */
    private $sigesRoles;

    public function __construct()
    {
        $this->sigesRoles = new ArrayCollection();
    }



    /**
     * Permet de générer la date de création et de modification
     * @ORM\PrePersist
     * @throws \Exception
     */
    public function prePersist()
    {
        if (empty($this->creatdat)) {
            $this->creatdat =new \DateTime();
        }

        if (empty($this->upddat)) {
            $this->upddat=new \DateTime();
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
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

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getDiscipline(): ?string
    {
        return $this->discipline;
    }

    public function setDiscipline(string $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    public function getUp(): ?string
    {
        return $this->up;
    }

    public function setUp(string $up): self
    {
        $this->up = $up;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getUpdprofil(): ?bool
    {
        return $this->updprofil;
    }

    public function setUpdprofil(bool $updprofil): self
    {
        $this->updprofil = $updprofil;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->last_login;
    }

    public function setLastLogin(\DateTimeInterface $last_login): self
    {
        $this->last_login = $last_login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getCreatdat(): ?\DateTimeInterface
    {
        return $this->creatdat;
    }

    public function setCreatdat(\DateTimeInterface $creatdat): self
    {
        $this->creatdat = $creatdat;

        return $this;
    }

    public function getUpddat(): ?\DateTimeInterface
    {
        return $this->upddat;
    }

    public function setUpddat(\DateTimeInterface $upddat): self
    {
        $this->upddat = $upddat;

        return $this;
    }

    public function getTokendat(): ?\DateTimeInterface
    {
        return $this->tokendat;
    }

    public function setTokendat(\DateTimeInterface $tokendat): self
    {
        $this->tokendat = $tokendat;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        $roles=$this->sigesRoles->map(function ($sigesRoles) {

            return $sigesRoles->getTitle();
        }
        )->toArray();

        $roles[]= 'ROLE_USER';

        return $roles;

    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return Collection|SigesRole[]
     */
    public function getSigesRoles(): Collection
    {
        return $this->sigesRoles;
    }

    public function addSigesRole(SigesRole $sigesRole): self
    {
        if (!$this->sigesRoles->contains($sigesRole)) {
            $this->sigesRoles[] = $sigesRole;
            $sigesRole->addSigesuser($this);
        }

        return $this;
    }

    public function removeSigesRole(SigesRole $sigesRole): self
    {
        if ($this->sigesRoles->contains($sigesRole)) {
            $this->sigesRoles->removeElement($sigesRole);
            $sigesRole->removeSigesuser($this);
        }

        return $this;
    }
}
