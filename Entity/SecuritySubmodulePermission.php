<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\SecuritySubmodulePermissionRepository")
 * @ORM\Table(name="security_submodule_permission")
 * @ORM\HasLifecycleCallbacks
 */
class SecuritySubmodulePermission extends GenericEntity
{
    public function __construct()
    {
        $this->token = GenericEntity::generateNewToken();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function preSave()
    {
        if($this->created_at == null){
            $this->created_at = new \DateTime();
        }
        $this->updated_at = new \DateTime();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var Role
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Role")
     * @ORM\JoinColumn(name="fk_role", referencedColumnName="id")
     */
    protected $role;

    /**
     * @var ReportSubcategory
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\SecuritySubmodule")
     * @ORM\JoinColumn(name="fk_security_submodule", referencedColumnName="id")
     */
    protected $submodule;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $permissions;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="fk_user", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var Pais
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $created_at;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $updated_at;

    /** @ORM\Column(type="string", length=100, unique=true) */
    protected $token;

    /**
     * @ORM\Column(type="smallint",options={"default" = 1})
     */
    protected $active = true;


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
     * Set permissions
     *
     * @param string $permissions
     *
     * @return SecuritySubmodulePermission
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Get permissions
     *
     * @return string
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return SecuritySubmodulePermission
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
     * @return SecuritySubmodulePermission
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
     * Set token
     *
     * @param string $token
     *
     * @return SecuritySubmodulePermission
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return SecuritySubmodulePermission
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set role
     *
     * @param \Vallas\ModelBundle\Entity\Role $role
     *
     * @return SecuritySubmodulePermission
     */
    public function setRole(\Vallas\ModelBundle\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Vallas\ModelBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set submodule
     *
     * @param \Vallas\ModelBundle\Entity\SecuritySubmodule $submodule
     *
     * @return SecuritySubmodulePermission
     */
    public function setSubmodule(\Vallas\ModelBundle\Entity\SecuritySubmodule $submodule = null)
    {
        $this->submodule = $submodule;

        return $this;
    }

    /**
     * Get submodule
     *
     * @return \Vallas\ModelBundle\Entity\SecuritySubmodule
     */
    public function getSubmodule()
    {
        return $this->submodule;
    }

    /**
     * Set user
     *
     * @param \Vallas\ModelBundle\Entity\User $user
     *
     * @return SecuritySubmodulePermission
     */
    public function setUser(\Vallas\ModelBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Vallas\ModelBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set pais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $pais
     *
     * @return SecuritySubmodulePermission
     */
    public function setPais(\Vallas\ModelBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \Vallas\ModelBundle\Entity\Pais
     */
    public function getPais()
    {
        return $this->pais;
    }
}
