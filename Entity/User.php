<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\User as ESocialBaseUser;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User extends ESocialBaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

