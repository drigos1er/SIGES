<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentAveragesRepository")
 */
class StudentAverages
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
     * @ORM\Column(name="typeof_averages", type="string", length=15)

     * @ORM\Id

     */
    private $typeofaverages;

    /**
     * @var string
     * @ORM\Column(name="ueid", type="string", length=15)

     * @ORM\Id

     */
    private $ueid;

    /**
     * @var string
     * @ORM\Column(name="ecuid", type="string", length=15)

     * @ORM\Id

     */
    private $ecuid;



    /**
     * @var string
     * @ORM\Column(name="semesterid", type="string", length=15)

     * @ORM\Id

     */
    private $semesterid;




    /**
     * @var float
     *
     * @ORM\Column(name="average", type="float", nullable=true)
     */
    private $average;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="entry_date", type="datetime")
     */
    private $entrydate;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_user", type="string", length=255)
     */
    private $entryuser;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime")
     */
    private $updatedate;

    /**
     * @var string
     *
     * @ORM\Column(name="update_user", type="string", length=255)
     */
    private $updateuser;


    /**
     * @var boolean
     *
     * @ORM\Column(name="valid",  nullable=true)
     */
    private $valid;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="valid_date", type="datetime",nullable=true)
     */
    private $validdate;

    /**
     * @var string
     *
     * @ORM\Column(name="valid_user", type="string", length=255,nullable=true)
     */
    private $validuser;







    /**
     * Set studentid.
     *
     * @param string $studentid
     *
     * @return StudentAverages
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
     * @return StudentAverages
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
     * @return StudentAverages
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
     * Set typeofaverages.
     *
     * @param string $typeofaverages
     *
     * @return StudentAverages
     */
    public function setTypeofaverages($typeofaverages)
    {
        $this->typeofaverages = $typeofaverages;

        return $this;
    }

    /**
     * Get typeofaverages.
     *
     * @return string
     */
    public function getTypeofaverages()
    {
        return $this->typeofaverages;
    }

    /**
     * Set ueid.
     *
     * @param string $ueid
     *
     * @return StudentAverages
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
     * @return StudentAverages
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
     * @return StudentAverages
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
     * Set average.
     *
     * @param float $average
     *
     * @return StudentAverages
     */
    public function setAverage($average)
    {
        $this->average = $average;

        return $this;
    }

    /**
     * Get average.
     *
     * @return float
     */
    public function getAverage()
    {
        return $this->average;
    }

    /**
     * Set entrydate.
     *
     * @param \DateTime $entrydate
     *
     * @return StudentAverages
     */
    public function setEntrydate($entrydate)
    {
        $this->entrydate = $entrydate;

        return $this;
    }

    /**
     * Get entrydate.
     *
     * @return \DateTime
     */
    public function getEntrydate()
    {
        return $this->entrydate;
    }

    /**
     * Set entryuser.
     *
     * @param string $entryuser
     *
     * @return StudentAverages
     */
    public function setEntryuser($entryuser)
    {
        $this->entryuser = $entryuser;

        return $this;
    }

    /**
     * Get entryuser.
     *
     * @return string
     */
    public function getEntryuser()
    {
        return $this->entryuser;
    }

    /**
     * Set updatedate.
     *
     * @param \DateTime $updatedate
     *
     * @return StudentAverages
     */
    public function setUpdatedate($updatedate)
    {
        $this->updatedate = $updatedate;

        return $this;
    }

    /**
     * Get updatedate.
     *
     * @return \DateTime
     */
    public function getUpdatedate()
    {
        return $this->updatedate;
    }

    /**
     * Set updateuser.
     *
     * @param string $updateuser
     *
     * @return StudentAverages
     */
    public function setUpdateuser($updateuser)
    {
        $this->updateuser = $updateuser;

        return $this;
    }

    /**
     * Get updateuser.
     *
     * @return string
     */
    public function getUpdateuser()
    {
        return $this->updateuser;
    }

    /**
     * Set valid.
     *
     * @param string|null $valid
     *
     * @return StudentAverages
     */
    public function setValid($valid = null)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * Get valid.
     *
     * @return string|null
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * Set validdate.
     *
     * @param \DateTime|null $validdate
     *
     * @return StudentAverages
     */
    public function setValiddate($validdate = null)
    {
        $this->validdate = $validdate;

        return $this;
    }

    /**
     * Get validdate.
     *
     * @return \DateTime|null
     */
    public function getValiddate()
    {
        return $this->validdate;
    }

    /**
     * Set validuser.
     *
     * @param string|null $validuser
     *
     * @return StudentAverages
     */
    public function setValiduser($validuser = null)
    {
        $this->validuser = $validuser;

        return $this;
    }

    /**
     * Get validuser.
     *
     * @return string|null
     */
    public function getValiduser()
    {
        return $this->validuser;
    }
}
