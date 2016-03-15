<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\BriefRepository")
 * @ORM\Table(name="briefs")
 * @ORM\HasLifecycleCallbacks
 */
class Brief extends GenericEntity
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
    protected  $pk_brief;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;

    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="fk_cliente", referencedColumnName="pk_cliente")
     */
    protected $cliente;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\User")
     * @ORM\JoinColumn(name="codigo_user", referencedColumnName="codigo", nullable=true)
     */
    protected $user;
    //public fk_marca;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable = false, unique=false)
     */
    protected $objetivo;

    /** @ORM\Column(type="date", nullable = true) */
    protected $fecha_inicio;

    /** @ORM\Column(type="date", nullable = true) */
    protected $fecha_fin;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable = false, unique=false)
     */
    protected $paises_plazas;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable = false, unique=false)
     */
    protected $tipologia_medios;

    /** @ORM\Column(type="date", nullable = true) */
    protected $fecha_solicitud;

    /** @ORM\Column(type="date", nullable = true) */
    protected $fecha_entrega;

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
     * Get pkBrief
     *
     * @return integer
     */
    public function getPkBrief()
    {
        return $this->pk_brief;
    }

    /**
     * Set objetivo
     *
     * @param string $objetivo
     *
     * @return Brief
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Brief
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
     * @return Brief
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
     * Set paisesPlazas
     *
     * @param string $paisesPlazas
     *
     * @return Brief
     */
    public function setPaisesPlazas($paisesPlazas)
    {
        $this->paises_plazas = $paisesPlazas;

        return $this;
    }

    /**
     * Get paisesPlazas
     *
     * @return string
     */
    public function getPaisesPlazas()
    {
        return $this->paises_plazas;
    }

    /**
     * Set tipologiaMedios
     *
     * @param string $tipologiaMedios
     *
     * @return Brief
     */
    public function setTipologiaMedios($tipologiaMedios)
    {
        $this->tipologia_medios = $tipologiaMedios;

        return $this;
    }

    /**
     * Get tipologiaMedios
     *
     * @return string
     */
    public function getTipologiaMedios()
    {
        return $this->tipologia_medios;
    }

    /**
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     *
     * @return Brief
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fecha_solicitud = $fechaSolicitud;

        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime
     */
    public function getFechaSolicitud()
    {
        return $this->fecha_solicitud;
    }

    /**
     * Set fechaEntrega
     *
     * @param \DateTime $fechaEntrega
     *
     * @return Brief
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fecha_entrega = $fechaEntrega;

        return $this;
    }

    /**
     * Get fechaEntrega
     *
     * @return \DateTime
     */
    public function getFechaEntrega()
    {
        return $this->fecha_entrega;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Brief
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
     * @return Brief
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
     * @return Brief
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
     * @return Brief
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
     * @return Brief
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
     * Set cliente
     *
     * @param \Vallas\ModelBundle\Entity\Cliente $cliente
     *
     * @return Brief
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
     * Set codigoUser
     *
     * @param string $codigoUser
     *
     * @return Brief
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
