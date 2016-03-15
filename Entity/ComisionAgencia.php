<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ComisionAgenciaRepository")
 * @ORM\Table(name="agencias_comision")
 * @ORM\HasLifecycleCallbacks
 */
class ComisionAgencia extends GenericEntity
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
    protected $pk_comision_agencia;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var Empresa
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Empresa")
     * @ORM\JoinColumn(name="fk_empresa", referencedColumnName="pk_empresa")
     */
    protected $empresa;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=14, nullable = true, unique=false)
     */
    protected $unidad_negocio;

    /**
     * @var Agencia
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Agencia")
     * @ORM\JoinColumn(name="fk_agencia", referencedColumnName="pk_agencia", nullable=true)
     */
    protected $agencia;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable = false)
     */
    protected $porcentaje_comision;


    /** @ORM\Column(type="datetime", nullable = true) */
    protected $created_at;

    /** @ORM\Column(type="datetime", nullable = true) */
    protected $updated_at;

    /** @ORM\Column(type="string", length=100, unique=true) */
    protected $token;

    /**
     * @ORM\Column(type="smallint",options={"default" = 1})
     */
    protected $estado = true;



    /**
     * Get pkComisionAgencia
     *
     * @return integer
     */
    public function getPkComisionAgencia()
    {
        return $this->pk_comision_agencia;
    }

    /**
     * Set unidadNegocio
     *
     * @param string $unidadNegocio
     *
     * @return ComisionAgencia
     */
    public function setUnidadNegocio($unidadNegocio)
    {
        $this->unidad_negocio = $unidadNegocio;

        return $this;
    }

    /**
     * Get unidadNegocio
     *
     * @return string
     */
    public function getUnidadNegocio()
    {
        return $this->unidad_negocio;
    }

    /**
     * Set porcentajeComision
     *
     * @param float $porcentajeComision
     *
     * @return ComisionAgencia
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ComisionAgencia
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
     * @return ComisionAgencia
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
     * @return ComisionAgencia
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
     * Set estado
     *
     * @param integer $estado
     *
     * @return ComisionAgencia
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set pais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $pais
     *
     * @return ComisionAgencia
     */
    public function setPais(\Vallas\ModelBundle\Entity\Pais $pais)
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
     * Set empresa
     *
     * @param \Vallas\ModelBundle\Entity\Empresa $empresa
     *
     * @return ComisionAgencia
     */
    public function setEmpresa(\Vallas\ModelBundle\Entity\Empresa $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \Vallas\ModelBundle\Entity\Empresa
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set agencia
     *
     * @param \Vallas\ModelBundle\Entity\Agencia $agencia
     *
     * @return ComisionAgencia
     */
    public function setAgencia(\Vallas\ModelBundle\Entity\Agencia $agencia = null)
    {
        $this->agencia = $agencia;

        return $this;
    }

    /**
     * Get agencia
     *
     * @return \Vallas\ModelBundle\Entity\Agencia
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * Set codigoUser
     *
     * @param string $codigoUser
     *
     * @return ComisionAgencia
     */
    public function setCodigoUser($codigoUser)
    {
        $this->codigo_user = $codigoUser;

        return $this;
    }

    /**
     * Get codigoUser
     *
     * @return string
     */
    public function getCodigoUser()
    {
        return $this->codigo_user;
    }
}
