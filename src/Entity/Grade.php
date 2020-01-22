<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GradeRepository")
 */
class Grade
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
     * @ORM\Column(name="gradename", type="string", length=15)
     */
    private $gradename;

    /**

     * @ORM\ManyToMany(targetEntity="App\Entity\Speciality", mappedBy="grades",cascade={"persist"})
     *

     */

    private $specialities;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->specialities = new ArrayCollection();
    }

    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Grade
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
     * Set gradename.
     *
     * @param string $gradename
     *
     * @return Grade
     */
    public function setGradename($gradename)
    {
        $this->gradename = $gradename;

        return $this;
    }

    /**
     * Get gradename.
     *
     * @return string
     */
    public function getGradename()
    {
        return $this->gradename;
    }

    /**
     * Add speciality.
     *
     * @param Speciality $speciality
     *
     * @return Grade
     */
    public function addSpeciality(Speciality $speciality)
    {
        $this->specialities[] = $speciality;

        return $this;
    }

    /**
     * Remove speciality.
     *
     * @param Speciality $speciality
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSpeciality(Speciality $speciality)
    {
        return $this->specialities->removeElement($speciality);
    }

    /**
     * Get specialities.
     *
     * @return Collection|Speciality
     */
    public function getSpecialities() : Collection
    {
        return $this->specialities;
    }
}
