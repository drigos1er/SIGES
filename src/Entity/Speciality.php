<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialityRepository")
 */
class Speciality
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
     * @ORM\Column(name="specname", type="string", length=255)
     */
    private $specname;


    /**

     * @ORM\ManyToMany(targetEntity="App\Entity\Grade", inversedBy="specialities", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)

     */

    private $grades;





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grades =new ArrayCollection();
    }

    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Speciality
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
     * Set specname.
     *
     * @param string $specname
     *
     * @return Speciality
     */
    public function setSpecname($specname)
    {
        $this->specname = $specname;

        return $this;
    }

    /**
     * Get specname.
     *
     * @return string
     */
    public function getSpecname()
    {
        return $this->specname;
    }

    /**
     * Add grade.
     *
     * @param Grade $grade
     *
     * @return Speciality
     */
    public function addGrade(Grade $grade)
    {
        $this->grades[] = $grade;

        return $this;
    }

    /**
     * Remove grade.
     *
     * @param Grade $grade
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeGrade(Grade $grade)
    {
        return $this->grades->removeElement($grade);
    }

    /**
     * Get grades.
     *
     * @return Collection|Grades[]
     */
    public function getGrades(): Collection
    {
        return $this->grades;
    }
}
