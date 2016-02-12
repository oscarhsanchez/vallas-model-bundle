<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\User as ESocialBaseUser;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\UserRepository")
 */
class User extends ESocialBaseUser
{

    public function __construct()
    {
        parent::__construct();
        $this->permissions = new ArrayCollection();
        $this->user_paises = new ArrayCollection();
    }

    public function setPermissions($permissions){
        $this->permissions = $permissions;
    }

    public function setUserPaises(\Doctrine\Common\Collections\Collection $user_paises){
        $this->user_paises = $user_paises;
        foreach ($user_paises as $c) {
            $c->setUser($this);
        }
    }

    public function getRoles(){
        $roles = parent::getRoles();

        if (($key = array_search('ROLE_USER', $roles)) !== false) {
            unset($roles[$key]);
        }

        $roles_vallas = array('ROLE_UBICACIONES','ROLE_LEGAL','ROLE_COMERCIAL','ROLE_IMPRESION','ROLE_CUENTAS_POR_COBRAR','ROLE_CUENTAS_POR_PAGAR','ROLE_TESORERIA','ROLE_COMPRAS','ROLE_OPERACIONES','ROLE_ALMACENES','ROLE_CONTABILIDAD','ROLE_CUSTOM');
        foreach($roles as $role){
            if (in_array($role, $roles_vallas)){
                $roles[] = 'ROLE_VALLAS';
                break;
            }
        }

        return $roles;
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
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true, unique=true)
     */
    protected $codigo;

    /**
     * @var Plaza
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Plaza")
     * @ORM\JoinColumn(name="fk_plaza", referencedColumnName="pk_plaza")
     */
    protected $plaza;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Vallas\ModelBundle\Entity\SecuritySubmodulePermission", mappedBy="user", cascade={"persist", "remove"})
     */
    protected $permissions;

    /**
     * @ORM\OneToMany(targetEntity="Vallas\ModelBundle\Entity\UserPais", mappedBy="user", cascade={"persist", "remove"})
     */
    protected $user_paises;


    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $porcentaje_comision;


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
    
    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return User
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set porcentajeComision
     *
     * @param float $porcentajeComision
     *
     * @return User
     */
    public function setPorcentajeComision($porcentajeComision)
    {
        $this->porcentaje_comision = $porcentajeComision;

        return $this;
    }

    /**
     * Get porcentajeComision
     *
     * @return float
     */
    public function getPorcentajeComision()
    {
        return $this->porcentaje_comision;
    }

    /**
     * Set plaza
     *
     * @param \Vallas\ModelBundle\Entity\Plaza $plaza
     *
     * @return User
     */
    public function setPlaza(\Vallas\ModelBundle\Entity\Plaza $plaza = null)
    {
        $this->plaza = $plaza;

        return $this;
    }

    /**
     * Get plaza
     *
     * @return \Vallas\ModelBundle\Entity\Plaza
     */
    public function getPlaza()
    {
        return $this->plaza;
    }

    /**
     * Add userPaise
     *
     * @param \Vallas\ModelBundle\Entity\Pais $userPaise
     *
     * @return User
     */
    public function addUserPaise(\Vallas\ModelBundle\Entity\Pais $userPaise)
    {
        $this->user_paises[] = $userPaise;

        return $this;
    }

    /**
     * Remove userPaise
     *
     * @param \Vallas\ModelBundle\Entity\Pais $userPaise
     */
    public function removeUserPaise(\Vallas\ModelBundle\Entity\Pais $userPaise)
    {
        $this->user_paises->removeElement($userPaise);
    }

    /**
     * Get userPaises
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserPaises()
    {
        return $this->user_paises;
    }
}
