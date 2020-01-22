<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExamSessionRepository")
 */
class ExamSession
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
     * @ORM\Column(name="sessionname", type="string", length=15)
     */
    private $sessionname;




    /**
     * Set id.
     *
     * @param string $id
     *
     * @return ExamSession
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
     * Set sessionname.
     *
     * @param string $sessionname
     *
     * @return ExamSession
     */
    public function setSessionname($sessionname)
    {
        $this->sessionname = $sessionname;

        return $this;
    }

    /**
     * Get sessionname.
     *
     * @return string
     */
    public function getSessionname()
    {
        return $this->sessionname;
    }
}
