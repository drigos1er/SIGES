<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentExamNotesRepository")
 */
class StudentExamNotes
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
     * @ORM\Column(name="typeof_examnotes", type="string", length=15)

     * @ORM\Id

     */
    private $typeofexamnotes;

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
     * @var string
     * @ORM\Column(name="sessionid", type="string", length=15)

     * @ORM\Id

     */
    private $sessionid;

    /**
     * @var float
     *
     * @ORM\Column(name="exam_notes", type="float", nullable=true,)
     */
    private $examnotes;

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
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * Set typeofexamnotes.
     *
     * @param string $typeofexamnotes
     *
     * @return StudentExamNotes
     */
    public function setTypeofexamnotes($typeofexamnotes)
    {
        $this->typeofexamnotes = $typeofexamnotes;

        return $this;
    }

    /**
     * Get typeofexamnotes.
     *
     * @return string
     */
    public function getTypeofexamnotes()
    {
        return $this->typeofexamnotes;
    }

    /**
     * Set ueid.
     *
     * @param string $ueid
     *
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * Set examnotes.
     *
     * @param float $examnotes
     *
     * @return StudentExamNotes
     */
    public function setExamnotes($examnotes)
    {
        $this->examnotes = $examnotes;

        return $this;
    }

    /**
     * Get examnotes.
     *
     * @return float
     */
    public function getExamnotes()
    {
        return $this->examnotes;
    }

    /**
     * Set entrydate.
     *
     * @param \DateTime $entrydate
     *
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
     * @return StudentExamNotes
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
