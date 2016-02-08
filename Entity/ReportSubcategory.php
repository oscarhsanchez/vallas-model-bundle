<?php

namespace Vallas\ModelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ESocial\ModelBundle\Entity\GenericEntity;

/**
 * ReportSubcategory
 *
 * @ORM\Table(name="report_subcategory")
 * @ORM\Entity(repositoryClass="Vallas\ModelBundle\Repository\ReportSubcategoryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ReportSubcategory extends GenericEntity
{

    public function __toString() {
        return $this->getName();
    }

    public function __construct()
    {
        $this->token = GenericEntity::generateNewToken();
        $this->reports = new ArrayCollection();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var Pais
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\Pais")
     * @ORM\JoinColumn(name="fk_pais", referencedColumnName="pk_pais")
     */
    protected $pais;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @var ReportCategory
     *
     * @ORM\ManyToOne(targetEntity="Vallas\ModelBundle\Entity\ReportCategory")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @var string
     * @ORM\Column(name="token", type="string", length=128, nullable=true)
     */
    protected $token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected $created_at;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Vallas\ModelBundle\Entity\Report", mappedBy="subcategory")
     */
    protected $reports;

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setCreatedAt()
    {
        if($this->created_at == null){
            $this->created_at = new \DateTime();
            $this->token = sha1(microtime(1));
        }
        $this->updated_at = new \DateTime();
    }



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
     * Set name
     *
     * @param string $name
     *
     * @return ReportSubcategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return ReportSubcategory
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
     * @return ReportSubcategory
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
     * Add report
     *
     * @param \Vallas\ModelBundle\Entity\Report $report
     *
     * @return ReportSubcategory
     */
    public function addReport(\Vallas\ModelBundle\Entity\Report $report)
    {
        $this->reports[] = $report;

        return $this;
    }

    /**
     * Remove report
     *
     * @param \Vallas\ModelBundle\Entity\Report $report
     */
    public function removeReport(\Vallas\ModelBundle\Entity\Report $report)
    {
        $this->reports->removeElement($report);
    }

    /**
     * Get reports
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReports()
    {
        return $this->reports;
    }

    /**
     * Set category
     *
     * @param \Vallas\ModelBundle\Entity\ReportCategory $category
     *
     * @return ReportSubcategory
     */
    public function setCategory(\Vallas\ModelBundle\Entity\ReportCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Vallas\ModelBundle\Entity\ReportCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set pais
     *
     * @param \Vallas\ModelBundle\Entity\Pais $pais
     *
     * @return ReportSubcategory
     */
    public function setPais(\Vallas\ModelBundle\Entity\Pais $pais = null)
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
}
