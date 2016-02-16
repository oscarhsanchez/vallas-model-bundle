<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\AgenciaRepository")
 * @ORM\Table(name="agencias")
 * @ORM\HasLifecycleCallbacks
 */
class Agencia extends GenericEntity
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
     * @ORM\Column(type="string", length=20)
     */
    protected  $pk_agencia;

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
     * @ORM\Column(type="string", length=140, nullable = false, unique=false)
     */
    protected $razon_social;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $nombre_comercial;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $porcentaje_comision;

    /** @ORM\Column(type="integer", nullable = true) */
    protected $dias_credito;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $credito_maximo;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = false, unique=false)
     */
    protected $estatus;


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
     * Set pkAgencia
     *
     * @param string $pkAgencia
     *
     * @return Agencia
     */
    public function setPkAgencia($pkAgencia)
    {
        $this->pk_agencia = $pkAgencia;

        return $this;
    }

    /**
     * Get pkAgencia
     *
     * @return string
     */
    public function getPkAgencia()
    {
        return $this->pk_agencia;
    }

    /**
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Agencia
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razon_social = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * Set nombreComercial
     *
     * @param string $nombreComercial
     *
     * @return Agencia
     */
    public function setNombreComercial($nombreComercial)
    {
        $this->nombre_comercial = $nombreComercial;

        return $this;
    }

    /**
     * Get nombreComercial
     *
     * @return string
     */
    public function getNombreComercial()
    {
        return $this->nombre_comercial;
    }

    /**
     * Set porcentajeComision
     *
     * @param float $porcentajeComision
     *
     * @return Agencia
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
     * Set diasCredito
     *
     * @param integer $diasCredito
     *
     * @return Agencia
     */
    public function setDiasCredito($diasCredito)
    {
        $this->dias_credito = $diasCredito;

        return $this;
    }

    /**
     * Get diasCredito
     *
     * @return integer
     */
    public function getDiasCredito()
    {
        return $this->dias_credito;
    }

    /**
     * Set creditoMaximo
     *
     * @param float $creditoMaximo
     *
     * @return Agencia
     */
    public function setCreditoMaximo($creditoMaximo)
    {
        $this->credito_maximo = $creditoMaximo;

        return $this;
    }

    /**
     * Get creditoMaximo
     *
     * @return float
     */
    public function getCreditoMaximo()
    {
        return $this->credito_maximo;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     *
     * @return Agencia
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return string
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Agencia
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
     * @return Agencia
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
     * @return Agencia
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
     * @return Agencia
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
     * @return Agencia
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
     * @return Agencia
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
}
