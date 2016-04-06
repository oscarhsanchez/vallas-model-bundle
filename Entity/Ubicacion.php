<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\UbicacionRepository")
 * @ORM\Table(name="ubicaciones")
 * @ORM\HasLifecycleCallbacks
 */
class Ubicacion extends GenericEntity
{

    public function __toString(){
        return $this->getUbicacion();
    }

    public function __construct()
    {
        $this->token = GenericEntity::generateNewToken();
        $this->medios = new ArrayCollection();
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
     * @ORM\Column(type="string", length=20)
     */
    protected $pk_ubicacion;

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
     * @var Plaza
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Plaza")
     * @ORM\JoinColumn(name="fk_plaza", referencedColumnName="pk_plaza")
     */
    protected $plaza;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Zona")
     * @ORM\JoinColumn(name="fk_zona_fijacion", referencedColumnName="pk_zona")
     */
    protected $zona_fijacion;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Zona")
     * @ORM\JoinColumn(name="fk_zona_iluminacion", referencedColumnName="pk_zona")
     */
    protected $zona_iluminacion;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Zona")
     * @ORM\JoinColumn(name="fk_zona_instalacion", referencedColumnName="pk_zona")
     */
    protected $zona_instalacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=14, nullable = true, unique=false)
     */
    protected $unidad_negocio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=80, nullable = true, unique=false)
     */
    protected $tipo_medio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable = true, unique=false)
     */
    protected $estatus;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=200, nullable = true, unique=false)
     */
    protected $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=120, nullable = true, unique=false)
     */
    protected $direccion_comercial;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=120, nullable = true, unique=false)
     */
    protected $referencia;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true, unique=false)
     */
    protected $trafico_vehicular;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true, unique=false)
     */
    protected $trafico_transeuntes;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true, unique=false)
     */
    protected $nivel_socioeconomico;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true, unique=false)
     */
    protected $lugares_cercanos;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=6, nullable = true, unique=false)
     */
    protected $categoria;

    /** @ORM\Column(type="integer", nullable = true) */
    protected $catorcena;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $anio;

    /** @ORM\Column(type="date", nullable = true) */
    protected $fecha_instalacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=260, nullable = true, unique=false)
     */
    protected $observaciones;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $latitud;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $longitud;

    /**
     * @ORM\Column(type="integer", options={"default":1})
     */
    protected $reserva=1;


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
     * @ORM\OneToMany(targetEntity="ImagenUbicacion", mappedBy="ubicacion", cascade={"persist","remove"})
     **/
    protected $imagenes;

    /**
     * @ORM\OneToMany(targetEntity="Medio", mappedBy="ubicacion", cascade={"persist","remove"})
     **/
    protected $medios;


    /**
     * Set pkUbicacion
     *
     * @param string $pkUbicacion
     *
     * @return Ubicacion
     */
    public function setPkUbicacion($pkUbicacion)
    {
        $this->pk_ubicacion = $pkUbicacion;

        return $this;
    }

    /**
     * Get pkUbicacion
     *
     * @return string
     */
    public function getPkUbicacion()
    {
        return $this->pk_ubicacion;
    }

    /**
     * Set unidadNegocio
     *
     * @param string $unidadNegocio
     *
     * @return Ubicacion
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
     * Set tipoMedio
     *
     * @param string $tipoMedio
     *
     * @return Ubicacion
     */
    public function setTipoMedio($tipoMedio)
    {
        $this->tipo_medio = $tipoMedio;

        return $this;
    }

    /**
     * Get tipoMedio
     *
     * @return string
     */
    public function getTipoMedio()
    {
        return $this->tipo_medio;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     *
     * @return Ubicacion
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
     * Set ubicacion
     *
     * @param string $ubicacion
     *
     * @return Ubicacion
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set direccionComercial
     *
     * @param string $direccionComercial
     *
     * @return Ubicacion
     */
    public function setDireccionComercial($direccionComercial)
    {
        $this->direccion_comercial = $direccionComercial;

        return $this;
    }

    /**
     * Get direccionComercial
     *
     * @return string
     */
    public function getDireccionComercial()
    {
        return $this->direccion_comercial;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     *
     * @return Ubicacion
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     *
     * @return Ubicacion
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set catorcena
     *
     * @param integer $catorcena
     *
     * @return Ubicacion
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
     * Set anio
     *
     * @param integer $anio
     *
     * @return Ubicacion
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
     * Set fechaInstalacion
     *
     * @param \DateTime $fechaInstalacion
     *
     * @return Ubicacion
     */
    public function setFechaInstalacion($fechaInstalacion)
    {
        $this->fecha_instalacion = $fechaInstalacion;

        return $this;
    }

    /**
     * Get fechaInstalacion
     *
     * @return \DateTime
     */
    public function getFechaInstalacion()
    {
        return $this->fecha_instalacion;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Ubicacion
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
     * Set latitud
     *
     * @param float $latitud
     *
     * @return Ubicacion
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return float
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param float $longitud
     *
     * @return Ubicacion
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return float
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Ubicacion
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
     * @return Ubicacion
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
     * @return Ubicacion
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
     * @return Ubicacion
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
     * @return Ubicacion
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
     * @return Ubicacion
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
     * Set plaza
     *
     * @param \Vallas\ModelBundle\Entity\Plaza $plaza
     *
     * @return Ubicacion
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
     * Set traficoVehicular
     *
     * @param string $traficoVehicular
     *
     * @return Ubicacion
     */
    public function setTraficoVehicular($traficoVehicular)
    {
        $this->trafico_vehicular = $traficoVehicular;

        return $this;
    }

    /**
     * Get traficoVehicular
     *
     * @return string
     */
    public function getTraficoVehicular()
    {
        return $this->trafico_vehicular;
    }

    /**
     * Set traficoTranseuntes
     *
     * @param string $traficoTranseuntes
     *
     * @return Ubicacion
     */
    public function setTraficoTranseuntes($traficoTranseuntes)
    {
        $this->trafico_transeuntes = $traficoTranseuntes;

        return $this;
    }

    /**
     * Get traficoTranseuntes
     *
     * @return string
     */
    public function getTraficoTranseuntes()
    {
        return $this->trafico_transeuntes;
    }

    /**
     * Set nivelSocioeconomico
     *
     * @param string $nivelSocioeconomico
     *
     * @return Ubicacion
     */
    public function setNivelSocioeconomico($nivelSocioeconomico)
    {
        $this->nivel_socioeconomico = $nivelSocioeconomico;

        return $this;
    }

    /**
     * Get nivelSocioeconomico
     *
     * @return string
     */
    public function getNivelSocioeconomico()
    {
        return $this->nivel_socioeconomico;
    }

    /**
     * Set lugaresCercanos
     *
     * @param string $lugaresCercanos
     *
     * @return Ubicacion
     */
    public function setLugaresCercanos($lugaresCercanos)
    {
        $this->lugares_cercanos = $lugaresCercanos;

        return $this;
    }

    /**
     * Get lugaresCercanos
     *
     * @return string
     */
    public function getLugaresCercanos()
    {
        return $this->lugares_cercanos;
    }

    /**
     * Set reserva
     *
     * @param integer $reserva
     *
     * @return Ubicacion
     */
    public function setReserva($reserva)
    {
        $this->reserva = $reserva;

        return $this;
    }

    /**
     * Get reserva
     *
     * @return integer
     */
    public function getReserva()
    {
        return $this->reserva;
    }

    /**
     * Set zonaFijacion
     *
     * @param \Vallas\ModelBundle\Entity\Zona $zonaFijacion
     *
     * @return Ubicacion
     */
    public function setZonaFijacion(\Vallas\ModelBundle\Entity\Zona $zonaFijacion = null)
    {
        $this->zona_fijacion = $zonaFijacion;

        return $this;
    }

    /**
     * Get zonaFijacion
     *
     * @return \Vallas\ModelBundle\Entity\Zona
     */
    public function getZonaFijacion()
    {
        return $this->zona_fijacion;
    }

    /**
     * Set zonaIluminacion
     *
     * @param \Vallas\ModelBundle\Entity\Zona $zonaIluminacion
     *
     * @return Ubicacion
     */
    public function setZonaIluminacion(\Vallas\ModelBundle\Entity\Zona $zonaIluminacion = null)
    {
        $this->zona_iluminacion = $zonaIluminacion;

        return $this;
    }

    /**
     * Get zonaIluminacion
     *
     * @return \Vallas\ModelBundle\Entity\Zona
     */
    public function getZonaIluminacion()
    {
        return $this->zona_iluminacion;
    }

    /**
     * Set zonaInstalacion
     *
     * @param \Vallas\ModelBundle\Entity\Zona $zonaInstalacion
     *
     * @return Ubicacion
     */
    public function setZonaInstalacion(\Vallas\ModelBundle\Entity\Zona $zonaInstalacion = null)
    {
        $this->zona_instalacion = $zonaInstalacion;

        return $this;
    }

    /**
     * Get zonaInstalacion
     *
     * @return \Vallas\ModelBundle\Entity\Zona
     */
    public function getZonaInstalacion()
    {
        return $this->zona_instalacion;
    }

    /**
     * Add imagene
     *
     * @param \Vallas\ModelBundle\Entity\ImagenUbicacion $imagene
     *
     * @return Ubicacion
     */
    public function addImagene(\Vallas\ModelBundle\Entity\ImagenUbicacion $imagene)
    {
        $this->imagenes[] = $imagene;

        return $this;
    }

    /**
     * Remove imagene
     *
     * @param \Vallas\ModelBundle\Entity\ImagenUbicacion $imagene
     */
    public function removeImagene(\Vallas\ModelBundle\Entity\ImagenUbicacion $imagene)
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
     * Add medio
     *
     * @param \Vallas\ModelBundle\Entity\Medio $medio
     *
     * @return Ubicacion
     */
    public function addMedio(\Vallas\ModelBundle\Entity\Medio $medio)
    {
        $this->medios[] = $medio;

        return $this;
    }

    /**
     * Remove medio
     *
     * @param \Vallas\ModelBundle\Entity\Medio $medio
     */
    public function removeMedio(\Vallas\ModelBundle\Entity\Medio $medio)
    {
        $this->medios->removeElement($medio);
    }

    /**
     * Get medios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedios()
    {
        return $this->medios;
    }
}
