<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EcuRepository")
 */
class Ecu
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
     * @ORM\Column(name="ecuname", type="string", length=255)
     */
    private $ecuname;


    /**

     * @ORM\OneToMany(targetEntity="App\Entity\EcuSpeciality", mappedBy="ecuid")

     */

    private $ecuspeciality;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ecuspeciality = new ArrayCollection();
    }

    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Ecu
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
     * Set ecuname.
     *
     * @param string $ecuname
     *
     * @return Ecu
     */
    public function setEcuname($ecuname)
    {
        $this->ecuname = $ecuname;

        return $this;
    }

    /**
     * Get ecuname.
     *
     * @return string
     */
    public function getEcuname()
    {
        return $this->ecuname;
    }


    /**
     * Get ecuspeciality.
     *
     * @return Collection|EcuSpeciality[]
     */
    public function getEcuspeciality() : Collection
    {
        return $this->ecuspeciality;
    }




    public function addEcuspeciality(EcuSpeciality $ecuspeciality): self
    {
        if (!$this->ecuspeciality->contains($ecuspeciality)) {
            $this->ecuspeciality[] = $ecuspeciality;
        }

        return $this;
    }


    public function removeEcuspeciality(EcuSpeciality $ecuspeciality): self
    {
        if ($this->ecuspeciality->contains($ecuspeciality)) {
            $this->ecuspeciality->removeElement($ecuspeciality);
        }

        return $this;
    }







}
