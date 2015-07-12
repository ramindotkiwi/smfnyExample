<?php
namespace Sd\amvalBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class category
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /** 
     * @ORM\OneToMany(targetEntity="kala", mappedBy="category")
     */
    private $kalas;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->kalas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set id
     *
     * @param integer $id
     * @return category
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
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
     * @return category
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
     * Set description
     *
     * @param string $description
     * @return category
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add kalas
     *
     * @param \Sd\amvalBundle\Entity\kala $kalas
     * @return category
     */
    public function addKala(\Sd\amvalBundle\Entity\kala $kalas)
    {
        $this->kalas[] = $kalas;
    
        return $this;
    }

    /**
     * Remove kalas
     *
     * @param \Sd\amvalBundle\Entity\kala $kalas
     */
    public function removeKala(\Sd\amvalBundle\Entity\kala $kalas)
    {
        $this->kalas->removeElement($kalas);
    }

    /**
     * Get kalas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getKalas()
    {
        return $this->kalas;
    }
    public  function __toString(){

        return $this->getName();
    }
}