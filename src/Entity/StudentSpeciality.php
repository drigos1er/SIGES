<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentSpecialityRepository")
 */
class StudentSpeciality
{
    /**
     * @var string
     *
     * @ORM\Column(name="studentid", type="string",length=20)
     * @ORM\Id

     */
    private $studentid;

    /**
     * @var string
     *
     * @ORM\Column(name="levelid", type="string", length=15)
     * @ORM\Id
     */
    private $levelid;


    /**
     * @var string
     *
     * @ORM\Column(name="specialityid", type="string", length=15)
     * @ORM\Id
     */
    private $specialityid;

    /**
     * @var string
     *
     * @ORM\Column(name="acadyearid", type="string", length=15)
     * @ORM\Id
     */
    private $acadyearid;

    /**
     * @var string
     *
     * @ORM\Column(name="school_classeid", type="string", length=15)

     */
    private $schoolclasseid;



    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=15)

     */
    private $state;




    /**
     * @var string
     *
     * @ORM\Column(name="scholar", type="string", length=15)

     */
    private $scholar;




    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255)

     */
    private $picture;




    /**
     * Set studentid.
     *
     * @param string $studentid
     *
     * @return StudentSpeciality
     */
    public function setStudentid($studentid)
    {
        $this->studentid = $studentid;

        return $this;
    }

    /**
     * Get studentid.
     *
     * @return string
     */
    public function getStudentid()
    {
        return $this->studentid;
    }

    /**
     * Set levelid.
     *
     * @param string $levelid
     *
     * @return StudentSpeciality
     */
    public function setLevelid($levelid)
    {
        $this->levelid = $levelid;

        return $this;
    }

    /**
     * Get levelid.
     *
     * @return string
     */
    public function getLevelid()
    {
        return $this->levelid;
    }

    /**
     * Set specialityid.
     *
     * @param string $specialityid
     *
     * @return StudentSpeciality
     */
    public function setSpecialityid($specialityid)
    {
        $this->specialityid = $specialityid;

        return $this;
    }

    /**
     * Get specialityid.
     *
     * @return string
     */
    public function getSpecialityid()
    {
        return $this->specialityid;
    }

    /**
     * Set acadyearid.
     *
     * @param string $acadyearid
     *
     * @return StudentSpeciality
     */
    public function setAcadyearid($acadyearid)
    {
        $this->acadyearid = $acadyearid;

        return $this;
    }

    /**
     * Get acadyearid.
     *
     * @return string
     */
    public function getAcadyearid()
    {
        return $this->acadyearid;
    }

    /**
     * Set schoolclasseid.
     *
     * @param string $schoolclasseid
     *
     * @return StudentSpeciality
     */
    public function setSchoolclasseid($schoolclasseid)
    {
        $this->schoolclasseid = $schoolclasseid;

        return $this;
    }

    /**
     * Get schoolclasseid.
     *
     * @return string
     */
    public function getSchoolclasseid()
    {
        return $this->schoolclasseid;
    }

    /**
     * Set state.
     *
     * @param string $state
     *
     * @return StudentSpeciality
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set scholar.
     *
     * @param string $scholar
     *
     * @return StudentSpeciality
     */
    public function setScholar($scholar)
    {
        $this->scholar = $scholar;

        return $this;
    }

    /**
     * Get scholar.
     *
     * @return string
     */
    public function getScholar()
    {
        return $this->scholar;
    }

    /**
     * Set picture.
     *
     * @param string $picture
     *
     * @return StudentSpeciality
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture.
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }
}
