<?php
namespace Sd\amvalBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class kala
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
    private $cost;

    /** 
     * @ORM\Column(type="integer", nullable=true)
     */
    private $count;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $date;

    /** 
     * @ORM\ManyToOne(targetEntity="category", inversedBy="kalas")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private $category;

    /**
     * Set id
     *
     * @param integer $id
     * @return kala
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
     * @return kala
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
     * Set cost
     *
     * @param string $cost
     * @return kala
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    
        return $this;
    }

    /**
     * Get cost
     *
     * @return string 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return kala
     */
    public function setCount($count)
    {
        $this->count = $count;
    
        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return kala
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
     * Set category
     *
     * @param \Sd\amvalBundle\Entity\category $category
     * @return kala
     */
    public function setCategory(\Sd\amvalBundle\Entity\category $category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Sd\amvalBundle\Entity\category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}