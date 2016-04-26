<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\OrdenTrabajoRepository")
 * @ORM\Table(name="ordenes_trabajo")
 * @ORM\HasLifecycleCallbacks
 */
class OrdenTrabajo extends GenericEntity
{

    public function __toString(){
        $desc = '';

        if ($this->getFechaLimite()){
            $desc .= $this->getFechaLimite()->format('d/m/Y');
        }

        if ($this->getMedio() && $this->getMedio()->getUbicacion()){
            $desc .= ' - '. $this->getMedio()->getUbicacion();
        }

        if ($this->getCodigoUser()){
            $desc .= ' - '. $this->getCodigoUser();
        }

        return $desc;

    }

    public function __construct()
    {
        $this->token = GenericEntity::generateNewToken();
        $this->imagenes = new ArrayCollection();
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
    public $pk_orden_trabajo;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var Propuesta
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Propuesta")
     * @ORM\JoinColumn(name="fk_propuesta", referencedColumnName="pk_propuesta", nullable=true)
     */
    protected $propuesta;


    /**
     * @var Medio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Medio")
     * @ORM\JoinColumn(name="fk_medio", referencedColumnName="pk_medio")
     */
    protected $medio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $tipo;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $estado_orden;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    protected $fecha_limite;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $fecha_cierre;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true, unique=false)
     */
    protected $observaciones;

    /**
     * @var text
     *
     * @ORM\Column(type="text", nullable=true, unique=false)
     */
    protected $observaciones_cierre;

    /**
     * @var string

     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $version;

    /**
     * @var string

     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $campania;

    /**
     * @var MotivoOrdenesPendientes
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\MotivoOrdenesPendientes")
     * @ORM\JoinColumn(name="fk_motivo", referencedColumnName="pk_motivo", nullable=true)
     */
    protected $motivo_ordenes_pendientes;

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
     * @ORM\OneToMany(targetEntity="Imagen", mappedBy="orden_trabajo", cascade={"persist","remove"})
     **/
    protected $imagenes;

    /**
     * @ORM\OneToMany(targetEntity="LogOrdenTrabajo", mappedBy="orden_trabajo", cascade={"persist", "remove"})
     **/
    protected $logs;


