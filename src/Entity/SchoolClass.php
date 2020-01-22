<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SchoolClassRepository")
 */
class SchoolClass
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
     * @ORM\Column(name="specialityid", type="string", length=15)
     * @ORM\Id

     */
    private $specialityid;

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
     * @ORM\Column(name="acadyearid", type="string", length=15)
     * @ORM\Id
     */
    private $acadyearid;

    /**
     * @var string
     *
     * @ORM\Column(name="classname", type="string", length=15)
     */
    private $classname;

    /**
     * @var int
     *
     * @ORM\Column(name="studentnb", type="integer")
     */
    private $studentnb;



    /**
     * Set id.
     *
     * @param string $id
     *
     * @return SchoolClass
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
     * Set specialityid.
     *
     * @param string $specialityid
     *
     * @return SchoolClass
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
     * Set levelid.
     *
     * @param string $levelid
     *
     * @return SchoolClass
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
     * Set acadyearid.
     *
     * @param string $acadyearid
     *
     * @return SchoolClass
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
     * Set classname.
     *
     * @param string $classname
     *
     * @return SchoolClass
     */
    public function setClassname($classname)
    {
        $this->classname = $classname;

        return $this;
    }

    /**
     * Get classname.
     *
     * @return string
     */
    public function getClassname()
    {
        return $this->classname;
    }

    /**
     * Set studentnb.
     *
     * @param int $studentnb
     *
     * @return SchoolClass
     */
    public function setStudentnb($studentnb)
    {
        $this->studentnb = $studentnb;

        return $this;
    }

    /**
     * Get studentnb.
     *
     * @return int
     */
    public function getStudentnb()
    {
        return $this->studentnb;
    }
}
