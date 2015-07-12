<?php
namespace Sd\amvalBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class subset
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
    private $date;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /** 
     * @ORM\ManyToOne(targetEntity="permit", inversedBy="subsets")
     * @ORM\JoinColumn(name="permit_id", referencedColumnName="id", nullable=false)
     */
    private $permit;

    /**
     * Set id
     *
     * @param integer $id
     * @return subset
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
     * @return subset
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
     * Set date
     *
     * @param string $date
     * @return subset
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return subset
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
     * Set permit
     *
     * @param \Sd\amvalBundle\Entity\permit $permit
     * @return subset
     */
    public function setPermit(\Sd\amvalBundle\Entity\permit $permit)
    {
        $this->permit = $permit;
    
        return $this;
    }

    /**
     * Get permit
     *
     * @return \Sd\amvalBundle\Entity\permit 
     */
    public function getPermit()
    {
        return $this->permit;
    }
    public function __toString(){

        return $this->getName();
    }
}