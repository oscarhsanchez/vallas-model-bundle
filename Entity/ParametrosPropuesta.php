<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ParametrosPropuestaRepository")
 * @ORM\Table(name="parametros_propuestas")
 * @ORM\HasLifecycleCallbacks
 */
class ParametrosPropuesta extends GenericEntity
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
    protected  $pk_parametros_propuesta;

    /** @ORM\Column(type="float") */
    protected $prespuesto;

    /** @ORM\Column(type="string", length=200) */
    protected $plazas;

    /** @ORM\Column(type="date") */
    protected $fecha_inicio;

    /** @ORM\Column(type="integer") */
    protected $catorcenas;

    /** @ORM\Column(type="text") */
    protected $lugares_cercanos;

    /** @ORM\Column(type="text") */
    protected $lugares_cercanos_restriccion;

    /** @ORM\Column(type="string", length=20) */
    protected $tipologia;

    /** @ORM\Column(type="text") */
    protected $tipologia_medios;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $iluminacion;

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
     * Get pkParametrosPropuesta
     *
     * @return integer
     */
    public function getPkParametrosPropuesta()
    {
        return $this->pk_parametros_propuesta;
    }

    /**
     * Set prespuesto
     *
     * @param float $prespuesto
     *
     * @return ParametrosPropuesta
     */
    public function setPrespuesto($prespuesto)
    {
        $this->prespuesto = $prespuesto;

        return $this;
    }

    /**
     * Get prespuesto
     *
     * @return float
     */
    public function getPrespuesto()
    {
        return $this->prespuesto;
    }

    /**
     * Set plazas
     *
     * @param string $plazas
     *
     * @return ParametrosPropuesta
     */
    public function setPlazas($plazas)
    {
        $this->plazas = $plazas;

        return $this;
    }

    /**
     * Get plazas
     *
     * @return string
     */
    public function getPlazas()
    {
        return $this->plazas;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return ParametrosPropuesta
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set catorcenas
     *
     * @param integer $catorcenas
     *
     * @return ParametrosPropuesta
     */
    public function setCatorcenas($catorcenas)
    {
        $this->catorcenas = $catorcenas;

        return $this;
    }

    /**
     * Get catorcenas
     *
     * @return integer
     */
    public function getCatorcenas()
    {
        return $this->catorcenas;
    }

    /**
     * Set lugaresCercanos
     *
     * @param string $lugaresCercanos
     *
     * @return ParametrosPropuesta
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
     * Set lugaresCercanosRestriccion
     *
     * @param string $lugaresCercanosRestriccion
     *
     * @return ParametrosPropuesta
     */
    public function setLugaresCercanosRestriccion($lugaresCercanosRestriccion)
    {
        $this->lugares_cercanos_restriccion = $lugaresCercanosRestriccion;

        return $this;
    }

    /**
     * Get lugaresCercanosRestriccion
     *
     * @return string
     */
    public function getLugaresCercanosRestriccion()
    {
        return $this->lugares_cercanos_restriccion;
    }

    /**
     * Set tipologia
     *
     * @param string $tipologia
     *
     * @return ParametrosPropuesta
     */
    public function setTipologia($tipologia)
    {
        $this->tipologia = $tipologia;

        return $this;
    }

    /**
     * Get tipologia
     *
     * @return string
     */
    public function getTipologia()
    {
        return $this->tipologia;
    }

    /**
     * Set tipologiaMedios
     *
     * @param string $tipologiaMedios
     *
     * @return ParametrosPropuesta
     */
    public function setTipologiaMedios($tipologiaMedios)
    {
        $this->tipologia_medios = $tipologiaMedios;

        return $this;
    }

    /**
     * Get tipologiaMedios
     *
     * @return string
     */
    public function getTipologiaMedios()
    {
        return $this->tipologia_medios;
    }

    /**
     * Set iluminacion
     *
     * @param integer $iluminacion
     *
     * @return ParametrosPropuesta
     */
    public function setIluminacion($iluminacion)
    {
        $this->iluminacion = $iluminacion;

        return $this;
    }

    /**
     * Get iluminacion
     *
     * @return integer
     */
    public function getIluminacion()
    {
        return $this->iluminacion;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ParametrosPropuesta
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
     * @return ParametrosPropuesta
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
     * @return ParametrosPropuesta
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
     * @return ParametrosPropuesta
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
