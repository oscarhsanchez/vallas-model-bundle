<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\SubtipoMedioRepository")
 * @ORM\Table(name="subtipos_medios")
 * @ORM\HasLifecycleCallbacks
 */
class SubtipoMedio extends GenericEntity
{

    public function __toString(){
        return $this->getDescripcion();
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
     * @ORM\Column(type="string", length=6)
     */
    protected  $pk_subtipo;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var TipoMedio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\TipoMedio")
     * @ORM\JoinColumn(name="fk_tipo", referencedColumnName="pk_tipo", nullable=true)
     */
    protected $tipoMedio;

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
     * @var string
     *
     * @ORM\Column(type="string", length=80, nullable = false, unique=false)
     */
    protected $descripcion;

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
     * Set pkSubtipo
     *
     * @param string $pkSubtipo
     *
     * @return SubtipoMedio
     */
    public function setPkSubtipo($pkSubtipo)
    {
        $this->pk_subtipo = $pkSubtipo;

        return $this;
    }

    /**
     * Get pkSubtipo
     *
     * @return string
     */
    public function getPkSubtipo()
    {
        return $this->pk_subtipo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return SubtipoMedio
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return SubtipoMedio
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
     * @return SubtipoMedio
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
     * @return SubtipoMedio
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
     * @return SubtipoMedio
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
     * Set unidadNegocio
     *
     * @param string $unidadNegocio
     *
     * @return SubtipoMedio
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
     * Set pais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $pais
     *
     * @return SubtipoMedio
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
     * Set tipoMedio
     *
     * @param \Vallas\ModelBundle\Entity\TipoMedio $tipoMedio
     *
     * @return SubtipoMedio
     */
    public function setTipoMedio(\Vallas\ModelBundle\Entity\TipoMedio $tipoMedio = null)
    {
        $this->tipoMedio = $tipoMedio;

        return $this;
    }

    /**
     * Get tipoMedio
     *
     * @return \Vallas\ModelBundle\Entity\TipoMedio
     */
    public function getTipoMedio()
    {
        return $this->tipoMedio;
    }

    /**
     * Set empresa
     *
     * @param \Vallas\ModelBundle\Entity\Empresa $empresa
     *
     * @return SubtipoMedio
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
