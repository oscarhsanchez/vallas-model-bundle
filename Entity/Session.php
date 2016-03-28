<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\SessionRepository")
 * @ORM\Table(name="session")
 * @ORM\HasLifecycleCallbacks
 */
class Session extends GenericEntity
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
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable = false, unique=true)
     */
    protected $access_token;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50, nullable = false)
     */
    protected $ip;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable = false, unique=true)
     */
    protected $renew_token;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable = false)
     */
    protected $phone_id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="fk_user", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true)
     */
    protected $codigo;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", nullable=true)
     */
    protected $roles;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $created_at;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $updated_at;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $expires_at;

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
     * Set access_token
     *
     * @param string $access_token
     *
     * @return Report
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * Get access_token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * Set renew_token
     *
     * @param string $renew_token
     *
     * @return Report
     */
    public function setRenewToken($renew_token)
    {
        $this->renew_token = $renew_token;

        return $this;
    }

    /**
     * Get renew_token
     *
     * @return string
     */
    public function getRenewToken()
    {
        return $this->renew_token;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Report
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
     * @return Report
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
     * Set ip
     *
     * @param string $ip
     *
     * @return Report
     */
    public function setToken($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }



    /**
     * Set user
     *
     * @param \Vallas\ModelBundle\Entity\User $user
     *
     * @return Report
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
     * Set user
     *
     * @param \Vallas\ModelBundle\Entity\User $user
     *
     * @return Report
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

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Session
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Set phoneId
     *
     * @param string $phoneId
     *
     * @return Session
     */
    public function setPhoneId($phoneId)
    {
        $this->phone_id = $phoneId;

        return $this;
    }

    /**
     * Get phoneId
     *
     * @return string
     */
    public function getPhoneId()
    {
        return $this->phone_id;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return Session
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return Session
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }
}
