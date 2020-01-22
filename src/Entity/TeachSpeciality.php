<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeachSpecialityRepository")
 */
class TeachSpeciality
{
    /**
     * @var string
     *
     * @ORM\Column(name="teacherid", type="string",length=100)
     * @ORM\Id

     */
    private $teacherid;

    /**
     * @var string
     *
     * @ORM\Column(name="classeid", type="string", length=15)
     * @ORM\Id
     */
    private $classeid;

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
     * @ORM\Column(name="ueid", type="string", length=15)
     * @ORM\Id
     */
    private $ueid;

    /**
     * @var string
     *
     * @ORM\Column(name="ecuid", type="string", length=15)
     * @ORM\Id
     */
    private $ecuid;




    /**
     * @var string
     *
     * @ORM\Column(name="semesterid", type="string", length=15)
     * @ORM\Id
     */
    private $semesterid;



    /**
     * @var integer
     *
     * @ORM\Column(name="hour_vol_cm", type="integer")
     */
    private $hourvolcm;

    /**
     * @var integer
     *
     * @ORM\Column(name="hour_vol_td", type="integer")
     */
    private $hourvoltd;


    /**
     * @var integer
     *
     * @ORM\Column(name="hour_vol_tp", type="integer")
     */
    private $hourvoltp;







    /**
     * Set teacherid.
     *
     * @param string $teacherid
     *
     * @return TeachSpeciality
     */
    public function setTeacherid($teacherid)
    {
        $this->teacherid = $teacherid;

        return $this;
    }

    /**
     * Get teacherid.
     *
     * @return string
     */
    public function getTeacherid()
    {
        return $this->teacherid;
    }

    /**
     * Set classeid.
     *
     * @param string $classeid
     *
     * @return TeachSpeciality
     */
    public function setClasseid($classeid)
    {
        $this->classeid = $classeid;

        return $this;
    }

    /**
     * Get classeid.
     *
     * @return string
     */
    public function getClasseid()
    {
        return $this->classeid;
    }

    /**
     * Set acadyearid.
     *
     * @param string $acadyearid
     *
     * @return TeachSpeciality
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
     * Set ueid.
     *
     * @param string $ueid
     *
     * @return TeachSpeciality
     */
    public function setUeid($ueid)
    {
        $this->ueid = $ueid;

        return $this;
    }

    /**
     * Get ueid.
     *
     * @return string
     */
    public function getUeid()
    {
        return $this->ueid;
    }

    /**
     * Set ecuid.
     *
     * @param string $ecuid
     *
     * @return TeachSpeciality
     */
    public function setEcuid($ecuid)
    {
        $this->ecuid = $ecuid;

        return $this;
    }

    /**
     * Get ecuid.
     *
     * @return string
     */
    public function getEcuid()
    {
        return $this->ecuid;
    }

    /**
     * Set semesterid.
     *
     * @param string $semesterid
     *
     * @return TeachSpeciality
     */
    public function setSemesterid($semesterid)
    {
        $this->semesterid = $semesterid;

        return $this;
    }

    /**
     * Get semesterid.
     *
     * @return string
     */
    public function getSemesterid()
    {
        return $this->semesterid;
    }

    /**
     * Set hourvolvm.
     *
     * @param int $hourvolvm
     *
     * @return TeachSpeciality
     */
    public function setHourvolvm($hourvolvm)
    {
        $this->hourvolvm = $hourvolvm;

        return $this;
    }

    /**
     * Get hourvolvm.
     *
     * @return int
     */
    public function getHourvolvm()
    {
        return $this->hourvolvm;
    }

    /**
     * Set hourvoltd.
     *
     * @param int $hourvoltd
     *
     * @return TeachSpeciality
     */
    public function setHourvoltd($hourvoltd)
    {
        $this->hourvoltd = $hourvoltd;

        return $this;
    }

    /**
     * Get hourvoltd.
     *
     * @return int
     */
    public function getHourvoltd()
    {
        return $this->hourvoltd;
    }

    /**
     * Set hourvoltp.
     *
     * @param int $hourvoltp
     *
     * @return TeachSpeciality
     */
    public function setHourvoltp($hourvoltp)
    {
        $this->hourvoltp = $hourvoltp;

        return $this;
    }

    /**
     * Get hourvoltp.
     *
     * @return int
     */
    public function getHourvoltp()
    {
        return $this->hourvoltp;
    }

    /**
     * Set hourvolcm.
     *
     * @param int $hourvolcm
     *
     * @return TeachSpeciality
     */
    public function setHourvolcm($hourvolcm)
    {
        $this->hourvolcm = $hourvolcm;

        return $this;
    }

    /**
     * Get hourvolcm.
     *
     * @return int
     */
    public function getHourvolcm()
    {
        return $this->hourvolcm;
    }
}
