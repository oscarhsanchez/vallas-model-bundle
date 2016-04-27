<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\IncidenciaRepository")
 * @ORM\Table(name="incidencias")
 * @ORM\HasLifecycleCallbacks
 */
class Incidencia extends GenericEntity
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
    public $pk_incidencia;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Medio")
     * @ORM\JoinColumn(name="fk_medio", referencedColumnName="pk_medio", nullable=true)
     */
    protected $medio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $codigo_user_asignado;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $tipo;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $estado_incidencia;

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
     * @ORM\OneToMany(targetEntity="ImagenIncidencia", mappedBy="incidencia", cascade={"persist","remove"})
     **/
    protected $imagenes;

    /**
     * @ORM\OneToMany(targetEntity="LogIncidencia", mappedBy="incidencia", cascade={"persist", "remove"})
     **/
    protected $logs;


    /**
     * Get pkIncidencia
     *
     * @return integer
     */
    public function getPkIncidencia()
    {
        return $this->pk_incidencia;
    }

    /**
     * Set codigoUser
     *
     * @param string $codigoUser
     *
     * @return Incidencia
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
     * Set codigoUserAsignado
     *
     * @param string $codigoUserAsignado
     *
     * @return Incidencia
     */
    public function setCodigoUserAsignado($codigoUserAsignado)
    {
        $this->codigo_user_asignado = $codigoUserAsignado;

        return $this;
    }

    /**
     * Get codigoUserAsignado
     *
     * @return string
     */
    public function getCodigoUserAsignado()
    {
        return $this->codigo_user_asignado;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return Incidencia
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
     * Set estadoIncidencia
     *
     * @param integer $estadoIncidencia
     *
     * @return Incidencia
     */
    public function setEstadoIncidencia($estadoIncidencia)
    {
        $this->estado_incidencia = $estadoIncidencia;

        return $this;
    }

    /**
     * Get estadoIncidencia
     *
     * @return integer
     */
    public function getEstadoIncidencia()
    {
        return $this->estado_incidencia;
    }

    /**
     * Set fechaLimite
     *
     * @param \DateTime $fechaLimite
     *
     * @return Incidencia
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
     * @return Incidencia
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
     * @return Incidencia
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
     * @return Incidencia
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
     * @return Incidencia
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
     * @return Incidencia
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
     * @return Incidencia
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
     * @return Incidencia
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
     * @return Incidencia
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
     * Set medio
     *
     * @param \Vallas\ModelBundle\Entity\Medio $medio
     *
     * @return Incidencia
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
     * Add imagene
     *
     * @param \Vallas\ModelBundle\Entity\ImagenIncidencia $imagene
     *
     * @return Incidencia
     */
    public function addImagene(\Vallas\ModelBundle\Entity\ImagenIncidencia $imagene)
    {
        $this->imagenes[] = $imagene;

        return $this;
    }

    /**
     * Remove imagene
     *
     * @param \Vallas\ModelBundle\Entity\ImagenIncidencia $imagene
     */
    public function removeImagene(\Vallas\ModelBundle\Entity\ImagenIncidencia $imagene)
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
     * @param \Vallas\ModelBundle\Entity\LogIncidencia $log
     *
     * @return Incidencia
     */
    public function addLog(\Vallas\ModelBundle\Entity\LogIncidencia $log)
    {
        $this->logs[] = $log;

        return $this;
    }

    /**
     * Remove log
     *
     * @param \Vallas\ModelBundle\Entity\LogIncidencia $log
     */
    public function removeLog(\Vallas\ModelBundle\Entity\LogIncidencia $log)
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
}
