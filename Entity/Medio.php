<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\MedioRepository")
 * @ORM\Table(name="medios")
 * @ORM\HasLifecycleCallbacks
 */
class Medio extends GenericEntity
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
     * @ORM\Column(type="string", length=20 )
     */
    protected $pk_medio;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $fk_pais;

    /**
     * @var Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Ubicacion")
     * @ORM\JoinColumn(name="fk_ubicacion", referencedColumnName="pk_ubicacion")
     */
    protected $ubicacion;

    /**
     * @var Subtipo
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Subtipo")
     * @ORM\JoinColumn(name="fk_subtipo", referencedColumnName="pk_subtipo")
     */
    protected $subtipo;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $posicion;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $id_cara;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = true, unique=false)
     */
    protected $tipo_medio;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=6, nullable = true, unique=false)
     */
    protected $estatus_iluminacion;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable = true, unique=false)
     */
    protected $estatus_inventario;

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
     * Get pkMedio
     *
     * @return integer
     */
    public function getPkMedio()
    {
        return $this->pk_medio;
    }

    /**
     * Set posicion
     *
     * @param integer $posicion
     *
     * @return Medio
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;

        return $this;
    }

    /**
     * Get posicion
     *
     * @return integer
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set idCara
     *
     * @param integer $idCara
     *
     * @return Medio
     */
    public function setIdCara($idCara)
    {
        $this->id_cara = $idCara;

        return $this;
    }

    /**
     * Get idCara
     *
     * @return integer
     */
    public function getIdCara()
    {
        return $this->id_cara;
    }

    /**
     * Set tipoMedio
     *
     * @param string $tipoMedio
     *
     * @return Medio
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
     * Set estatusIluminacion
     *
     * @param string $estatusIluminacion
     *
     * @return Medio
     */
    public function setEstatusIluminacion($estatusIluminacion)
    {
        $this->estatus_iluminacion = $estatusIluminacion;

        return $this;
    }

    /**
     * Get estatusIluminacion
     *
     * @return string
     */
    public function getEstatusIluminacion()
    {
        return $this->estatus_iluminacion;
    }

    /**
     * Set estatusInventario
     *
     * @param string $estatusInventario
     *
     * @return Medio
     */
    public function setEstatusInventario($estatusInventario)
    {
        $this->estatus_inventario = $estatusInventario;

        return $this;
    }

    /**
     * Get estatusInventario
     *
     * @return string
     */
    public function getEstatusInventario()
    {
        return $this->estatus_inventario;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Medio
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
     * @return Medio
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
     * @return Medio
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
     * @return Medio
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
     * Set fkPais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $fkPais
     *
     * @return Medio
     */
    public function setFkPais(\Vallas\ModelBundle\Entity\Pais $fkPais)
    {
        $this->fk_pais = $fkPais;

        return $this;
    }

    /**
     * Get fkPais
     *
     * @return \Vallas\ModelBundle\Entity\Pais
     */
    public function getFkPais()
    {
        return $this->fk_pais;
    }

    /**
     * Set ubicacion
     *
     * @param \Vallas\ModelBundle\Entity\Ubicacion $ubicacion
     *
     * @return Medio
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
     * Set subtipo
     *
     * @param \Vallas\ModelBundle\Entity\Subtipo $subtipo
     *
     * @return Medio
     */
    public function setSubtipo(\Vallas\ModelBundle\Entity\Subtipo $subtipo = null)
    {
        $this->subtipo = $subtipo;

        return $this;
    }

    /**
     * Get subtipo
     *
     * @return \Vallas\ModelBundle\Entity\Subtipo
     */
    public function getSubtipo()
    {
        return $this->subtipo;
    }
}
