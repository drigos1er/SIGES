<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 */
class Student
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
     * @ORM\Column(name="firstname", type="string", length=100)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date")
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="placeofbirth", type="string", length=255)
     */
    private $placeofbirth;



    /**
     * @var string
     *
     * @ORM\Column(name="native_country", type="string", length=255)
     */
    private $nativecountry;




    /**
     * @var string
     *
     * @ORM\Column(name="kind", type="string", length=1)
     */
    private $kind;



    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=15)
     */
    private $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=15)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250)
     */
    private $email;


    /**
     * @var string
     *
     * @ORM\Column(name="emailpro", type="string", length=250)
     */
    private $emailpro;




    /**
     * @var string
     *
     * @ORM\Column(name="typeof_iddoc", type="string", length=100)
     */
    private $typeofidoc;



    /**
     * @var string
     *
     * @ORM\Column(name="numof_iddoc", type="string", length=100)
     */
    private $numofidoc;




    /**
     * @var string
     *
     * @ORM\Column(name="birth_act", type="string", length=100)
     */
    private $birthact;


    /**
     * @var string
     *
     * @ORM\Column(name="father_fisrtname", type="string", length=255)
     */
    private $fatherfirstname;


    /**
     * @var string
     *
     * @ORM\Column(name="father_lastname", type="string", length=255)
     */
    private $fatherlastname;


    /**
     * @var string
     *
     * @ORM\Column(name="father_contact", type="string", length=25)
     */
    private $fathercontact;



    /**
     * @var string
     *
     * @ORM\Column(name="father_job", type="string", length=255)
     */
    private $fatherjob;






    /**
     * @var string
     *
     * @ORM\Column(name="father_email", type="string", length=255)
     */
    private $fatheremail;



    /**
     * @var string
     *
     * @ORM\Column(name="mother_fisrtname", type="string", length=255)
     */
    private $motherfirstname;


    /**
     * @var string
     *
     * @ORM\Column(name="mother_lastname", type="string", length=255)
     */
    private $motherlastname;


    /**
     * @var string
     *
     * @ORM\Column(name="mother_contact", type="string", length=25)
     */
    private $mothercontact;



    /**
     * @var string
     *
     * @ORM\Column(name="mother_job", type="string", length=255)
     */
    private $motherjob;






    /**
     * @var string
     *
     * @ORM\Column(name="mother_email", type="string", length=255)
     */
    private $motheremail;




    /**
     * @var string
     *
     * @ORM\Column(name="guard_fisrtname", type="string", length=255)
     */
    private $guardfirstname;


    /**
     * @var string
     *
     * @ORM\Column(name="guard_lastname", type="string", length=255)
     */
    private $guardlastname;


    /**
     * @var string
     *
     * @ORM\Column(name="guard_contact", type="string", length=25)
     */
    private $guardcontact;



    /**
     * @var string
     *
     * @ORM\Column(name="guard_job", type="string", length=255)
     */
    private $guardjob;






    /**
     * @var string
     *
     * @ORM\Column(name="guard_email", type="string", length=255)
     */
    private $guardemail;



    /**
     * @var string
     *
     * @ORM\Column(name="guard_residence", type="string", length=255)
     */
    private $guardresidence;




    /**
     * @var string
     *
     * @ORM\Column(name="yearof_admis", type="string", length=25)
     */
    private $yearofadmis;

    /**
     * @var string
     *
     * @ORM\Column(name="typeof_exams", type="string", length=25)
     */
    private $typeofexams;


    /**
     * @var string
     *
     * @ORM\Column(name="series", type="string", length=100)
     */
    private $series;


    /**
     * @var string
     *
     * @ORM\Column(name="speciality", type="string", length=100)
     */
    private $speciality;


    /**
     * @var string
     *
     * @ORM\Column(name="diploma", type="string", length=100)
     */
    private $diploma;


    /**
     * @var string
     *
     * @ORM\Column(name="diploma_school", type="string", length=100)
     */
    private $diploma_school;


    /**
     * @var string
     *
     * @ORM\Column(name="yearof_bac", type="string", length=25)
     */
    private $yearofbac;



    /**
     * @var string
     *
     * @ORM\Column(name="numof_bac", type="string", length=25)
     */
    private $numofbac;


    /**
     * @var string
     *
     * @ORM\Column(name="centerof_bac", type="string", length=25)
     */
    private $centerofbac;






    /**
     * @var string
     *
     * @ORM\Column(name="mention", type="string", length=50)
     */
    private $mention;





    /**
     * @var integer
     *
     * @ORM\Column(name="rankof_exams", type="integer")
     */
    private $rankofexams;





    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Student
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
     * Set firstname.
     *
     * @param string $firstname
     *
     * @return Student
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname.
     *
     * @param string $lastname
     *
     * @return Student
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set birthdate.
     *
     * @param \DateTime $birthdate
     *
     * @return Student
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate.
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set placeofbirth.
     *
     * @param string $placeofbirth
     *
     * @return Student
     */
    public function setPlaceofbirth($placeofbirth)
    {
        $this->placeofbirth = $placeofbirth;

        return $this;
    }

    /**
     * Get placeofbirth.
     *
     * @return string
     */
    public function getPlaceofbirth()
    {
        return $this->placeofbirth;
    }

    /**
     * Set nativecountry.
     *
     * @param string $nativecountry
     *
     * @return Student
     */
    public function setNativecountry($nativecountry)
    {
        $this->nativecountry = $nativecountry;

        return $this;
    }

    /**
     * Get nativecountry.
     *
     * @return string
     */
    public function getNativecountry()
    {
        return $this->nativecountry;
    }

    /**
     * Set kind.
     *
     * @param string $kind
     *
     * @return Student
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind.
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set nationality.
     *
     * @param string $nationality
     *
     * @return Student
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality.
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set contact.
     *
     * @param string $contact
     *
     * @return Student
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact.
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Student
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set typeofidoc.
     *
     * @param string $typeofidoc
     *
     * @return Student
     */
    public function setTypeofidoc($typeofidoc)
    {
        $this->typeofidoc = $typeofidoc;

        return $this;
    }

    /**
     * Get typeofidoc.
     *
     * @return string
     */
    public function getTypeofidoc()
    {
        return $this->typeofidoc;
    }

    /**
     * Set numofidoc.
     *
     * @param string $numofidoc
     *
     * @return Student
     */
    public function setNumofidoc($numofidoc)
    {
        $this->numofidoc = $numofidoc;

        return $this;
    }

    /**
     * Get numofidoc.
     *
     * @return string
     */
    public function getNumofidoc()
    {
        return $this->numofidoc;
    }

    /**
     * Set birthact.
     *
     * @param string $birthact
     *
     * @return Student
     */
    public function setBirthact($birthact)
    {
        $this->birthact = $birthact;

        return $this;
    }

    /**
     * Get birthact.
     *
     * @return string
     */
    public function getBirthact()
    {
        return $this->birthact;
    }

    /**
     * Set fatherfirstname.
     *
     * @param string $fatherfirstname
     *
     * @return Student
     */
    public function setFatherfirstname($fatherfirstname)
    {
        $this->fatherfirstname = $fatherfirstname;

        return $this;
    }

    /**
     * Get fatherfirstname.
     *
     * @return string
     */
    public function getFatherfirstname()
    {
        return $this->fatherfirstname;
    }

    /**
     * Set fatherlastname.
     *
     * @param string $fatherlastname
     *
     * @return Student
     */
    public function setFatherlastname($fatherlastname)
    {
        $this->fatherlastname = $fatherlastname;

        return $this;
    }

    /**
     * Get fatherlastname.
     *
     * @return string
     */
    public function getFatherlastname()
    {
        return $this->fatherlastname;
    }

    /**
     * Set fathercontact.
     *
     * @param string $fathercontact
     *
     * @return Student
     */
    public function setFathercontact($fathercontact)
    {
        $this->fathercontact = $fathercontact;

        return $this;
    }

    /**
     * Get fathercontact.
     *
     * @return string
     */
    public function getFathercontact()
    {
        return $this->fathercontact;
    }

    /**
     * Set fatherjob.
     *
     * @param string $fatherjob
     *
     * @return Student
     */
    public function setFatherjob($fatherjob)
    {
        $this->fatherjob = $fatherjob;

        return $this;
    }

    /**
     * Get fatherjob.
     *
     * @return string
     */
    public function getFatherjob()
    {
        return $this->fatherjob;
    }

    /**
     * Set fatheremail.
     *
     * @param string $fatheremail
     *
     * @return Student
     */
    public function setFatheremail($fatheremail)
    {
        $this->fatheremail = $fatheremail;

        return $this;
    }

    /**
     * Get fatheremail.
     *
     * @return string
     */
    public function getFatheremail()
    {
        return $this->fatheremail;
    }

    /**
     * Set motherfirstname.
     *
     * @param string $motherfirstname
     *
     * @return Student
     */
    public function setMotherfirstname($motherfirstname)
    {
        $this->motherfirstname = $motherfirstname;

        return $this;
    }

    /**
     * Get motherfirstname.
     *
     * @return string
     */
    public function getMotherfirstname()
    {
        return $this->motherfirstname;
    }

    /**
     * Set motherlastname.
     *
     * @param string $motherlastname
     *
     * @return Student
     */
    public function setMotherlastname($motherlastname)
    {
        $this->motherlastname = $motherlastname;

        return $this;
    }

    /**
     * Get motherlastname.
     *
     * @return string
     */
    public function getMotherlastname()
    {
        return $this->motherlastname;
    }

    /**
     * Set mothercontact.
     *
     * @param string $mothercontact
     *
     * @return Student
     */
    public function setMothercontact($mothercontact)
    {
        $this->mothercontact = $mothercontact;

        return $this;
    }

    /**
     * Get mothercontact.
     *
     * @return string
     */
    public function getMothercontact()
    {
        return $this->mothercontact;
    }

    /**
     * Set motherjob.
     *
     * @param string $motherjob
     *
     * @return Student
     */
    public function setMotherjob($motherjob)
    {
        $this->motherjob = $motherjob;

        return $this;
    }

    /**
     * Get motherjob.
     *
     * @return string
     */
    public function getMotherjob()
    {
        return $this->motherjob;
    }

    /**
     * Set motheremail.
     *
     * @param string $motheremail
     *
     * @return Student
     */
    public function setMotheremail($motheremail)
    {
        $this->motheremail = $motheremail;

        return $this;
    }

    /**
     * Get motheremail.
     *
     * @return string
     */
    public function getMotheremail()
    {
        return $this->motheremail;
    }

    /**
     * Set guardfirstname.
     *
     * @param string $guardfirstname
     *
     * @return Student
     */
    public function setGuardfirstname($guardfirstname)
    {
        $this->guardfirstname = $guardfirstname;

        return $this;
    }

    /**
     * Get guardfirstname.
     *
     * @return string
     */
    public function getGuardfirstname()
    {
        return $this->guardfirstname;
    }

    /**
     * Set guardlastname.
     *
     * @param string $guardlastname
     *
     * @return Student
     */
    public function setGuardlastname($guardlastname)
    {
        $this->guardlastname = $guardlastname;

        return $this;
    }

    /**
     * Get guardlastname.
     *
     * @return string
     */
    public function getGuardlastname()
    {
        return $this->guardlastname;
    }

    /**
     * Set guardcontact.
     *
     * @param string $guardcontact
     *
     * @return Student
     */
    public function setGuardcontact($guardcontact)
    {
        $this->guardcontact = $guardcontact;

        return $this;
    }

    /**
     * Get guardcontact.
     *
     * @return string
     */
    public function getGuardcontact()
    {
        return $this->guardcontact;
    }

    /**
     * Set guardjob.
     *
     * @param string $guardjob
     *
     * @return Student
     */
    public function setGuardjob($guardjob)
    {
        $this->guardjob = $guardjob;

        return $this;
    }

    /**
     * Get guardjob.
     *
     * @return string
     */
    public function getGuardjob()
    {
        return $this->guardjob;
    }

    /**
     * Set guardemail.
     *
     * @param string $guardemail
     *
     * @return Student
     */
    public function setGuardemail($guardemail)
    {
        $this->guardemail = $guardemail;

        return $this;
    }

    /**
     * Get guardemail.
     *
     * @return string
     */
    public function getGuardemail()
    {
        return $this->guardemail;
    }

    /**
     * Set guardresidence.
     *
     * @param string $guardresidence
     *
     * @return Student
     */
    public function setGuardresidence($guardresidence)
    {
        $this->guardresidence = $guardresidence;

        return $this;
    }

    /**
     * Get guardresidence.
     *
     * @return string
     */
    public function getGuardresidence()
    {
        return $this->guardresidence;
    }

    /**
     * Set yearofadmis.
     *
     * @param string $yearofadmis
     *
     * @return Student
     */
    public function setYearofadmis($yearofadmis)
    {
        $this->yearofadmis = $yearofadmis;

        return $this;
    }

    /**
     * Get yearofadmis.
     *
     * @return string
     */
    public function getYearofadmis()
    {
        return $this->yearofadmis;
    }

    /**
     * Set typeofexams.
     *
     * @param string $typeofexams
     *
     * @return Student
     */
    public function setTypeofexams($typeofexams)
    {
        $this->typeofexams = $typeofexams;

        return $this;
    }

    /**
     * Get typeofexams.
     *
     * @return string
     */
    public function getTypeofexams()
    {
        return $this->typeofexams;
    }

    /**
     * Set series.
     *
     * @param string $series
     *
     * @return Student
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series.
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set speciality.
     *
     * @param string $speciality
     *
     * @return Student
     */
    public function setSpeciality($speciality)
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * Get speciality.
     *
     * @return string
     */
    public function getSpeciality()
    {
        return $this->speciality;
    }

    /**
     * Set diploma.
     *
     * @param string $diploma
     *
     * @return Student
     */
    public function setDiploma($diploma)
    {
        $this->diploma = $diploma;

        return $this;
    }

    /**
     * Get diploma.
     *
     * @return string
     */
    public function getDiploma()
    {
        return $this->diploma;
    }

    /**
     * Set diplomaSchool.
     *
     * @param string $diplomaSchool
     *
     * @return Student
     */
    public function setDiplomaSchool($diplomaSchool)
    {
        $this->diploma_school = $diplomaSchool;

        return $this;
    }

    /**
     * Get diplomaSchool.
     *
     * @return string
     */
    public function getDiplomaSchool()
    {
        return $this->diploma_school;
    }

    /**
     * Set yearofbac.
     *
     * @param string $yearofbac
     *
     * @return Student
     */
    public function setYearofbac($yearofbac)
    {
        $this->yearofbac = $yearofbac;

        return $this;
    }

    /**
     * Get yearofbac.
     *
     * @return string
     */
    public function getYearofbac()
    {
        return $this->yearofbac;
    }

    /**
     * Set numofbac.
     *
     * @param string $numofbac
     *
     * @return Student
     */
    public function setNumofbac($numofbac)
    {
        $this->numofbac = $numofbac;

        return $this;
    }

    /**
     * Get numofbac.
     *
     * @return string
     */
    public function getNumofbac()
    {
        return $this->numofbac;
    }

    /**
     * Set centerofbac.
     *
     * @param string $centerofbac
     *
     * @return Student
     */
    public function setCenterofbac($centerofbac)
    {
        $this->centerofbac = $centerofbac;

        return $this;
    }

    /**
     * Get centerofbac.
     *
     * @return string
     */
    public function getCenterofbac()
    {
        return $this->centerofbac;
    }

    /**
     * Set mention.
     *
     * @param string $mention
     *
     * @return Student
     */
    public function setMention($mention)
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * Get mention.
     *
     * @return string
     */
    public function getMention()
    {
        return $this->mention;
    }

    /**
     * Set rankofexams.
     *
     * @param int $rankofexams
     *
     * @return Student
     */
    public function setRankofexams($rankofexams)
    {
        $this->rankofexams = $rankofexams;

        return $this;
    }

    /**
     * Get rankofexams.
     *
     * @return int
     */
    public function getRankofexams()
    {
        return $this->rankofexams;
    }


    /**
     * Set email
     *
     * @param string $emailpro
     *
     */
    public function setEmailpro($emailpro)
    {
        $this->emailpro = $emailpro;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmailpro()
    {
        return $this->emailpro;
    }

}
