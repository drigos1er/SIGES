<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LevelRepository")
 */
class Level
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
     * @ORM\Column(name="levelname", type="string", length=15)
     */
    private $levelname;


    /**

     * @ORM\ManyToOne(targetEntity="App\Entity\Grade")

     * @ORM\JoinColumn(nullable=false)



     */

    private $grade;




    /**
     * Set id.
     *
     * @param string $id
     *
     * @return Level
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
     * Set levelname.
     *
     * @param string $levelname
     *
     * @return Level
     */
    public function setLevelname($levelname)
    {
        $this->levelname = $levelname;

        return $this;
    }

    /**
     * Get levelname.
     *
     * @return string
     */
    public function getLevelname()
    {
        return $this->levelname;
    }

    /**
     * Set grade.
     *
     * @param Grade $grade
     *
     * @return Level
     */
    public function setGrade(Grade $grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade.
     *
     * @return Grade
     */
    public function getGrade()
    {
        return $this->grade;
    }
}
