<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ClienteRepository")
 * @ORM\Table(name="clientes")
 * @ORM\HasLifecycleCallbacks
 */
class Cliente extends GenericEntity
{
    public function __toString(){
        return $this->getRazonSocial();
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
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    public $pk_cliente;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable = false, unique=false)
     */
    protected $rfc;

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
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable = true, unique=false)
     */
    protected $razon_social;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $nombre_comercial;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable = true, unique=false)
     */
    protected $direccion;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $domicilio_calle;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable = true, unique=false)
     */
    protected $domicilio_no_exterior;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40, nullable = true, unique=false)
     */
    protected $domicilio_no_interior;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60, nullable = true, unique=false)
     */
    protected $domicilio_colonia;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60, nullable = true, unique=false)
     */
    protected $domicilio_delegacion;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60, nullable = true, unique=false)
     */
    protected $domicilio_estado;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable = true, unique=false)
     */
    protected $domicilio_pais;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true, unique=false)
     */
    protected $domicilio_cp;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable = true, unique=false)
     */
    protected $telefono;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $porcentaje_comision;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
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
     * @ORM\Column(type="string", length=20, nullable = true, unique=false)
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
     * Get pkCliente
     *
     * @return integer
     */
    public function getPkCliente()
    {
        return $this->pk_cliente;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     *
     * @return Cliente
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
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
     * Set pkCliente
     *
     * @param string $pkCliente
     *
     * @return Cliente
     */
    public function setPkCliente($pkCliente)
    {
        $this->pk_cliente = $pkCliente;

        return $this;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Cliente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set domicilioCalle
     *
     * @param string $domicilioCalle
     *
     * @return Cliente
     */
    public function setDomicilioCalle($domicilioCalle)
    {
        $this->domicilio_calle = $domicilioCalle;

        return $this;
    }

    /**
     * Get domicilioCalle
     *
     * @return string
     */
    public function getDomicilioCalle()
    {
        return $this->domicilio_calle;
    }

    /**
     * Set domicilioNoExterior
     *
     * @param string $domicilioNoExterior
     *
     * @return Cliente
     */
    public function setDomicilioNoExterior($domicilioNoExterior)
    {
        $this->domicilio_no_exterior = $domicilioNoExterior;

        return $this;
    }

    /**
     * Get domicilioNoExterior
     *
     * @return string
     */
    public function getDomicilioNoExterior()
    {
        return $this->domicilio_no_exterior;
    }

    /**
     * Set domicilioNoInterior
     *
     * @param string $domicilioNoInterior
     *
     * @return Cliente
     */
    public function setDomicilioNoInterior($domicilioNoInterior)
    {
        $this->domicilio_no_interior = $domicilioNoInterior;

        return $this;
    }

    /**
     * Get domicilioNoInterior
     *
     * @return string
     */
    public function getDomicilioNoInterior()
    {
        return $this->domicilio_no_interior;
    }

    /**
     * Set domicilioColonia
     *
     * @param string $domicilioColonia
     *
     * @return Cliente
     */
    public function setDomicilioColonia($domicilioColonia)
    {
        $this->domicilio_colonia = $domicilioColonia;

        return $this;
    }

    /**
     * Get domicilioColonia
     *
     * @return string
     */
    public function getDomicilioColonia()
    {
        return $this->domicilio_colonia;
    }

    /**
     * Set domicilioDelegacion
     *
     * @param string $domicilioDelegacion
     *
     * @return Cliente
     */
    public function setDomicilioDelegacion($domicilioDelegacion)
    {
        $this->domicilio_delegacion = $domicilioDelegacion;

        return $this;
    }

    /**
     * Get domicilioDelegacion
     *
     * @return string
     */
    public function getDomicilioDelegacion()
    {
        return $this->domicilio_delegacion;
    }

    /**
     * Set domicilioEstado
     *
     * @param string $domicilioEstado
     *
     * @return Cliente
     */
    public function setDomicilioEstado($domicilioEstado)
    {
        $this->domicilio_estado = $domicilioEstado;

        return $this;
    }

    /**
     * Get domicilioEstado
     *
     * @return string
     */
    public function getDomicilioEstado()
    {
        return $this->domicilio_estado;
    }

    /**
     * Set domicilioPais
     *
     * @param string $domicilioPais
     *
     * @return Cliente
     */
    public function setDomicilioPais($domicilioPais)
    {
        $this->domicilio_pais = $domicilioPais;

        return $this;
    }

    /**
     * Get domicilioPais
     *
     * @return string
     */
    public function getDomicilioPais()
    {
        return $this->domicilio_pais;
    }

    /**
     * Set domicilioCp
     *
     * @param string $domicilioCp
     *
     * @return Cliente
     */
    public function setDomicilioCp($domicilioCp)
    {
        $this->domicilio_cp = $domicilioCp;

        return $this;
    }

    /**
     * Get domicilioCp
     *
     * @return string
     */
    public function getDomicilioCp()
    {
        return $this->domicilio_cp;
    }

    /**
     * Set codigoUser
     *
     * @param string $codigoUser
     *
     * @return Cliente
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

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Cliente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
}
