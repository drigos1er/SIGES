<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UeSpecialityRepository")
 */
class UeSpeciality
{
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Speciality")
     * @ORM\Id

     */
    private $specialityid;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Ue",inversedBy="uespeciality")
     * @ORM\Id
     */
    private $ueid;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Semester")
     * @ORM\Id
     */
    private $semester;


    /**
     * @var string
     *
     * @ORM\Column(name="acadyearid", type="string", length=15)
     * @ORM\Id
     */
    private $acadyearid;

    /**
     * @var integer
     *
     * @ORM\Column(name="creditvalue", type="integer")
     */
    private $creditvalue;



    /**
     * Set acadyearid.
     *
     * @param string $acadyearid
     *
     * @return UeSpeciality
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
     * Set creditvalue.
     *
     * @param int $creditvalue
     *
     * @return UeSpeciality
     */
    public function setCreditvalue($creditvalue)
    {
        $this->creditvalue = $creditvalue;

        return $this;
    }

    /**
     * Get creditvalue.
     *
     * @return int
     */
    public function getCreditvalue()
    {
        return $this->creditvalue;
    }

    /**
     * Set specialityid.
     *
     * @param Speciality $specialityid
     *
     * @return UeSpeciality
     */
    public function setSpecialityid(Speciality $specialityid)
    {
        $this->specialityid = $specialityid;

        return $this;
    }

    /**
     * Get specialityid.
     *
     * @return Speciality
     */
    public function getSpecialityid()
    {
        return $this->specialityid;
    }

    /**
     * Set ueid.
     *
     * @param Ue $ueid
     *
     * @return UeSpeciality
     */
    public function setUeid(Ue $ueid)
    {
        $this->ueid = $ueid;

        return $this;
    }

    /**
     * Get ueid.
     *
     * @return Ue
     */
    public function getUeid()
    {
        return $this->ueid;
    }

    /**
     * Set semester.
     *
     * @param Semester $semester
     *
     * @return UeSpeciality
     */
    public function setSemester(Semester $semester)
    {
        $this->semester = $semester;

        return $this;
    }

    /**
     * Get semester.
     *
     * @return Semester
     */
    public function getSemester()
    {
        return $this->semester;
    }
}
