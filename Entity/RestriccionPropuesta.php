<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\RestriccionPropuestaRepository")
 * @ORM\Table(name="restricciones_propuestas")
 * @ORM\HasLifecycleCallbacks
 */
class RestriccionPropuesta extends GenericEntity
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
    protected $pk_restriccion_propuesta;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $fk_pais;

    /**
     * @var Propuesta
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Propuesta")
     * @ORM\JoinColumn(name="fk_propuesta", referencedColumnName="pk_propuesta")
     */
    protected $propuesta;

    /**
     * @var cliente
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="fk_cliente", referencedColumnName="pk_cliente")
     */
    protected $cliente;

    /**
     * @var categoria_propuesta
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\CategoriaPropuesta")
     * @ORM\JoinColumn(name="fk_categoria_propuesta", referencedColumnName="pk_categoria_propuesta")
     */
    protected $categoria_propuesta;
    

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
     * Get pkRestriccionPropuesta
     *
     * @return integer
     */
    public function getPkRestriccionPropuesta()
    {
        return $this->pk_restriccion_propuesta;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return RestriccionPropuesta
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
     * @return RestriccionPropuesta
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
     * @return RestriccionPropuesta
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
     * @return RestriccionPropuesta
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
     * @return RestriccionPropuesta
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
     * Set propuesta
     *
     * @param \Vallas\ModelBundle\Entity\Propuesta $propuesta
     *
     * @return RestriccionPropuesta
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
     * Set cliente
     *
     * @param \Vallas\ModelBundle\Entity\Cliente $cliente
     *
     * @return RestriccionPropuesta
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
     * Set categoriaPropuesta
     *
     * @param \Vallas\ModelBundle\Entity\CategoriaPropuesta $categoriaPropuesta
     *
     * @return RestriccionPropuesta
     */
    public function setCategoriaPropuesta(\Vallas\ModelBundle\Entity\CategoriaPropuesta $categoriaPropuesta = null)
    {
        $this->categoria_propuesta = $categoriaPropuesta;

        return $this;
    }

    /**
     * Get categoriaPropuesta
     *
     * @return \Vallas\ModelBundle\Entity\CategoriaPropuesta
     */
    public function getCategoriaPropuesta()
    {
        return $this->categoria_propuesta;
    }
}
