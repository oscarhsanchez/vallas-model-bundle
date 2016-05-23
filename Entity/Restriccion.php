<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\RestriccionRepository")
 * @ORM\Table(name="restricciones")
 * @ORM\HasLifecycleCallbacks
 */
class Restriccion extends GenericEntity
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
    protected  $pk_restriccion;

    /**
     * @var Pais
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais", nullable=false)
     */
    protected $pais;

    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="fk_cliente", referencedColumnName="pk_cliente", nullable=true)
     */
    protected $cliente;

    /**
     * @var CategoriaPropuesta
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\CategoriaPropuesta")
     * @ORM\JoinColumn(name="fk_categoria", referencedColumnName="pk_categoria_propuesta", nullable=true)
     */
    protected $categoria;


    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="fk_cliente_restriccion", referencedColumnName="pk_cliente", nullable=true)
     */
    protected $clienteRestriccion;

    /**
     * @var CategoriaPropuesta
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\CategoriaPropuesta")
     * @ORM\JoinColumn(name="fk_categoria_restriccion", referencedColumnName="pk_categoria_propuesta", nullable=true)
     */
    protected $categoriaRestriccion;

    /**
     * @var Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Ubicacion", inversedBy="medios")
     * @ORM\JoinColumn(name="fk_ubicacion", referencedColumnName="pk_ubicacion", nullable=true)
     */
    protected $ubicacion;


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
     * Get pkRestriccion
     *
     * @return int
     */
    public function getPkRestriccion()
    {
        return $this->pk_restriccion;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Restriccion
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
     * @return Restriccion
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
     * @return Restriccion
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
     * @param int $estado
     *
     * @return Restriccion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return int
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
     * @return Restriccion
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
     * Set cliente
     *
     * @param \Vallas\ModelBundle\Entity\Cliente $cliente
     *
     * @return Restriccion
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
     * Set categoria
     *
     * @param \Vallas\ModelBundle\Entity\CategoriaPropuesta $categoria
     *
     * @return Restriccion
     */
    public function setCategoria(\Vallas\ModelBundle\Entity\CategoriaPropuesta $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Vallas\ModelBundle\Entity\CategoriaPropuesta
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set clienteRestriccion
     *
     * @param \Vallas\ModelBundle\Entity\Cliente $clienteRestriccion
     *
     * @return Restriccion
     */
    public function setClienteRestriccion(\Vallas\ModelBundle\Entity\Cliente $clienteRestriccion = null)
    {
        $this->clienteRestriccion = $clienteRestriccion;
    
        return $this;
    }

    /**
     * Get clienteRestriccion
     *
     * @return \Vallas\ModelBundle\Entity\Cliente
     */
    public function getClienteRestriccion()
    {
        return $this->clienteRestriccion;
    }

    /**
     * Set categoriaRestriccion
     *
     * @param \Vallas\ModelBundle\Entity\CategoriaPropuesta $categoriaRestriccion
     *
     * @return Restriccion
     */
    public function setCategoriaRestriccion(\Vallas\ModelBundle\Entity\CategoriaPropuesta $categoriaRestriccion = null)
    {
        $this->categoriaRestriccion = $categoriaRestriccion;
    
        return $this;
    }

    /**
     * Get categoriaRestriccion
     *
     * @return \Vallas\ModelBundle\Entity\CategoriaPropuesta
     */
    public function getCategoriaRestriccion()
    {
        return $this->categoriaRestriccion;
    }

    /**
     * Set ubicacion
     *
     * @param \Vallas\ModelBundle\Entity\Ubicacion $ubicacion
     *
     * @return Restriccion
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
}
