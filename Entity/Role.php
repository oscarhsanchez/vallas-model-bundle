<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\Role as ESocialBaseRole;

/**
 * Role
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="\ESocial\ModelBundle\Entity\RoleRepository")
 */
class Role extends ESocialBaseRole
{

    public function __construct()
    {
        parent::__construct();
        $this->permissions = new ArrayCollection();
    }

    public function setPermissions($permissions){
        $this->permissions = $permissions;
        foreach($permissions as $p){
            $p->setRole($this);
        }
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Vallas\ModelBundle\Entity\SecuritySubmodulePermission", mappedBy="role", cascade={"persist", "remove"})
     */
    protected $permissions;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Role
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Role
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add permission
     *
     * @param \Vallas\ModelBundle\Entity\SecuritySubmodulePermission $permission
     *
     * @return Role
     */
    public function addPermission(\Vallas\ModelBundle\Entity\SecuritySubmodulePermission $permission)
    {
        $this->permissions[] = $permission;

        return $this;
    }

    /**
     * Remove permission
     *
     * @param \Vallas\ModelBundle\Entity\SecuritySubmodulePermission $permission
     */
    public function removePermission(\Vallas\ModelBundle\Entity\SecuritySubmodulePermission $permission)
    {
        $this->permissions->removeElement($permission);
    }

    /**
     * Get permissions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPermissions()
    {
        return $this->permissions;
    }
}
