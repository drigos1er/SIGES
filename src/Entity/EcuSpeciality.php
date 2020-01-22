<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EcuSpecialityRepository")
 */
class EcuSpeciality
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Ue")
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Ecu",inversedBy="EcuSpeciality")
     * @ORM\Id

     */
    private $ecuid;

    /**
     * @var string
     *
     * @ORM\Column(name="acadyearid", type="string", length=15)
     * @ORM\Id
     */
    private $acadyearid;



    /**
     * @var float
     *
     * @ORM\Column(name="creditvalue", type="float")
     */
    private $creditvalue;





    /**
     * Set acadyearid.
     *
     * @param string $acadyearid
     *
     * @return EcuSpeciality
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
     * @param float $creditvalue
     *
     * @return EcuSpeciality
     */
    public function setCreditvalue($creditvalue)
    {
        $this->creditvalue = $creditvalue;

        return $this;
    }

    /**
     * Get creditvalue.
     *
     * @return float
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
     * @return EcuSpeciality
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
     * @return EcuSpeciality
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
     * @return EcuSpeciality
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

    /**
     * Set ecuid.
     *
     * @param Ecu $ecuid
     *
     * @return EcuSpeciality
     */
    public function setEcuid(Ecu $ecuid)
    {
        $this->ecuid = $ecuid;

        return $this;
    }

    /**
     * Get ecuid.
     *
     * @return Ecu
     */
    public function getEcuid()
    {
        return $this->ecuid;
    }
}
