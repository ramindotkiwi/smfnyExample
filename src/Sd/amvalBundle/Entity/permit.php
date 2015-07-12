<?php
namespace Sd\amvalBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class permit
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @ORM\OneToMany(targetEntity="subset", mappedBy="permit")
     */
    private $subsets;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subsets = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return permit
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
     * @return permit
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
     * Add subsets
     *
     * @param \Sd\amvalBundle\Entity\subset $subsets
     * @return permit
     */
    public function addSubset(\Sd\amvalBundle\Entity\subset $subsets)
    {
        $this->subsets[] = $subsets;
    
        return $this;
    }

    /**
     * Remove subsets
     *
     * @param \Sd\amvalBundle\Entity\subset $subsets
     */
    public function removeSubset(\Sd\amvalBundle\Entity\subset $subsets)
    {
        $this->subsets->removeElement($subsets);
    }

    /**
     * Get subsets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubsets()
    {
        return $this->subsets;
    }
    public  function __toString(){

        return $this->getName();
    }
}