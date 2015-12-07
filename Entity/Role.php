<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\Role as ESocialBaseRole;

/**
 * Role
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Role extends ESocialBaseRole
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

