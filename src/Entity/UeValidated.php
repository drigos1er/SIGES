<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UeValidatedRepository")
 */
class UeValidated
{
    /**
     * @var string
     * @ORM\Column(name="studentid", type="string", length=15)

     * @ORM\Id

     */
    private $studentid;



    /**
     * @var string
     * @ORM\Column(name="acadyearid", type="string", length=15)

     * @ORM\Id

     */
    private $acadyearid;


    /**
     * @var string
     * @ORM\Column(name="specialityid", type="string", length=15)

     * @ORM\Id

     */
    private $specialityid;


    /**
     * @var string
     * @ORM\Column(name="ueid", type="string", length=15)

     * @ORM\Id

     */
    private $ueid;



    /**
     * @var string
     * @ORM\Column(name="semesterid", type="string", length=15)

     * @ORM\Id

     */
    private $semesterid;




    /**
     * @var string
     * @ORM\Column(name="sessionid", type="string", length=15)

     * @ORM\Id

     */
    private $sessionid;









    /**
     * @var integer
     *
     * @ORM\Column(name="creditvalided", type="integer")
     */
    private $creditvalided;

    /**
     * @var float
     *
     * @ORM\Column(name="ueaverage", type="float")
     */
    private $ueaverage;







    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delib_date", type="datetime")
     */
    private $delib_date;

    /**
     * @var string
     *
     * @ORM\Column(name="delib_user", type="string", length=255)
     */
    private $delib_user;



    /**
     * Set studentid.
     *
     * @param string $studentid
     *
     * @return UeValidated
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
     * Set acadyearid.
     *
     * @param string $acadyearid
     *
     * @return UeValidated
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
     * Set specialityid.
     *
     * @param string $specialityid
     *
     * @return UeValidated
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
     * Set ueid.
     *
     * @param string $ueid
     *
     * @return UeValidated
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
     * Set semesterid.
     *
     * @param string $semesterid
     *
     * @return UeValidated
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
     * Set sessionid.
     *
     * @param string $sessionid
     *
     * @return UeValidated
     */
    public function setSessionid($sessionid)
    {
        $this->sessionid = $sessionid;

        return $this;
    }

    /**
     * Get sessionid.
     *
     * @return string
     */
    public function getSessionid()
    {
        return $this->sessionid;
    }

    /**
     * Set creditvalided.
     *
     * @param int $creditvalided
     *
     * @return UeValidated
     */
    public function setCreditvalided($creditvalided)
    {
        $this->creditvalided = $creditvalided;

        return $this;
    }

    /**
     * Get creditvalided.
     *
     * @return int
     */
    public function getCreditvalided()
    {
        return $this->creditvalided;
    }

    /**
     * Set ueaverage.
     *
     * @param float $ueaverage
     *
     * @return UeValidated
     */
    public function setUeaverage($ueaverage)
    {
        $this->ueaverage = $ueaverage;

        return $this;
    }

    /**
     * Get ueaverage.
     *
     * @return float
     */
    public function getUeaverage()
    {
        return $this->ueaverage;
    }

    /**
     * Set delibDate.
     *
     * @param \DateTime $delibDate
     *
     * @return UeValidated
     */
    public function setDelibDate($delibDate)
    {
        $this->delib_date = $delibDate;

        return $this;
    }

    /**
     * Get delibDate.
     *
     * @return \DateTime
     */
    public function getDelibDate()
    {
        return $this->delib_date;
    }

    /**
     * Set delibUser.
     *
     * @param string $delibUser
     *
     * @return UeValidated
     */
    public function setDelibUser($delibUser)
    {
        $this->delib_user = $delibUser;

        return $this;
    }

    /**
     * Get delibUser.
     *
     * @return string
     */
    public function getDelibUser()
    {
        return $this->delib_user;
    }
}
