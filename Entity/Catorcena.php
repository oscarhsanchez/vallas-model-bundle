<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\CatorcenaRepository")
 * @ORM\Table(name="catorcenas")
 * @ORM\HasLifecycleCallbacks
 */
class Catorcena extends GenericEntity
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
    protected $id;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $anio;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $catorcena;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable = false, unique=false)
     */
    protected $mes;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $mes_numero;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $catorcena_inicio;

    /** @ORM\Column(type="integer", nullable = false) */
    protected $catorcena_termino;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     *
     * @return Catorcena
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
     * Set catorcena
     *
     * @param integer $catorcena
     *
     * @return Catorcena
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
     * Set mes
     *
     * @param string $mes
     *
     * @return Catorcena
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return string
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set mesNumero
     *
     * @param integer $mesNumero
     *
     * @return Catorcena
     */
    public function setMesNumero($mesNumero)
    {
        $this->mes_numero = $mesNumero;

        return $this;
    }

    /**
     * Get mesNumero
     *
     * @return integer
     */
    public function getMesNumero()
    {
        return $this->mes_numero;
    }

    /**
     * Set catorcenaInicio
     *
     * @param integer $catorcenaInicio
     *
     * @return Catorcena
     */
    public function setCatorcenaInicio($catorcenaInicio)
    {
        $this->catorcena_inicio = $catorcenaInicio;

        return $this;
    }

    /**
     * Get catorcenaInicio
     *
     * @return integer
     */
    public function getCatorcenaInicio()
    {
        return $this->catorcena_inicio;
    }

    /**
     * Set catorcenaTermino
     *
     * @param integer $catorcenaTermino
     *
     * @return Catorcena
     */
    public function setCatorcenaTermino($catorcenaTermino)
    {
        $this->catorcena_termino = $catorcenaTermino;

        return $this;
    }

    /**
     * Get catorcenaTermino
     *
     * @return integer
     */
    public function getCatorcenaTermino()
    {
        return $this->catorcena_termino;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Catorcena
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
     * @return Catorcena
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
     * @return Catorcena
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
     * @return Catorcena
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
}
