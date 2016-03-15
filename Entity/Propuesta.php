<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\PropuestaRepository")
 * @ORM\Table(name="propuestas")
 * @ORM\HasLifecycleCallbacks
 */
class Propuesta extends GenericEntity
{
    public function __toString(){

        $descr = '';

        if ($this->getCliente()){
            $descr .= 'Cliente: '.$this->getCliente()->getRazonSocial();
        }

        if ($this->getFechaInicio()){
            $descr .= ' - Desde: '.$this->getFechaInicio()->format('d/m/Y');
        }

        if ($this->getFechaFin()){
            $descr .= ' - Hasta: '.$this->getFechaFin()->format('d/m/Y');
        }

        if ($this->getAgencia()){
            $descr .= ' - Agencia: '.$this->getAgencia()->getRazonSocial();
        }

        if ($this->getCodigoUser()){
            $descr .= ' - User: '.$this->getCodigoUser();
        }

        return $descr;

    }

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
    protected  $pk_propuesta;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
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
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="fk_cliente", referencedColumnName="pk_cliente")
     */
    protected $cliente;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $anio;

    /** @ORM\Column(type="date", nullable = false) */
    protected $fecha_inicio;

    /** @ORM\Column(type="date", nullable = false) */
    protected $fecha_fin;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $catorcena;

    /**
     * @var Agencia
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\CategoriaPropuesta")
     * @ORM\JoinColumn(name="fk_categoria_propuesta", referencedColumnName="pk_categoria_propuesta", nullable=true)
     */
    protected $categoria;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $comision_user;

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
     * @ORM\Column(type="float")
     */
    protected $comision_agencia;

    /** @ORM\Column(type="text") */
    protected $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=12, nullable = false, unique=false)
     */
    protected $status;

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
     * Get pkPropuesta
     *
     * @return integer
     */
    public function getPkPropuesta()
    {
        return $this->pk_propuesta;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     *
     * @return Propuesta
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get anio
     *
     * @return integer
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Propuesta
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return Propuesta
     */
    public function setFechaFin($fechaFin)
    {
        $this->fecha_fin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * Set catorcena
     *
     * @param integer $catorcena
     *
     * @return Propuesta
     */
    public function setCatorcena($catorcena)
    {
        $this->catorcena = $catorcena;

        return $this;
    }

    /**
     * Get catorcena
     *
     * @return integer
     */
    public function getCatorcena()
    {
        return $this->catorcena;
    }

    /**
     * Set comisionUser
     *
     * @param float $comisionUser
     *
     * @return Propuesta
     */
    public function setComisionUser($comisionUser)
    {
        $this->comision_user = $comisionUser;

        return $this;
    }

    /**
     * Get comisionUser
     *
     * @return float
     */
    public function getComisionUser()
    {
        return $this->comision_user;
    }

    /**
     * Set comisionAgencia
     *
     * @param float $comisionAgencia
     *
     * @return Propuesta
     */
    public function setComisionAgencia($comisionAgencia)
    {
        $this->comision_agencia = $comisionAgencia;

        return $this;
    }

    /**
     * Get comisionAgencia
     *
     * @return float
     */
    public function getComisionAgencia()
    {
        return $this->comision_agencia;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Propuesta
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Propuesta
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Propuesta
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
     * @return Propuesta
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
     * @return Propuesta
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
     * @return Propuesta
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
     * @return Propuesta
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
     * Set empresa
     *
     * @param \Vallas\ModelBundle\Entity\Empresa $empresa
     *
     * @return Propuesta
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
     * Set cliente
     *
     * @param \Vallas\ModelBundle\Entity\Cliente $cliente
     *
     * @return Propuesta
     */
    public function setCliente(\Vallas\ModelBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Vallas\ModelBundle\Entity\Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set categoria
     *
     * @param \Vallas\ModelBundle\Entity\CategoriaPropuesta $categoria
     *
     * @return Propuesta
     */
    public function setCategoria(\Vallas\ModelBundle\Entity\CategoriaPropuesta $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Vallas\ModelBundle\Entity\CategoriaPropuesta
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set agencia
     *
     * @param \Vallas\ModelBundle\Entity\Agencia $agencia
     *
     * @return Propuesta
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
     * @return Propuesta
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
