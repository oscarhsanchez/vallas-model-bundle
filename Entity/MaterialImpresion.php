<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\MaterialImpresionRepository")
 * @ORM\Table(name="materiales_impresion")
 * @ORM\HasLifecycleCallbacks
 */
class MaterialImpresion extends GenericEntity
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
    protected $pk_material;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable = false, unique=false)
     */
    protected $material_nombre;


    /**
     * @var SubtipoMedio
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\SubtipoMedio")
     * @ORM\JoinColumn(name="fk_subtipo", referencedColumnName="pk_subtipo")
     */
    protected $subtipoMedio;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $precio;

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
     * Get pkMaterial
     *
     * @return integer
     */
    public function getPkMaterial()
    {
        return $this->pk_material;
    }

    /**
     * Set materialNombre
     *
     * @param string $materialNombre
     *
     * @return MaterialImpresion
     */
    public function setMaterialNombre($materialNombre)
    {
        $this->material_nombre = $materialNombre;

        return $this;
    }

    /**
     * Get materialNombre
     *
     * @return string
     */
    public function getMaterialNombre()
    {
        return $this->material_nombre;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return MaterialImpresion
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return MaterialImpresion
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
     * @return MaterialImpresion
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
     * @return MaterialImpresion
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
     * @return MaterialImpresion
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
     * Set subtipoMedio
     *
     * @param \Vallas\ModelBundle\Entity\SubtipoMedio $subtipoMedio
     *
     * @return MaterialImpresion
     */
    public function setSubtipoMedio(\Vallas\ModelBundle\Entity\SubtipoMedio $subtipoMedio = null)
    {
        $this->subtipoMedio = $subtipoMedio;

        return $this;
    }

    /**
     * Get subtipoMedio
     *
     * @return \Vallas\ModelBundle\Entity\SubtipoMedio
     */
    public function getSubtipoMedio()
    {
        return $this->subtipoMedio;
    }
}
