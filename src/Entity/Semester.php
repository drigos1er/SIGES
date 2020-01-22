<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SemesterRepository")
 */
class Semester
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
     * @ORM\Column(name="semname", type="string", length=15)
     */
    private $semname;

    /**
     * @var string
     *
     * @ORM\Column(name="semtype", type="string", length=15)
     */
    private $semtype;




    /**

     * @ORM\ManyToOne(targetEntity="App\Entity\Level")

     * @ORM\JoinColumn(nullable=false)



     */

    private $level;








    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Semester
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
     * Set semname.
     *
     * @param string $semname
     *
     * @return Semester
     */
    public function setSemname($semname)
    {
        $this->semname = $semname;

        return $this;
    }

    /**
     * Get semname.
     *
     * @return string
     */
    public function getSemname()
    {
        return $this->semname;
    }

    /**
     * Set semtype.
     *
     * @param string $semtype
     *
     * @return Semester
     */
    public function setSemtype($semtype)
    {
        $this->semtype = $semtype;

        return $this;
    }

    /**
     * Get semtype.
     *
     * @return string
     */
    public function getSemtype()
    {
        return $this->semtype;
    }

    /**
     * Set level.
     *
     * @param Level $level
     *
     * @return Semester
     */
    public function setLevel(Level $level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level.
     *
     * @return Level
     */
    public function getLevel()
    {
        return $this->level;
    }
}