    /**
     * Get pkOrdenTrabajo
     *
     * @return integer
     */
    public function getPkOrdenTrabajo()
    {
        return $this->pk_orden_trabajo;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return OrdenTrabajo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set estadoOrden
     *
     * @param integer $estadoOrden
     *
     * @return OrdenTrabajo
     */
    public function setEstadoOrden($estadoOrden)
    {
        $this->estado_orden = $estadoOrden;

        return $this;
    }

    /**
     * Get estadoOrden
     *
     * @return integer
     */
    public function getEstadoOrden()
    {
        return $this->estado_orden;
    }

    /**
     * Set fechaLimite
     *
     * @param \DateTime $fechaLimite
     *
     * @return OrdenTrabajo
     */
    public function setFechaLimite($fechaLimite)
    {
        $this->fecha_limite = $fechaLimite;

        return $this;
    }

    /**
     * Get fechaLimite
     *
     * @return \DateTime
     */
    public function getFechaLimite()
    {
        return $this->fecha_limite;
    }

    /**
     * Set fechaCierre
     *
     * @param \DateTime $fechaCierre
     *
     * @return OrdenTrabajo
     */
    public function setFechaCierre($fechaCierre)
    {
        $this->fecha_cierre = $fechaCierre;

        return $this;
    }

    /**
     * Get fechaCierre
     *
     * @return \DateTime
     */
    public function getFechaCierre()
    {
        return $this->fecha_cierre;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return OrdenTrabajo
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
     * Set observacionesCierre
     *
     * @param string $observacionesCierre
     *
     * @return OrdenTrabajo
     */
    public function setObservacionesCierre($observacionesCierre)
    {
        $this->observaciones_cierre = $observacionesCierre;

        return $this;
    }

    /**
     * Get observacionesCierre
     *
     * @return string
     */
    public function getObservacionesCierre()
    {
        return $this->observaciones_cierre;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return OrdenTrabajo
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
     * @return OrdenTrabajo
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
     * @return OrdenTrabajo
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
     * @return OrdenTrabajo
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
     * @return OrdenTrabajo
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
     * Set propuesta
     *
     * @param \Vallas\ModelBundle\Entity\Propuesta $propuesta
     *
     * @return OrdenTrabajo
     */
    public function setPropuesta(\Vallas\ModelBundle\Entity\Propuesta $propuesta = null)
    {
        $this->propuesta = $propuesta;

        return $this;
    }

    /**
     * Get propuesta
     *
     * @return \Vallas\ModelBundle\Entity\Propuesta
     */
    public function getPropuesta()
    {
        return $this->propuesta;
    }

    /**
     * Set medio
     *
     * @param \Vallas\ModelBundle\Entity\Medio $medio
     *
     * @return OrdenTrabajo
     */
    public function setMedio(\Vallas\ModelBundle\Entity\Medio $medio = null)
    {
        $this->medio = $medio;

        return $this;
    }

    /**
     * Get medio
     *
     * @return \Vallas\ModelBundle\Entity\Medio
     */
    public function getMedio()
    {
        return $this->medio;
    }


    /**
     * Set codigoUser
     *
     * @param string $codigoUser
     *
     * @return OrdenTrabajo
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
     * Add imagene
     *
     * @param \Vallas\ModelBundle\Entity\Imagen $imagene
     *
     * @return OrdenTrabajo
     */
    public function addImagene(\Vallas\ModelBundle\Entity\Imagen $imagene)
    {
        $this->imagenes[] = $imagene;

        return $this;
    }

    /**
     * Remove imagene
     *
     * @param \Vallas\ModelBundle\Entity\Imagen $imagene
     */
    public function removeImagene(\Vallas\ModelBundle\Entity\Imagen $imagene)
    {
        $this->imagenes->removeElement($imagene);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * Add log
     *
     * @param \Vallas\ModelBundle\Entity\LogOrdenTrabajo $log
     *
     * @return OrdenTrabajo
     */
    public function addLog(\Vallas\ModelBundle\Entity\LogOrdenTrabajo $log)
    {
        $this->logs[] = $log;

        return $this;
    }

    /**
     * Remove log
     *
     * @param \Vallas\ModelBundle\Entity\LogOrdenTrabajo $log
     */
    public function removeLog(\Vallas\ModelBundle\Entity\LogOrdenTrabajo $log)
    {
        $this->logs->removeElement($log);
    }

    /**
     * Get logs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLogs()
    {
        return $this->logs;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return OrdenTrabajo
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set campania
     *
     * @param string $campania
     *
     * @return OrdenTrabajo
     */
    public function setCampania($campania)
    {
        $this->campania = $campania;

        return $this;
    }

    /**
     * Get campania
     *
     * @return string
     */
    public function getCampania()
    {
        return $this->campania;
    }

    /**
     * Set motivoOrdenesPendientes
     *
     * @param \Vallas\ModelBundle\Entity\MotivoOrdenesPendientes $motivoOrdenesPendientes
     *
     * @return OrdenTrabajo
     */
    public function setMotivoOrdenesPendientes(\Vallas\ModelBundle\Entity\MotivoOrdenesPendientes $motivoOrdenesPendientes = null)
    {
        $this->motivo_ordenes_pendientes = $motivoOrdenesPendientes;

        return $this;
    }

    /**
     * Get motivoOrdenesPendientes
     *
     * @return \Vallas\ModelBundle\Entity\MotivoOrdenesPendientes
     */
    public function getMotivoOrdenesPendientes()
    {
        return $this->motivo_ordenes_pendientes;
    }
}
