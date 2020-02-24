<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="halfyearly_delib")
 * @ORM\Entity(repositoryClass="App\Repository\HalfYearlyDelibRepository")
 */
class HalfYearlyDelib
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
     * @ORM\Column(name="tvalidatecred", type="integer")
     */
    private $tcreditvalide;

    /**
     * @var float
     *
     * @ORM\Column(name="semaverage", type="float")
     */
    private $semaverage;


    /**
     * @var string
     * @ORM\Column(name="decision", type="string", length=15)



     */
    private $decision;







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
     * @return HalfYearlyDelib
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
     * @return HalfYearlyDelib
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
     * @return HalfYearlyDelib
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
     * Set semesterid.
     *
     * @param string $semesterid
     *
     * @return HalfYearlyDelib
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
     * @return HalfYearlyDelib
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
     * Set tcreditvalide.
     *
     * @param int $tcreditvalide
     *
     * @return HalfYearlyDelib
     */
    public function setTcreditvalide($tcreditvalide)
    {
        $this->tcreditvalide = $tcreditvalide;

        return $this;
    }

    /**
     * Get tcreditvalide.
     *
     * @return int
     */
    public function getTcreditvalide()
    {
        return $this->tcreditvalide;
    }

    /**
     * Set semaverage.
     *
     * @param float $semaverage
     *
     * @return HalfYearlyDelib
     */
    public function setSemaverage($semaverage)
    {
        $this->semaverage = $semaverage;

        return $this;
    }

    /**
     * Get semaverage.
     *
     * @return float
     */
    public function getSemaverage()
    {
        return $this->semaverage;
    }

    /**
     * Set decision.
     *
     * @param string $decision
     *
     * @return HalfYearlyDelib
     */
    public function setDecision($decision)
    {
        $this->decision = $decision;

        return $this;
    }

    /**
     * Get decision.
     *
     * @return string
     */
    public function getDecision()
    {
        return $this->decision;
    }

    /**
     * Set delibDate.
     *
     * @param \DateTime $delibDate
     *
     * @return HalfYearlyDelib
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
     * @return HalfYearlyDelib
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
