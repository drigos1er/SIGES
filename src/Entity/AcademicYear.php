<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AcademicYearRepository")
 */
class AcademicYear
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=15)
     * @ORM\Id

     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="academic_year", type="string", length=15)
     * @Assert\NotBlank( message="Chose a year")
     */
    private $academicyear;


    /**
     * @var boolean
     *
     * @ORM\Column(name="state",  nullable=true)
     */
    private $state;




    /**
     * Set id
     *
     * @param string $id
     *
     * @return AcademicYear
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set academicyear
     *
     * @param string $academicyear
     *
     * @return AcademicYear
     */
    public function setAcademicyear($academicyear)
    {
        $this->academicyear = $academicyear;

        return $this;
    }

    /**
     * Get academicyear
     *
     * @return string
     */
    public function getAcademicyear()
    {
        return $this->academicyear;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return AcademicYear
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}
