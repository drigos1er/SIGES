<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UeRepository")
 */
class Ue
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string",length=15)
     * @ORM\Id

     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="uename", type="string", length=100)
     */
    private $uename;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**

     * @ORM\OneToMany(targetEntity="App\Entity\UeSpeciality", mappedBy="ueid")

     */

    private $uespeciality;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->uespeciality = new ArrayCollection();
    }

    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Ue
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set uename.
     *
     * @param string $uename
     *
     * @return Ue
     */
    public function setUename($uename)
    {
        $this->uename = $uename;

        return $this;
    }

    /**
     * Get uename.
     *
     * @return string
     */
    public function getUename()
    {
        return $this->uename;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Ue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add uespeciality.
     *
     * @param UeSpeciality $uespeciality
     *
     * @return Ue
     */
    public function addUespeciality(UeSpeciality $uespeciality)
    {
        $this->uespeciality[] = $uespeciality;

        return $this;
    }

    /**
     * Remove uespeciality.
     *
     * @param UeSpeciality $uespeciality
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUespeciality(UeSpeciality $uespeciality)
    {
        return $this->uespeciality->removeElement($uespeciality);
    }

    /**
     * Get uespeciality.
     *
     * @return Collection|UeSpeciality
     */
    public function getUespeciality() : Collection
    {
        return $this->uespeciality;
    }
}
