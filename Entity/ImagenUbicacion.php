<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ImagenUbicacionRepository")
 * @ORM\Table(name="imagenes_ubicaciones")
 * @ORM\HasLifecycleCallbacks
 */
class ImagenUbicacion extends GenericEntity
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
    protected $pk_archivo;

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
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Ubicacion", inversedBy="imagenes")
     * @ORM\JoinColumn(name="fk_ubicacion", referencedColumnName="pk_ubicacion")
     */
    protected $ubicacion;

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
     * @ORM\Column(type="string", length=100, nullable = false, unique=false)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable = false, unique=false)
     */
    protected $path;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable = false, unique=false)
     */
    protected $url;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true, unique=false)
     */
    protected $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable = true, unique=false)
     */
    protected $observaciones_cliente;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $estado_imagen;

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
     * Get pkArchivo
     *
     * @return integer
     */
    public function getPkArchivo()
    {
        return $this->pk_archivo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Imagen
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return Imagen
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Imagen
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Imagen
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
     * Set observacionesCliente
     *
     * @param string $observacionesCliente
     *
     * @return Imagen
     */
    public function setObservacionesCliente($observacionesCliente)
    {
        $this->observaciones_cliente = $observacionesCliente;

        return $this;
    }

    /**
     * Get observacionesCliente
     *
     * @return string
     */
    public function getObservacionesCliente()
    {
        return $this->observaciones_cliente;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Imagen
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
     * @return Imagen
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
     * @return Imagen
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
     * @return Imagen
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
     * @return Imagen
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
     * Set ordenTrabajo
     *
     * @param \Vallas\ModelBundle\Entity\OrdenTrabajo $ordenTrabajo
     *
     * @return Imagen
     */
    public function setOrdenTrabajo(\Vallas\ModelBundle\Entity\OrdenTrabajo $ordenTrabajo)
    {
        $this->orden_trabajo = $ordenTrabajo;

        return $this;
    }

    /**
     * Get ordenTrabajo
     *
     * @return \Vallas\ModelBundle\Entity\OrdenTrabajo
     */
    public function getOrdenTrabajo()
    {
        return $this->orden_trabajo;
    }

    /**
     * Set estadoImagen
     *
     * @param integer $estadoImagen
     *
     * @return Imagen
     */
    public function setEstadoImagen($estadoImagen)
    {
        $this->estado_imagen = $estadoImagen;

        return $this;
    }

    /**
     * Get estadoImagen
     *
     * @return integer
     */
    public function getEstadoImagen()
    {
        return $this->estado_imagen;
    }

    /**
     * Set ubicacion
     *
     * @param \Vallas\ModelBundle\Entity\Ubicacion $ubicacion
     *
     * @return ImagenUbicacion
     */
    public function setUbicacion(\Vallas\ModelBundle\Entity\Ubicacion $ubicacion = null)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return \Vallas\ModelBundle\Entity\Ubicacion
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set medio
     *
     * @param \Vallas\ModelBundle\Entity\Medio $medio
     *
     * @return ImagenUbicacion
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
}
